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
                        <h4 class="page-title">เปิด - ปิด หน้าลูกค้า</h4>
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
                                                <span class="btn-label"><i class="mdi mdi-plus-thick"></i></span>เพิ่ม แจ้งเตือน
                                            </button>
                                        </div>

                                    </div>


                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th>ชื่อ แจ้งเตือน</th>
                                                <th>ทำงานอัตโนมัติ</th>
                                                <th>วันที่ (อัตโนมัติ)</th>
                                                <th>เวลาเริ่มต้น (อัตโนมัติ)</th>
                                                <th>เวลาสิ้นสุด (อัตโนมัติ)</th>
                                                <th>วันที่อัพเดท</th>
                                                <th>วันที่สร้าง</th>
                                                <th>สร้างโดย</th>
                                                <th>สถาน ใช้งาน</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if (isset($takeoffusersystemtData)) : ?>
                                                <?php foreach ($takeoffusersystemtData as $takeoffusersystemtDatas) : ?>

                                                    <tr>
                                                        <td>
                                                            <img src="<?php echo base_url(); ?>/assets/images/take_off_user_system/<?php echo $takeoffusersystemtDatas['take_off_image']; ?>" alt="user-image" height="140" width="140" style="object-fit: cover;">
                                                        </td>

                                                        <td><?php echo $takeoffusersystemtDatas['take_off_name']; ?></td>
                                                        <?php if ($takeoffusersystemtDatas['is_run_auto'] === "auto") { ?>
                                                            <td>
                                                                <h3><span class="badge bg-success text-white">เปิด</span></h3>
                                                            </td>
                                                        <?php } else if ($takeoffusersystemtDatas['is_run_auto'] === "no") { ?>
                                                            <td>
                                                                <h3><span class="badge bg-danger text-white">ปิด</span></h3>
                                                            </td>
                                                        <?php } ?>

                                                        <?php if (isset($takeoffusersystemtDatas['take_off_day'])) { ?>
                                                            <td>
                                                                <?php echo $takeoffusersystemtDatas['take_off_day']; ?>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                -
                                                            </td>
                                                        <?php } ?>

                                                        <?php if (isset($takeoffusersystemtDatas['start_time'])) { ?>
                                                            <td>
                                                                <?php echo $takeoffusersystemtDatas['start_time']; ?>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                -
                                                            </td>
                                                        <?php } ?>

                                                        <?php if (isset($takeoffusersystemtDatas['end_time'])) { ?>
                                                            <td>
                                                                <?php echo $takeoffusersystemtDatas['end_time']; ?>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                -
                                                            </td>
                                                        <?php } ?>
                                                        <td><?php echo date('d/m/Y H:i:s', $takeoffusersystemtDatas['update_at']); ?></td>
                                                        <td><?php echo date('d/m/Y H:i:s', $takeoffusersystemtDatas['create_at']); ?></td>
                                                        <td><?php echo $takeoffusersystemtDatas['username']; ?></td>

                                                        <?php if ($takeoffusersystemtDatas['status'] === "open") { ?>
                                                            <td>
                                                                <h3><span class="badge bg-success text-white">เปิด</span></h3>
                                                            </td>
                                                        <?php } else if ($takeoffusersystemtDatas['status'] === "close") { ?>
                                                            <td>
                                                                <h3><span class="badge bg-danger text-white">ปิด</span></h3>
                                                            </td>
                                                        <?php } ?>

                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light" onClick="open_modal_edit('<?php echo array_search($takeoffusersystemtDatas['id'], array_column($takeoffusersystemtData, 'id')); ?>')"><i class="mdi mdi-file-document-edit-outline"></i></button>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>
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
                                    <label for="field-1" class="form-label">ชื่อ แจ้งเตือน</label>
                                    <input type="text" name="take_off_name" id="take_off_name" class="form-control" placeholder="ชื่อแจ้งเตือน">
                                    <br>
                                    <label class="form-label mb-2">ทำงานอัตโนมัติ
                                    </label><br>
                                    <label class="switch mb-2">
                                        <input type="checkbox" id="myauto" onclick="turnoffusersystemauto()" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">อัพโหลดรูป</label>
                                    <input type="file" name="image" id="image" data-plugins="dropify" data-default-file="" />
                                </div>
                            </div>




                            <div class="col-md-6" id='take_off_day_none'>
                                <label class="form-label">วันเริ่มปิดระบบ (ทำงานอัตโนมัติ)</label>
                                <select id="take_off_day" name="take_off_day" class="form-select">
                                    <option value="" selected>กรุณาเลือก</option>
                                    <option value="Sunday">วันอาทิตย์</option>
                                    <option value="Monday">วันจันทร์</option>
                                    <option value="Tuesday">วันอังคาร</option>
                                    <option value="Wednesday">วันพุธ</option>
                                    <option value="Thursday">วันพฤหัสบดี</option>
                                    <option value="Friday">วันศุกร์</option>
                                    <option value="Saturday">วันเสาร์</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6" id='startTime_none'>
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">เวลาเริ่มต้น (ทำงานอัตโนมัติ)</label>
                                        <input type="text" name="start_time" id="start_time" class="24hours-timepicker form-control" placeholder="เวลาเริ่มต้น">

                                    </div>
                                </div>

                                <div class="col-md-6" id='endTime_none'>
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">เวลาสิ้นสุด (ทำงานอัตโนมัติ)</label>
                                        <input type="text" name="end_time" id="end_time" class="24hours-timepicker form-control" placeholder="เวลาสิ้นสุด">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label mb-2">เปิด - ปิด ใช้งาน
                                    </label><br>
                                    <label class="switch mb-2">
                                        <input type="checkbox" id="mystatus" onclick="turnoffusersystemStatus()" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>



                        </div>



                    </form>





                    <div class="modal-footer" id='C'>
                        <button class="btn btn-success waves-effect waves-light" onclick="add()">บันทึก</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                    </div>

                    <div class="modal-footer" id='E'>
                        <button class="btn btn-success waves-effect waves-light" onclick="edit()">บันทึก</button>
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
        document.getElementById("id").value = "";
        document.getElementById("take_off_name").value = "";
        document.getElementById("is_run_auto").value = "no";
        document.getElementById('myauto').checked = false;
        document.getElementById("status").value = "close";
        document.getElementById('mystatus').checked = false;

        document.getElementById("start_time").value = "";
        document.getElementById("end_time").value = "";
        document.getElementById("take_off_day").value = null;


        var drEvent = $('#image').dropify({
            efaultFile: null
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = null;
        drEvent.destroy();
        drEvent.init();

        document.getElementById('startTime_none').style.display = 'none';
        document.getElementById('endTime_none').style.display = 'none';
        document.getElementById('take_off_day_none').style.display = 'none';

        document.getElementById('C').style.display = '';
        document.getElementById('E').style.display = 'none';

        document.getElementById("details").innerHTML = "เพิ่ม แจ้งเตือน"
    }


    function open_modal_edit(id) {

        $('#addandeditturnoffusersystem').modal('show');
        document.getElementById("details").innerHTML = "แก้ไข Broadcast"



        var parsed = parseInt(id);
        var promo = <?php echo json_encode($takeoffusersystemtData); ?>;

        var drEvent = $('#image').dropify({
            efaultFile: "<?php echo base_url(); ?>/assets/images/take_off_user_system/" + promo[parsed]['take_off_image']
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = "<?php echo base_url(); ?>/assets/images/take_off_user_system/" + promo[parsed]['take_off_image'];
        drEvent.destroy();
        drEvent.init();

        document.getElementById("take_off_name").value = promo[parsed]['take_off_name'];
        document.getElementById("start_time").value = promo[parsed]['start_time'];
        document.getElementById("end_time").value = promo[parsed]['end_time'];
        document.getElementById("take_off_day").value = promo[parsed]['take_off_day'];
        document.getElementById("is_run_auto").value = promo[parsed]['is_run_auto'];
        document.getElementById("take_off_image").value = promo[parsed]['take_off_image'];
        document.getElementById("status").value = promo[parsed]['status'];
        document.getElementById("id").value = promo[parsed]['id'];

        document.getElementById('C').style.display = 'none';
        document.getElementById('E').style.display = '';

        if (promo[parsed]['is_run_auto'] == "auto") {
            document.getElementById('myauto').checked = true;
            document.getElementById('startTime_none').style.display = '';
            document.getElementById('endTime_none').style.display = '';
            document.getElementById('take_off_day_none').style.display = '';
        } else if (promo[parsed]['is_run_auto'] == "no") {
            document.getElementById('myauto').checked = false;
            document.getElementById('startTime_none').style.display = 'none';
            document.getElementById('endTime_none').style.display = 'none';
            document.getElementById('take_off_day_none').style.display = 'none';
        }


        if (promo[parsed]['status'] == "open") {
            document.getElementById('mystatus').checked = true;
        } else if (promo[parsed]['status'] == "close") {
            document.getElementById('mystatus').checked = false;
        }

    }

    function turnoffusersystemauto() {
        var x = document.getElementById("myauto").checked;

        if (x == true) {
            document.getElementById('startTime_none').style.display = '';
            document.getElementById('endTime_none').style.display = '';
            document.getElementById('take_off_day_none').style.display = '';
            document.getElementById("is_run_auto").value = "auto";
        } else if (x == false) {
            document.getElementById('startTime_none').style.display = 'none';
            document.getElementById('endTime_none').style.display = 'none';
            document.getElementById('take_off_day_none').style.display = 'none';
            document.getElementById("is_run_auto").value = "no";

            document.getElementById("start_time").value = null;
            document.getElementById("end_time").value = null;
            document.getElementById("take_off_day").value = null;
        }

    }


    function turnoffusersystemStatus() {
        var x = document.getElementById("mystatus").checked;

        if (x == true) {
            document.getElementById("status").value = "open";

        } else if (x == false) {
            document.getElementById("status").value = "close";


        }

    }


    function add() {
        var formData = new FormData($('#form_takeoffusersystemt')[0]);
        $.ajax({
                url: '<?php echo base_url('turn_off_usersystem/add_turn_off_usersystem') ?>',
                type: "POST",
                data: formData,
                dataType: "JSON",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
            })
            .done(function(re) {

                // console.log(re);
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


    function edit() {
        var formData = new FormData($('#form_takeoffusersystemt')[0]);
        $.ajax({
                url: '<?php echo base_url('turn_off_usersystem/edit_turn_off_usersystem') ?>',
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