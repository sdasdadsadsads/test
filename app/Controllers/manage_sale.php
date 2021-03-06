<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;
use PDO;

class manage_sale extends ResourceController

{
    private $url;
    private $curlrequest;
    public function __construct()
    {
        $this->url = [
            'baseURI' => getenv('API_URL')
        ];
        $this->curlrequest = service('curlrequest', $this->url);
    }

    public function index()
    {
        try {
            $infomation = array();

            // fetch List Sale Data
            try {
                $response = $this->curlrequest->get("sale/listSaleData", [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ]
                ]);
                $response = $response->getBody();
                $response = json_decode($response, true); //  แปลง JSON เป็น Array
                $infomation['saleData'] = $response['saleData'];
            } catch (Exception $err) {
                //
            }

            if ($response['status'] === true) {
                return view('Page/admin/manage_sale.php', $infomation);
            }
            return view('Page/admin/manage_sale.php');
        } catch (Exception $e) {
            return view('Page/admin/manage_sale.php');
        }
    }


    public function registration()
    {
        try {
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'fullName' =>  $this->request->getVar('fullName'),
                'num_phone' =>  $this->request->getVar('num_phone'),
                'ipAddress' =>  $this->request->getIPAddress(),
            ];
            $response = $this->curlrequest->post("sale/insert", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>  $data,
            ]);
            $response = $response->getBody();
            $response = json_decode($response, true); //  แปลง JSON เป็น Array
            echo json_encode($response);
            return;
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด"}';
            print_r($re);
            return;
        }
    }


    public function list_member_of_sale()
    {
        try {
            $data = [
                'saleId' => $this->request->getVar('saleId'),
                'ipAddress' =>  $this->request->getIPAddress(),
            ];
            $response = $this->curlrequest->post("sale/member_of_sale", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>  $data,
            ]);
            $response = $response->getBody();
            $response = json_decode($response, true); //  แปลง JSON เป็น Array
            echo json_encode($response);
            return;
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด"}';
            print_r($e);
            return;
        }
    }
}
