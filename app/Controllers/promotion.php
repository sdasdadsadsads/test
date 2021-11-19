<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class promotion extends ResourceController

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
            $posts_data = $client->get("promotions/all", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $body = $posts_data->getBody();
            $body = json_decode($body, true); //  แปลง JSON เป็น Array

            if (isset($body["data"])) {
                $body["promotion"] = $body["data"];
            }

            $client2 = service('curlrequest', $this->url);

            $posts_data2 = $client2->get("caching/promoCategory", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body2 = $posts_data2->getBody();
            $body2 = json_decode($body2, true); //  แปลง JSON เป็น Array

            if (isset($body2["data"])) {
                $body["promoCategory"] = $body2["data"];
            }

            
            return view('Page/admin/promotion.php', $body);
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/promotion.php');
        }
    }



    public function acceptPromoManual()
    {
        try {
            $client = service('curlrequest', $this->url);
            $posts_data = $client->get("caching/promo", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $body = $posts_data->getBody();
            $body = json_decode($body, true); //  แปลง JSON เป็น Array
            return view('Page/admin/accept_promotion_manual', $body);
        } catch (Exception $err) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/accept_promotion_manual');
        }
    }


    public function acceptPromoManual_execute()
    {
        try {
            $client = service('curlrequest', $this->url);
            $data = [
                'adminId' => session()->get('id'),
                'username' => $this->request->getVar('username'),
                'promotion_id' =>  $this->request->getVar('promotion_id'),
                'deposit' =>  $this->request->getVar('deposit'),
                'bonus' =>  $this->request->getVar('bonus'),
                'cause' =>  $this->request->getVar('cause'),
                'addcredit_type' =>  $this->request->getVar('addcredit_type'),
                'admin' =>  session()->get('username'),
            ];
            $posts_data = $client->post('promotions/acceptPromo', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>  $data,
            ]);
            try {
                $body = $posts_data->getBody();
                $body = json_decode($body, true); //  แปลง JSON เป็น Array
              
                echo json_encode($body);
                return;
            } catch (Exception $e) {
                echo json_encode('{"code": 0 , "msg":"เกิดข้อผิดพลาด โปรดแจ้งทีมงาน"}');
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            print_r($re);
            return;
        }
    }


    public function promotions()
    {
        try {
            $file = $this->request->getFile('image');
            $data = [
                'adminId' => session()->get('id'),
                'promoName' =>  $this->request->getPost('promoName'),
                'bonusType' =>  $this->request->getPost('bonusType'),
                'promoCategory' =>  $this->request->getPost('promoCategory'),
                'maxBonus' =>  $this->request->getPost('maxBonus'),
                'minDeposit' =>  $this->request->getPost('minDeposit'),
                'maxDeposit' =>  $this->request->getPost('maxDeposit'),
                'startDate' =>  $this->request->getPost('startDate'),
                'endDate' =>  $this->request->getPost('endDate'),
                'startTime' =>  $this->request->getPost('startTime'),
                'endTime' =>  $this->request->getPost('endTime'),
                'amountAcceptPerDay' =>  $this->request->getPost('amountAcceptPerDay'),
                'maxWithdraw' =>  $this->request->getPost('maxWithdraw'),

                'turnoverGame' =>  $this->request->getPost('turnoverGame'),
                'turnoverEsport' =>  $this->request->getPost('turnoverEsport'),
                'turnoverParlay' =>  $this->request->getPost('turnoverParlay'),
                'turnoverStep' =>  $this->request->getPost('turnoverStep'),
                'turnoverCasino' =>  $this->request->getPost('turnoverCasino'),
                'turnoverLotto' =>  $this->request->getPost('turnoverLotto'),
                'turnoverM2' =>  $this->request->getPost('turnoverM2'),
                'turnoverMultiPlayer' =>  $this->request->getPost('turnoverMultiPlayer'),
                'turnoverKeno' =>  $this->request->getPost('turnoverKeno'),
                'turnoverPoker' =>  $this->request->getPost('turnoverPoker'),
                'turnoverTrading' =>  $this->request->getPost('turnoverTrading'),
                'turnoverFootball' =>  $this->request->getPost('turnoverFootball'),

                'promoExplainCondition' =>  $this->request->getPost('promoExplainCondition'),
                'promoImg' =>  $file->getRandomName(),
                'isNoLimitTime' =>  $this->request->getPost('isNoLimitTime'),
                'promoCondition' =>  $this->request->getPost('promoCondition'),
                'promoStatus' =>  $this->request->getPost('promoStatus'),
                'depositOnlyOnTheDay' =>  $this->request->getPost('depositOnlyOnTheDay'),
                'continuousDeposit' =>  $this->request->getPost('continuousDeposit'),
            ];

            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('promotions/addPromotion', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $obj = json_decode($body);
            $message = $obj->{'msg'};
           
            if ($obj->{'status'} == true) {
                try {
                    $file->move('assets/uploads', $data['promoImg']);
                } catch (Exception $e) {
                }
                $re = '{"code": 1 , "msg":" ' . $message . '"}';
                echo json_encode($re);
                return;
            } else {
                $re = '{"code": 0 , "msg":" ' . $message . '"}';
                echo json_encode($re);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            print_r($re);
            return;
        }
    }


    public function promotions_get($id)
    {
        try {
            if ($id) {
                $data = [
                    'promoId' => $id,
                ];
                // if ($this->request->getPost('admin_id')) {
                $client = service('curlrequest', $this->url);
                $posts_data = $client->post('promotions/infoPromo', [
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




    public function promotions_id()
    {

        try {
            if ($this->request->getFile('image') == "") {
                $data = [
                    'adminId' => session()->get('id'),
                    'promoId' =>  $this->request->getPost('promoid'),
                    'promoName' =>  $this->request->getPost('promoName'),
                    'bonusType' =>  $this->request->getPost('bonusType'),
                    'promoCategory' =>  $this->request->getPost('promoCategory'),
                    'maxBonus' =>  $this->request->getPost('maxBonus'),
                    'minDeposit' =>  $this->request->getPost('minDeposit'),
                    'maxDeposit' =>  $this->request->getPost('maxDeposit'),
                    'startDate' =>  $this->request->getPost('startDate'),
                    'endDate' =>  $this->request->getPost('endDate'),
                    'startTime' =>  $this->request->getPost('startTime'),
                    'endTime' =>  $this->request->getPost('endTime'),
                    'amountAcceptPerDay' =>  $this->request->getPost('amountAcceptPerDay'),
                    'maxWithdraw' =>  $this->request->getPost('maxWithdraw'),

                    'turnoverGame' =>  $this->request->getPost('turnoverGame'),
                    'turnoverEsport' =>  $this->request->getPost('turnoverEsport'),
                    'turnoverParlay' =>  $this->request->getPost('turnoverParlay'),
                    'turnoverStep' =>  $this->request->getPost('turnoverStep'),
                    'turnoverCasino' =>  $this->request->getPost('turnoverCasino'),
                    'turnoverLotto' =>  $this->request->getPost('turnoverLotto'),
                    'turnoverM2' =>  $this->request->getPost('turnoverM2'),
                    'turnoverMultiPlayer' =>  $this->request->getPost('turnoverMultiPlayer'),
                    'turnoverKeno' =>  $this->request->getPost('turnoverKeno'),
                    'turnoverPoker' =>  $this->request->getPost('turnoverPoker'),
                    'turnoverTrading' =>  $this->request->getPost('turnoverTrading'),
                    'turnoverFootball' =>  $this->request->getPost('turnoverFootball'),

                    'promoExplainCondition' =>  $this->request->getPost('promoExplainCondition'),
                    'isNoLimitTime' =>  $this->request->getPost('isNoLimitTime'),
                    'promoCondition' =>  $this->request->getPost('promoCondition'),
                    'promoStatus' =>  $this->request->getPost('promoStatus'),
                    'depositOnlyOnTheDay' =>  $this->request->getPost('depositOnlyOnTheDay'),
                    'continuousDeposit' =>  $this->request->getPost('continuousDeposit'),



                ];
            } else {
                $file = $this->request->getFile('image');
                $getRandomName = $file->getRandomName();
                $data = [
                    'adminId' => session()->get('id'),
                    'promoId' =>  $this->request->getPost('promoid'),
                    'promoName' =>  $this->request->getPost('promoName'),
                    'bonusType' =>  $this->request->getPost('bonusType'),
                    'promoCategory' =>  $this->request->getPost('promoCategory'),
                    'maxBonus' =>  $this->request->getPost('maxBonus'),
                    'minDeposit' =>  $this->request->getPost('minDeposit'),
                    'maxDeposit' =>  $this->request->getPost('maxDeposit'),
                    'startDate' =>  $this->request->getPost('startDate'),
                    'endDate' =>  $this->request->getPost('endDate'),
                    'startTime' =>  $this->request->getPost('startTime'),
                    'endTime' =>  $this->request->getPost('endTime'),
                    'amountAcceptPerDay' =>  $this->request->getPost('amountAcceptPerDay'),
                    'maxWithdraw' =>  $this->request->getPost('maxWithdraw'),

                    'turnoverGame' =>  $this->request->getPost('turnoverGame'),
                    'turnoverEsport' =>  $this->request->getPost('turnoverEsport'),
                    'turnoverParlay' =>  $this->request->getPost('turnoverParlay'),
                    'turnoverStep' =>  $this->request->getPost('turnoverStep'),
                    'turnoverCasino' =>  $this->request->getPost('turnoverCasino'),
                    'turnoverLotto' =>  $this->request->getPost('turnoverLotto'),
                    'turnoverM2' =>  $this->request->getPost('turnoverM2'),
                    'turnoverMultiPlayer' =>  $this->request->getPost('turnoverMultiPlayer'),
                    'turnoverKeno' =>  $this->request->getPost('turnoverKeno'),
                    'turnoverPoker' =>  $this->request->getPost('turnoverPoker'),
                    'turnoverTrading' =>  $this->request->getPost('turnoverTrading'),
                    'turnoverFootball' =>  $this->request->getPost('turnoverFootball'),

                    'promoExplainCondition' =>  $this->request->getPost('promoExplainCondition'),
                    'promoImg' =>  $getRandomName,
                    'isNoLimitTime' =>  $this->request->getPost('isNoLimitTime'),
                    'promoCondition' =>  $this->request->getPost('promoCondition'),
                    'promoStatus' =>  $this->request->getPost('promoStatus'),
                    'depositOnlyOnTheDay' =>  $this->request->getPost('depositOnlyOnTheDay'),
                    'continuousDeposit' =>  $this->request->getPost('continuousDeposit'),
                ];

                $imagename = $file->getName();
                if (file_exists("assets/uploads/" . $imagename)) {
                    unlink("assets/uploads/" . $imagename);
                }
                $file->move("assets/uploads/", $getRandomName);
            }
            $client = service('curlrequest', $this->url);
            $posts_data = $client->post('promotions/updatePromotion', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $obj = json_decode($body);

            $message = $obj->{'msg'};
            if ($obj->{'status'} == true) {
                $re = '{"code": 1 , "msg":" ' . $message . '"}';
                echo json_encode($re);
                return;
            } else {
                $re = '{"code": 0 , "msg":" ' . $message . '"}';
                echo json_encode($re);
                return;
            }
        } catch (Exception $e) {
            // $re = '{"code": 0 , "msg":"เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่"}';
            echo json_encode($e);
            return;
        }
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
            $posts_data = $client->post('promotions/filter', [
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
