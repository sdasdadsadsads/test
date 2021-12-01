<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class auth extends ResourceController


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
		return view('Page/admin/loginAdmin.php');
	}

	public function scan2FT()
	{
		return view('Page/admin/scan2FT.php');
	}

	public function auth()
	{
		try {

			$session = session();
			if ($this->request->getPost('username') && $this->request->getPost('password')) {

				$data = [
					'username' =>  $this->request->getPost('username'),
					'password'  =>  $this->request->getPost('password'),
					'safecode'  =>  $this->request->getPost('safecode'),
					'IPAddress'  =>  $this->request->getIPAddress(),
				];
				$client = service('curlrequest', $this->url);

				$posts_data = $client->post('admin/auth', [
					'form_params' =>
					$data
				]);

				$body = $posts_data->getBody();
				$obj = json_decode($body);

				if ($obj->{'isLogin'} == true) {
					if ($obj->{'scan2FT'} == true) {
						echo json_encode($body);
					} else if ($obj->{'scan2FT'} == false) {
						$session->set([
							'username' => $this->request->getPost('username'),
							'password' => $this->request->getPost('password'),
							'safecode' =>  $this->request->getPost('safecode'),
							'isLogin' =>  $obj->{'isLogin'},
							'scan2FT' =>  $obj->{'scan2FT'},
							'qrCode' =>  $obj->{'qrCode'},
						]);
						echo json_encode($body);
					}
				} else if ($obj->{'isLogin'} == false) {
					$message = $obj->{'message'};
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



	public function auth2FT()
	{

		try {

			$data = [
				'username' =>  $this->request->getPost('username'),
				'password'  =>  $this->request->getPost('password'),
				'safecode'  =>  $this->request->getPost('safecode'),
				'IPAddress'  =>  $this->request->getIPAddress(),
				'pin'  =>  $this->request->getPost('pin'),
			];

			if ($data['safecode'] === 'undefined') {
				$data['safecode'] = Null;
			}

			$client = service('curlrequest', $this->url);

			$posts_data = $client->post('admin/auth2FT', [
				'form_params' =>
				$data
			]);

			$body = $posts_data->getBody();
			$obj = json_decode($body);


			if ($obj->{'isLogin'} == true) {
				$session = session();
				$session->stop();
				$session->set([
					'id' => $obj->{'id'},
					'name' => $obj->{'name'},
					'username' => $obj->{'username'},
					'agent' => $obj->{'agent'},
					'tel' => $obj->{'tel'},
					'class' => $obj->{'class'},
					'safecode' => $obj->{'safecode'},
					'status_login' => $obj->{'status_login'},
					'rounds' => $obj->{'rounds'},
					'at_work_start_time' => $obj->{'at_work_start_time'},
					'at_work_end_time' => $obj->{'at_work_end_time'},
					'menu' => $obj->{'menu'},
					'permissions' => $obj->{'permissions'},
					'token' => $obj->{'token'},
					'office' => $obj->{'office'},
					'isLogin' => $obj->{'isLogin'},
					'JWT_TOKEN' => $obj->{'JWT_TOKEN'}
				]);

				$session->setFlashdata('auth', 'เข้าระบบสำเร็จ');
				return redirect()->to(base_url('dashboard/show'));
			} else {
				$session = session();
				$session->setFlashdata('error', 'รหัส Twofactor ไม่ถูกต้อง');
				return redirect()->to(base_url('/'));
			}
		} catch (Exception $e) {
			$session = session();
			$session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
			return redirect()->to(base_url('/'));
		}
	}


	public function scan_auth2FT()
	{

		try {

			$session = session();
			$data = [
				'username' =>  $session->get('username'),
				'password'  =>  $session->get('password'),
				'safecode'  =>  $session->get('safecode'),
				'pin'  =>  $this->request->getVar('pin'),
			];

			if ($data['safecode'] === 'undefined') {
				$data['safecode'] = Null;
			}

			$client = service('curlrequest', $this->url);

			$posts_data = $client->post('admin/auth2FT', [
				'form_params' =>
				$data
			]);

			$body = $posts_data->getBody();
			$obj = json_decode($body);

			if ($obj->{'isLogin'} == true) {
				session()->destroy();
				$data['msg'] = array('ยืนยันตัวตนสำเร็จ');
				return view('Page/admin/loginAdmin.php', $data);
			} else {
				$session = session();
				$session->setFlashdata('error', 'รหัส Twofactor ไม่ถูกต้อง');
				return redirect()->to(base_url('auth/scan2FT'));
			}
		} catch (Exception $e) {
			$session = session();
			$session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
			return redirect()->to(base_url('auth/scan2FT'));
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('/'));
	}
}
