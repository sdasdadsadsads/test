<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

// Import Excel Package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class report_promotion extends ResourceController

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
        try {

            $client = service('curlrequest', $this->url);

            $posts_data = $client->get("caching/promoCategory", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); //  แปลง JSON เป็น Array


            if (isset($body["data"])) {
                $body["promoCategory"] = $body["data"];
            }
            return view('Page/admin/report_promotion.php',  $body);
        } catch (Exception $e) {
            $session = session();
			$session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/report_promotion.php');
        }
    }



    public function filter()
    {
        try {
            $data = [
                'usernameSearch' =>  $this->request->getPost('usernameSearch'),
                'statusDataSearch' =>  $this->request->getPost('statusDataSearch'),
                'promotionnameDataSearch' =>  $this->request->getPost('promotionnameDataSearch'),
                'promotioncategoryDataSearch' =>  $this->request->getPost('promotioncategoryDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_promotion/filter', [
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

    public function cancelPromotion()
    {
        try {
            $isDelBonus = (int)$this->request->getPost('isDelBonus');
            $client = service('curlrequest', $this->url);
            $data = [
                'username' =>  $this->request->getPost('username'),
                'adminId' => session()->get('id'),
            ];
            switch($isDelBonus){
                case 1:
                    $posts_data = $client->post('promotions/cancelPromoDelBonus', [ 
                        "headers" => [
                            "Accept" => "application/json",
                            "jwt_token" => session()->get('JWT_TOKEN')
                        ],
                        'form_params' =>
                        $data
                    ]);
                    break;
                default:
                    $posts_data = $client->post('promotions/cancelPromotion', [
                        "headers" => [
                            "Accept" => "application/json",
                            "jwt_token" => session()->get('JWT_TOKEN')
                        ],
                        'form_params' =>
                        $data
                    ]);
            }
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
                'adminId' => session()->get('id'),
                'usernameSearch' =>  $this->request->getPost('usernameSearch'),
                'statusDataSearch' =>  $this->request->getPost('statusDataSearch'),
                'promotionnameDataSearch' =>  $this->request->getPost('promotionnameDataSearch'),
                'promotioncategoryDataSearch' =>  $this->request->getPost('promotioncategoryDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest',);

            $posts_data = $client->post('Report_promotion/filter', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true);
            // $body["statementData"] = $body["statementData"];


            if (isset($body["PromoData"])) {
                $fileName = 'report_first_deposit.xlsx'; // File is to create

                $spreadsheet = new Spreadsheet();

                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'ลำดับ');
                $sheet->setCellValue('B1', 'username');
                $sheet->setCellValue('C1', 'agent_username');
                $sheet->setCellValue('D1', 'promotion_name');
                $sheet->setCellValue('E1', 'category_name');
                $sheet->setCellValue('F1', 'amount');
                $sheet->setCellValue('G1', 'bonus');
                $sheet->setCellValue('H1', 'bonus_included');
                $sheet->setCellValue('I1', 'status');
                $rows = 2;

                foreach ($body["PromoData"] as $val) {
                    $sheet->setCellValue('A' . $rows, $val['row_num']);
                    $sheet->setCellValue('B' . $rows, $val['username']);
                    $sheet->setCellValue('C' . $rows, $val['agent_username']);
                    $sheet->setCellValue('D' . $rows, $val['promotion_name']);
                    $sheet->setCellValue('E' . $rows, $val['category_name']);
                    $sheet->setCellValue('F' . $rows, $val['amount']);
                    $sheet->setCellValue('G' . $rows, $val['bonus']);
                    $sheet->setCellValue('H' . $rows, $val['bonus_included']);
                    $sheet->setCellValue('I' . $rows, $val['status']);
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
                return redirect()->to(base_url('report_promotion/show'));
            }
        } catch (Exception $e) {

            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด');
            return redirect()->to(base_url('report_promotion/show'));
        }
    }
}
