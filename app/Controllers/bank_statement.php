<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class bank_statement extends ResourceController

{
    public function index()
    {
        try {
            $client = service('curlrequest', $this->url);
            $posts_data = $client->get('Bank_statement/getBank', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            return view('Page/admin/bank_statement.php', $body['data'][0]);
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/bank_statement.php');
        }
    }
    public function statement_list($id)
    {
        if ($id != '') {
            $data = [
                "bank_id" => $id,
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('Bank_statement/statement_list', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);
            $body = $posts_data->getBody();
            $body = json_decode($body, true);
            if ($body['status'] == true) {
                $data = $body['data'][0];
                return view('Page/admin/statement_list.php', $data);
            }
        }
        //    return view('Page/admin/bank_statement.php');

    }
    public function create_Statement()
    {
        try {

            $client = service('curlrequest', $this->url);
            $data = [
                "bank_id" => $this->request->getPost('data')[0]['value'],
                "statuss" =>  $this->request->getPost('data')[1]['value'],
                "type" =>  $this->request->getPost('data')[2]['value'],
                "state_date" =>  $this->request->getPost('data')[3]['value'],
                "state_time" =>  $this->request->getPost('data')[4]['value'],
                "amount" =>  $this->request->getPost('data')[5]['value'],
                "note" =>  $this->request->getPost('data')[6]['value'],
                'admin_id'  =>  session()->get("id"),

            ];
            $posts_data = $client->post('Bank_statement/create_Statement', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' => $data
            ]);

            $body = $posts_data->getBody();
            // print_r($body);
            // die;
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            echo json_encode($body);
        } catch (Exception $e) {
            echo json_encode(false);
        }
    }

    public function check_balance()
    {
        try {

            $client = service('curlrequest', $this->url);
            $data = [
                "bank_id" => $this->request->getPost('bank_id'),
            ];
            $posts_data = $client->post('Bank_statement/check_balance', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' => $data
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            echo json_encode($body);
        } catch (Exception $e) {
            echo json_encode(false);
        }
    }
}
