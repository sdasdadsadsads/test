<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

// Import Excel Package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class report_activity_logs extends ResourceController
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
      
            try{
                $client = service('curlrequest', $this->url);
                $posts_data = $client->get('caching/menuAll', [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ]
                ]);
                $body = $posts_data->getBody();
                $data = [
                    'data' => json_decode($body)
                ];
                return view('Page/admin/report_activity_logs.php' , $data);
            }catch(Exception $er){
                return view('Page/admin/report_activity_logs.php');
            }
       
    }

  
    public function filter()
    {
        try {
            $data = [
                'typeSearch' =>  $this->request->getPost('typeSearch'),
                'DataSearch' =>  $this->request->getPost('DataSearch'),
                'menuDataSearch' =>  $this->request->getPost('menuDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_logs_activity/filter', [
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
            $re = '{"code": 0 , "msg":"?????????????????????????????????????????? ????????????????????????????????????????????????????????????"}';
            echo json_encode($re);
            return;
        }
    }


    public function csv()
    {
        try {

            $data = [
                'typeSearch' =>  $this->request->getPost('typeSearch'),
                'DataSearch' =>  $this->request->getPost('DataSearch'),
                'menuDataSearch' =>  $this->request->getPost('menuDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_logs_activity/filter', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // ???????????? JSON ???????????? Array
            // $body["statementData"] = $body["statementData"];


            if (isset($body["activityData"])) {
                $fileName = 'report_activity_logs.xlsx'; // File is to create

                $spreadsheet = new Spreadsheet();

                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', '???????????????');
                $sheet->setCellValue('B1', 'admin');
                $sheet->setCellValue('C1', 'user agent');
                $sheet->setCellValue('D1', '????????????');
                $sheet->setCellValue('E1', '????????????????????????');
                $sheet->setCellValue('F1', 'activity');
                $sheet->setCellValue('G1', '??????????????????');
                $rows = 2;

                foreach ($body["activityData"] as $val) {
                    $sheet->setCellValue('A' . $rows, $val['row_num']);
                    $sheet->setCellValue('B' . $rows, $val['admin']);
                    $sheet->setCellValue('C' . $rows, $val['user_agent']);
                    $sheet->setCellValue('D' . $rows, $val['name_menus']);
                    $sheet->setCellValue('E' . $rows, $val['name_permissions']);
                    $sheet->setCellValue('F' . $rows, $val['activity']);
                    $sheet->setCellValue('G' . $rows, date('d/m/Y H:i', $val['created_at']));
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
                $session->setFlashdata('error', '???????????????????????????????????????????????????');
                return redirect()->to(base_url('report_activity_logs/show'));
            }
        } catch (Exception $e) {

            $session = session();
            $session->setFlashdata('error', '??????????????????????????????????????????');
            return redirect()->to(base_url('report_activity_logs/show'));
        }
    }
}
