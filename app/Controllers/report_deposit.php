<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

// Import Excel Package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class report_deposit extends ResourceController
{
    public function index()
    {

        return view('Page/admin/report_deposit.php');
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

            $posts_data = $client->post('Report_statement/filter', [
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

            $posts_data = $client->post('Report_statement/filter', [
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            // $body["statementData"] = $body["statementData"];


            if (isset($body["statementData"])) {
                $fileName = 'report_deposit.xlsx'; // File is to create

                $spreadsheet = new Spreadsheet();

                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'ลำดับ');
                $sheet->setCellValue('B1', 'ธนาคาร');
                $sheet->setCellValue('C1', 'Username');
                $sheet->setCellValue('D1', 'ฝาก');
                $sheet->setCellValue('E1', 'เครดิตก่อนเติม');
                $sheet->setCellValue('F1', 'โบนัส');
                $sheet->setCellValue('G1', 'เครดิตหลังเติม');
                $sheet->setCellValue('H1', 'เวลาทำรายการ');
                $sheet->setCellValue('I1', 'เวลาธนาคาร');
                $sheet->setCellValue('J1', 'ทำโดย');
                $sheet->setCellValue('K1', 'สถานะ');
                $rows = 2;

                foreach ($body["statementData"] as $val) {
                    $sheet->setCellValue('A' . $rows, $val['row_num']);
                    $sheet->setCellValue('B' . $rows, $val['from_bank']);
                    $sheet->setCellValue('C' . $rows, $val['username']);
                    $sheet->setCellValue('D' . $rows, $val['deposit']);
                    $sheet->setCellValue('E' . $rows, $val['credit_before']);
                    $sheet->setCellValue('F' . $rows, $val['bonus']);
                    $sheet->setCellValue('G' . $rows, $val['credit_after']);
                    $sheet->setCellValue('H' . $rows, date('d/m/Y H:i', $val['created_at']));
                    $sheet->setCellValue('I' . $rows, date('d/m/Y H:i', $val['auto_update']));
                    $sheet->setCellValue('J' . $rows, $val['username_admin']);
                    $sheet->setCellValue('K' . $rows, $val['status']);
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
                return redirect()->to(base_url('report_deposit/show'));
            }
        } catch (Exception $e) {

            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด');
            return redirect()->to(base_url('report_deposit/show'));
        }
    }
}
