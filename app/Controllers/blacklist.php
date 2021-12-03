<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class blacklist extends ResourceController

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
            try {
                $client1 = service('curlrequest', $this->url);

                $posts_data1 = $client1->get('caching/bankCategory', [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ]
                ]);

                $body1 = $posts_data1->getBody();
                $body1 = json_decode($body1, true); // แปลง JSON เป็น Array
                $body["bankCategory"] = $body1["data"];
            } catch (Exception $err) {
                //
            }

            try {
                $client2 = service('curlrequest', $this->url);

                $posts_data2 = $client2->get("blacklist/show_all", [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ]
                ]);

                $body2 = $posts_data2->getBody();
                $obj = json_decode($body2);

                if ($obj->{'status'} == true) {
                    $body2 = json_decode($body2, true);
                    if (isset($body2["BlacklistData"])) {
                        $body["BlacklistData"] = $body2["BlacklistData"];

                    }
                } else {
                    $body2 = json_decode($body2, true);
                    $body["BlacklistData"] = [];
                }
            } catch (Exception $err) {
                //
            }

            // print_r($body);
            return view('Page/admin/blacklist.php', $body);
        } catch (Exception $e) {
        }
    }


    public function add_blacklist()
    {

        try {
            if ($this->request->getPost('blacklist_name') && $this->request->getPost('bank_id') && $this->request->getPost('account') && $this->request->getPost('note')) {
       
                    $session = session();
                  
                    $data = [
                        'blacklist_name' =>  $this->request->getPost('blacklist_name'),
                        'bank_id' =>  $this->request->getPost('bank_id'),
                        'account' =>  $this->request->getPost('account'),
                        'note' =>  $this->request->getPost('note'),
                        'admin_id'  =>  $session->get("id"),
                    ];

                 

                    $client = service('curlrequest', $this->url);

                    $posts_data = $client->post('blacklist/clear', [
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
                $re = '{"code": 0 , "msg":"ข้อมูลไม่ครบ"}';
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
