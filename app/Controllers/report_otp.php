<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class report_otp extends ResourceController

{
    public function index()
    {

        return view('Page/admin/report_otp.php');
    }



    public function filter()
    {
        try {
            $data = [
                'telSearch' =>  $this->request->getPost('telSearch'),
                'statusDataSearch' =>  $this->request->getPost('statusDataSearch'),
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);
            $posts_data = $client->post('Report_otp/filter', [
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


    public function confrim($id)
    {


        try {
            $session = session();
            $permission = ($session->get("permissions"));


            if (!in_array(34, $permission)) {
                $re = '{"code": 0 ,"msg":"ไม่มีสิทธิ์ใช้งานในส่วนนี้"}';
                echo json_encode($re);
                return;
            }


            $data = [
                'id' =>  $id,
                'admin_id'  =>  $session->get("id"),
                'username'  =>  $session->get("username"),
            ];

            if ($id) {
                $client = service('curlrequest', $this->url);

                $posts_data = $client->post('Report_otp/confrim', [
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
                    $re = '{"code": 1 , "msg": " ' . $message . '"}';
                    echo json_encode($re);
                    return;
                } else {
                    $re = '{"code": 0 , "msg":"' . $message . '"}';
                    echo json_encode($re);
                    return;
                }
            } else {
                $re = '{"code": 0 , "msg":"ช้อมูลไม่ครบ"}';
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
