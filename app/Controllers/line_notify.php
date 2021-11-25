<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class line_notify extends ResourceController

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
            $posts_data = $client->get('lineNoify/getDataLineNotify', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array

            if($body['status'] === true){
                // print_r($body['data']);
                return view('Page/admin/line_notify.php',$body);
            }  
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/line_notify.php');
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/line_notify.php');
        }
    }
    public function change_status()
	{
		try {
			$session = session();
			$client = service('curlrequest', $this->url);
			$data = [
				"status" => $this->request->getPost('status'),
                "id" => $this->request->getPost('id'),
				"admin_id" =>  $session->get('id'),

			];
			$posts_data = $client->post('lineNoify/change_status ' ,    [ 
				"headers" => [
					"Accept" => "application/json",
					"jwt_token" => session()->get('JWT_TOKEN')
				],
				'form_params' => $data
			], ['connect_timeout' => 2]);

			$body = $posts_data->getBody();
			$body = json_decode($body, true); // แปลง JSON เป็น Array
			echo json_encode($body);
		} catch (Exception $err) {
            print_r($err);
			// echo json_encode(false);
		}
	}
    public function updateData(){
        try {
			$session = session();
			$client = service('curlrequest', $this->url);
			$data = [
                "id" => $this->request->getPost('id'),
                "name" => $this->request->getPost('name'),
                "token" => $this->request->getPost('token'),
				"admin_id" =>  $session->get('id'),

			];
			$posts_data = $client->post('lineNoify/updateData ' ,    [ 
				"headers" => [
					"Accept" => "application/json",
					"jwt_token" => session()->get('JWT_TOKEN')
				],
				'form_params' => $data
			], ['connect_timeout' => 2]);

			$body = $posts_data->getBody();
			$body = json_decode($body, true); // แปลง JSON เป็น Array
			echo json_encode($body);
		} catch (Exception $err) {
			echo json_encode(false);
		}
    }
}
