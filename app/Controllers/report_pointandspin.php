<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class report_pointandspin extends ResourceController

{
    public function index()
    {
        try {
            $client = service('curlrequest', $this->url);
            $infomation = [];
            $posts_data = $client->get('Report_PointAndSpin/show', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            if (isset($body["PointAndSpin"])) {
                $infomation["PSData"] = $body["PointAndSpin"];
            }
            return view('Page/admin/report_pointandspin.php', $infomation);
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/report_pointandspin.php');
        }
    }


    public function show_id($id)
    {
        try {
            $data = [
                'id' =>  $id,
            ];
            $client = service('curlrequest', $this->url);
            $infomation = [];
            $posts_data = $client->post('Report_PointAndSpin/show_id', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            if (isset($body["PointAndSpin"])) {
                $infomation["PSData"] = $body["PointAndSpin"];
            }
            return view('Page/admin/report_pointandspinID.php', $infomation);
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/report_pointandspinID.php');
        }
    }


    public function filter()
    {
        try {
            $data = [
                'textSearch' =>  $this->request->getPost('textSearch'),
                'statusDataSearch' =>  $this->request->getPost('statusDataSearch'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_PointAndSpin/filter', [
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
