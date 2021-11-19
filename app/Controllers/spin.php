<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class spin extends ResourceController

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
       
        return view('Page/admin/spin.php');
    }
    
}
