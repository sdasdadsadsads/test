<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

// Import Excel Package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class withdraw extends ResourceController

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

            $posts_data = $client->get('withdraw/getWithdrawList', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true);
            $data = array(
                'withdraw' => $body['data'],
                'bankweb' => $body['bankweb']
            );
          

            return view('Page/admin/withdraw/withdraw.php', $data);
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/withdraw/withdraw.php');
        }
    }

    public function see_withdraw()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                'admin_username' =>  $session->get('username'),
                'withdraw_id' =>  $this->request->getPost('id')
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/see_withdraw', [
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

    public function get_bankweb_balanace()
    {
        try {
            $client = service('curlrequest', $this->url);
            $posts_data = $client->get('withdraw/get_balanace', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $body = $posts_data->getBody();
            echo json_encode($body);
            return;
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }

    public function get_bankweb()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                'admin_username' =>  $session->get('username'),
                'bank_web_id' =>  $this->request->getPost('bank_web_id'),
                'withdraw_id' =>  $this->request->getPost('withdraw_id'),
                'IPAddress'  =>  $this->request->getIPAddress(),

            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/get_bankweb', [
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

    public function confirm_withdraw_auto()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                'admin_username' =>  $session->get('username'),
                'withdraw_r' =>  $this->request->getPost('withdraw_r'),
                'bankweb_r' =>  $this->request->getPost('bankweb_r'),
                'bw_short' =>  $this->request->getPost('bw_shortbank'),
                'user_name' =>  $this->request->getPost('us_name'),
                'bw_bank_api' =>  $this->request->getPost('bw_api'),
                'IPAddress'  =>  $this->request->getIPAddress(),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/confirm_withdraw_auto', [
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

    public function cancel_wd_check()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                "admin_username" => $session->get('username'),
                'withdraw_id' =>  $this->request->getPost('id'),
                'IPAddress'  =>  $this->request->getIPAddress(),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/cancel_wd_check', [
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

    public function cancel_withdraw()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                "admin_username" => $session->get('username'),
                'withdraw_id' =>  $this->request->getPost('id'),
                'cause' =>  $this->request->getPost('cause'),
                'IPAddress'  =>  $this->request->getIPAddress(),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/cancel_withdraw', [
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

    public function remove_withdraw()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                "admin_username" => $session->get('username'),
                'withdraw_id' =>  $this->request->getPost('id'),
                'IPAddress'  =>  $this->request->getIPAddress(),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/remove_withdraw', [
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

    public function reback_withdraw()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                "admin_username" => $session->get('username'),
                'withdraw_id' =>  $this->request->getPost('withdraw_id'),
                'rewithdraw_type' =>  $this->request->getPost('rewithdraw_type'),
                'IPAddress'  =>  $this->request->getIPAddress(),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/reback_withdraw', [
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

    public function checkStatusWithdraw()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                'withdraw_id' =>  $this->request->getPost('withdraw_id'),
                'IPAddress'  =>  $this->request->getIPAddress(),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/checkStatusWithdraw', [
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

    public function filtersWithdraw()
    {
        try {
          
            $data = [
                'status' =>  $this->request->getPost('status'),
                'IPAddress'  =>  $this->request->getIPAddress(),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/filtersWithdraw', [
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
                'statusDataSearch' =>  $this->request->getPost('statusDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_withdraw/filter', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true);
          
            if (isset($body["withdrawData"])) {
                $fileName = 'withdraw.xlsx'; // File is to create

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
                    $sheet->setCellValue('B' . $rows, $val['user_bank_short']);
                    $sheet->setCellValue('C' . $rows, $val['account']);
                    $sheet->setCellValue('D' . $rows, $val['user_username']);
                    $sheet->setCellValue('E' . $rows, $val['amount']);
                    $sheet->setCellValue('F' . $rows, $val['status']);
                    $sheet->setCellValue('G' . $rows, $val['admin_check_name']);
                    $sheet->setCellValue('H' . $rows, $val['admin_cf_name']);
                    $sheet->setCellValue('H' . $rows, date('d/m/Y H:i', $val['time']));
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
                return redirect()->to(base_url('withdraw/show'));
            }
        } catch (Exception $e) {

            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด');
            return redirect()->to(base_url('withdraw/show'));
        }
    }

    public function check_withdrawal()
    {
        try {

            $client = service('curlrequest', $this->url);

            $posts_data = $client->get('withdraw/check_withdrawal', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            echo json_encode($body);
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }

    function check_status(){
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                'withdraw_id' =>  $this->request->getPost('withdraw_id'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/check_status', [
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
}
