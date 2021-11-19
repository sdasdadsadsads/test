<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>



<style>
    table tr {
        text-align: center;
        font-size: 12px;
    }

    .card-body label {
        cursor: pointer;
    }
</style>


<?php
$session = session();
?>

<div class="content-page">
    <div class="content">


        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">จัดการเซลล์</h4>
                    </div>
                </div>
            </div>


            <div class="row" id='container-sale'>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-success waves-effect waves-light mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#m_creAdmin">
                                <span class="btn-label"><i class="mdi mdi-account-multiple-plus"></i></span>เพิ่มเซลล์
                            </button>


                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead class="bg-info text-light">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>Username</th>
                                        <th>ชื่อ</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>จำนวนสมาชิก</th>
                                        <th>เข้าใช้งาน ล่าสุด</th>
                                        <th>IP Address</th>
                                        <th>วัน/เดือน/ปี ที่สร้าง</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (isset($saleData)) : ?>
                                        <?php $step = 1; ?>
                                        <?php foreach ($saleData as $element) : ?>
                                            <tr>
                                                <th><?php echo $step; ?></th>
                                                <th><?php echo $element['username']; ?></th>
                                                <th><?php echo $element['fullName']; ?></th>
                                                <th><?php echo $element['tel_sale']; ?></th>
                                                <th><?php echo $element['num_of_users']; ?></th>
                                                <th><?php echo gmdate("d/m/Y  i:m:s", $element['last_login']); ?></th>
                                                <th><?php echo $element['last_ip']; ?></th>
                                                <th><?php echo gmdate("d/m/Y  i:m:s", $element['created_at']); ?></th>
                                                <th>-</th>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row" id="container-register" style="display: none;">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="tab-content b-0 mb-0 pt-0">
                                        <div class="tab-pane active" id="finish">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                        <h3 class="mt-0">สมัครสมาชิกสำเร็จ !</h3>
                                                        <hr>
                                                        <h4 class="w-80 mb-2 mx-auto">Username : <a id="username1" class="text-blue"></a></h4>
                                                        <h4 class="w-80 mb-2 mx-auto">Password : <a id="password1" class="text-blue"></a></h4>
                                                        <h4 class="w-80 mb-2 mx-auto">ชื่อ - สกุล : <a id="fullName1" class="text-blue"></a></h4>
                                                        <h4 class="w-80 mb-2 mx-auto">line Id : <a id="lineId1" class="text-blue"></a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>


            <div class="col-xl-12">
                <div id="m_creAdmin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title">เพิ่มเซลล์</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="form-label-left input_mask" id="form_creAdmin">
                                <?= csrf_field() ?>
                                <div class="modal-body p-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">ชื่อ</label>
                                                <input type="text" id="fullName" class="form-control" name="fullName" placeholder="ชื่อ">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">เบอร์โทรศัพท์</label>
                                                <input type="number" id="nun_tel" class="form-control" name="nun_tel" placeholder="Tel">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">Username</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id='username' name='username' placeholder="username" aria-label="username" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">.sale@12iwinr</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">รหัสผ่าน</label>
                                                <input type="text" id="password" name="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    ?>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" onclick="create_sale()" class="btn btn-success waves-effect" type="button">บันทึก</button>
                                <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">ปิด</button>
                            </div>

                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
            </div>


            <div class="col-xl-12">
                <div id="m_editAdmin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title">แก้ไขพนักงาน</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="form-label-left input_mask" id="form_editAdmin">
                                <?= csrf_field() ?>
                                <input type="hidden" value="" name="id" id="edit_admin_id">
                                <div class="modal-body p-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">ชื่อ</label>
                                                <input type="text" id="name2" class="form-control" name="name" placeholder="ชื่อ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">เบอร์โทรศัพท์</label>
                                                <input type="number" id="tel2" class="form-control" name="tel" placeholder="Tel">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">Username</label>
                                                <input type="text" id="username2" name="username" placeholder="Username" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" onClick="edit_admin()" class="btn btn-success waves-effect" type="button">บันทึก</button>
                                <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">ปิด</button>
                            </div>

                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
            </div>




            <div class="col-xl-12">
                <div id="m_edit_permissions" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title">แก้ไขสิทธิ์</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">

                                <ul class="nav nav-tabs nav-bordered">
                                    <li class="nav-item">
                                        <a href="#addManage" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                            สิทธิ์การเข้าถึง
                                        </a>
                                    </li>
                                </ul>
                                <form action="" id="f_edit_permissions">
                                    <?= csrf_field() ?>
                                    <input type="hidden" value="" name="admin_id" id="edit_permissions_admin_id">
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" onClick="edit_permissions()" class="btn btn-success waves-effect">บันทึก</button>
                                <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">ปิด</button>
                            </div>

                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
            </div>






            <!-- ====================================================================================================== -->
            <div class="col-xl-12">
                <div id="m_edit_rounds" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title">แก้ไขรอบงาน</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form action="" id="form_rounds">
                                    <?= csrf_field() ?>
                                    <input type="hidden" value="" name="admin_id" id="edit_rounds_amdin_id">
                                    <!-- <input type="hidden" value="" name="rounds_amdin_id" id="rounds_amdin_id"> -->
                                </form>
                                <div class="modal-footer">
                                    <button type="button" onClick="edit_round()" class="btn btn-success waves-effect">บันทึก</button>
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                                </div>
                            </div>
                        </div> <!-- container -->
                    </div> <!-- content -->
                </div>





                <!-- ====================================================================================================== -->
                <div class="col-xl-12">
                    <div id="m_editPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h4 class="modal-title">เปลี่ยนรหัสผ่าน</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">


                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="field-2" class="form-label">แก้ไขรหัสผ่าน</label>
                                                <form class="form-label-left input_mask" id="form_editPass">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="admin_id" id="edit_adminId">
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control" type="text" placeholder="Password" required="required" name="password" id="val_editPass">
                                                        <div class="input-group-text">
                                                            <i class="icon-key"></i>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="modal-footer">
                                        <button onClick="edit_pass()" class="btn btn-success waves-effect waves-light" type="button">บันทึก</button>
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                                    </div>

                                </div>
                            </div> <!-- container -->
                        </div> <!-- content -->
                    </div>

                    <script>
                        function dialogbox_warning(msg) {
                            Swal.fire({
                                icon: "warning",
                                title: msg,
                                showConfirmButton: false,
                            });
                        }

                        function dialogbox_error(msg) {
                            Swal.fire({
                                icon: "error",
                                title: msg,
                                showConfirmButton: false,
                            });
                        }

                        function create_sale() {
                            let username = document.getElementById('username').value;
                            let password = document.getElementById('password').value;
                            let fullName = document.getElementById('fullName').value;
                            let nun_tel = document.getElementById('nun_tel').value;


                            if (username == '') {
                                dialogbox_warning('username ห้ามว่าง')
                            }
                            if (password == '') {
                                dialogbox_warning('password ห้ามว่าง')
                            }
                            if (fullName == '') {
                                dialogbox_warning('ชื่อ ห้ามว่าง')
                            }
                            if (nun_tel == '') {
                                dialogbox_warning('เบอร์โทรศัพท์ ห้ามว่าง')
                            }

                            $.ajax({
                                    url: '<?php echo base_url('sale/registration') ?>',
                                    type: "POST",
                                    data: JSON.stringify({
                                        username: username,
                                        password: password,
                                        fullName: fullName,
                                        num_phone: nun_tel
                                    }),
                                    dataType: "JSON",
                                    enctype: 'multipart/form-data',
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                })
                                .done(function(re) {
                                    console.log(re);
                                    // const res = JSON.parse(re);
                                    // if (res.code == 1) {
                                    //     dialogbox_success(res.msg);
                                    //     window.setTimeout(function() {
                                    //         location.reload()
                                    //     }, 500)
                                    // } else {
                                    //     dialogbox_error(res.msg);
                                    // }
                                })
                                .fail(function(err) {
                                    console.log(err);
                                    dialogbox_error('เกิดข้อผิดพลาดในการส่งข้อมูล');
                                });
                        }
                    </script>

                    <?php $this->endSection(); ?>