<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class news extends ResourceController

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
            try {
                $client1 = service('curlrequest', $this->url);

                $posts_data1 = $client1->get('news/show_5data', [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ]
                ]);

                $body1 = $posts_data1->getBody();
                $body1 = json_decode($body1, true); // แปลง JSON เป็น Array
                $body["BlacklistData"] = $body1["BlacklistData"];
            } catch (Exception $err) {
                //
            }

            try {
                $client2 = service('curlrequest', $this->url);

                $posts_data2 = $client2->get("news/show_last_login", [
                    "headers" => [
                        "Accept" => "application/json",
                        "jwt_token" => session()->get('JWT_TOKEN')
                    ]
                ]);

                $body2 = $posts_data2->getBody();
                $body2 = json_decode($body2, true);
                $body["lastlogintData"] = $body2["lastlogintData"];
                
            } catch (Exception $err) {
                //
            }

            // print_r($body);
            return view('Page/admin/news.php', $body);
        } catch (Exception $e) {
        }
    }
}
