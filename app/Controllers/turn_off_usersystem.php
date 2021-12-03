<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class turn_off_usersystem extends ResourceController

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
            
            $posts_data = $client->get("take_off_user_system/show_all", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            $obj = json_decode($body);

         
            if ($obj->{'status'} == true) {
                $body = json_decode($body, true);
                if (isset($body["takeoffusersystemtData"])) {
                    $body["takeoffusersystemtData"] = $body["takeoffusersystemtData"];

                    return view('Page/admin/turn_off_usersystem.php', $body);
                }
            } else {
                $body = json_decode($body, true);
                $body["takeoffusersystemtData"] = [];
                return view('Page/admin/turn_off_usersystem.php', $body);
            }
        } catch (Exception $e) {
            // $body = json_decode($body, true);
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            $body["takeoffusersystemtData"] = [];
            return view('Page/admin/turn_off_usersystem.php', $body);
        }
    }


    
    public function add_turn_off_usersystem()
    {

        try {
            if ($this->request->getPost('take_off_name')) {
                if ($this->request->getFile('image') != "") {


                    $file = $this->request->getFile('image');
                    $session = session();
                    $getRandomName = $file->getRandomName();
                    $data = [
                        'status' =>  $this->request->getPost('status'),
                        'is_run_auto' =>  $this->request->getPost('is_run_auto'),
                        'take_off_name' =>  $this->request->getPost('take_off_name'),
                        'start_time' =>  $this->request->getPost('start_time'),
                        'end_time' =>  $this->request->getPost('end_time'),
                        'take_off_day' =>  $this->request->getPost('take_off_day'),
                        'img' =>  $getRandomName,
                        'admin_id'  =>  $session->get("id"),
                    ];

                    // echo json_encode($data);
                    // return;

                    if ($data['start_time'] === '') {
                        $data['start_time'] = Null;
                    }

                    if ($data['end_time'] === '') {
                        $data['end_time'] = Null;
                    }

                  
                    $file->move('assets/images/take_off_user_system/', $data['img']);

                    $client = service('curlrequest', $this->url);

                    $posts_data = $client->post('take_off_user_system/create', [
                        "headers" => [
                            "Accept" => "application/json",
                            "jwt_token" => session()->get('JWT_TOKEN')
                        ],
                        'form_params' =>
                        $data
                    ]);



                    $body = $posts_data->getBody();
                    $obj = json_decode($body);
                    $message = $obj->{'message'};

                    if ($obj->{'status'} == true) {
                        $re = '{"code": 1 , "msg":" ' . $message . '"}';
                        echo json_encode($re);
                        return;
                    } else {
                        $re = '{"code": 0 , "msg":" ' . $message . '"}';
                        echo json_encode($re);
                        return;
                    }

                  
                } else {
                    $re = '{"code": 0 , "msg":"กรุณาใส่รูปภาพ"}';
                    echo json_encode($re);
                    return;
                }
            } else {
                $re = '{"code": 0 , "msg":"กรุณาใส่ชื่อแจ้งเตือน"}';
                echo json_encode($re);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }

    public function edit_turn_off_usersystem()
    {

        try {
            $session = session();
            if ($this->request->getFile('image') == "") {

                $data = [
                    'id' =>  $this->request->getPost('id'),
                    'status' =>  $this->request->getPost('status'),
                    'is_run_auto' =>  $this->request->getPost('is_run_auto'),
                    'take_off_name' =>  $this->request->getPost('take_off_name'),
                    'start_time' =>  $this->request->getPost('start_time'),
                    'end_time' =>  $this->request->getPost('end_time'),
                    'take_off_day' =>  $this->request->getPost('take_off_day'),
                    'img' =>  $this->request->getPost('take_off_image'),
                    'admin_id'  =>  $session->get("id"),
                ];


                
            } else {

                $file = $this->request->getFile('image');
                $getRandomName = $file->getRandomName();

                $data = [
                    'id' =>  $this->request->getPost('id'),
                    'status' =>  $this->request->getPost('status'),
                    'is_run_auto' =>  $this->request->getPost('is_run_auto'),
                    'take_off_name' =>  $this->request->getPost('take_off_name'),
                    'start_time' =>  $this->request->getPost('start_time'),
                    'end_time' =>  $this->request->getPost('end_time'),
                    'take_off_day' =>  $this->request->getPost('take_off_day'),
                    'img' =>  $getRandomName,
                    'admin_id'  =>  $session->get("id"),
                ];

                $oldimg = $this->request->getPost('take_off_image');
                if (file_exists("assets/images/take_off_user_system/" . $oldimg)) {
                    unlink("assets/images/take_off_user_system/" . $oldimg);
                }
                $file->move("assets/images/take_off_user_system/", $getRandomName);
            }

            if ($data['start_time'] === '') {
                $data['start_time'] = Null;
            }

            if ($data['end_time'] === '') {
                $data['end_time'] = Null;
            }

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('take_off_user_system/edit', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);



            $body = $posts_data->getBody();
            $obj = json_decode($body);
            $message = $obj->{'message'};



            if ($obj->{'status'} == true) {
                $re = '{"code": 1 , "msg":" ' . $message . '"}';
                echo json_encode($re);
                return;
            } else {
                $re = '{"code": 0 , "msg":" ' . $message . '"}';
                echo json_encode($re);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }
}
