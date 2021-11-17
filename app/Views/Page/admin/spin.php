<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>


<style>
    table tr {
        text-align: center;
        vertical-align: middle;
    }

    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
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
        background-color: #f1556c;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #f1556c;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">จัดการระบบวงล้อ</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-6 col-md-12 col-lg-12">
                                        <label class="form-label mb-2">เปิด / ปิดระบบวงล้อ</label><br>
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round "></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>



            <div class="row">
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">ตั้งค่า วงล้อเสี่ยงโชค</h4>
                            <hr>
                            <button class="btn btn-blue waves-effect waves-outline mb-2" data-bs-toggle="modal" data-bs-target="#editSpin">
                                <i class="mdi mdi-pencil"></i> แก้ไข</button>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mb-0 p-0 m-0">
                                            <thead class="table-info">
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อ</th>
                                                    <th>รูปภาพ</th>
                                                    <th>คะแนน</th>
                                                    <th>จำนวนรางวัล</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>ได้รับ 13000 พอยท์</td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>/assets/images/spin/13000.png" alt="" width="90">
                                                    </td>
                                                    <td>13000</td>
                                                    <td>1</td>
                                                    <td>
                                                        <i data-feather="check" class="icon-dual-success"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>ได้รับ 3000 พอยท์</td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>/assets/images/spin/3000.png" alt="" width="90">
                                                    </td>
                                                    <td>3000</td>
                                                    <td>6</td>
                                                    <td>
                                                        <i data-feather="check" class="icon-dual-success"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>ได้รับ 1000 พอยท์</td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>/assets/images/spin/1000.png" alt="" width="90">
                                                    </td>
                                                    <td>1000</td>
                                                    <td>10</td>
                                                    <td>
                                                        <i data-feather="check" class="icon-dual-success"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>ได้รับ 500 พอยท์</td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>/assets/images/spin/500.png" alt="" width="90">
                                                    </td>
                                                    <td>500</td>
                                                    <td>30</td>
                                                    <td>
                                                        <i data-feather="check" class="icon-dual-success"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>ได้รับ 300 พอยท์</td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>/assets/images/spin/300.png" alt="" width="90">
                                                    </td>
                                                    <td>300</td>
                                                    <td>700</td>
                                                    <td>
                                                        <i data-feather="check" class="icon-dual-success"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>ได้รับ 100 พอยท์</td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>/assets/images/spin/100.png" alt="" width="90">
                                                    </td>
                                                    <td>100</td>
                                                    <td>560</td>
                                                    <td>
                                                        <i data-feather="check" class="icon-dual-success"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>ได้รับ 0 พอยท์</td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>/assets/images/spin/0.png" alt="" width="90">
                                                    </td>
                                                    <td>0</td>
                                                    <td>249</td>
                                                    <td>
                                                        <i data-feather="check" class="icon-dual-success"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>ได้รับสปินใหม่ 1 ครั้ง</td>
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>/assets/images/spin/free.png" alt="" width="90">
                                                    </td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                    <td>
                                                        <i data-feather="check" class="icon-dual-success"></i>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div>

                            </div> <!-- end card -->
                        </div> <!-- end card body-->
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">จำนวนรางวัล</h4>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mb-0 p-0 m-0">
                                            <tbody>
                                                <tr>
                                                    <th style="text-align: left;">รางวัล 3000 จำนวน</th>
                                                    <td style="text-align: right;">1 ครั้ง</td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: left;">รางวัล 1000 จำนวน</th>
                                                    <td style="text-align: right;">4 ครั้ง</td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: left;">รางวัล 500 จำนวน</th>
                                                    <td style="text-align: right;">5 ครั้ง</td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: left;">รางวัล 300 จำนวน</th>
                                                    <td style="text-align: right;">21 ครั้ง</td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: left;">รางวัล 100 จำนวน</th>
                                                    <td style="text-align: right;">395 ครั้ง</td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: left;">รางวัล 0 จำนวน</th>
                                                    <td style="text-align: right;">144 ครั้ง</td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: left;">รางวัล 1 จำนวน</th>
                                                    <td style="text-align: right;">1 ครั้ง</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div>

                            </div> <!-- end card -->
                        </div> <!-- end card body-->
                    </div>
                </div>



            </div>

        </div> <!-- content -->
    </div>
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->





<!-- ==================================================================================================================== -->


<div class="col-xl-12">
    <div id="editSpin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">ตั้งค่า Spin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row justify-content-center">
                        <div class="col-2 m-0 p-0 justify-content-center">
                            <div class="mb-2">
                                1
                            </div>
                        </div>
                        <div class="col-5 m-0 p-0">
                            <div class="mb-2">
                                <img src="<?php echo base_url(); ?>/assets/images/spin/13000.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="col-3 m-0 p-0">
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <label for="field-1" class="form-label">ชื่อ</label>
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="field-1" class="form-label">คะแนน</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="field-1" class="form-label">จำนวนรางวัล</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-2 m-0 p-0 justify-content-center">
                            <div class="mb-2">
                                2
                            </div>
                        </div>
                        <div class="col-5 m-0 p-0">
                            <div class="mb-2">
                                <img src="<?php echo base_url(); ?>/assets/images/spin/3000.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="col-3 m-0 p-0">
                            <div class="row">
                                <div class="col mb-1">
                                    <label for="field-1" class="form-label">ชื่อ</label>
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="field-1" class="form-label">คะแนน</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="field-1" class="form-label">จำนวนรางวัล</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-2 m-0 p-0 justify-content-center">
                            <div class="mb-2">
                                3
                            </div>
                        </div>
                        <div class="col-5 m-0 p-0">
                            <div class="mb-2">
                                <img src="<?php echo base_url(); ?>/assets/images/spin/1000.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="col-3 m-0 p-0">
                            <div class="row">
                                <div class="col mb-1">
                                    <label for="field-1" class="form-label">ชื่อ</label>
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="field-1" class="form-label">คะแนน</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="field-1" class="form-label">จำนวนรางวัล</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-2 m-0 p-0 justify-content-center">
                            <div class="mb-2">
                                4
                            </div>
                        </div>
                        <div class="col-5 m-0 p-0">
                            <div class="mb-2">
                                <img src="<?php echo base_url(); ?>/assets/images/spin/500.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="col-3 m-0 p-0">
                            <div class="row">
                                <div class="col mb-1">
                                    <label for="field-1" class="form-label">ชื่อ</label>
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="field-1" class="form-label">คะแนน</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="field-1" class="form-label">จำนวนรางวัล</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-2 m-0 p-0 justify-content-center">
                            <div class="mb-2">
                                5
                            </div>
                        </div>
                        <div class="col-5 m-0 p-0">
                            <div class="mb-2">
                                <img src="<?php echo base_url(); ?>/assets/images/spin/300.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="col-3 m-0 p-0">
                            <div class="row">
                                <div class="col mb-1">
                                    <label for="field-1" class="form-label">ชื่อ</label>
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="field-1" class="form-label">คะแนน</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="field-1" class="form-label">จำนวนรางวัล</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-2 m-0 p-0 justify-content-center">
                            <div class="mb-2">
                                6
                            </div>
                        </div>
                        <div class="col-5 m-0 p-0">
                            <div class="mb-2">
                                <img src="<?php echo base_url(); ?>/assets/images/spin/100.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="col-3 m-0 p-0">
                            <div class="row">
                                <div class="col mb-1">
                                    <label for="field-1" class="form-label">ชื่อ</label>
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="field-1" class="form-label">คะแนน</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="field-1" class="form-label">จำนวนรางวัล</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-2 m-0 p-0 justify-content-center">
                            <div class="mb-2">
                                7
                            </div>
                        </div>
                        <div class="col-5 m-0 p-0">
                            <div class="mb-2">
                                <img src="<?php echo base_url(); ?>/assets/images/spin/0.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="col-3 m-0 p-0">
                            <div class="row">
                                <div class="col mb-1">
                                    <label for="field-1" class="form-label">ชื่อ</label>
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="field-1" class="form-label">คะแนน</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="field-1" class="form-label">จำนวนรางวัล</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-2 m-0 p-0 justify-content-center">
                            <div class="mb-2">
                                8
                            </div>
                        </div>
                        <div class="col-5 m-0 p-0">
                            <div class="mb-2">
                                <img src="<?php echo base_url(); ?>/assets/images/spin/free.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="col-3 m-0 p-0">
                            <div class="row">
                                <div class="col mb-1">
                                    <label for="field-1" class="form-label">ชื่อ</label>
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="field-1" class="form-label">คะแนน</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="field-1" class="form-label">จำนวนรางวัล</label>
                                    <input type="number" id="" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <div class="form-check form-check-danger mt-2" style="margin-right: 20px;">
                        <input type="checkbox" class="form-check-input" id="checkbox" style="cursor: pointer;">
                        <label for="checkbox" class="form-label" style="cursor: pointer;">ยืนยันการแก้ไข</label>
                    </div>
                    <button type="button" class="btn btn-success waves-effect" type="button">บันทึก</button>
                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">ปิด</button>
                </div>

            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>


<?php $this->endSection(); ?>