<?php

namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use Exception;

class dashboard extends ResourceController

{

    public function index()
    {
        return view('Page/admin/dashboard.php');
    }


    public function filter()
    {
        try {
            $data = [
                'startDate' =>  $this->request->getPost('startDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endDate' =>  $this->request->getPost('endDate'),
                'endTime' =>  $this->request->getPost('endTime'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Report_dashboards/filter', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            if (isset($body->token)) { // สถานะ JWT TOKEN SERVER
                session()->destroy();
            }
            echo json_encode($body);
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($re);
            return;
        }
    }
}
