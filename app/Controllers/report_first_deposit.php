<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

// Import Excel Package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class report_first_deposit extends ResourceController

{
    public function index()
    {

        return view('Page/admin/report_first_deposit.php');
    }

    public function filter()
    {
        try {
            $data = [
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_first_deposit/filter', [
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
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_first_deposit/filter', [
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true);
            // $body["statementData"] = $body["statementData"];


            if (isset($body["statementData"])) {
                $fileName = 'report_first_deposit.xlsx'; // File is to create

                $spreadsheet = new Spreadsheet();

                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'ลำดับ');
                $sheet->setCellValue('B1', 'วันที่');
                $sheet->setCellValue('C1', 'เวลา');
                $sheet->setCellValue('D1', 'Username');
                $sheet->setCellValue('E1', 'ฝาก');
                $sheet->setCellValue('F1', 'โบนัส');
                $sheet->setCellValue('G1', '% โบนัส');
                $rows = 2;

                foreach ($body["statementData"] as $val) {
                    $sheet->setCellValue('A' . $rows, $val['row_num']);
                    $sheet->setCellValue('B' . $rows, date('d/m/Y', $val['created_at']));
                    $sheet->setCellValue('C' . $rows, date('H:i', $val['created_at']));
                    $sheet->setCellValue('D' . $rows, $val['username']);
                    $sheet->setCellValue('E' . $rows, $val['deposit']);
                    $sheet->setCellValue('F' . $rows, $val['bonus']);
                    $sheet->setCellValue('G' . $rows, $val['bonus']);
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
                return redirect()->to(base_url('report_first_deposit/show'));
            }
        } catch (Exception $e) {

            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด');
            return redirect()->to(base_url('report_first_deposit/show'));
        }
    }
}
