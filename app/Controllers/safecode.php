<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class safecode extends ResourceController


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
		$session = session();

		try {
			$data = [
				'class' =>  $session->get('class'),
			];
			$client = service('curlrequest', $this->url);

			$posts_data = $client->post('admin_safecode/show', [
				"headers" => [
					"Accept" => "application/json",
					"jwt_token" => session()->get('JWT_TOKEN')
				],
				'form_params' =>
				$data
			]);

			$body = $posts_data->getBody();
			$body = json_decode($body, true); // แปลง JSON เป็น Array
			$body["admin"] = $body["admin"];
			$body["online"] = $body["online"];
			$body["offline"] = $body["offline"];
			$body["rounds"] = $body["rounds"];

			// return $this->respondCreated($body);

			return view('Page/admin/safecode.php', $body);
		} catch (Exception $e) {
			$session = session();
			$session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
			return view('Page/admin/safecode.php');
		}
	}

	public function save_safecode($id)
	{

		try {
			$session = session();
			

			$data = [
				'id' =>  $id,
				'admin_id'  =>  $session->get("id"),
			];

			if ($id) {
				$client = service('curlrequest', $this->url);
				$posts_data = $client->post('admin_safecode/save_safecode', [
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
				$re = '{"code": 0 , "msg":"ไม่มี ID User"}';
				echo json_encode($re);
				return;
			}
		} catch (Exception $e) {
			$re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
			echo json_encode($re);
			return;
		}
	}



	public function delete_safecode($id)
	{

		try {
			$session = session();

			$data = [
				'id' =>  $id,
				'admin_id'  =>  $session->get("id"),
			];

			if ($id) {
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_safecode/delete_safecode', [
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
				$re = '{"code": 0 , "msg":"ไม่มี ID User"}';
				echo json_encode($re);
				return;
			}
		} catch (Exception $e) {
			$re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
			echo json_encode($re);
			return;
		}
	}


	public function open_statussafe($id)
	{

		try {

			$data = [
				'id' =>  $id,
				'adminId' =>  session()->get('id'),
			];

			if ($id) {
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_safecode/open_statussafe', [
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
				$re = '{"code": 0 , "msg":"ไม่มี ID User"}';
				echo json_encode($re);
				return;
			}
		} catch (Exception $e) {
			$re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
			echo json_encode($re);
			return;
		}
	}

	public function close_statussafe($id)
	{

		try {
		
			$data = [
				'id' =>  $id,
				'adminId' =>  session()->get('id'),
			];

			if ($id) {
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_safecode/close_statussafe', [
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
				$re = '{"code": 0 , "msg":"ไม่มี ID User"}';
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
