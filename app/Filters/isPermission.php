<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Exception;

class isPermission implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('id')) {
            return redirect()->to(base_url('/'));
        }
        if (!(session()->get('class') >= $arguments[0])) { // class Menu
            return redirect()->to(base_url('permission_denied'));
        }
        if (isset($arguments[1])) { // menu Id
            if (!(in_array($arguments[1], session()->get('menu')))) { // menu Id
                return redirect()->to(base_url('permission_denied'));
            }
        }
        if (isset($arguments[2])) { // permission Id
            if (!(in_array($arguments[2], session()->get('permissions')))) { // menu Id
                return redirect()->to(base_url('permission_denied'));
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
