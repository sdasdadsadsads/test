<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class isAtWorkTime implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('id')) {
            return redirect()->to(base_url('/'));
        }
        if (session()->get('class') === 1) {
            $current = strtotime(date('Y-m-d H:i:s'));
            $at_work_start =  strtotime(date('Y-m-d ' . session()->get('at_work_start_time')));
            $at_work_end =  strtotime(date('Y-m-d ' . session()->get('at_work_end_time')));

            // echo $current . "<br>";
            // echo $at_work_start . "<br>";
            // echo $at_work_end . "<br>";
            // echo  $current >= $at_work_start . "<br>";
            // // echo  $current <= $at_work_end . "<br>";

            // echo ($current >=  $at_work_start && $current < $at_work_end);

            // die;
            if (($current >=  $at_work_start && $current <= $at_work_end) === false) {
                session()->set([
                    'msg_error_login' => 'Account ของคุณไม่ได้อยู่ในรอบเวลาทำงาน <br> โปรดกลับมาใช้งานอีกครั้งช่วงเวลา  <br>' . session()->get('at_work_start_time') . " - " . session()->get('at_work_end_time')
                ]);
                return redirect()->to(base_url('/'));
            }
            // echo strtotime($d);
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
