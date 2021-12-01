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
                        <h4 class="page-title">Broadcast</h4>
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
                                                <span class="btn-label"><i class="mdi mdi-plus-thick"></i></span>เพิ่ม Broadcast
                                            </button>
                                        </div>

                                    </div>


                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th>ชื่อ Broadcast</th>
                                                <th>ผู้เพิ่ม Broadcast</th>
                                                <th>วันที่สร้าง</th>
                                                <th>วันที่อัพเดท</th>
                                                <th>สถานะ</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($BroadcastData)) : ?>
                                                <?php foreach ($BroadcastData as $Broadcasts) : ?>

                                                    <tr>
                                                        <td>
                                                            <img src="<?php echo base_url(); ?>/assets/images/broadcast/<?php echo $Broadcasts['broadcast_img']; ?>" alt="user-image" height="140" width="140" style="object-fit: cover;">
                                                        </td>
                                                        <td><?php echo $Broadcasts['broadcast_name']; ?></td>
                                                        <td><?php echo $Broadcasts['username']; ?></td>
                                                        <td><?php echo date('d/m/Y H:i:s', $Broadcasts['created_at']); ?></td>
                                                        <td><?php echo date('d/m/Y H:i:s', $Broadcasts['update_at']); ?></td>
                                                        <?php if ($Broadcasts['status'] === 1) { ?>
                                                            <td>
                                                                <h3><span class="badge bg-success text-white">เปิดใช้งาน</span></h3>
                                                            </td>
                                                        <?php } else if ($Broadcasts['status'] === 0) { ?>
                                                            <td>
                                                                <h3><span class="badge bg-danger text-white">ปิดใช้งาน</span></h3>
                                                            </td>
                                                        <?php } ?>

                                                        <td>
                                                            <button type="button" class="btn btn-info waves-effect waves-light" onClick="open_modal_edit('<?php echo array_search($Broadcasts['id'], array_column($BroadcastData, 'id')); ?>')"><i class="mdi mdi-file-document-edit-outline"></i></button>
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
    <div id="addandeditbroadcast" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="details"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 ">

                    <form id="form_broadcasts" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="statuss" id="statuss">
                        <input type="hidden" name="broadcast_img" id="broadcast_img">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">ชื่อ Broadcast</label>
                                    <input type="text" name="Name" id="Name" class="form-control" placeholder="ชื่อโปรโมชั่น">
                                    <br>
                                    <label class="form-label mb-2">ปิด / เปิด การใช้งาน Broadcast
                                    </label><br>
                                    <label class="switch mb-2">
                                        <input type="checkbox" id="myCheckS" onclick="BroadcastStatus()" checked>
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

        $('#addandeditbroadcast').modal('show');
        document.getElementById("id").value = "";
        document.getElementById("Name").value = "";
        document.getElementById("statuss").value = 0;
        document.getElementById('myCheckS').checked = false;

        var drEvent = $('#image').dropify({
            efaultFile: null
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = null;
        drEvent.destroy();
        drEvent.init();

        document.getElementById('C').style.display = '';
        document.getElementById('E').style.display = 'none';

        document.getElementById("details").innerHTML = "เพิ่ม Broadcast"
    }

    function BroadcastStatus() {
        var x = document.getElementById("myCheckS").checked;

        if (x == true) {
            document.getElementById("statuss").value = 1;
        } else if (x == false) {
            document.getElementById("statuss").value = 0;
        }

    }

    function open_modal_edit(id) {

        $('#addandeditbroadcast').modal('show');

        document.getElementById("Name").value = "";
        document.getElementById("statuss").value = "";

        var drEvent = $('#image').dropify({
            efaultFile: null
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = null;
        drEvent.destroy();
        drEvent.init();

        var parsed = parseInt(id);
        var promo = <?php echo json_encode($BroadcastData); ?>;

        document.getElementById("Name").value = promo[parsed]['broadcast_name'];
        document.getElementById("id").value = promo[parsed]['id'];
        document.getElementById("broadcast_img").value = promo[parsed]['broadcast_img'];

        var drEvent = $('#image').dropify({
            efaultFile: "<?php echo base_url(); ?>/assets/images/broadcast/" + promo[parsed]['broadcast_img']
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = "<?php echo base_url(); ?>/assets/images/broadcast/" + promo[parsed]['broadcast_img'];
        drEvent.destroy();
        drEvent.init();

        document.getElementById("statuss").value = promo[parsed]['status'];

        if (promo[parsed]['status'] == 0) {
            document.getElementById('myCheckS').checked = false;
        } else if (promo[parsed]['status'] == 1) {
            document.getElementById('myCheckS').checked = true;
        }

        document.getElementById('C').style.display = 'none';
        document.getElementById('E').style.display = '';

        document.getElementById("details").innerHTML = "แก้ไข Broadcast"

    }

    function add() {
        var formData = new FormData($('#form_broadcasts')[0]);
        $.ajax({
                url: '<?php echo base_url('broadcast/add_broadcast') ?>',
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

    function edit() {
        var formData = new FormData($('#form_broadcasts')[0]);
        $.ajax({
                url: '<?php echo base_url('broadcast/edit_broadcast') ?>',
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