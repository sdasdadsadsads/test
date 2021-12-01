<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>


<style>
    table tr {
        text-align: center;
        font-size: 14px;
        vertical-align: middle;
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
        background-color: #009933;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #009933;
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
<!-- ============================================================= -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<!--! register form-->
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">รายชื่อมิจฉาชีพ</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class=" mt-1 col-12 col-md-5 col-lg-3">
                                            <button type="button" onclick="clearData()" class="btn btn-success waves-effect waves-light mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#addPromotion">
                                                <span class="btn-label"><i class="mdi mdi-plus-thick"></i></span>เพิ่ม มิจฉาชีพ
                                            </button>
                                        </div>

                                    </div>


                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อ</th>
                                                <th>ธนาคาร</th>
                                                <th>เลขที่บัญชี</th>
                                                <th>หมายเหตุ</th>
                                            </tr>
                                        </thead>


                                    </table>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>



                </div>
            </div> <!-- container -->

        </div> <!-- content -->

    </div>
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


<!-- ============================================================================================================================================= -->

<div class="col-xl-12">
    <div id="addandeditturnoffusersystem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="details"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 ">

                    <form id="form_takeoffusersystemt" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="is_run_auto" id="is_run_auto">
                        <input type="hidden" name="status" id="status">
                        <input type="hidden" name="take_off_image" id="take_off_image">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">ชื่อมิจฉาชีพ</label>
                                    <input type="text" name="take_off_name" id="take_off_name" class="form-control" placeholder="ชื่อมิจฉาชีพ">
                                </div>
                            </div>

                            <div class="col-md-6" id='take_off_day_none'>
                                <label for="" class="form-label">ธนาคาร (ตามสมุดบัญชี)<span class="text-danger"> *</span></label>
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

                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">เลขที่บัญชี</label>
                                    <input type="text" name="take_off_name" id="take_off_name" class="form-control" placeholder="ชื่อโปรโมชั่น">
                                </div>
                            </div>


                        </div>



                    </form>





                    <div class="modal-footer">
                        <button class="btn btn-success waves-effect waves-light" onclick="add()">บันทึก</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
</div>

<script>
    function clearData() {

        $('#addandeditturnoffusersystem').modal('show');
        document.getElementById("details").innerHTML = "เพิ่ม รายชื่อมิจฉาชีพ"
    }
</script>

<?php $this->endSection(); ?>