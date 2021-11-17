<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>


<style>
    table tr {
        text-align: center;
        font-size: 12px;
    }
</style>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">รายงานการฝากเงิน</h4>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form_deposit" method="post" action="<?= base_url('report_deposit/csv') ?>">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <!-- <h4 class="header-title">ค้นหา</h4> -->
                                <p class="sub-header">ระบบค้นหา
                                </p>


                                <div class="col-12 col-md-12 col-lg-10">
                                    <div class="row">

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label class="form-label">ชื่อผู้ใช้</label>
                                            <input type="text" id="" name="usernameSearch" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label class="form-label">จำนวนเงิน</label>
                                            <input type="number" id="" name="depositDataSearch" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">วันที่เริ่มต้น</label>
                                            <input type="text" id="date1" name="startDate" class="basic-datepicker form-control" placeholder="วันที่เริ่มต้น" />
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">เวลา</label>
                                            <input type="text" id="time1" name="startTime" class="24hours-timepicker form-control" placeholder="เวลาเริ่มต้น">
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">ถึงวันที่</label>
                                            <input type="text" id="date2" name="endDate" class="basic-datepicker form-control" placeholder="ถึงวันที่">
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">เวลา</label>
                                            <input type="text" id="time2" name="endTime" class="24hours-timepicker form-control" placeholder="เวลาสิ้นสุด">
                                        </div>

                                        <div class="mb-3 mt-1 col-12 col-md-6 col-lg-2">
                                            <label class="form-label"></label><br>
                                            <button type="button" onclick="filter()" class="btn btn-blue waves-effect waves-light">
                                                ค้นหา
                                            </button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">
                                                Export
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <ul class="nav nav-tabs nav-bordered">
                <li class="nav-item">
                    <a href="" onclick="today()" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                        วันนี้
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" onclick="yesterday()" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        เมื่อวาน
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane show active" id="table2">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#depo2" role="tab" aria-controls="depo" aria-selected="true">เงินฝาก</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#true2" role="tab" aria-controls="true" aria-selected="false">True Wallet</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#sevenday2" role="tab" aria-controls="sevenday" aria-selected="false">ฝาก 7 วัน</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#miss2" role="tab" aria-controls="miss" aria-selected="false">ข้อผิดพลาดต่าง ๆ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#credit2" role="tab" aria-controls="credit" aria-selected="false">เครดิตเงินคืนทั่วไป</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="depo2" role="tabpanel" aria-labelledby="depo-tab">
                                            <div class="row">
                                                <!-- <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                                    <div class="card border-primary border-2 mb-3">
                                                        <div class="card-body text-center py-2">
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/scb.png" alt="user-image" class="me-1 mb-1" height="30">
                                                            <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">2</span></p>
                                                            <p class="m-0 p-0">SCB <span class="text-danger">524</span> รายการ</p>
                                                            <p class="m-0 p-0">ยอดรวมเงินฝาก <span class="text-danger">125,437.33</span></p>
                                                            <p class="m-0 p-0">ยอดรวมโบนัส <span class="text-danger">681.00</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                                    <div class="card border-success border-2 mb-3">
                                                        <div class="card-body text-center py-2">
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/kbank.png" alt="user-image" class="me-1 mb-1" height="30">
                                                            <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">2</span></p>
                                                            <p class="m-0 p-0">SCB <span class="text-danger">524</span> รายการ</p>
                                                            <p class="m-0 p-0">ยอดรวมเงินฝาก <span class="text-danger">125,437.33</span></p>
                                                            <p class="m-0 p-0">ยอดรวมโบนัส <span class="text-danger">681.00</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                                    <div class="card border-warning border-2 mb-3">
                                                        <div class="card-body text-center py-2">
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/kma.png" alt="user-image" class="me-1 mb-1" height="30">
                                                            <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">2</span></p>
                                                            <p class="m-0 p-0">SCB <span class="text-danger">524</span> รายการ</p>
                                                            <p class="m-0 p-0">ยอดรวมเงินฝาก <span class="text-danger">125,437.33</span></p>
                                                            <p class="m-0 p-0">ยอดรวมโบนัส <span class="text-danger">681.00</span></p>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                <div class="card-body">
                                                    <h4 id="sum" class="mt-0 text-uppercase text-dark bg-light border p-2">

                                                    </h4>
                                                </div>
                                            </div>

                                            <table id="table" class="table w-100 nowrap">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ธนาคาร</th>
                                                        <th>Username</th>
                                                        <th>ฝาก</th>
                                                        <th id="ddd">เครดิตก่อนเติม</th>
                                                        <th>โบนัส</th>
                                                        <th id="ccc">เครดิตหลังเติม</th>
                                                        <th>เวลาทำรายการ</th>
                                                        <th>เวลาธนาคาร</th>
                                                        <th>ทำโดย</th>
                                                        <th>สถานะ</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>

                                        <!-- 

                                        <div class="tab-pane fade" id="true2" role="tabpanel" aria-labelledby="true-tab">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                                    <div class="card border-danger border-2 mb-3">
                                                        <div class="card-body text-center py-2">
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/true.png" alt="user-image" class="me-1 mb-1" height="35">
                                                            <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">2</span></p>
                                                            <p class="m-0 p-0">TRUEMONEY <span class="text-danger">524</span> รายการ</p>
                                                            <p class="m-0 p-0">ยอดรวมเงินฝาก <span class="text-danger">125,437.33</span></p>
                                                            <p class="m-0 p-0">ยอดรวมโบนัส <span class="text-danger">681.00</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ธนาคาร</th>
                                                        <th>Username</th>
                                                        <th>ฝาก</th>
                                                        <th>โบนัส</th>
                                                        <th>เครดิตก่อนเติม</th>
                                                        <th>เติม</th>
                                                        <th>เครดิตหลังเติม</th>
                                                        <th>เวลาธนาคาร</th>
                                                        <th>Create Date</th>
                                                        <th>Update Date</th>
                                                        <th>ทำโดย</th>
                                                        <th>หมายเหตุ</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/true.png" alt="user-image" class="me-1" height="30"> <br>
                                                            <p class="mt-1">(1) TRUEMONEY</p>
                                                        </td>
                                                        <td>IWIN7765424</td>
                                                        <td>400.00</td>
                                                        <td>0.00</td>
                                                        <td>0.29</td>
                                                        <td>400.00</td>
                                                        <td>400.29</td>
                                                        <td>07/10/2021<p>10:16</p>
                                                        </td>
                                                        <td>07/10/2021<p>10:16:59</p>
                                                        </td>
                                                        <td>07/10/2021<p> 10:16:59</p>
                                                        </td>
                                                        <td>-</td>
                                                        <td>ไม่มีโปรโมชั่น</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->



                                        <!-- <div class="tab-pane fade" id="sevenday2" role="tabpanel" aria-labelledby="sevenday-tab">
                                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ธนาคาร</th>
                                                        <th>Username</th>
                                                        <th>ฝาก</th>
                                                        <th>โบนัส</th>
                                                        <th>เครดิตก่อนเติม</th>
                                                        <th>เติม</th>
                                                        <th>เครดิตหลังเติม</th>
                                                        <th>เวลาธนาคาร</th>
                                                        <th>Create Date</th>
                                                        <th>Update Date</th>
                                                        <th>ทำโดย</th>
                                                        <th>หมายเหตุ</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="tab-pane fade" id="miss2" role="tabpanel" aria-labelledby="miss-tab">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                                    <div class="card border-secondary border-2 mb-3">
                                                        <div class="card-body text-center py-2">
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/receipt.png" alt="user-image" class="me-1 mb-1" height="35">
                                                            <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">10</span></p>
                                                            <p class="m-0 p-0">สลิปไม่แสดง <span class="text-danger">1</span> รายการ</p>
                                                            <p class="m-0 p-0">ยอดรวมเงินฝาก <span class="text-danger">125,437.33</span></p>
                                                            <p class="m-0 p-0">ยอดรวมโบนัส <span class="text-danger">0.00</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                                    <div class="card border-secondary border-2 mb-3">
                                                        <div class="card-body text-center py-2">
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/addcredit.png" alt="user-image" class="me-1 mb-1" height="35">
                                                            <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">13</span></p>
                                                            <p class="m-0 p-0">เพิ่มเครดิต <span class="text-danger">1</span> รายการ</p>
                                                            <p class="m-0 p-0">ยอดรวมเงินฝาก <span class="text-danger">125,437.33</span></p>
                                                            <p class="m-0 p-0">ยอดรวมโบนัส <span class="text-danger">0.00</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ธนาคาร</th>
                                                        <th>Username</th>
                                                        <th>ฝาก</th>
                                                        <th>โบนัส</th>
                                                        <th>เครดิตก่อนเติม</th>
                                                        <th>เติม</th>
                                                        <th>เครดิตหลังเติม</th>
                                                        <th>เวลาธนาคาร</th>
                                                        <th>Create Date</th>
                                                        <th>Update Date</th>
                                                        <th>ทำโดย</th>
                                                        <th>หมายเหตุ</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/addcredit.png" alt="user-image" class="me-1" height="30"> <br>
                                                            <p class="mt-1">(13) เพิ่มเครดิต</p>
                                                        </td>
                                                        <td>IWIN7765424</td>
                                                        <td>400.00</td>
                                                        <td>0.00</td>
                                                        <td>0.29</td>
                                                        <td>400.00</td>
                                                        <td>400.29</td>
                                                        <td>07/10/2021<p>10:16</p>
                                                        </td>
                                                        <td>07/10/2021<p>10:16:59</p>
                                                        </td>
                                                        <td>07/10/2021<p> 10:16:59</p>
                                                        </td>
                                                        <td>-</td>
                                                        <td>ไม่มีโปรโมชั่น</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <img src="<?php echo base_url(); ?>/assets/images/bank/receipt.png" alt="user-image" class="me-1" height="30"> <br>
                                                            <p class="mt-1">(10) สลิปไม่แสดง</p>
                                                        </td>
                                                        <td>IWIN7765424</td>
                                                        <td>400.00</td>
                                                        <td>0.00</td>
                                                        <td>0.29</td>
                                                        <td>400.00</td>
                                                        <td>400.29</td>
                                                        <td>07/10/2021<p>10:16</p>
                                                        </td>
                                                        <td>07/10/2021<p>10:16:59</p>
                                                        </td>
                                                        <td>07/10/2021<p> 10:16:59</p>
                                                        </td>
                                                        <td>-</td>
                                                        <td>ไม่มีโปรโมชั่น</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->


                                        <!-- <div class="tab-pane fade" id="credit2" role="tabpanel" aria-labelledby="credit-tab">
                                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ธนาคาร</th>
                                                        <th>Username</th>
                                                        <th>ฝาก</th>
                                                        <th>โบนัส</th>
                                                        <th>เครดิตก่อนเติม</th>
                                                        <th>เติม</th>
                                                        <th>เครดิตหลังเติม</th>
                                                        <th>เวลาธนาคาร</th>
                                                        <th>Create Date</th>
                                                        <th>Update Date</th>
                                                        <th>ทำโดย</th>
                                                        <th>หมายเหตุ</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <style>
                th {
                    color: white;
                }

                .modal-busy {
                    position: fixed;
                    z-index: 999;
                    height: 100%;
                    width: 100%;
                    top: 0;
                    left: 0;
                    background-color: Black;
                    filter: alpha(opacity=60);
                    opacity: 0.6;
                    -moz-opacity: 0.8;
                }

                .center-busy {
                    z-index: 1000;
                    margin: 300px auto;
                    padding: 0px;
                    width: 130px;
                    filter: alpha(opacity=100);
                    opacity: 1;
                    -moz-opacity: 1;
                }

                .center-busy img {
                    height: 128px;
                    width: 128px;
                }
            </style>

            <div class="modal-busy" id="loader" style="display: none">
                <div class="center-busy" id="test-git">
                    <img alt="" src="<?php echo base_url(); ?>/assets/images/ZZ5H.gif" />
                </div>
            </div>

            <script>
                var time1 = "00:00";
                var time2 = "23:59";

                document.getElementById("time1").value = time1;
                document.getElementById("time2").value = time2;


                var x = setInterval(function index() {

                    var d1 = new Date();

                    var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()
                    document.getElementById("date1").value = date1;
                    document.getElementById("date2").value = date1;

                    filter();
                    clearInterval(x);

                }, 500);

                function today() {

                    var d1 = new Date();

                    var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()
                    document.getElementById("date1").value = date1;
                    document.getElementById("date2").value = date1;

                    filter();

                }

                function yesterday() {

                    var d1 = new Date(new Date().setDate(new Date().getDate() - 1));


                    var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()

                    document.getElementById("date1").value = date1;
                    document.getElementById("date2").value = date1;

                    filter();

                }

                function filter() {
                    $("#loader").show();
                    $.ajax({
                            url: '<?php echo base_url('report_deposit/filter') ?>',
                            type: "POST",
                            data: $('#form_deposit').serialize(),
                            dataType: "JSON",
                        })
                        .done(function(body) {
                            const res = JSON.parse(body);
                            console.log(res);
                            var date11 = document.getElementById('date1').value;
                            var date22 = document.getElementById('date2').value;

                            var today1 = new Date(date11.replace(/-/g, "/"));
                            var dd1 = String(today1.getDate()).padStart(2, '0');
                            var mm1 = String(today1.getMonth() + 1).padStart(2, '0'); //January is 0!
                            var yyyy1 = today1.getFullYear();

                            today1 = dd1 + '/' + mm1 + '/' + yyyy1;


                            var today2 = new Date(date22.replace(/-/g, "/"));
                            var dd2 = String(today2.getDate()).padStart(2, '0');
                            var mm2 = String(today2.getMonth() + 1).padStart(2, '0'); //January is 0!
                            var yyyy2 = today2.getFullYear();

                            today2 = dd2 + '/' + mm2 + '/' + yyyy2;

                            if (res.sumuserData == undefined) {
                                document.getElementById("sum").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;
                            } else {
                                document.getElementById("sum").innerHTML = ` จำนวนลูกค้าทั้งหมด ` + res.sumuserData[0].sum + ` คน ของวันที่ ` + today1 + ` ถึง ` + today2;
                            }

                            if (res.code == 0) {
                                Swal.fire({
                                    icon: "error",
                                    title: res.msg,
                                    showConfirmButton: false,
                                });


                                $("#loader").hide();
                                $('#table').DataTable({
                                    destroy: true,
                                    processing: true,
                                    deferRender: true,
                                    language: {
                                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                                        paginate: {
                                            previous: "<i class='mdi mdi-chevron-left'>",
                                            next: "<i class='mdi mdi-chevron-right'>",
                                        },
                                    },
                                    drawCallback: function() {
                                        $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                                    },
                                });
                            } else {

                                $("#loader").hide();
                                if (res.statementData == undefined) {
                                    var statement = [];
                                } else {
                                    var statement = res.statementData;
                                }
                                console.log(statement);
                                // // console.log(res);
                                $('#table').DataTable({
                                    data: statement,
                                    // pageLength: 20,
                                    // lengthChange: false,
                                    // searching: false,
                                    // paging: false,
                                    // ordering: false,
                                    // info: false,
                                    scrollX: true,
                                    destroy: true,
                                    processing: true,
                                    deferRender: true,
                                    language: {
                                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                                        paginate: {
                                            previous: "<i class='mdi mdi-chevron-left'>",
                                            next: "<i class='mdi mdi-chevron-right'>",
                                        },
                                    },
                                    drawCallback: function() {
                                        $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                                    },

                                    columns: [{
                                            data: "row_num",
                                            render: function(data) {

                                                return '<td><p id="count">' + data + '</p></td>'

                                            }
                                        },
                                        {
                                            data: "from_bank",
                                            render: function(data) {
                                                if (data == "  K") {
                                                    return ' <td><img src="<?php echo base_url(); ?>/assets/images/Bank_show/K.png" alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">' + data + '</p></td>';
                                                } else {
                                                    var base_url = '<?php echo base_url() ?>';
                                                    return ' <td> <img src="' + base_url + "/assets/images/Bank_show/" + data + '.png"  alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">' + data + '</p></td>'
                                                }
                                            }
                                        },
                                        {
                                            data: "username"
                                        },
                                        {
                                            data: "deposit"
                                        },
                                        {
                                            data: "credit_before",
                                            className: "bg-dangerlight",
                                            targets: 1,
                                            render: function(data) {
                                                return '<td > ' + data + ' </td>'

                                            }
                                        },
                                        {
                                            data: "bonus"
                                        },
                                        {
                                            data: "credit_after",
                                            className: "bg-infolight",
                                            targets: 1,
                                            render: function(data) {

                                                return '<td > ' + data + ' </td>'

                                            }
                                        },
                                        {
                                            data: "created_at",
                                            render: function(data) {
                                                const unixTimestamp = data

                                                const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                const dateObject = new Date(milliseconds)

                                                const humanDateFormat = dateObject.toLocaleString("es-MX")


                                                return '<td> ' + humanDateFormat + ' </td>'

                                            }
                                        },
                                        {
                                            data: "auto_update",
                                            render: function(data) {

                                                const unixTimestamp = data

                                                const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                const dateObject = new Date(milliseconds)

                                                const humanDateFormat = dateObject.toLocaleString("es-MX")


                                                return '<td> ' + humanDateFormat + ' </td>'

                                            }
                                        },
                                        {
                                            data: "username_admin",
                                            render: function(data) {
                                                if (data == "AUTO") {
                                                    return '<p class="text-success">' + data + '</p>';
                                                } else {
                                                    return '<p class="text-secondary">' + data + '</p>';
                                                }
                                            }
                                        },
                                        {
                                            data: "status",
                                            render: function(data) {
                                                if (data == 1) {
                                                    return ' <i class=" fa fa-exclamation-triangle icon-dual-danger"></i>';
                                                } else if (data == 2) {
                                                    return ' <i class="fa fa-check icon-dual-success"></i>'
                                                } else {
                                                    return ' <i class="fa fa-check icon-dual-success"></i>'
                                                }
                                            }
                                        },
                                    ],
                                });

                            }


                            var element = document.getElementById("ccc");
                            element.classList.remove("bg-infolight");
                            var element = document.getElementById("ddd");
                            element.classList.remove("bg-dangerlight");

                        })
                        .fail(function(err) {
                            // console.log(err);
                            Swal.fire({
                                icon: "error",
                                title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                showConfirmButton: false,
                            });

                            $("#loader").hide();
                            $('#table').DataTable({
                                destroy: true,
                                processing: true,
                                deferRender: true,
                                language: {
                                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                                    paginate: {
                                        previous: "<i class='mdi mdi-chevron-left'>",
                                        next: "<i class='mdi mdi-chevron-right'>",
                                    },
                                },
                                drawCallback: function() {
                                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                                },
                            });
                        });
                }
            </script>

            <?php $this->endSection(); ?>