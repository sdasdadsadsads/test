<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class manage_sale extends ResourceController
{
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
