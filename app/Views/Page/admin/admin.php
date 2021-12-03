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
                        <h4 class="page-title">ข้อมูลพนักงาน</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-success waves-effect waves-light mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#m_creAdmin">
                                <span class="btn-label"><i class="mdi mdi-account-multiple-plus"></i></span>เพิ่มพนักงาน
                            </button>


                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead class="bg-info text-light">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>Username</th>
                                        <th>ชื่อ</th>
                                        <th>เข้าใช้งาน ล่าสุด</th>
                                        <th>IP Address</th>
                                        <th>ระดับผู้ใช้</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (isset($admin)) : ?>
                                        <?php $date = new DateTime(); ?>
                                        <?php  $i = 1; foreach ($admin as $admins) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?php echo $admins['username']; ?></td>
                                                <td><?php echo $admins['name']; ?></td>
                                                <td>
                                                    <?php
                                                    $date->setTimestamp($admins['last_login']);
                                                    if ($admins['last_login'] == 0) {
                                                        echo "-";
                                                    } else {
                                                        echo $date->format('d/m/Y H:i:s');
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($admins['last_ip'] == 0) {
                                                        echo "-";
                                                    } else {
                                                        echo $admins['last_ip'];
                                                    }
                                                    ?>
                                                <td><?= $admins['class'] == 1 ? 'Admin' : ($admins['class'] == 2 ? 'Manager' : 'Owner') ?></td>
                                                <td>
                                                    <button onClick="edit_permissions_get('<?= $admins['id'] ?>' , '<?= $admins['class'] ?>')" class="btn btn-warning btn-sm waves-effect" title="สิทธิ์"> สิทธิ์ </button>
                                                    <button onClick="edit_data_get('<?= $admins['id'] ?>')" class="btn btn-primary btn-sm waves-effect" title="แก้ไขข้อมูล"> แก้ไขข้อมูล </button>
                                                    <button onClick="reset2FT('<?= $admins['username'] ?>')" class="btn btn-info btn-sm waves-effect" title="reset2FT"> reset2FT </button>
                                                    <!-- <button onClick="edit_rounds_show('<?= $admins['id'] ?>')" class="btn btn-secondary btn-sm" title="แก้ไขรอบการทำงาน"> รอบงาน </button> -->
                                                    <button onClick="$('#m_editPass').modal('show');$('#edit_adminId').val('<?= $admins['id'] ?>');" class="btn btn-secondary waves-effect btn-sm" title="เปลี่ยนพาสเวิร์ด"><i class="fa fa-key"></i></button>
                                                    <?php if ($admins['status'] == 1) { ?>
                                                        <button onClick="edit_status('<?= $admins['id'] ?>')" class="btn btn-success btn-sm waves-effect" title="ปิด"><i class="fa fa-check"></i></button>
                                                    <?php } else if ($admins['status'] == 0) { ?>
                                                        <button onClick="edit_status('<?= $admins['id'] ?>')" class="btn btn-danger btn-sm waves-effect" title="เปิด"><i class="fas fa-window-close"></i></button>
                                                    <?php } ?>
                                                    <!-- <button onClick="delete_admin('<?= $admins['id'] ?>')" class="btn btn-danger btn-sm waves-effect" title="ลบ"><i class="fas fa-trash-alt"></i></button> -->
                                                </td>
                                            </tr>
                                        <?php $i++; }  ?>
                                    <?php endif; ?>

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
                                <h4 class="modal-title">เพิ่มพนักงาน</h4>
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
                                                <div class="input-group">
                                                    <input type="text" name="username" placeholder="Username" class="form-control" placeholder="Username">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">@12iwinr</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">รหัสผ่าน</label>
                                                <input type="text" id="inputSuccess5" name="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">รอบทำงาน</label>
                                                <?php if (isset($rounds)) { ?>
                                                    <select id="rounds" name="rounds" class="form-select">
                                                        <?php foreach ($rounds as $r => $re) { ?>
                                                            <option value="<?php echo $re['id']; ?>"><?php echo $re['rounds_desc'] . ' ' . $re['time_start'] . '-' . $re['time_end']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php    } else { ?>
                                                    <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">กลุ่ม</label>
                                                <?php if (isset($office)) { ?>
                                                    <select id="office" name="office" class="form-select">
                                                        <?php foreach ($office as $offices) { ?>
                                                            <option value="<?php echo $offices['id']; ?>"><?php echo $offices['office_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php    } else { ?>
                                                    <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-1" class="form-label">ระดับการใช้งาน</label>
                                                <select id="class" name="class" class="form-select" onchange="toggle_permission(this.value)">
                                                    <option value="1">Admin (พนักงานทั่วไป)</option>
                                                    <option value="2">Manager (ผู้จัดการ)</option>
                                                    <option value="3">Owner (ผู้บริหาร)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <ul class="nav nav-tabs nav-bordered">
                                        <li class="nav-item">
                                            <a href="#addManage" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                สิทธิ์การเข้าถึง
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="addManage">
                                            <div class="row">
                                                <?php if (isset($menu)) {
                                                    $MENU_CLASS_ADMIN = [];
                                                    $PERMISSION_CLASS_ADMIN = [];
                                                ?>
                                                    <?php
                                                    foreach ($menu as $me) : ?>
                                                        <div class="col-md-6" id="container-menu-<?php echo $me['id']; ?>">
                                                            <?php

                                                            if ($me['class'] == 2) { // ค้นหาเมนู admin
                                                                array_push($MENU_CLASS_ADMIN, "container-menu-" . $me['id'] . "");
                                                            }
                                                            ?>
                                                            <div class="card mb-0">
                                                                <div class="card-header" id="heading1">
                                                                    <h5 class="m-0 position-relative">
                                                                        <a class="custom-accordion-title text-reset collapsed d-block">
                                                                            <div class="form-check mb-2 form-check-blue">
                                                                                <input class="form-check-input mt-1 checkbox_selector" style="cursor:pointer;" type="checkbox" name="menu[]" onChange="permis_menuChange('<?= $me['nameEN'] . $me['id'] ?>')" id="<?= $me['nameEN'] . $me['id'] ?>" <?= $me['id'] == 0 ? 'hidden="" checked' : '' ?> value="<?= $me['id'] ?>" <?= $me['id'] == 0 ? 'checked ' : '' ?>>
                                                                                <label class="form-check-label mt-1" style="cursor:pointer;" for="<?= $me['nameEN'] . $me['id'] ?>">&nbsp; <?= $me['nameTH'] ?></label>
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
                                                                                <?php
                                                                                if ($value['class'] == 2) { // ค้นหาเมนู admin
                                                                                    array_push($PERMISSION_CLASS_ADMIN, "container-permission-" . $value['id'] . "");
                                                                                }
                                                                                ?>
                                                                                <div class="form-check mb-2 form-check-info" id="container-permission-<?php echo $value['id']; ?>">
                                                                                    <input class="form-check-input <?= $me['nameEN'] . $me['id'] ?>" style="cursor:pointer;" type="checkbox" name="permissions[]" id="<?= $value['nameEN'] . $value['id'] ?>" value="<?= $value['id'] ?>" <?= $value['id'] == 0 ? 'checked' : '' ?>>
                                                                                    <label class="form-check-label" style="cursor:pointer;" for="<?= $value['nameEN'] . $value['id'] ?>">&nbsp; <?= $value['nameTH'] ?></label>
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
                                <input type="hidden" value="" name="username" id="username3">
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
                                                <input type="text" id="username2"  class="form-control bg-light" placeholder="Username" disabled>
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
                                                <label for="field-1" class="form-label">กลุ่ม</label>
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




                    <script>
                        //มะพร้าว
                        function permis_menuChange(menu_id) {
                            if ($("#" + menu_id).prop('checked') == true) {
                                $('.' + menu_id).prop('checked', true);
                            } else {
                                $('.' + menu_id).prop('checked', false);
                            }


                        }

                        function edit_permissions_get(id, class_value) {
                            $.ajax({
                                    url: "<?php echo base_url('admin/permissions_get') ?>/" + id,
                                    type: "GET",
                                    dataType: "JSON",
                                }).done(function(body) {
                                    const res = JSON.parse(body);
                                    console.log(class_value);
                                    if (res.code == 0) {
                                        Swal.fire({
                                            icon: "error",
                                            title: res.msg,
                                            showConfirmButton: false,
                                        });
                                        window.setTimeout(function() {
                                            location.reload()
                                        }, 500)
                                    } else {
                                        const menu = JSON.parse(res.menu);
                                        const permissions = JSON.parse(res.permissions);
                                        $('#m_edit_permissions').modal('show');
                                        $('#edit_permissions_admin_id').val(id);
                                        $('.checkbox_permissions').prop('checked', false);

                                        if (res.menu != null) {
                                            var admin_menu = menu;
                                            var menu_count = admin_menu.length;
                                            for (var c = 0; c < menu_count; c++) {
                                                $('#permis_menu' + admin_menu[c]).prop('checked', true);
                                            }
                                        }
                                        if (res.permissions != null) {
                                            var admin_permis = permissions;
                                            var perm_count = admin_permis.length;
                                            for (var i = 0; i < perm_count; i++) {
                                                $('#permis_' + admin_permis[i]).prop('checked', true);
                                            }
                                        }
                                        toggle_update_permission(class_value);
                                    }

                                })
                                .fail(function() {
                                    Swal.fire({
                                        icon: "error",
                                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        showConfirmButton: false,
                                    });
                                    window.setTimeout(function() {
                                        location.reload()
                                    }, 500)
                                });
                        }


                        function edit_data_get(id) {
                            $.ajax({
                                    url: "<?php echo base_url('admin/permissionsdata_get') ?>/" + id,
                                    type: "GET",
                                    dataType: "JSON",
                                }).done(function(body) {
                                    const res = JSON.parse(body);
                                    console.log(res);

                                    if (res.code == 0) {
                                        Swal.fire({
                                            icon: "error",
                                            title: res.msg,
                                            showConfirmButton: false,
                                        });
                                        window.setTimeout(function() {
                                            location.reload()
                                        }, 500)
                                    } else {
                                        $('#m_editAdmin').modal('show');

                                        $('#edit_admin_id').val(id);
                                        $('#name2').val(res.data.name);
                                        $('#office2').val(res.data.office_id);
                                        $('#rounds2').val(res.data.rounds);
                                        $('#tel2').val(res.data.tel);
                                        $('#username2').val(res.data.username);
                                        $('#username3').val(res.data.username);
                                        // toggle_update_permission(res.data.class)
                                    }

                                })
                                .fail(function() {
                                    Swal.fire({
                                        icon: "error",
                                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        showConfirmButton: false,
                                    });
                                    window.setTimeout(function() {
                                        location.reload()
                                    }, 500)
                                });
                        }

                        function edit_permissions() {

                            $.ajax({
                                    url: '<?php echo base_url('admin/edit_permissions') ?>',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: $('#f_edit_permissions').serialize(),
                                }).done(function(re) {
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
                                        window.setTimeout(function() {
                                            location.reload()
                                        }, 500)
                                    }
                                })
                                .fail(function() {
                                    Swal.fire({
                                        icon: "error",
                                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        showConfirmButton: false,
                                    });
                                    window.setTimeout(function() {
                                        location.reload()
                                    }, 500)
                                });
                        }

                        function edit_admin() {

                            $.ajax({
                                    url: '<?php echo base_url('admin/edit_dataadmin') ?>',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: $('#form_editAdmin').serialize(),
                                }).done(function(re) {
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
                                        window.setTimeout(function() {
                                            location.reload()
                                        }, 500)
                                    }
                                })
                                .fail(function() {
                                    Swal.fire({
                                        icon: "error",
                                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        showConfirmButton: false,
                                    });
                                    window.setTimeout(function() {
                                        location.reload()
                                    }, 500)
                                });
                        }


                        function edit_pass() {
                            $.ajax({
                                    url: '<?php echo base_url('admin/edit_pass') ?>',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: $('#form_editPass').serialize(),
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
                                        window.setTimeout(function() {
                                            location.reload()
                                        }, 500)
                                    }
                                })
                                .fail(function() {
                                    Swal.fire({
                                        icon: "error",
                                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        showConfirmButton: false,
                                    });
                                    window.setTimeout(function() {
                                        location.reload()
                                    }, 500)
                                });
                        }


                        function edit_rounds_show(id) {

                            $('#m_edit_rounds').modal('show');
                            // $.ajax({
                            //     url: 'admin/get_rounds',
                            //     type: 'POST',
                            //     dataType: 'json',
                            //     data: {
                            //         id: id
                            //     },
                            // }).done(function(res) {
                            //     document.getElementById(res.rounds).selected = "true";

                            // })
                            $('#edit_rounds_amdin_id').val(id);


                        }


                        // function edit_round() {
                        //     $.ajax({
                        //             url: '<?php echo base_url('admin/edit_round') ?>',
                        //             type: 'POST',
                        //             dataType: 'json',
                        //             data: $('#form_rounds').serialize(),
                        //         })
                        //         .done(function(re) {
                        //             const res = JSON.parse(re);

                        //             if (res.code == 1) {
                        //                 Swal.fire({
                        //                     icon: "success",
                        //                     title: res.msg,
                        //                     showConfirmButton: false,
                        //                 });
                        //                 window.setTimeout(function() {
                        //                     location.reload()
                        //                 }, 500)
                        //             } else {
                        //                 Swal.fire({
                        //                     icon: "error",
                        //                     title: res.msg,
                        //                     showConfirmButton: false,
                        //                 });
                        //                 window.setTimeout(function() {
                        //                     location.reload()
                        //                 }, 500)
                        //             }
                        //         })
                        //         .fail(function() {
                        //             Swal.fire({
                        //                 icon: "error",
                        //                 title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                        //                 showConfirmButton: false,
                        //             });
                        //             window.setTimeout(function() {
                        //                 location.reload()
                        //             }, 500)
                        //         });

                        // }

                        function cre_admin() {
                            $.ajax({
                                    url: '<?php echo base_url('admin/create_admin') ?>',
                                    type: "POST",
                                    data: $('#form_creAdmin').serialize(),
                                    dataType: "JSON",
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
                                        window.setTimeout(function() {
                                            location.reload()
                                        }, 500)
                                    }
                                })
                                .fail(function() {
                                    Swal.fire({
                                        icon: "error",
                                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        showConfirmButton: false,
                                    });
                                    window.setTimeout(function() {
                                        location.reload()
                                    }, 500)
                                });

                        }



                        function delete_admin(id) {
                            Swal.fire({
                                title: 'คุณต้องการจะลบใช่ไหม?',
                                buttons: true,
                            }).then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                            url: "<?php echo base_url('admin/delete_admin') ?>/" + id,
                                            type: "GET",
                                            dataType: "JSON",
                                        }).done(function(re) {
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
                                                window.setTimeout(function() {
                                                    location.reload()
                                                }, 500)
                                            }
                                        })
                                        .fail(function() {
                                            Swal.fire({
                                                icon: "error",
                                                title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                                showConfirmButton: false,
                                            });
                                            window.setTimeout(function() {
                                                location.reload()
                                            }, 500)
                                        });
                                } else {

                                }

                            });
                        }

                        function delete_admin(id) {
                            Swal.fire({
                                title: 'คุณต้องการลบใช่ไหม?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่',
                                cancelButtonText: 'ยกเลิก'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                            url: "<?php echo base_url('admin/delete_admin') ?>/" + id,
                                            type: "GET",
                                            dataType: "JSON",
                                        }).done(function(re) {
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
                                                window.setTimeout(function() {
                                                    location.reload()
                                                }, 500)
                                            }
                                        })
                                        .fail(function() {
                                            Swal.fire({
                                                icon: "error",
                                                title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                                showConfirmButton: false,
                                            });
                                            window.setTimeout(function() {
                                                location.reload()
                                            }, 500)
                                        });
                                }
                            })
                        }



                        function edit_status(id) {
                            Swal.fire({
                                title: 'คุณต้องการเปลี่ยนสถานะใช่ไหม?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่',
                                cancelButtonText: 'ยกเลิก'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                            url: "<?php echo base_url('admin/edit_status') ?>/" + id,
                                            type: "GET",
                                            dataType: "JSON",
                                        }).done(function(re) {
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
                                                window.setTimeout(function() {
                                                    location.reload()
                                                }, 500)
                                            }
                                        })
                                        .fail(function() {
                                            Swal.fire({
                                                icon: "error",
                                                title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                                showConfirmButton: false,
                                            });
                                            window.setTimeout(function() {
                                                location.reload()
                                            }, 500)
                                        });
                                }
                            })
                        }

                        $('.checkbox_selector').change(function() {
                            var goroupp = $(this).data("role");
                            //alert(goroupp);
                            //$("input[name='"+goroupp+"']:checkbox").prop('checked', false);
                            var checkBoxes = $("input[name='" + goroupp + "']");
                            checkBoxes.prop("checked", !checkBoxes.prop("checked"));
                        });


                        // function CheckAll(id){

                        //   var selectAllItems = "#"+id;
                        //   var checkboxItem = ":checkbox";

                        //   $(selectAllItems).click(function() {

                        //     if (this.checked) {
                        //       $(checkboxItem).each(function() {
                        //         this.checked = true;
                        //       });
                        //     } else {
                        //       $(checkboxItem).each(function() {
                        //         this.checked = false;
                        //       });
                        //     }

                        //   })
                        //   }


                        async function reset2FT(username) {
                            var dialog = await dialog_confirm('คุณต้องการ reset2FT ใช่หรือไม่ !!');
                            if (dialog === false) {
                                //stop processing
                                return;
                            }
                            $.ajax({
                                    url: "<?php echo base_url('admin/reset2FT') ?>/" + username,
                                    type: "GET",
                                    dataType: "JSON",
                                }).done(function(body) {
                                    const res = JSON.parse(body);
                                    console.log(res);
                                    if (res.code == 0) {
                                        Swal.fire({
                                            icon: "error",
                                            title: res.msg,
                                            showConfirmButton: false,
                                        });
                                        window.setTimeout(function() {
                                            location.reload()
                                        }, 500)
                                    } else {
                                        if (res.status == true) {
                                            Swal.fire({
                                                icon: "success",
                                                title: "reset2FT สำเร็จ",
                                                showConfirmButton: false,
                                            });
                                            window.setTimeout(function() {
                                                location.reload()
                                            }, 500)
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                title: res.message,
                                                showConfirmButton: false,
                                            });
                                            window.setTimeout(function() {
                                                location.reload()
                                            }, 500)

                                        }

                                    }

                                })
                                .fail(function() {
                                    Swal.fire({
                                        icon: "error",
                                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                        showConfirmButton: false,
                                    });
                                    window.setTimeout(function() {
                                        location.reload()
                                    }, 500)
                                });
                        }


                        async function dialog_confirm(msg) {
                            try {
                                var data = await Swal.fire({
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

                        function toggle_permission(class_value) {
                            if (class_value > 1) open_permission_admin();
                            else disabled_permission_admin();
                        }

                        function toggle_update_permission(class_value) {
                            if (class_value > 1) open_update_permission_admin();
                            else disabled_update_permission_admin();
                        }

                        function disabled_permission_admin() {
                            // MENU_CLASS_ADMIN
                            // PERMISSION_CLASS_ADMIN
                            for (let value of MENU_CLASS_ADMIN) {
                                document.getElementById(value).style.display = 'none';
                            }
                            for (let value of PERMISSION_CLASS_ADMIN) {
                                document.getElementById(value).style.display = 'none';
                            }
                        }

                        function open_permission_admin() {
                            for (let value of MENU_CLASS_ADMIN) {
                                document.getElementById(value).style.display = 'block';
                            }
                            for (let value of PERMISSION_CLASS_ADMIN) {
                                document.getElementById(value).style.display = 'block';
                            }
                        }

                        function disabled_update_permission_admin() {
                            // MENU_CLASS_ADMIN
                            // PERMISSION_CLASS_ADMIN
                            for (let value of MENU_CLASS_ADMIN) {
                                document.getElementById(value + "-update").style.display = 'none';
                            }
                            for (let value of PERMISSION_CLASS_ADMIN) {
                                document.getElementById(value + "-update").style.display = 'none';
                            }
                        }

                        function open_update_permission_admin() {
                            for (let value of MENU_CLASS_ADMIN) {
                                document.getElementById(value + "-update").style.display = 'block';
                            }
                            for (let value of PERMISSION_CLASS_ADMIN) {
                                document.getElementById(value + "-update").style.display = 'block';
                            }
                        }

                        toggle_permission(document.getElementById('class').value);
                    </script>



                    <?php $this->endSection(); ?>