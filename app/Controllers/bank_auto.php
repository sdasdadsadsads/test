<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class bank_auto extends ResourceController

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
            $posts_data = $client->get('bank/getBankAuto', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            if ($body['status'] == true) {
                $bank = $body['data']['bank'][0];
                $bankAuto = $body['data']['bankAuto'][0];
                $processlist = $body['process'];
                $processlist2 = $body['process2'];
                $data = array(
                    'bank' => $bank,
                    'bankAuto' => $bankAuto,
                    'processlist' => $processlist,
                    'processlist2' => $processlist2,
                );
                return view('Page/admin/bank_auto.php', $data);
            } else {
                $session = session();
                $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
                return view('Page/admin/bank_auto.php');
            }
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/bank_auto.php');
        }
    }

    public function createBankAuto()
    {
        try {
            $session = session();
            $data = [
                "admin_id" => $session->get('id'),
                'nameAccount' =>  $this->request->getPost('name'),
                'account' =>  $this->request->getPost('account'),
                'bank_id' =>  $this->request->getPost('bank_id'),
                'type' =>  $this->request->getPost('type'),
                'username' =>  $this->request->getPost('username'),
                'password' =>  $this->request->getPost('password'),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('bank/create_bank', [
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

    public function changeStatusBank()
    {
        try {
            $data = [
                'id' =>  $this->request->getPost('id'),
                'status' =>  $this->request->getPost('status'),
                'bank_web_id' =>  $this->request->getPost('bank_web_id'),
                'statusBankweb' =>  $this->request->getPost('statusBankweb'),
                'admin_id'  =>  session()->get("id"),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('bank/changeStatusBank', [
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

    public function bank_setting()
    {
        try {
            $client = service('curlrequest', $this->url);
            $posts_data = $client->get('bank/getBankSetting', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            if ($body['status'] == true) {
                $bankweb = $body['data']['bankweb'];
                $group_r = $body['data']['group_r'];

                $data = array(
                    'bankweb' => $bankweb,
                    'group_r' => $group_r,
                    'admin_id'  =>  session()->get("id"),
                );

                return view('Page/admin/bank_setting.php', $data);
            }
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/bank_setting.php');
        }
    }

    public function addgroupByuser()
    {

        try {
            $data = [
                'bank_id' =>  $this->request->getPost('bank_id'),
                'general' =>  $this->request->getPost(1),
                'kbank' =>  $this->request->getPost(2),
                'bbl' =>  $this->request->getPost(3),
                'bay' =>  $this->request->getPost(4),
                'scb' =>  $this->request->getPost(5),
                'ktb' =>  $this->request->getPost(6),
                'otherbank' =>  $this->request->getPost(7),
                'VIP' =>  $this->request->getPost(8),
                'TrueWallet' =>  $this->request->getPost(21),
                'admin_id'  =>  session()->get("id"),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('bank/addgroupByuser', [
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

        //  print_r($bank_id);
        //  die;
    }

    public function changeStatusProcesslist()
    {
        try {
            $data = [
                'id' =>  $this->request->getPost('id'),
                'status' =>  $this->request->getPost('status'),
                'bank_short' =>  $this->request->getPost('bank_short'),
                'bank_web_id' =>  $this->request->getPost('bank_web_id'),
                'id_account' =>  $this->request->getPost('id_acc'),
                'admin_id'  =>  session()->get("id"),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('bank/changeStatusProcesslist',
                [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ],
                    'form_params' => $data
                ]
            );
            $body = $posts_data->getBody();
            echo json_encode($body);
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }
}
