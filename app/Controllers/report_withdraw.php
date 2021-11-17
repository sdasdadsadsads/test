<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

// Import Excel Package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class report_withdraw extends ResourceController

{
    public function index()
    {
        try {
            return view('Page/admin/report_withdraw.php');
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return redirect()->to(base_url('dashboard/show'));
        }
    }

    public function filter()
    {
        try {
            $data = [
                'usernameSearch' =>  $this->request->getPost('usernameSearch'),
                'statusDataSearch' =>  $this->request->getPost('statusDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_withdraw/filter', [
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
                'statusDataSearch' =>  $this->request->getPost('statusDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_withdraw/filter', [
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true);
            // $body["withdrawData"] = $body["withdrawData"];
            // print_r($body["withdrawData"]);

            if (isset($body["withdrawData"])) {
                $fileName = 'report_first_deposit.xlsx'; // File is to create

                $spreadsheet = new Spreadsheet();

                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'ลำดับ');
                $sheet->setCellValue('B1', 'ธนาคาร');
                $sheet->setCellValue('C1', 'account');
                $sheet->setCellValue('D1', 'Username');
                $sheet->setCellValue('E1', 'ยอดเงินถอน');
                $sheet->setCellValue('F1', 'สถานะ');
                $sheet->setCellValue('G1', 'ผู้ตรวจสอบ');
                $sheet->setCellValue('H1', 'ผู้โอน');
                $sheet->setCellValue('I1', 'วันที่เข้าระบบ');
                $rows = 2;

                foreach ($body["withdrawData"] as $val) {
                    $sheet->setCellValue('A' . $rows, $val['row_num']);
                    $sheet->setCellValue('B' . $rows, $val['bank_short']);
                    $sheet->setCellValue('C' . $rows, $val['account']);
                    $sheet->setCellValue('D' . $rows, $val['username']);
                    $sheet->setCellValue('E' . $rows, $val['amount']);
                    $sheet->setCellValue('F' . $rows, $val['status']);
                    $sheet->setCellValue('G' . $rows, $val['name']);
                    $sheet->setCellValue('F' . $rows, $val['name']);
                    $sheet->setCellValue('G' . $rows, $val['time']);
                    $sheet->setCellValue('H' . $rows, date('d/m/Y H:i', $val['time']));
                    $sheet->setCellValue('I' . $rows, date('d/m/Y H:i', $val['admin_cfTime']));
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
                return redirect()->to(base_url('report_withdraw/show'));
            }
        } catch (Exception $e) {

            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด');
            return redirect()->to(base_url('report_withdraw/show'));
        }
    }


}
