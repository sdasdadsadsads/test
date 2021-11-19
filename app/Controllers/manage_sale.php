<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class manage_sale extends ResourceController

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
        $session = session();
        try {
            return view('Page/admin/manage_sale.php');
        } catch (Exception $e) {
            $session = session();
            $session->setFlashdata('error', 'เกิดข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
            return view('Page/admin/admin.php');
        }
    }
}
