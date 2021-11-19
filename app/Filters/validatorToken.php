<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Exception;

class validatorToken implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        try {
            $url = [
                'baseURI' => getenv('API_URL')
            ];
            $client = service('curlrequest', $url);
            $posts_data = $client->get("validatorToken", [
                "headers" => [
                    "Accept" => "application/json",
                    "jwt_token" => session()->get('JWT_TOKEN')
                ]
            ]);
            $body = $posts_data->getBody();
            $body = json_decode($body, true); //  แปลง JSON เป็น Array
            if (isset($body["token"])) { // สถานะ JWT TOKEN SERVER
                session()->destroy();
                return redirect()->to(base_url('/'));
            }
        } catch (Exception $err) {
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
