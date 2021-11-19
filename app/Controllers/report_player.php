<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class report_player extends ResourceController


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

            $posts_data = $client->get('caching/bankCategory', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            $body["bankCategory"] = $body["data"];

            return view('Page/admin/report_player.php', $body);
        } catch (Exception $e) {
            return view('Page/admin/report_player.php');
        }
    }


    public function filter()
    {
        try {
            $bankName = array();
            $bankId = array();
            $bankShortName = array();


            $user_data_input = [
                'selectStatement' =>  $this->request->getPost('selectStatement'),
                'selectTypeSearch' =>  $this->request->getPost('selectTypeSearch'),
                'inputDataSearch' =>  $this->request->getPost('inputDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];


            $client = service('curlrequest', $this->url);
            $posts_data = $client->post('Report_player/filter', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $user_data_input
            ]);
            $userData = $posts_data->getBody();

            $posts_data = $client->get('caching/bankCategory', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $bankData = $posts_data->getBody();
            foreach (json_decode($bankData)->data as $value) {
                array_push($bankName, $value->bank_th);
                array_push($bankId, $value->id);
                array_push($bankShortName, $value->bank_short);
            }

            $data_to_respone = [
                'usersData' => $userData,
                'bankName' => $bankName,
                'bankShortName' => $bankShortName,
                'bankId' => $bankId,
                'code' => 1,
            ];

            echo json_encode($data_to_respone);
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }


    public function filter_deposit_id()
    {
        try {
            $data = [
                'UserId' =>  $this->request->getPost('user_id_dw'),
                'startDate' =>  $this->request->getPost('startDate_dw'),
                'startTime' =>  $this->request->getPost('startTime_dw'),
                'endDate' =>  $this->request->getPost('endDate_dw'),
                'endTime' =>  $this->request->getPost('endTime_dw'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_statement/filter_id', [
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


    public function filter_withdraw_id()
    {
        try {
            $data = [
                'UserId' =>  $this->request->getPost('user_id_dw'),
                'startDate' =>  $this->request->getPost('startDate_dw'),
                'startTime' =>  $this->request->getPost('startTime_dw'),
                'endDate' =>  $this->request->getPost('endDate_dw'),
                'endTime' =>  $this->request->getPost('endTime_dw'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_withdraw/filter_id', [
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




    public function user_id($id)
    {

        try {
            if ($id) {

                $data = [
                    'user_id' => $id,
                ];
                // if ($this->request->getPost('admin_id')) {
                $client = service('curlrequest', $this->url);

                $posts_data = $client->post('manage/users/user_get', [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ],
                    'form_params' =>
                    $data
                ]);

                $body = $posts_data->getBody();

                $obj = json_decode($body);
                if ($obj->{'status'} == true) {
                    echo json_encode($body);
                    return;
                } else {
                    $message = $obj->{'message'};
                    $re = '{"code": 0 , "msg":"' . $message . '"}';
                    echo json_encode($re);
                    return;
                }
            } else {
                $body = '{"code": 0 , "msg":"ไม่มี ID"}';
                echo json_encode($body);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }

    public function user_edit()
    {
        try {
            $data = [
                'user_id' =>  $this->request->getPost('user_id'),
                'account' =>  $this->request->getPost('account'),
                'newbankId'  =>  $this->request->getPost('bankId'),
                'username'  => $this->request->getPost('username'),
                'lineId' =>  $this->request->getPost('lineId'),
                'fullName'  => $this->request->getPost('fullName'),
                'getBonus'  => $this->request->getPost('getBonus'),
                'lock_games'  => $this->request->getPost('lock_games'),
                'oldbankId'  => $this->request->getPost('oldbankId'),
                'adminId' => session()->get('id')
            ];


            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('manage/users/edit', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $userData = $posts_data->getBody();

            $bankName = array();
            $bankId = array();
            $bankShortName = array();

            $posts_data = $client->get('caching/bankCategory', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $bankData = $posts_data->getBody();
            foreach (json_decode($bankData)->data as $value) {
                array_push($bankName, $value->bank_th);
                array_push($bankId, $value->id);
                array_push($bankShortName, $value->bank_short);
            }

            $obj = json_decode($userData);
            if ($obj->{'status'} == true) {

                $data_to_respone = [
                    'usersData' => $userData,
                    'bankName' => $bankName,
                    'bankShortName' => $bankShortName,
                    'bankId' => $bankId,
                    'code' => 1,
                ];

                echo json_encode($data_to_respone);
                return;
            } else {
                $message = $obj->{'msg'};
                $re = '{"code": 0 , "msg":"' . $message . '"}';
                echo json_encode($re);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }



    public function resetPass($id)
    {

        try {
            if ($id) {

                $data = [
                    'userId' => $id,
                    'adminId'  => session()->get('id'),
                ];

                // if ($this->request->getPost('admin_id')) {
                $client = service('curlrequest', $this->url);

                $posts_data = $client->post('admin/manage/users/resetPass', [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ],
                    'form_params' =>
                    $data
                ]);

                $body = $posts_data->getBody();
                echo json_encode($body);
            } else {
                $body = '{"code": 0 , "msg":"ไม่มี ID"}';
                echo json_encode($body);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }
}
