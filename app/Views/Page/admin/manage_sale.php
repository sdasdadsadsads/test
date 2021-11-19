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


            <div class="row">
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                                                <input type="text" id="edit_name" class="form-control" name="name" placeholder="ชื่อ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">เบอร์โทรศัพท์</label>
                                                <input type="number" id="edit_tel" class="form-control" name="tel" placeholder="Tel">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">Username</label>
                                                <input type="text" name="username" placeholder="Username" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">รหัสผ่าน</label>
                                                <input type="text" id="inputSuccess5" name="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        <?php if (isset($MENU_CLASS_ADMIN) && isset($PERMISSION_CLASS_ADMIN)) : ?>
                                            const MENU_CLASS_ADMIN = <?php echo json_encode($MENU_CLASS_ADMIN); ?>;
                                            const PERMISSION_CLASS_ADMIN = <?php echo json_encode($PERMISSION_CLASS_ADMIN); ?>;
                                        <?php endif; ?>
                                    </script>
                                    <?php
                                    ?>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" onClick="cre_admin()" class="btn btn-success waves-effect" type="button">บันทึก</button>
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
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">รอบทำงาน</label>
                                                <?php if (isset($rounds)) { ?>
                                                    <select id="rounds2" name="rounds" class="form-select">
                                                        <?php foreach ($rounds as $r => $re) { ?>
                                                            <option value="<?php echo $re['id']; ?>"><?php echo $re['rounds_desc'] . ' ' . $re['time_start'] . '-' . $re['time_end']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php    } else { ?>
                                                    <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">office</label>
                                                <?php if (isset($office)) { ?>
                                                    <select id="office2" name="office" class="form-select">
                                                        <?php foreach ($office as $offices) { ?>
                                                            <option value="<?php echo $offices['id']; ?>"><?php echo $offices['office_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php    } else { ?>
                                                    <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                                <?php } ?>
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
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="addManage">
                                            <div class="row">
                                                <?php if (isset($menu)) { ?>
                                                    <?php
                                                    foreach ($menu as $me) : ?>
                                                        <div class="col-md-6" id="container-menu-<?php echo $me['id']; ?>-update">
                                                            <div class="card mb-0">
                                                                <div class="card-header" id="heading1">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset collapsed d-block">
                                                                            <div class="form-check mb-2 form-check-blue">
                                                                                <input class="form-check-input mt-1" style="cursor: pointer;" type="checkbox" name="menu[]" <?= $me['id'] == 0 ? 'hidden=""' : '' ?> id="permis_menu<?= $me['id'] ?>" value="<?= $me['id'] ?>" onChange="permis_menuChange('permis_menu<?= $me['id'] ?>')">
                                                                                <label class="form-check-label mt-1" style="cursor: pointer;" for="permis_menu<?= $me['id'] ?>">&nbsp; <?= $me['nameTH'] ?></label>
                                                                            </div>
                                                                        </a>
                                                                    </h5>
                                                                </div>

                                                                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-bs-parent="#custom-accordion-one">

                                                                    <div class="card-body">
                                                                        <?php
                                                                        foreach ($permissions as $key => $value) :
                                                                            if ($value['menu_id'] == $me['id']) :
                                                                        ?>
                                                                                <div class="form-check mb-2 form-check-info" id="container-permission-<?php echo $value['id']; ?>-update">
                                                                                    <input class="form-check-input permis_menu<?= $me['id'] ?>" style="cursor:pointer;" type="checkbox" name="permissions[]" id="permis_<?= $value['id'] ?>" value="<?= $value['id'] ?>">
                                                                                    <label class="form-check-label" style="cursor:pointer;" for="permis_<?= $value['id'] ?>"><?= $value['nameTH'] ?></label>
                                                                                </div>

                                                                        <?php
                                                                            endif;
                                                                        endforeach;
                                                                        ?>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                <?php    } else { ?>
                                                    <h3 class="text-danger">กรุณากดรีเซ็ตใหม่</h3>
                                                <?php } ?>
                                            </div>

                                        </div>

                                    </div>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="field-2" class="form-label">รอบงาน</label>
                                                <?php if (isset($rounds)) { ?>
                                                    <select id="edit_rounds" name="edit_rounds" class="form-select">
                                                        <?php foreach ($rounds as $r => $re) { ?>
                                                            <option id="<?php echo $re['id']; ?>" name="rounds" value="<?php echo $re['id']; ?>"><?php echo $re['rounds_desc'] . ' ' . $re['time_start'] . '-' . $re['time_end']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php    } else { ?>
                                                    <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

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


                    <?php $this->endSection(); ?>