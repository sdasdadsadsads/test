<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Error;
use Exception;

class confirmCredit extends ResourceController


{

	private $url;

	public function __construct()
	{
		$this->url = [
			'baseURI' => getenv('API_URL')
		];
	}
	
	public function confirmCredit()
	{
		try {
			$countStatementToday = 'เขื่อมต่อล้มเหลว';
			$countStatementAll = 'เขื่อมต่อล้มเหลว';
			$countStickPromotionToday = 'เขื่อมต่อล้มเหลว';
			$countStickPromotionAll = 'เขื่อมต่อล้มเหลว';
			$countRepeatToday = 'เขื่อมต่อล้มเหลว';
			$countRepeatAll = 'เขื่อมต่อล้มเหลว';
			$countUndefindUsers = 'เขื่อมต่อล้มเหลว';
			$countUndefindUsersAll = 'เขื่อมต่อล้มเหลว';
			$client = service('curlrequest', $this->url);

			try {
				$posts_data = $client->get('deposit/countStatementNoSuccessToday', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				$countStatementToday = $body['count'];
			} catch (Exception $e) {
				$countStatementToday = 'เขื่อมต่อล้มเหลว';
			}


			try {
				$posts_data = $client->get('deposit/countStatementRepeatToday', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				$countRepeatToday = $body['count'];
			} catch (Exception $e) {
				$countRepeatToday = 'เขื่อมต่อล้มเหลว';
			}

			try {
				$posts_data = $client->get('deposit/countStatementStickPromotionToday', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				$countStickPromotionToday = $body['count'];
			} catch (Exception $e) {
				$countStickPromotionToday = 'เขื่อมต่อล้มเหลว';
			}


			try {
				$posts_data = $client->get('deposit/countStatementCanNotFindUserToday', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				$countUndefindUsers = $body['count'];
			} catch (Exception $e) {
				$countUndefindUsers = 'เขื่อมต่อล้มเหลว';
			}



			try {
				$posts_data = $client->get('deposit/countStatementNoSuccessAll', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				$countStatementAll = $body['count'];
			} catch (Exception $e) {
				$countStatementAll = 'เขื่อมต่อล้มเหลว';
			}


			try {
				$posts_data = $client->get('deposit/countStatementRepeatAll', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				$countRepeatAll = $body['count'];
			} catch (Exception $e) {
				$countRepeatAll = 'เขื่อมต่อล้มเหลว';
			}

			try {
				$posts_data = $client->get('deposit/countStatementStickPromotionAll', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				$countStickPromotionAll = $body['count'];
			} catch (Exception $e) {
				$countStickPromotionAll = 'เขื่อมต่อล้มเหลว';
			}


			try {
				$posts_data = $client->get('deposit/countStatementCanNotFindUserAll', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				$countUndefindUsersAll = $body['count'];
			} catch (Exception $e) {
				$countUndefindUsersAll = 'เขื่อมต่อล้มเหลว';
			}

			try {
				$posts_data = $client->get('deposit/unconfirmed', [
					"headers" => [
						"Accept" => "application/json",
						"jwt_token" => session()->get('JWT_TOKEN')
					]
				]);
				$body = $posts_data->getBody();
				$body = json_decode($body, true); // แปลง JSON เป็น Array
				if ($body['status'] == false) {
					return view('Page/admin/confirmCredit.php');
				}
				$state_unconfirmed = $body['data']['state_unconfirmed'][0];
				$state_confirmed = $body['data']['state_confirmed'][0];
			} catch (Exception $e) {
				$state_unconfirmed = 'เขื่อมต่อล้มเหลว';
				$state_confirmed = 'เขื่อมต่อล้มเหลว';
			}
            
			$data = array(
				'state_unconfirmed' => $state_unconfirmed,
				'state_confirmed' => $state_confirmed,
				'state_countToday' => $countStatementToday,
				'state_stickPromotionToday' => $countStickPromotionToday,
				'state_repeatToday' => $countRepeatToday,
				'state_undefindUsersToday' => $countUndefindUsers,

				'state_countAll' => $countStatementAll,
				'state_stickPromotionAll' => $countStickPromotionAll,
				'state_repeatAll' => $countRepeatAll,
				'state_undefindUsersAll' => $countUndefindUsersAll
			);
			// echo '<pre>';
			// print_r($state_unconfirmed[0]['id']);
			// die;
			return view('Page/admin/confirmCredit.php', $data);
		} catch (Exception $e) {
			
			$data = array(
				'state_unconfirmed' => [],
				'state_confirmed' => [],
				'state_countToday' => [],
				'state_stickPromotionToday' => [],
				'state_repeatToday' => [],
				'state_undefindUsersToday' => [],
				'state_countAll' => [],
				'state_stickPromotionAll' => [],
				'state_repeatAll' => [],
				'state_undefindUsersAll' => []
			);
		
			return view('Page/admin/confirmCredit.php', $data);
		}
	}


	public function CheckUserBeforeConfirm()
	{
		$client = service('curlrequest', $this->url);
		$data = [
			"user" => $this->request->getPost('user'),
			"statement_id" =>  $this->request->getPost('statement_id')
		];
		$posts_data = $client->post('deposit/CheckUserBeforeConfirm', [
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


	public function confirmAddCredit()
	{
		try {
			$session = session();
			$client = service('curlrequest', $this->url);
			$data = [
				"user" => $this->request->getPost('user'),
				"statement_id" =>  $this->request->getPost('statement_id'),
				"admin_id" =>  $session->get('id'),
				"getBonus" =>  $this->request->getPost('getBonus')

			];
			$posts_data = $client->post('deposit/confirmAddCredit', [
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


	public function hideDepositUnconfirmed()
	{
		$session = session();
		$client = service('curlrequest', $this->url);
		$data = [
			"admin_id" => $session->get('id'),
			"status" =>  $this->request->getPost('status'),
			"statement_id" =>  $this->request->getPost('statement_id')
		];
		$posts_data = $client->post('deposit/hideDepositUnconfirmed', [
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


	public function filterTypeStatement()
	{
		try {
			$client = service('curlrequest', $this->url);
			$data = [
				"status" =>  $this->request->getPost('status'),
				"type_statement" =>  $this->request->getPost('type_statement'),
			];
			$posts_data = $client->post('deposit/filterTypeStatement', [
				"headers" => [
					"Accept" => "application/json",
					"jwt_token" => session()->get('JWT_TOKEN')
				],
				'form_params' => $data
			]);
			$body = $posts_data->getBody();
			$body = json_decode($body, true); // แปลง JSON เป็น Array
			echo json_encode($body);
		} catch (Exception $err) {
		}
	}


	public function confirmAndDelBonus()
	{
		try {
			$session = session();

			$client = service('curlrequest', $this->url);
			$data = [
				"user" => $this->request->getPost('user'),
				"statement_id" =>  $this->request->getPost('statement_id'),
				"admin_id" =>  $session->get('id'),
				"getBonus" =>  $this->request->getPost('getBonus')
			];
			$posts_data = $client->post('deposit/confirmAndDelBonus', [
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
	
	public function getusername()
	{

		$client = service('curlrequest', $this->url);
		$data = [
			"user_id" =>  $this->request->getPost('user_id'),
		];
		$posts_data = $client->post('deposit/getusername', [
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
	public function find_new_items(){
		try {
			$session = session();

			$client = service('curlrequest', $this->url);
			$data = [
				"user" => $this->request->getPost('user'),
				"status" =>  $session->get('id'),
			];
			$posts_data = $client->post('deposit/find_new_items', [
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
	public function check_status_change(){
		try {
			$session = session();

			$client = service('curlrequest', $this->url);
			$data = [
				"id" => $this->request->getPost('id'),
				"admin_id" =>  $session->get('id'),
			];
			$posts_data = $client->post('deposit/check_status_change', [
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
	public function checkStatusNotwait()
	{
		try {
			$session = session();

			$client = service('curlrequest', $this->url);
			$data = [
				"id" => $this->request->getPost('id'),
				"admin_id" =>  $session->get('id'),
			];
			$posts_data = $client->post('deposit/checkStatusNotwait', [
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


// CREATE TRIGGER log_confirm_statement_for_update    
//     AFTER UPDATE ON imi55.tb_statement
//         BEGIN    
// 			insert into 12iwinr_logs.log_confirm_statements(statement_id)
// 			value(1)
//         END;    