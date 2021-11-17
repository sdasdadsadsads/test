<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class spin extends ResourceController

{
    public function index()
    {
       
        return view('Page/admin/spin.php');
    }
    
}
