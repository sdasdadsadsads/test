<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class forced_withdraw extends ResourceController


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
        return view('Page/admin/forced_withdraw.php');
    }

    public function filter()
    {
        try {

            $client = service('curlrequest', $this->url);

            $data_deposit = [
                'username' =>  $this->request->getPost('username'),
            ];

            $posts_data1 = $client->post('deposit/showLatestStatement', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ],
                'form_params' =>
                $data_deposit
            ]);

            $body1 = $posts_data1->getBody();
            $deposit = json_decode($body1, true);
            $obj = json_decode($body1, true);

            // Mapping Logs Accept Promotion Manual
            try {
                $posts_data1 = $client->post('find/logs/acceptedPromoManual', [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ],
                    'form_params' =>
                    $data_deposit
                ]);
                $logsData = $posts_data1->getBody();
                $logsData1 = json_decode($logsData, true);
                $data = [
                    'statement' => array()
                ];
                if (isset($logsData1['LogsData'])) {
                    if (count($logsData1['LogsData']) > 0) {
                        if (isset($logsData1['LogsData'])) {
                            foreach ($logsData1['LogsData'] as $element) {
                                $element['credit_before'] = '-';
                                $element['deposit'] = '-';
                                $element['credit_after'] = '-';
                                $element['cause'] = '?????????????????????????????????????????? ???????????????????????????????????? (Manual)';
                                array_push($data['statement'], $element);
                            }
                        }
                        if (isset($deposit['statement'])) {
                            if (is_array($deposit['statement'])) {
                                foreach ($deposit['statement'] as $element) {
                                    array_push($data['statement'], $element);
                                }
                            }
                        }
                        $size = count($data['statement']);

                        for ($step = 0; $step < ($size - 1); $step++) {
                            for ($i = $step; $i < ($size - 1); $i++) {
                                if ($data['statement'][$step]['created_at'] < $data['statement'][$i + 1]['created_at']) {
                                    $temp = $data['statement'][$step];
                                    $data['statement'][$step] = $data['statement'][$i + 1];
                                    $data['statement'][$i + 1] = $temp;
                                }
                            }
                        }
                        $obj = [
                            'statement' => ($data['statement']),
                            'status' => true
                        ];
                    }
                }
            } catch (Exception $err) {
                // 
            }

            if (isset($obj)) {
                if ($obj['status'] === false) {
                    $re = '{"msg":"' . $obj['msg'] . '"}';
                    echo json_encode($re);
                    return;
                }
                if (isset($obj["statement"][0]['ref_deposit_amb']) || isset($obj["statement"][0]['ref'])) {
                    if (isset($obj["statement"][0]['ref_deposit_amb'])) {
                        $obj["statement"][0]['ref_deposit_amb'] = $obj["statement"][0]['ref_deposit_amb'];
                    } else {
                        $obj["statement"][0]['ref_deposit_amb'] = $obj["statement"][0]['ref'];
                    }
                    $data_Turnover = [
                        'username' =>  $this->request->getPost('username'),
                        'ref' =>  $obj["statement"][0]['ref_deposit_amb'],

                    ];

                    $posts_data2 = $client->post('promotions/checkTurnover', [
                        "headers" => [
                            "Accept" => "application/json",
                            "jwt_token" => session()->get('JWT_TOKEN')
                        ],
                        'form_params' =>
                        $data_Turnover
                    ]);

                    $body2 = $posts_data2->getBody();
                    $Turnover = json_decode($body2, true);


                    $posts_data3 = $client->post('players/getCredit', [
                        "headers" => [
                            "Accept" => "application/json",
                            "jwt_token" => session()->get('JWT_TOKEN')
                        ],
                        'form_params' =>
                        $data_deposit
                    ]);

                    $body3 = $posts_data3->getBody();
                    $getCredit = json_decode($body3, true);


                    $posts_data4 = $client->get('caching/detailWithdraw');

                    $body4 = $posts_data4->getBody();
                    $detail_withdraw = json_decode($body4, true);


                    $posts_data5 = $client->post('players/getUserbyusername', [
                        "headers" => [
                            "Accept" => "application/json",
                            "jwt_token" => session()->get('JWT_TOKEN')
                        ],
                        'form_params' =>
                        $data_deposit
                    ]);

                    $body5 = $posts_data5->getBody();
                    $userData = json_decode($body5, true);

                    $data_to_respone = [
                        'deposit' => $obj,
                        'Turnover' => $Turnover,
                        'getCredit' => $getCredit,
                        'detail_withdraw' => $detail_withdraw,
                        'userData' => $userData,
                        'code' => 1
                    ];

                    echo json_encode($data_to_respone);
                    return;
                } else {
                    $re = '{"msg":"????????????????????????????????? ref "}';
                    echo json_encode($re);
                    return;
                }
            } else {
                $re = '{"code": 0 , "msg":"?????????????????????????????????????????? ?????????????????????????????????????????????"}';
                echo json_encode($re);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"?????????????????????????????????????????? ????????????????????????????????????????????????????????????"}';
            echo json_encode($re);
            return;
        }
    }


    public function withdraw()
    {
        try {

            $session = session();

            $data = [
                'userId' =>  $this->request->getPost('id'),
                'userOfGame' =>  $this->request->getPost('agent_username'),
                'account' =>  $this->request->getPost('account'),
                'username' =>  $this->request->getPost('username'),
                'admin_id'  =>  $session->get("id"),
            ];
            $client = service('curlrequest', $this->url);

            $posts_data = $client->post('withdraw/', [
                'form_params' =>
                $data
            ]);

            $body = $posts_data->getBody();
            $obj = json_decode($body);
            $message = $obj->{'msg'};

            if ($obj->{'status'} == true) {
                $re = '{"code": 1 , "msg": " ' . $message . '"}';
                echo json_encode($re);
                return;
            } else {
                $re = '{"code": 0 , "msg":"' . $message  .  '"}';
                echo json_encode($re);
                return;
            }
        } catch (Exception $e) {
            $re = '{"code": 0 , "msg":"?????????????????????????????????????????? ????????????????????????????????????????????????????????????"}';
            echo json_encode($re);
            return;
        }
    }
}
