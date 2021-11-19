<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class registration_user extends ResourceController

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

            $posts_data = $client->get('caching/bankCategory', [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);

            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            $body["bankCategory"] = $body["data"];
            return view('Page/admin/registration_user.php', $body);
        } catch (Exception $e) {
            $session = session();
			$session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/registration_user.php');
        }
    }


    public function create()
    {
        try {
            if ($this->request->getPost('account') && $this->request->getPost('bankId') && $this->request->getPost('username')) {
                $rules = [
                    'username'      => 'required|min_length[10]|max_length[10]',
                ];
                if ($this->validate($rules)) {
                    $data = [
                        'account' =>  $this->request->getPost('account'),
                        'bankId'  =>  $this->request->getPost('bankId'),
                        'username'  => $this->request->getPost('username'),
                        'lineId' =>  $this->request->getPost('lineId'),
                        'recUsername'  =>  $this->request->getPost('recUsername'),
                        'fullName'  => $this->request->getPost('fullName'),
                        'getBonus'  => $this->request->getPost('getBonus'),
                        'adminId'  => session()->get('id'),

                    ];

                    $client = service('curlrequest', $this->url);

                    $posts_data = $client->post('admin/manage/users/create', [
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
                        echo json_encode($body);
                        return;
                    } else {
                        $re = '{"code": 0 , "msg":"' . $message . '"}';
                        echo json_encode($re);
                        return;
                    }
                } else {
                    $re = '{"code": 0 , "msg":"กรุณากรอกUsername (หมายเลขโทรศัพท์) ให้ถูกต้อง"}';
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
}
