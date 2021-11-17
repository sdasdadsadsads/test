<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class work_time extends ResourceController

{
    public function index()
    {

        try {
            $client = service('curlrequest', $this->url);

            $posts_data = $client->get("admin_rounds/show", [
                "headers" => [
                    "Accept" => "application/json"
                ]
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); //  แปลง JSON เป็น Array
            $body["rounds"] = $body["rounds"];

            // return $this->respondCreated($body);

            return view('Page/admin/work_time.php', $body);
        } catch (Exception $e) {
            $session = session();
			$session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/work_time.php');
		}
    }


    public function cre_rounds()
    {
        try {



            if ($this->request->getPost('rounds_desc') && $this->request->getPost('rounds_start') && $this->request->getPost('rounds_end')) {

                $data = [
                    'rounds_desc' =>  $this->request->getPost('rounds_desc'),
                    'rounds_start'  =>  $this->request->getPost('rounds_start'),
                    'rounds_end'  => $this->request->getPost('rounds_end'),
                    'admin_id'  =>  session()->get("id"),
                ];

                $client = service('curlrequest', $this->url);

                $posts_data = $client->post('admin_rounds/cre_rounds', [
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


    public function rounds_getid($id)
    {

        try {
            if ($id) {
                $data = [
                    'id' => $id,
                ];

                $client = service('curlrequest', $this->url);

                $posts_data = $client->post('admin_rounds/rounds_getid', [
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


    public function update_rounds()
    {
        try {

            if ($this->request->getPost('rounds_desc') && $this->request->getPost('rounds_start') && $this->request->getPost('rounds_end') && $this->request->getPost('editid')) {
                $session = session();
                $data = [
                    'id'  => $this->request->getPost('editid'),
                    'rounds_desc' =>  $this->request->getPost('rounds_desc'),
                    'rounds_start'  =>  $this->request->getPost('rounds_start'),
                    'rounds_end'  => $this->request->getPost('rounds_end'),
                    'admin_id'  =>  $session->get("id"),
                ];

                $client = service('curlrequest', $this->url);

                $posts_data = $client->post('admin_rounds/update_rounds', [
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
