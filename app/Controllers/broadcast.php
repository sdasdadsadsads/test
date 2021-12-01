<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class broadcast extends ResourceController

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
            
            $posts_data = $client->get("broadcast/show_all", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            $obj = json_decode($body);

            if ($obj->{'status'} == true) {
                $body = json_decode($body, true);
                if (isset($body["BroadcastData"])) {
                    $body["BroadcastData"] = $body["BroadcastData"];

                    return view('Page/admin/broadcast.php', $body);
                }
            } else {
                $body = json_decode($body, true);
                $session = session();
                $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
                $body["BroadcastData"] = [];
                return view('Page/admin/broadcast.php', $body);
            }
        } catch (Exception $e) {
            // $body = json_decode($body, true);
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            $body["BroadcastData"] = [];
            return view('Page/admin/broadcast.php', $body);
        }
    }


    public function add_broadcast()
    {

        try {
            if ($this->request->getPost('Name')) {
                if ($this->request->getFile('image') != "") {


                    $file = $this->request->getFile('image');
                    $session = session();
                    $getRandomName = $file->getRandomName();
                    $data = [
                        'status' =>  $this->request->getPost('statuss'),
                        'name' =>  $this->request->getPost('Name'),
                        'img' =>  $getRandomName,
                        'admin_id'  =>  $session->get("id"),
                    ];

                    $file->move('assets/images/broadcast/', $data['img']);

                    $client = service('curlrequest', $this->url);

                    $posts_data = $client->post('broadcast/clear', [
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
                $re = '{"code": 0 , "msg":"กรุณาใส่ชื่อ broadcast"}';
                echo json_encode($re);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }


    public function edit_broadcast()
    {

        try {
            $session = session();
            if ($this->request->getFile('image') == "") {

                $data = [
                    'id' =>  $this->request->getPost('id'),
                    'status' =>  $this->request->getPost('statuss'),
                    'name' =>  $this->request->getPost('Name'),
                    'admin_id'  =>  $session->get("id"),
                    'img' =>  $this->request->getPost('broadcast_img')
                ];
            } else {

                $file = $this->request->getFile('image');
                $getRandomName = $file->getRandomName();

                $data = [
                    'id' =>  $this->request->getPost('id'),
                    'status' =>  $this->request->getPost('statuss'),
                    'name' =>  $this->request->getPost('Name'),
                    'admin_id'  =>  $session->get("id"),
                    'img' =>  $getRandomName,
                ];

                $oldimg = $this->request->getPost('broadcast_img');
                if (file_exists("assets/images/broadcast/" . $oldimg)) {
                    unlink("assets/images/broadcast/" . $oldimg);
                }
                $file->move("assets/images/broadcast/", $getRandomName);
            }

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('broadcast/edit', [
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
