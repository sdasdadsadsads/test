<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class admin extends ResourceController


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

			$posts_data = $client->post('admin_manage/show', [
				"headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
				'form_params' => $data
			]);



			$body = $posts_data->getBody();
			$body = json_decode($body, true); // แปลง JSON เป็น Array
			$body["admin"] = $body["admin"];
			$body["rounds"] = $body["rounds"];
			$body["permissions"] = $body["permissions"];
			$body["menu"] = $body["menu"];



			$client2 = service('curlrequest', $this->url);

			$posts_data2 = $client2->get('caching/office', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

			$body2 = $posts_data2->getBody();
			$body2 = json_decode($body2, true); // แปลง JSON เป็น Array
			$body["office"] = $body2["data"];

		
			return view('Page/admin/admin.php', $body);
		} catch (Exception $e) {
			$session = session();
			$session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
			return view('Page/admin/admin.php');
		}
	}


	public function permission_denied()
	{
		return view('Page/admin/permission_denied.php');
	}

	public function create_admin()
	{
		try {
			$session = session();
			$permission = ($session->get("permissions"));


			if (session()->get('class') <= 1) {
				$re = '{"code": 0 ,"msg":"ไม่มีสิทธิ์ใช้งานในส่วนนี้"}';
				echo json_encode($re);
				return;
			}


			$data = [
				'username' =>  $this->request->getPost('username'),
				'password'  =>  $this->request->getPost('password'),
				'menu'  =>  json_encode($this->request->getPost('menu')),
				'permissions'  =>  json_encode($this->request->getPost('permissions')),
				'name'  =>  $this->request->getPost('name'),
				'tel'  =>  $this->request->getPost('tel'),
				'rounds'  =>  $this->request->getPost('rounds'),
				'office'  =>  $this->request->getPost('office'),
				'id'  =>  $session->get("id"),
			];

			if ($this->request->getPost('username') && $this->request->getPost('password') && $this->request->getPost('menu') && $this->request->getPost('permissions')) {
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/create', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					],
					'form_params' =>$data
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


	public function permissions_get($id)
	{
		try {
			if ($id) {
				$data = [
					'admin_id' => $id,
				];
				// if ($this->request->getPost('admin_id')) {
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/getid', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					],
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


	public function permissionsdata_get($id)
	{
		try {
			if ($id) {
				$data = [
					'admin_id' => $id,
				];
				// if ($this->request->getPost('admin_id')) {
				$client = service('curlrequest', $this->url);
				$posts_data = $client->post('admin_manage/data_getid', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					],
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




	public function edit_permissions()
	{
		try {
			$session = session();
			$permission = ($session->get("permissions"));


			if (session()->get('class') <= 1) {
				$re = '{"code": 0 ,"msg":"ไม่มีสิทธิ์ใช้งานในส่วนนี้"}';
				echo json_encode($re);
				return;
			}


			$data = [
				'admin_id' =>  $this->request->getPost('admin_id'),
				'menu'  =>  json_encode($this->request->getPost('menu')),
				'permissions'  =>  json_encode($this->request->getPost('permissions')),
				'id'  =>  $session->get("id"),
				'username'  =>  $session->get("username"),
			];

			if ($this->request->getPost('admin_id') && $this->request->getPost('menu') && $this->request->getPost('permissions')) {
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/edit_permissions', [
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
					$re = '{"code": 1 , "msg":" ' . $message . '"}';
					echo json_encode($re);
					return;
				} else {
					$re = '{"code": 0 , "msg":" ' . $message . '"}';
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


	public function edit_dataadmin()
	{
		try {
			$session = session();
			$permission = ($session->get("permissions"));


			if (session()->get('class') <= 1) {
				$re = '{"code": 0 ,"msg":"ไม่มีสิทธิ์ใช้งานในส่วนนี้"}';
				echo json_encode($re);
				return;
			}

			$data = [
				'id' =>  $this->request->getPost('id'),
				'name'  =>  $this->request->getPost('name'),
				'tel'  =>  $this->request->getPost('tel'),
				'rounds'  =>  $this->request->getPost('rounds'),
				'office'  =>  $this->request->getPost('office'),
				'username' =>  $this->request->getPost('username'),
				'admin_id'  =>  $session->get("id"),
				'username_admin'  =>  $session->get("username"),
			];

			if ($this->request->getPost('id') && $this->request->getPost('username') && $this->request->getPost('rounds')) {
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/edit_dataadmin', [
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
					$re = '{"code": 1 , "msg":" ' . $message . '"}';
					echo json_encode($re);
					return;
				} else {
					$re = '{"code": 0 , "msg":" ' . $message . '"}';
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


	public function edit_round()
	{
		try {
			if ($this->request->getPost('admin_id') && $this->request->getPost('edit_rounds')) {

				$data = [
					'admin_id' =>  $this->request->getPost('admin_id'),
					'id' => session()->get('id'),
					'edit_rounds' =>  $this->request->getPost('edit_rounds'),
				];

				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/edit_rounds', [
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
					$re = '{"code": 1 , "msg":" ' . $message . '"}';
					echo json_encode($re);
					return;
				} else {
					$re = '{"code": 0 , "msg":" ' . $message . '"}';
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



	public function edit_pass()
	{
		try {
			$session = session();
			$permission = ($session->get("permissions"));

			if (session()->get('class') <= 1) {
				$re = '{"code": 0 ,"msg":"ไม่มีสิทธิ์ใช้งานในส่วนนี้"}';
				echo json_encode($re);
				return;
			}

			if ($this->request->getPost('admin_id') && $this->request->getPost('password')) {

				$data = [
					'admin_id' =>  $this->request->getPost('admin_id'),
					'password' =>  $this->request->getPost('password'),
					'id'  =>  $session->get("id"),
					'username'  =>  $session->get("username"),
				];

				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/edit_pass', [
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
					$re = '{"code": 1 , "msg":" ' . $message . '"}';
					echo json_encode($re);
					return;
				} else {
					$re = '{"code": 0 , "msg":" ' . $message . '"}';
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

	public function delete_admin($id)
	{
		try {

			$session = session();

			if ($id) {

				$data = [
					'admin_id' =>  $id,
					'id'  =>  $session->get("id"),
					'username'  =>  $session->get("username"),
				];

				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/delete_admin', [
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
					$re = '{"code": 1 , "msg":" ' . $message . '"}';
					echo json_encode($re);
					return;
				} else {
					$re = '{"code": 0 , "msg":" ' . $message . '"}';
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


	public function edit_status($id)
	{
		try {

			$session = session();

			if ($id) {

				$data = [
					'admin_id' =>  $id,
					'id'  =>  $session->get("id"),
					'username'  =>  $session->get("username"),
				];

				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/edit_status', [
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
					$re = '{"code": 1 , "msg":" ' . $message . '"}';
					echo json_encode($re);
					return;
				} else {
					$re = '{"code": 0 , "msg":" ' . $message . '"}';
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


	public function reset2FT($username)
	{

		try {
			if ($username) {

				$data = [
					'username' => $username,
					'id'  =>  session()->get("id"),
				];

				// if ($this->request->getPost('admin_id')) {
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin_manage/reset2FT', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					],
					'form_params' =>
					$data
				]);

				$body = $posts_data->getBody();
				echo json_encode($body);
			} else {
				$body = '{"code": 0 , "msg":"ไม่มี username"}';
				echo json_encode($body);
				return;
			}
		} catch (Exception $e) {
			$re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
			echo json_encode($re);
			return;
		}
	}

	public function get_group_admin()
	{
		try {
			$client = service('curlrequest', $this->url);
			$get_data = $client->get('caching/office', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
			$body = $get_data->getBody();
			$body = json_decode($body, true); // แปลง JSON เป็น Array
			echo json_encode($body);
		} catch (Exception $e) {
			echo json_encode(false);
			return;
		}
	}
}
