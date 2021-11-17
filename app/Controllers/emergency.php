<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class Emergency extends ResourceController


{
    public function index()
    {
        try {
            $ip =  $_SERVER['REMOTE_ADDR'];
            $session = session();
            $emergency = cache('emergency');
            if (!$emergency) {
                $client = service('curlrequest', $this->url);
                $posts_data = $client->get('systems/emergency');
                $body = $posts_data->getBody();
                $body = json_decode($body, true); // แปลง JSON เป็น Array
                cache()->save('emergency', $body, 10);
                return json_encode($emergency);
            }
            if ($session->has('id')) {
                if (in_array($session->office, $emergency['office'])) {
                    return json_encode($emergency);
                } else if (in_array($ip, $emergency['ip'])) {
                    return json_encode($emergency);
                } else {
                    return json_encode(null);
                }
            }
            return json_encode(null);
        } catch (Exception $e) {
        }
    }

    public function callEmergency()
    {
        try {
            $client = service('curlrequest', $this->url);
            $data = [
                "office" => $this->request->getPost('office'),
                'adminId' => session()->get('id')
            ];
            $posts_data = $client->post('systems/setEmergency', [
                'form_params' => $data
            ]);
            $body = $posts_data->getBody();
            $body = json_decode($body, true); // แปลง JSON เป็น Array
            echo json_encode($body);
        } catch (Exception $e) {

        }
    }
}