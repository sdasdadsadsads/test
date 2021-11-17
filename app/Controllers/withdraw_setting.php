<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class withdraw_setting extends ResourceController

{

    public function index()
    {
        try {

            $client = service('curlrequest', $this->url);

            $posts_data = $client->get("withdraw_setting/show", [
                "headers" => [
                    "Accept" => "application/json"
                ]
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); //  แปลง JSON เป็น Array
            $body["wd_min"] = $body["withdraw"][0];
            $body["turn_min"] = $body["withdraw"][1];
            $body["count_wd"] = $body["withdraw"][2];
            $body["wd_max"] = $body["withdraw"][3];

            // return $this->respondCreated($body);

            return view('Page/admin/withdraw_setting.php', $body);
        } catch (Exception $e) {
            $session = session();
			$session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/withdraw_setting.php');
        }
    }


    public function setWD()
    {
        try {
            $session = session();
            $permission = ($session->get("permissions"));


            if (!in_array(39, $permission)) {
                $re = '{"code": 0 ,"msg":"ไม่มีสิทธิ์ใช้งานในส่วนนี้"}';
                echo json_encode($re);
                return;
            }

            if ($this->request->getPost('amount') && $this->request->getPost('types')) {

                $data = [
                    'id'  =>  $session->get("id"),
                    'username'  =>  $session->get("username"),
                    'amount'  => $this->request->getPost('amount'),
                    'type' =>  $this->request->getPost('types'),
                ];

                $client = service('curlrequest', $this->url);

                $posts_data = $client->post('withdraw_setting/setWD', [
                    'form_params' =>
                    $data
                ]);

                $body = $posts_data->getBody();
                $obj = json_decode($body);
                $message = $obj->{'message'};
                if ($obj->{'status'} == true) {
                    $re = '{"code": 1 , "msg": " ' . $message . '"}';
                    echo json_encode($re);
                    return;
                } else {
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
}
