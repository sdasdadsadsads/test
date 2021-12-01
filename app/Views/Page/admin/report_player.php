<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>



<style>
    table tr {
        text-align: center;
        font-size: 12px;
    }

    textarea {
        height: 200px;
        resize: none;
    }

    .card-body label {
        cursor: pointer;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #0096cc;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #0096cc;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">รายงาน Player</h4>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="header-title">ค้นหา</h4> -->
                            <p class="sub-header">ระบบค้นหา
                            </p>




                            <div class="col-md-12">
                                <div class="row">

                                    <div class="mb-3 col-2">
                                        <label class="form-label">ประเภทของลูกค้า</label>
                                        <select id="selectStatement" name="selectStatement" class="form-select">
                                            <option selected value="">ทั้งหมด</option>
                                            <option value="1">ลูกค้าที่มีการฝาก</option>
                                            <option value="2">ลูกค้าที่ไม่มีการฝาก</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label class="form-label">ค้นหาด้วย</label>
                                        <select id="selectTypeSearch" name="selectTypeSearch" class="form-select">
                                            <option selected value="">กรุณาเลือก</option>
                                            <option value="1">agent username</option>
                                            <option value="2">เบอร์โทรศัพท์</option>
                                            <option value="3">หมายเลขบัญชีธนาคาร</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label class="form-label">ข้อมูลที่ต้องการค้นหา</label>
                                        <input type="text" id="inputDataSearch" name="inputDataSearch" class="form-control" placeholder="">
                                    </div>

                                    <!-- <div class="mb-3 col-3">
                                            <label class="form-label">ธนาคารฝากของลูกค้า</label>
                                            <select class="form-select">
                                                <option selected disabled>กรุณาเลือกธนาคาร</option>
                                                <option value="1">ธนาคารกรุงเทพ</option>
                                                <option value="2">ธนาคารกสิกรไทย</option>
                                                <option value="3">ธนาคารกรุงไทย</option>
                                                <option value="4">ธนาคารทหารไทยธนชาต</option>
                                                <option value="5">ธนาคารไทยพาณิชย์</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">เลขบัญชีตามรายการที่ค้างหน้าหลัก</label>
                                            <input type="text" id="" class="form-control" placeholder="">
                                        </div> -->

                                </div>
                            </div>
                            <!-- end col-->



                            <div class="col-md-12">
                                <div class="row">

                                    <div class="mb-3 col-3">
                                        <label class="form-label">วันที่เริ่มต้น</label>
                                        <input type="text" id="date1" name="startDate" class="basic-datepicker form-control" placeholder="วันที่เริ่มต้น">
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label class="form-label">เวลา</label>
                                        <input type="text" id="time1" name="startTime" class="24hours-timepicker form-control" placeholder="เวลาเริ่มต้น">
                                    </div>

                                    <div class="mb-3 col-3">
                                        <label class="form-label">ถึงวันที่</label>
                                        <input type="text" id="date2" name="endDate" class="basic-datepicker form-control" placeholder="ถึงวันที่">
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label class="form-label">เวลา</label>
                                        <input type="text" id="time2" name="endTime" class="24hours-timepicker form-control" placeholder="เวลาสิ้นสุด">
                                    </div>


                                    <div class="mb-1 mt-1 col-2">
                                        <label class="form-label"></label><br>
                                        <button type="button" onClick="filter()" class="btn btn-blue waves-effect waves-light">
                                            ค้นหา
                                        </button>
                                    </div>


                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->



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
                        <div class="tab-pane show active" id="today">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 id="sum" class="header-title mb-4"></h4>
                                            <!-- <p class="text-muted font-13 mb-4">
                                        จำนวนลูกค้าทั้งหมด 24 คน
                                    </p> -->
                                            <table id="table" class="table w-100 nowrap">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ธนาคาร</th>
                                                        <th>username</th>
                                                        <th>agent username</th>
                                                        <th>วัน/เดือน/ปี </th>
                                                        <th>ฝาก</th>
                                                        <th>ถอน</th>
                                                        <th>เปลี่ยนรหัส</th>
                                                        <th>แก้ไข </th>
                                                    </tr>
                                                </thead>

                                            </table>

                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>
                            <!-- end row-->
                        </div><!-- end col-->

                    </div>






                    <!-- ============================================================== -->
                    <!-- Modal ทั้งหมด -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12">
                        <div id="D_W_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h4 id="details" class="modal-title"></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">

                                        <input type="hidden" value="" name="user_id_dw" id="user_id_dw">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-1" class="form-label">วันที่เริ่มต้น</label>
                                                    <input type="text" name="startDate_dw" id="date_dw1" class="basic-datepicker form-control" placeholder="วันที่เริ่มต้น">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">เวลาเริ่มต้น</label>
                                                    <input type="text" name="startTime_dw" id="time_dw1" class="24hours-timepicker form-control" placeholder="เวลาเริ่มต้น">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">ถึงวันที่</label>
                                                    <input type="text" name="endDate_dw" id="date_dw2" class="basic-datepicker form-control" placeholder="ถึงวันที่">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">เวลาสิ้นสุด</label>
                                                    <input type="text" name="endTime_dw" id="time_dw2" class="24hours-timepicker form-control" placeholder="เวลาสิ้นสุด">
                                                </div>
                                            </div>

                                            <div class="col-md-6 " id="D_S">
                                                <div class="mb-3">
                                                    <label class="form-label"></label><br>
                                                    <button type="button" onClick="filter_deposit_id()" class="btn btn-blue waves-effect waves-light ">
                                                        ค้นหา
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-md-6 " id="W_S">
                                                <div class="mb-3">
                                                    <label class="form-label"></label><br>
                                                    <button type="button" onClick="filter_withdraw_id()" class="btn btn-blue waves-effect waves-light ">
                                                        ค้นหา
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 id="todate_dw" class="header-title mb-4"></h4>
                                        <div id="D" class="row" style="display: none;">
                                            <div class="table-responsive">

                                                <table id="table_deposit" style="width:100%; height:100%;">
                                                    <thead class="bg-info text-white" style="width:100%; height:100%;">
                                                        <tr>
                                                            <th>ลำดับ</th>
                                                            <th>ธนาคาร</th>
                                                            <th>ฝาก</th>
                                                            <th>เครดิตก่อน<br>เติม</th>
                                                            <th>โบนัส</th>
                                                            <th>เครดิตหลัง<br>เติม</th>
                                                            <th>เวลาทำ<br>รายการ</th>
                                                            <th>เวลาธนาคาร</th>
                                                            <th>ทำโดย</th>
                                                            <th>สถานะ</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>


                                        <div id="W" class="row" style="display: none;">
                                            <div class="table-responsive">
                                                <table id="table_withdraw" style="width:100%; height:100%;">
                                                    <thead class="bg-info text-white" style="width:100%; height:100%;">
                                                        <tr>
                                                            <th id="num">ลำดับ</th>
                                                            <th id="myCheck">ธนาคาร</th>
                                                            <th>Username</th>
                                                            <th>ยอดเงินถอน</th>
                                                            <th>สถานะ</th>
                                                            <th>ผู้ตรวจสอบ</th>
                                                            <th>ผู้โอน</th>
                                                            <th>วันที่เข้าระบบ</th>
                                                            <th>วันที่ยืนยัน</th>
                                                        </tr>
                                                    </thead>

                                                </table>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                    </div>



                                </div>
                            </div> <!-- container -->
                        </div> <!-- content -->
                    </div>






                    <!-- ================================================================================================================================== -->



                    <div class="col-xl-12">
                        <div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h4 class="modal-title">รายละเอียดสมาชิก </h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <input type="hidden" value="" name="user_id" id="user_id">
                                        <input type="hidden" value="" name="oldbankId" id="oldbankId">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-1" class="form-label">ชื่อ - นามสกุล</span></label>
                                                    <input type="text" id="fullName" name="fullName" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">หมายเลขบัญชีธนาคาร<span class="text-danger"> *</span></label>
                                                    <input type="text" id="account" name="account" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">ธนาคาร (ตามสมุดบัญชี)<span class="text-danger"> *</span></label>
                                                    <?php if (isset($bankCategory)) { ?>
                                                        <select id="bankId" name="bankId" class="form-select">
                                                            <?php foreach ($bankCategory as $bankCategorys) { ?>
                                                                <option value="<?php echo $bankCategorys['id']; ?>"><?php echo $bankCategorys['bank_th']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php    } else { ?>
                                                        <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">Username (เบอร์โทรศัพท์)<span class="text-danger"> กรอกให้ครบ 10 หลัก *</span></label>
                                                    <input type="number" id="username" name="username" class="form-control bg-light" placeholder="" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">รับโบนัส</span></label>
                                                    <select id="getBonus" name="getBonus" class="form-select">
                                                        <option value="0">ไม่รับโบนัส</option>
                                                        <option value="1">รับโบนัส</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">Line ID </span></label>
                                                    <input type="number" id="lineId" name="lineId" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">บุคคลแนะนำ</label>
                                                    <input type="text" id="recUsername" name="recUsername" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">รู้จักผ่าน</label>
                                                    <select class="form-select">
                                                        <option selected disabled>โปรดเลือก</option>
                                                        <option value="1">Google</option>
                                                        <option value="2">Facebook</option>
                                                        <option value="3">Line</option>
                                                        <option value="4">เพื่อนแนะนำ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="field-2" class="form-label">เพิ่มเติม</label>
                                                    <input type="text" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="field-2" class="form-label">ระดับ VIP</label><br>
                                                <input type="hidden" id="" name="" value="">
                                                <label class="switch mb-2">
                                                    <input type="checkbox" onclick="checkbox()" id="Game_checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <label class="form-label mb-2">แก้ไขสิทธิ์เกมส์</label>
                                        <div class="row" id="Game"></div>




                                        <div class="modal-footer">
                                            <button class="btn btn-success waves-effect waves-light" onClick="user_edit()" type="submit">บันทึก</button>
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                                        </div>

                                    </div>
                                </div> <!-- container -->
                            </div> <!-- content -->
                        </div>



                        <div class="col-xl-12">
                            <div id="ShowEditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-light">
                                            <h3 class="modal-title">รายละเอียด</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row">
                                                <div class="text-center" style="font-weight: bold;">
                                                    <h1 class="mt-0 "><i class="h1 mdi mdi-check-all text-success"></i></h1>
                                                    <p class="h1 mt-0 text-dark font-bold">บันทึกสำเร็จ !</p>
                                                    <hr>
                                                    <p class="h3 w-80 mb-2 mx-auto text-dark">ชื่อ - นามสกุล :
                                                        <a id="S_fullName" class="h4 text-danger"></a>
                                                    </p>
                                                    <p class="h3 w-80 mb-2 mx-auto text-dark">หมายเลขบัญชีธนาคาร :
                                                        <a id="S_account" class="h4 text-danger"></a>
                                                    </p>
                                                    <p class="h3 w-80 mb-2 mx-auto text-dark">ธนาคาร (ตามสมุดบัญชี) :
                                                        <a id="S_bankId" class="h4 text-danger"></a>
                                                    </p>
                                                    <p class="h3 w-80 mb-2 mx-auto text-dark">Username (เบอร์โทรศัพท์) :
                                                        <a id="S_username" class="h4 text-danger"></a>
                                                    </p>
                                                    <p class="h3 w-80 mb-2 mx-auto text-dark">รับโบนัส :
                                                        <a id="S_getBonus" class="h4 text-danger"></a>
                                                    </p>
                                                    <p class="h3 w-80 mb-2 mx-auto text-dark">Line ID :
                                                        <a id="S_lineId" class="h4 text-danger"></a>
                                                    </p>
                                                    <p class="h3 w-80 mb-2 mx-auto text-dark">บุคคลแนะนำ :
                                                        <a id="S_fullName" class="h4 text-danger"></a>
                                                    </p>
                                                    <p class="h3 w-80 mb-2 mx-auto text-dark">รู้จักผ่าน :
                                                        <a id="S_fullName" class="h4 text-danger"></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-light">
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-12">
                            <div id="resetPassModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-light">
                                            <h3 class="modal-title">รายละเอียด</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row">
                                                <div class="text-center" style="font-weight: bold;">
                                                    <h1 class="mt-0 "><i class="h1 mdi mdi-check-all text-success"></i></h1>
                                                    <p class="h1 mt-0 text-dark font-bold">เปลี่ยนรหัสผ่านสำเร็จ !</p>
                                                    <hr>

                                                    <p class="h2 w-80 mb-2 mx-auto text-dark">รหัสผ่านใหม่ :
                                                        <a id="resetPass_password" class="h3 text-success"></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-light">
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
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
                            var csrfName = '<?= csrf_token() ?>';
                            var csrfHash = '<?= csrf_hash() ?>';

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
                                var dataJson = {
                                    [csrfName]: csrfHash, // adding csrf here
                                    selectStatement: $("#selectStatement").val(),
                                    selectTypeSearch: $("#selectTypeSearch").val(),
                                    inputDataSearch: $("input[name=inputDataSearch]").val(),
                                    startDate: $("input[name=startDate]").val(),
                                    startTime: $("input[name=startTime]").val(),
                                    endDate: $("input[name=endDate]").val(),
                                    endTime: $("input[name=endTime]").val(),
                                };
                                $.ajax({
                                        url: '<?php echo base_url('report_player/filter') ?>',
                                        type: "POST",
                                        data: dataJson,
                                        dataType: "JSON",
                                    })
                                    .done(function(res) {
                                        // console.log(res);
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


                                        document.getElementById("sum").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;



                                        if (res.code == 1) {
                                            var usersData = JSON.parse(res.usersData);
                                            // console.log(Data.UserData);

                                            $("#loader").hide();
                                            if (usersData.UserData == undefined) {
                                                var User = [];
                                            } else {
                                                var User = usersData.UserData;
                                            }
                                            // // console.log(res);
                                            $('#table').DataTable({
                                                data: User,
                                                // pageLength: 20,
                                                // lengthChange: false,
                                                // searching: false,
                                                // paging: false,
                                                // ordering: false,
                                                // info: false,
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
                                                        data: {
                                                            bank_id: "bank_id",
                                                            account: "account",
                                                            agent_username: "agent_username"
                                                        },
                                                        render: function(data) {
                                                            var index = res.bankId.indexOf(data.bank_id);
                                                            var base_url = '<?php echo base_url() ?>';
                                                            return ' <td> <img src="' + base_url + "/assets/images/Bank_show/" + res.bankShortName[index] + '.png"  alt="user-image" class="me-1" height="30"> <br>  <span style="color: blue; font-weight: bold;">' + data.account + '</span><p>' + data.agent_username + '</p>'
                                                        }
                                                    },
                                                    {
                                                        data: "username"
                                                    },
                                                    {
                                                        data: "agent_username"
                                                    },
                                                    {
                                                        data: "create_time",
                                                        render: function(data) {

                                                            const unixTimestamp = data

                                                            const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                            const dateObject = new Date(milliseconds)

                                                            const humanDateFormat = dateObject.toLocaleDateString("es-MX")


                                                            return '<td> ' + humanDateFormat + ' ' + dateObject.getHours() + ":" + dateObject.getMinutes() + ' </td>'

                                                        }
                                                    },

                                                    {
                                                        data: "id",
                                                        render: function(data) {

                                                            return '<td><button type="button" class="btn btn-success waves-effect waves-light" onclick="from_deposit(' + data + ')" ><i class="mdi mdi-tab-plus"></i></button></td>'


                                                        }
                                                    },
                                                    {
                                                        data: "id",
                                                        render: function(data) {

                                                            return ' <td><button type="button" class="btn btn-danger waves-effect waves-light" onclick="from_withdraw(' + data + ')" ><i class="mdi mdi-tab-minus"></i></button> </td>'


                                                        }
                                                    },
                                                    {
                                                        data: "id",
                                                        render: function(data) {

                                                            return ' <td><button type="button" class="btn btn-warning waves-effect waves-light" onclick="resetPass(' + data + ')"><i class="mdi mdi-key"></i></button> </td>'


                                                        }
                                                    },
                                                    {
                                                        data: "id",
                                                        render: function(data) {

                                                            return ' <td> <button type="button" class="btn btn-info waves-effect waves-light" onclick="from_user_edit(' + data + ')"><i class="mdi mdi-file-document-edit-outline"></i></button></td>'


                                                        }
                                                    }
                                                ],
                                            });
                                        } else {
                                            var err = JSON.parse(res);
                                            Swal.fire({
                                                icon: "error",
                                                title: err.msg,
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

                                        }



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


                            function from_deposit(id) {

                                $('#D_W_Modal').modal('show');
                                var date_deposit1 = document.getElementById('date1').value;
                                var date_deposit2 = document.getElementById('date2').value;
                                var time_deposit1 = document.getElementById('time1').value;
                                var time_deposit2 = document.getElementById('time2').value;

                                document.getElementById("date_dw1").value = date_deposit1;
                                document.getElementById("date_dw2").value = date_deposit2;
                                document.getElementById("time_dw1").value = time_deposit1;
                                document.getElementById("time_dw2").value = time_deposit2;
                                document.getElementById("user_id_dw").value = id;

                                document.getElementById("details").innerHTML = "รายละเอียดการฝาก"
                                document.getElementById('D').style.display = '';
                                document.getElementById('W').style.display = 'none';

                                document.getElementById('D_S').style.display = '';
                                document.getElementById('W_S').style.display = 'none';

                                filter_deposit_id();

                            }

                            function filter_deposit_id() {
                                var data_d = {
                                    [csrfName]: csrfHash, // adding csrf here
                                    user_id_dw: $("input[name=user_id_dw]").val(),
                                    startDate_dw: $("input[name=startDate_dw]").val(),
                                    startTime_dw: $("input[name=startTime_dw]").val(),
                                    endDate_dw: $("input[name=endDate_dw]").val(),
                                    endTime_dw: $("input[name=endTime_dw]").val(),
                                };
                                $.ajax({
                                        url: '<?php echo base_url('report_player/filter_deposit_id') ?>',
                                        type: "POST",
                                        data: data_d,
                                        dataType: "JSON",
                                    })
                                    .done(function(body) {

                                        const res = JSON.parse(body);
                                        // console.log(res);
                                        var date11 = document.getElementById('date_dw1').value;
                                        var date22 = document.getElementById('date_dw2').value;

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


                                        document.getElementById("todate_dw").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;


                                        if (res.code == 0) {
                                            Swal.fire({
                                                icon: "error",
                                                title: res.msg,
                                                showConfirmButton: false,
                                            });

                                            $('#table_deposit').DataTable({
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

                                            if (res == undefined) {
                                                var deposit = [];
                                            } else {
                                                var deposit = res;
                                            }
                                            // console.log(statement);
                                            // // console.log(res);
                                            $('#table_deposit').DataTable({
                                                data: deposit,
                                                // pageLength: 20,
                                                // lengthChange: false,
                                                // searching: false,
                                                // paging: false,
                                                // ordering: false,
                                                // info: false,
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

                                                            return '<td><p>' + data + '</p></td>'

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
                                                        data: "deposit"
                                                    },
                                                    {
                                                        data: "credit_before",
                                                        render: function(data) {
                                                            return '<td> <span id="badge1" class="badge text-white m-0 font-13">' + data + '</span> </td>'

                                                        }
                                                    },
                                                    {
                                                        data: "bonus"
                                                    },
                                                    {
                                                        data: "credit_after",

                                                        render: function(data) {

                                                            return '<td> <span id="badge2" class="badge text-white mt-1 font-13">' + data + '</span> </td>'

                                                        }
                                                    },
                                                    {
                                                        data: "created_at",
                                                        render: function(data) {
                                                            const unixTimestamp = data

                                                            const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                            const dateObject = new Date(milliseconds)

                                                            const humanDateFormat = dateObject.toLocaleDateString("es-MX")
                                                            const humanDateFormat2 = dateObject.toLocaleTimeString("es-MX")

                                                            return '<td> ' + humanDateFormat + ' <br>' + humanDateFormat2 + '</td>'

                                                        }
                                                    },
                                                    {
                                                        data: "auto_update",
                                                        render: function(data) {

                                                            const unixTimestamp = data

                                                            const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                            const dateObject = new Date(milliseconds)

                                                            const humanDateFormat = dateObject.toLocaleDateString("es-MX")
                                                            const humanDateFormat2 = dateObject.toLocaleTimeString("es-MX")

                                                            return '<td> ' + humanDateFormat + ' <br>' + humanDateFormat2 + '</td>'

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



                                    })
                                    .fail(function(err) {
                                        // console.log(err);
                                        Swal.fire({
                                            icon: "error",
                                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                            showConfirmButton: false,
                                        });


                                        $('#table_deposit').DataTable({
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

                            function from_withdraw(id) {
                                $('#D_W_Modal').modal('show');
                                var date_withdraw1 = document.getElementById('date1').value;
                                var date_withdraw2 = document.getElementById('date2').value;
                                var time_withdraw1 = document.getElementById('time1').value;
                                var time_withdraw2 = document.getElementById('time2').value;

                                document.getElementById("date_dw1").value = date_withdraw1;
                                document.getElementById("date_dw2").value = date_withdraw2;
                                document.getElementById("time_dw1").value = time_withdraw1;
                                document.getElementById("time_dw2").value = time_withdraw2;
                                document.getElementById("user_id_dw").value = id;

                                document.getElementById("details").innerHTML = "รายละเอียดการถอน"
                                document.getElementById('W').style.display = '';
                                document.getElementById('D').style.display = 'none';

                                document.getElementById('W_S').style.display = '';
                                document.getElementById('D_S').style.display = 'none';
                                filter_withdraw_id();
                            }


                            function filter_withdraw_id() {
                                var data_W = {
                                    [csrfName]: csrfHash, // adding csrf here
                                    user_id_dw: $("input[name=user_id_dw]").val(),
                                    startDate_dw: $("input[name=startDate_dw]").val(),
                                    startTime_dw: $("input[name=startTime_dw]").val(),
                                    endDate_dw: $("input[name=endDate_dw]").val(),
                                    endTime_dw: $("input[name=endTime_dw]").val(),
                                };
                                $.ajax({
                                        url: '<?php echo base_url('report_player/filter_withdraw_id') ?>',
                                        type: "POST",
                                        data: data_W,
                                        dataType: "JSON",
                                    })
                                    .done(function(body) {

                                        const res = JSON.parse(body);
                                        // console.log(res);
                                        var date11 = document.getElementById('date_dw1').value;
                                        var date22 = document.getElementById('date_dw2').value;

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


                                        document.getElementById("todate_dw").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;


                                        if (res.code == 0) {
                                            Swal.fire({
                                                icon: "error",
                                                title: res.msg,
                                                showConfirmButton: false,
                                            });

                                            $('#table_withdraw').DataTable({
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

                                            if (res == undefined) {
                                                var withdraw = [];
                                            } else {
                                                var withdraw = res;
                                            }
                                            // console.log(statement);
                                            // // console.log(res);
                                            $('#table_withdraw').DataTable({
                                                data: withdraw,
                                                // pageLength: 20,
                                                // lengthChange: false,
                                                // searching: false,
                                                // paging: false,
                                                // ordering: false,
                                                // info: false,
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
                                                        className: "bg-dangerlight2",
                                                        targets: 1,
                                                        render: function(data) {

                                                            return '<td><p>' + data + '</p></td>'

                                                        }
                                                    },
                                                    {
                                                        data: {
                                                            bank_short: "user_bank_short",
                                                            account: "account",
                                                        },
                                                        render: function(data) {

                                                            var base_url = '<?php echo base_url() ?>';
                                                            return '  <td class="p-0 m-0"> <img src="' + base_url + "/assets/images/Bank_show/" + data.bank_short + '.png"  alt="user-image" class="me-1 mt-1" height="30"> <br> <p class="mt-2 text-blue">' + data.account + '</p></td>'

                                                        }
                                                    },
                                                    {
                                                        data: "username"
                                                    },
                                                    {
                                                        data: "amount"
                                                    },
                                                    {
                                                        data: "status",
                                                        render: function(data) {
                                                            if (data == 1) {
                                                                return '<td><h2><span class = "badge bg-success text-white">wait</span></h2></td>';
                                                            } else if (data == 2) {
                                                                return '<td><h2><span class = "badge bg-success text-white">success</span></h2></td>';
                                                            } else if (data == 3) {
                                                                return '<td><h2><span class = "badge bg-success text-white">reject</span></h2></td>';
                                                            } else if (data == 4) {
                                                                return '<td><h2><span class = "badge bg-success text-white">check</span></h2></td>';
                                                            } else if (data == 5) {
                                                                return '<td><h2><span class = "badge bg-success text-white">auto</span></h2></td>';
                                                            } else if (data == 6) {
                                                                return '<td><h2><span class = "badge bg-success text-white">wait auto</span></h2></td>';
                                                            }
                                                        }
                                                    },
                                                    {
                                                        data: "name"
                                                    },
                                                    {
                                                        data: "name"
                                                    },
                                                    {
                                                        data: "time",
                                                        render: function(data) {

                                                            const unixTimestamp = data

                                                            const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                            const dateObject = new Date(milliseconds)

                                                            const humanDateFormat = dateObject.toLocaleDateString("es-MX")
                                                            const humanDateFormat2 = dateObject.toLocaleTimeString("es-MX")

                                                            return '<td> ' + humanDateFormat + ' <br>' + humanDateFormat2 + '</td>'

                                                        }
                                                    },
                                                    {
                                                        data: "admin_cfTime",
                                                        render: function(data) {
                                                            const unixTimestamp = data

                                                            const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                            const dateObject = new Date(milliseconds)

                                                            const humanDateFormat = dateObject.toLocaleDateString("es-MX")
                                                            const humanDateFormat2 = dateObject.toLocaleTimeString("es-MX")

                                                            return '<td> ' + humanDateFormat + ' <br>' + humanDateFormat2 + '</td>'

                                                        }
                                                    },
                                                ],
                                            });

                                            var element = document.getElementById("num");
                                            element.classList.remove("bg-dangerlight2");

                                        }
                                    })
                                    .fail(function(err) {
                                        // console.log(err);
                                        Swal.fire({
                                            icon: "error",
                                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                            showConfirmButton: false,
                                        });


                                        $('#table_withdraw').DataTable({
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




                            function from_user_edit(id) {

                                $.ajax({
                                        url: "<?php echo base_url('report_player/user_id') ?>/" + id,
                                        type: "GET",
                                        dataType: "JSON",
                                    })
                                    .done(function(body) {
                                        const res = JSON.parse(body);
                                        // console.log(res);

                                        if (res.code == 0) {
                                            Swal.fire({
                                                icon: "error",
                                                title: res.msg,
                                                showConfirmButton: false,
                                            });

                                        } else if (res.code == 1) {

                                            $('#EditModal').modal('show');
                                            $('#user_id').val(id);
                                            $('#fullName').val(res.userData.name);
                                            $('#account').val(res.userbankData.account);
                                            $('#bankId').val(res.userbankData.bank_id);
                                            $('#oldbankId').val(res.userbankData.bank_id);
                                            $('#getBonus').val(res.userData.isGetBonus);
                                            $('#lineId').val(res.userbankData.line_user_id);
                                            $('#username').val(res.userData.username);

                                            document.getElementById("Game").innerHTML = "";

                                            Object.keys(res.userData.lock_games).forEach(v => {

                                                if (res.userData.lock_games[v] == false) {
                                                    var T = "checked"
                                                } else {
                                                    var T = ""
                                                }

                                                document.getElementById('Game').insertAdjacentHTML(`beforeend`,
                                                    `
                                                    <div class="col-lg-3">
                                                    <input type="hidden" id="Game_lock${v}" name="Game_lock[]" value="${res.userData.lock_games[v]}">
                                                    <input type="hidden" id="Game_name" name="Game_name[]" value="${v}">
                                                    <label class="switch mb-2">
                                                    <input type="checkbox" onclick="checkbox('${v}')" id="Game_checkbox${v}" ${T}>
                                                    <span class="slider round"></span>
                                                    </label>
                                                    <label class="form-check-label" style="cursor:pointer;" for="Game_checkbox${v}">${v}</label>
                                                    </div>
                                                    `)


                                            })

                                        }
                                    })
                                    .fail(function(err) {
                                        // console.log(err);
                                        Swal.fire({
                                            icon: "error",
                                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        });




                                    });
                            }


                            function checkbox(name) {
                                var x = document.getElementById("Game_checkbox" + name).checked;
                                if (x == true) {
                                    document.getElementById("Game_lock" + name).value = "false";

                                } else if (x == false) {
                                    document.getElementById("Game_lock" + name).value = "true";

                                }
                            }

                            function user_edit() {

                                var input_name = document.getElementsByName('Game_name[]');
                                var v_name = '';
                                for (var i1 = 0; i1 < input_name.length; i1++) {
                                    if (i1 === 0) {
                                        v_name += input_name[i1].value;
                                    }
                                    v_name += "," + input_name[i1].value;
                                }
                                var input_lock = document.getElementsByName('Game_lock[]');
                                var v_lock = '';
                                for (var i2 = 0; i2 < input_lock.length; i2++) {
                                    if (i2 === 0) {
                                        v_lock += input_lock[i2].value;
                                    }
                                    v_lock += "," + input_lock[i2].value;
                                }

                                let names_split = v_name.split(',');
                                let values_split = v_lock.split(',');

                                var gameeeee = {};
                                names_split.forEach((value, index) => {
                                    if (values_split[index] === 'true') gameeeee[value] = true
                                    else gameeeee[value] = false;

                                })

                                // console.log(gameeeee);





                                var datauser = {
                                    [csrfName]: csrfHash, // adding csrf here
                                    user_id: $("#user_id").val(),
                                    fullName: $("#fullName").val(),
                                    account: $("#account").val(),
                                    bankId: $("#bankId").val(),
                                    getBonus: $("#getBonus").val(),
                                    lineId: $("#lineId").val(),
                                    username: $("#username").val(),
                                    oldbankId: $("#oldbankId").val(),
                                    lock_games: JSON.stringify(gameeeee),
                                };
                                $.ajax({
                                        url: '<?php echo base_url('report_player/user_edit') ?>',
                                        type: "POST",
                                        data: datauser,
                                        dataType: "JSON",
                                    })
                                    .done(function(body) {

                                        if (body.code == 1) {
                                            var usersData = JSON.parse(body.usersData);
                                            var num = parseInt(usersData.bankId)
                                            var z = body.bankId.indexOf(num);

                                            $('#ShowEditModal').modal('show');
                                            $('#EditModal').modal('hide');

                                            document.getElementById("S_fullName").innerHTML = usersData.fullName;
                                            document.getElementById("S_account").innerHTML = usersData.account;
                                            document.getElementById("S_bankId").innerHTML = body.bankName[z];
                                            document.getElementById("S_lineId").innerHTML = usersData.lineId;
                                            document.getElementById("S_username").innerHTML = usersData.username;

                                            if (usersData.getBonus = "1") {
                                                document.getElementById("S_getBonus").innerHTML = "รับโบนัส";

                                            } else if (usersData.getBonus = "0") {
                                                document.getElementById("S_getBonus").innerHTML = "ไม่รับโบนัส";
                                            }

                                        } else if (body.code == undefined) {
                                            var err = JSON.parse(body);
                                            Swal.fire({
                                                icon: "error",
                                                title: err.msg,
                                                showConfirmButton: false,
                                            });

                                        }
                                    })
                                    .fail(function(err) {
                                        // console.log(err);
                                        Swal.fire({
                                            icon: "error",
                                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        });
                                    });
                            }


                            async function resetPass(id) {
                                let dialog = await dialog_confirm('คุณต้องการ Reset Password ใช่หรือไม่ !!');
                                if (dialog === false) {
                                    //stop processing
                                    return;
                                }
                                $.ajax({
                                        url: "<?php echo base_url('report_player/resetPass') ?>/" + id,
                                        type: "GET",
                                        dataType: "JSON",
                                    })
                                    .done(function(body) {
                                        const res = JSON.parse(body);
                                        console.log(body);
                                        $('#resetPassModal').modal('show');
                                        document.getElementById("resetPass_password").innerHTML = res.password;
                                    })
                                    .fail(function(err) {
                                        // console.log(err);
                                        Swal.fire({
                                            icon: "error",
                                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        });
                                    });
                            }

                            async function dialog_confirm(msg) {
                                try {
                                    let data = await Swal.fire({
                                        title: 'Are you sure?',
                                        text: msg,
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'ยืนยัน',
                                        cancelButtonText: 'ยกเลิก'
                                    })
                                    return data.isConfirmed;
                                } catch (err) {
                                    console.log(err);
                                    return false
                                }
                            }
                        </script>




                        <?php $this->endSection(); ?>