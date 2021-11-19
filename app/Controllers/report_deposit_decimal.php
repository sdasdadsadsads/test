<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

// Import Excel Package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class report_deposit_decimal extends ResourceController

{

    private $url;

	public function __construct()
	{
		$this->url = [
			'baseURI' => getenv('API_URL')
		];
	}
    
    public function index()
    {

        return view('Page/admin/report_deposit_decimal.php');
    }

    public function filter()
    {
        try {
            $data = [
                'usernameSearch' =>  $this->request->getPost('usernameSearch'),
                'depositDataSearch' =>  $this->request->getPost('depositDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_statement_decimal/filter', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            echo json_encode($body);
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }


    public function csv()
    {


        try {

            $data = [
                'usernameSearch' =>  $this->request->getPost('usernameSearch'),
                'depositDataSearch' =>  $this->request->getPost('depositDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_statement_decimal/filter', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            // $body["statementData"] = $body["statementData"];

            if (isset($body["statementData"])) {

                $fileName = 'report_deposit_decimal.xlsx'; // File is to create

                $spreadsheet = new Spreadsheet();

                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'Id');
                $sheet->setCellValue('B1', 'Username');
                $sheet->setCellValue('C1', 'จำนวน');
                $sheet->setCellValue('D1', 'วันที่สร้าง');
                $rows = 2;

                foreach ($body["statementData"] as $val) {
                    $sheet->setCellValue('A' . $rows, $val['row_num']);
                    $sheet->setCellValue('B' . $rows, $val['username']);
                    $sheet->setCellValue('C' . $rows, $val['deposit']);
                    $sheet->setCellValue('D' . $rows, date('d/m/Y H:i', $val['created_at']));
                    $rows++;
                }

                $writer = new Xlsx($spreadsheet);

                // file inside /public folder
                $filepath = $fileName;

                $writer->save($filepath);

                header("Content-Type: application/vnd.ms-excel");
                header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');

                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filepath));
                flush(); // Flush system output buffer
                readfile($filepath);

                exit;
            } else {

                $session = session();
                $session->setFlashdata('error', 'ข้อมูลไม่มีในระบบ');
                return redirect()->to(base_url('report_deposit_decimal/show'));
            }
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด');
            return redirect()->to(base_url('report_deposit_decimal/show'));
        }
    }
}
