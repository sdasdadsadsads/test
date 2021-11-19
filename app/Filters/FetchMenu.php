<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Exception;

class FetchMenu implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        try {
            while (true) {
                $MENU_DATA = cache('menuAvailable');
                if (!$MENU_DATA) {
                    $options = [
                        'baseURI' => getenv('API_URL')
                    ];
                    $client = service('curlrequest', $options);
                    $posts_data = $client->get('caching/menuAvailable');
                    $body = $posts_data->getBody();
                    $body = json_decode($body, true); // แปลง JSON เป็น Array
                    cache()->save('menuAvailable', $body['data'], 300);
                } else {
                    break;
                }
                // global $MENU_DATA;
            }
        } catch (Exception $e) {
            echo "การเชื่อมต่อ MAIN SERVER ล้มเหลว";
            die;
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
