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
                                                <th>ผู้เพิ่ม</th>
                                                <th>เวลา</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($BlacklistData)) : ?>
                                                <?php   $i = 1; foreach ($BlacklistData as $BlacklistDatas) : ?>

                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?php echo $BlacklistDatas['blacklist_name']; ?></td>
                                                        <td class="p-0 m-0"> <img src="<?php echo base_url() ?>/assets/images/Bank_show/<?=$BlacklistDatas['bank_short']?>.png"  alt="user-image" class="me-1 mt-1"> <br> <p class="mt-2 text-blue"><?=$BlacklistDatas['bank_short']?></p></td>
                                                        <td><?php echo $BlacklistDatas['account']; ?></td>
                                                        <td><?php echo $BlacklistDatas['note']; ?></td>
                                                        <td><?php echo $BlacklistDatas['username']; ?></td>
                                                        <td><?php echo date('d/m/Y H:i:s', $BlacklistDatas['created_at']); ?></td>
                                                    </tr>

                                                <?php $i++; endforeach; ?>
                                            <?php endif; ?>




                                        </tbody>

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
    <div id="addBlacklistt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="details"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 ">

                    <form id="form_Blacklistt" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">ชื่อมิจฉาชีพ</label>
                                    <input type="text" name="blacklist_name" id="blacklist_name" class="form-control" placeholder="ชื่อมิจฉาชีพ">
                                </div>
                            </div>

                            <div class="col-md-6" id='take_off_day_none'>
                                <label for="" class="form-label">ธนาคาร (ตามสมุดบัญชี)<span class="text-danger"> *</span></label>
                                <?php if (isset($bankCategory)) { ?>
                                    <select id="bank_id" name="bank_id" class="form-select">
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
                                    <input type="text" name="account" id="account" class="form-control" placeholder="ชื่อโปรโมชั่น">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">หมายเหตุ</label>
                                    <textarea class="form-control" name="note" id="note" id="exampleFormControlTextarea1" rows="3"></textarea>
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

        $('#addBlacklistt').modal('show');
        document.getElementById("details").innerHTML = "เพิ่ม รายชื่อมิจฉาชีพ"
    }


    function add() {
        var formData = new FormData($('#form_Blacklistt')[0]);
        $.ajax({
                url: '<?php echo base_url('blacklist/add_blacklist') ?>',
                type: "POST",
                data: formData,
                dataType: "JSON",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
            })
            .done(function(re) {

                const res = JSON.parse(re);

                if (res.code == 1) {
                    Swal.fire({
                        icon: "success",
                        title: res.msg,
                        showConfirmButton: false,
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 500)
                } else {
                    Swal.fire({
                        icon: "error",
                        title: res.msg,
                        showConfirmButton: false,
                    });
                }

            })
            .fail(function(err) {
                Swal.fire({
                    icon: "error",
                    title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                    showConfirmButton: false,
                });
            });
    }

</script>

<?php $this->endSection(); ?>