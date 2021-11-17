<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class editProblem extends ResourceController


{
	public function index()
	{
		return view('Page/admin/edit_problem.php');
	}


	public function showDataUser()
	{
		$client = service('curlrequest', $this->url);
		$data = [
			"user" => $this->request->getPost('user'),
		];
		$posts_data = $client->post('admin_manage_credit/getDataUser', [
			"headers" => [
				"Accept" => "application/json",
				"jwt_token" => session()->get('JWT_TOKEN')
			],
			'form_params' => $data
		]);

		$body = $posts_data->getBody();
		$body = json_decode($body, true); // แปลง JSON เป็น Array
		echo json_encode($body);
	}


	public function addCredit()
	{
		$session = session();
		$client = service('curlrequest', $this->url);
		$data = [
			"user" => $this->request->getPost('user'),
			"user_id" => $this->request->getPost('user_id'),
			"admin_id" =>  $session->get('id'),
			"amount" => $this->request->getPost('amount'),
			"note" => $this->request->getPost('note')
		];
		$posts_data = $client->post('admin_manage_credit/addCredit', [
			"headers" => [
				"Accept" => "application/json",
				"jwt_token" => session()->get('JWT_TOKEN')
			],
			'form_params' => $data
		]);

		$body = $posts_data->getBody();
		$body = json_decode($body, true); // แปลง JSON เป็น Array
		echo json_encode($body);
	}


	public function ReduceCredit()
	{
		$session = session();
		$client = service('curlrequest', $this->url);
		$data = [
			"user" => $this->request->getPost('user'),
			"user_id" => $this->request->getPost('user_id'),
			"admin_id" =>  $session->get('id'),
			"amount" => $this->request->getPost('amount'),
			"note" => $this->request->getPost('note')
		];
		$posts_data = $client->post('admin_manage_credit/ReduceCredit', [
			"headers" => [
				"Accept" => "application/json",
				"jwt_token" => session()->get('JWT_TOKEN')
			],
			'form_params' => $data
		]);

		$body = $posts_data->getBody();
		$body = json_decode($body, true); // แปลง JSON เป็น Array
		echo json_encode($body);
	}



	public function filter()
	{
		try {
			$data = [
				'selectStatement' =>  $this->request->getPost('selectStatement'),
				'inputDataSearch' =>  $this->request->getPost('inputDataSearch'),
				'startDate' =>  $this->request->getPost('startDate'),
				'startTime' =>  $this->request->getPost('startTime'),
				'endDate' =>  $this->request->getPost('endDate'),
				'endTime' =>  $this->request->getPost('endTime'),
			];

			$client = service('curlrequest', $this->url);

			$posts_data = $client->post('admin_manage_credit/filter', [
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
