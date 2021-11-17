<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Exception;

class Scan2FT implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->has('isLogin')) {
            return redirect()->to(base_url('/'));
        } else {
            try {
                if ($session->has('scan2FT') == false) {
                    return redirect()->to(base_url('/'));
                }
            } catch (Exception $e) {
                return redirect()->to(base_url('/'));
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
