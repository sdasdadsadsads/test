<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class blacklist extends ResourceController

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
            return view('Page/admin/blacklist.php', $body);
        } catch (Exception $e) {
          
        }
    }
}
