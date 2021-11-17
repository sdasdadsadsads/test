<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\RESTful\ResourceController;

use Exception;

class ValidateEmergency implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        try {
            $session = session();
            $ip =  $_SERVER['REMOTE_ADDR'];
            $emergency = null;
            while (true) {
                $emergency = cache('emergency');
                if (!$emergency) {
                    $options = [
                        'baseURI' => getenv('API_URL')
                    ];
                    $client = service('curlrequest', $options);
                    $posts_data = $client->get('systems/emergency');
                    $body = $posts_data->getBody();
                    $body = json_decode($body, true); // แปลง JSON เป็น Array
                    cache()->save('emergency', $body, 10);
                } else {
                    break;
                }
            }
            if ($emergency['status']) {
                if ($session->has('id')) {
                    if (isset($emergency['office'])) {
                        if (in_array($session->office, $emergency['office'])) {
                            echo '<html>
                                    <head></head>
                                    <body>
                                    <div align="center">
                                        <img src=' . base_url('/mdes.jpg') . ' width="800" height="700">
                                    </div>
                                    </body>
                                </html>';
                            die;
                        }
                    }
                    if (is_array($emergency) || is_object($emergency)) {
                        if (isset($emergency['ip'])) {
                            foreach ($emergency['ip'] as $emergencyIp) {
                                if ($emergencyIp === $ip) {
                                    echo '<html>
                                        <head></head>
                                        <body>
                                        <div align="center">
                                            <img src=' . base_url('/mdes.jpg') . ' width="800" height="700">
                                        </div>
                                        </body>
                                    </html>';
                                    die;
                                }
                            }
                        }
                    }
                }
            }
        } catch (Exception $e) {
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
