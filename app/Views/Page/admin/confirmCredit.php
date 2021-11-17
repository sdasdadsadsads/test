<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>
<style>
    label.radio1 {
        cursor: pointer;
        width: 100%;
        margin-right: 7px
    }

    label.radio1 input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none
    }

    label.radio1 span {
        padding: 20px 12px;
        border: 2px solid #4fc6e1;
        display: inline-block;
        color: #4fc6e1;
        border-radius: 3px;
        text-transform: capitalize;
        width: 100%
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">รายการเดินบัญชี</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="fe dripicons-blog font-22 avatar-title text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">
                                            <?php if (isset($state_countToday)) : ?>
                                                <span data-plugin="counterup"><?php echo ($state_countToday); ?></span>
                                            <?php else : ?>
                                                <span data-plugin="counterup">เขื่อมต่อล้มเหลว</span>
                                            <?php endif; ?>
                                            <span> / </span>
                                            <?php if (isset($state_countAll)) : ?>
                                                <span data-plugin="counterup"><?php echo ($state_countAll); ?></span>
                                            <?php else : ?>
                                                <span data-plugin="counterup">เขื่อมต่อล้มเหลว</span>
                                            <?php endif; ?>
                                        </h3>
                                        <h3 class="text-dark mt-1">
                                            <span> วันนี้ / </span>
                                            <span> ทั้งหมด</span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">จำนวนรายการ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                        <i class="fe dripicons-blog font-22 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">
                                            <?php if (isset($state_stickPromotionToday)) : ?>
                                                <span data-plugin="counterup"><?php echo ($state_stickPromotionToday); ?></span>
                                            <?php else : ?>
                                                <span data-plugin="counterup">เขื่อมต่อล้มเหลว</span>
                                            <?php endif; ?>
                                            <span> / </span>
                                            <?php if (isset($state_stickPromotionAll)) : ?>
                                                <span data-plugin="counterup"><?php echo ($state_stickPromotionAll); ?></span>
                                            <?php else : ?>
                                                <span data-plugin="counterup">เขื่อมต่อล้มเหลว</span>
                                            <?php endif; ?>
                                        </h3>
                                        <h3 class="text-dark mt-1">
                                            <span> วันนี้ / </span>
                                            <span> ทั้งหมด</span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">โปรโมชั่นคงค้าง</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                        <i class="fe dripicons-blog font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">
                                            <?php if (isset($state_repeatToday)) : ?>
                                                <span data-plugin="counterup"><?php echo ($state_repeatToday); ?></span>
                                            <?php else : ?>
                                                <span data-plugin="counterup">เขื่อมต่อล้มเหลว</span>
                                            <?php endif; ?>
                                            <span> / </span>
                                            <?php if (isset($state_repeatAll)) : ?>
                                                <span data-plugin="counterup"><?php echo ($state_repeatAll); ?></span>
                                            <?php else : ?>
                                                <span data-plugin="counterup">เขื่อมต่อล้มเหลว</span>
                                            <?php endif; ?>
                                        </h3>
                                        <h3 class="text-dark mt-1">
                                            <span> วันนี้ / </span>
                                            <span> ทั้งหมด</span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">รายการเข้าซ้ำ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                        <i class="fe dripicons-blog font-22 avatar-title text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">
                                            <?php if (isset($state_undefindUsersToday)) : ?>
                                                <span data-plugin="counterup"><?php echo ($state_undefindUsersToday); ?></span>
                                            <?php else : ?>
                                                <span data-plugin="counterup">เขื่อมต่อล้มเหลว</span>
                                            <?php endif; ?>
                                            <span> / </span>
                                            <?php if (isset($state_undefindUsersAll)) : ?>
                                                <span data-plugin="counterup"><?php echo ($state_undefindUsersAll); ?></span>
                                            <?php else : ?>
                                                <span data-plugin="counterup">เขื่อมต่อล้มเหลว</span>
                                            <?php endif; ?>
                                        </h3>
                                        <h3 class="text-dark mt-1">
                                            <span> วันนี้ / </span>
                                            <span> ทั้งหมด</span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">ไม่พบผู้ใช้</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- end row-->

            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="form_dashboard" method="post">
                                        <?= csrf_field() ?>
                                        <div class="row">
                                            <label class="form-label">ค้นหารายการเดินบัญชี</label>
                                            <div class="mb-3 col-12 mx-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value='1' name='type_statement' id='type_statement' type="radio" checked>
                                                    <label class="form-check-label" for="inlineRadio1">ทั้งหมด</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name='type_statement' value='2' type="radio" id='type_statement'>
                                                    <label class="form-check-label" for="inlineRadio2">ติดโปรโมชั่นเดิม</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value='3' name='type_statement' type="radio" id='type_statement'>
                                                    <label class="form-check-label" for="inlineRadio2">รายการเข้าซ้ำ</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value='4' name='type_statement' type="radio" id='type_statement'>
                                                    <label class="form-check-label" for="inlineRadio3">เลขบัญชีซ้ำ
                                                        (ไม่สามารถหา users ได้)</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-label"></label><br>
                                                    <button type="button" onclick="type_statement1()" class="btn btn-info waves-effect waves-light">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>
                            <h4 class="header-title mb-3"><b>รายการเดินบัญชี</b></h4>
                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="p-2 bd-highlight">
                                    <select class="form-select" aria-label="Default select example" id="type" onchange="type_statement1()">
                                        <option value="1">รออนุมัติ</option>
                                        <option value="5">ซ่อน</option>
                                    </select>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                                    <thead class="table-light">
                                        <tr>
                                            <th colspan="2"></th>
                                            <th>รหัส</th>
                                            <th>จำนวนเงิน</th>
                                            <th>ประเภท</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ShowDatafilterByType">
                                        <?php if (!empty($state_unconfirmed)) { ?>
                                            <?php foreach ($state_unconfirmed as $unconfirmed) { ?>
                                                <tr>
                                                    <td style="width: 36px;">
                                                        <?php if ($unconfirmed['from_bank'] == '  K') { ?>
                                                            <img src="<?php echo base_url(); ?>/assets/images/Bank_show/K.png" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                                        <? } else { ?>
                                                            <img src="<?php echo base_url(); ?>/assets/images/Bank_show/<?= $unconfirmed['from_bank']; ?>.png" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                                        <?php } ?>

                                                    </td>
                                                    <td>
                                                        <h4 class="m-0 fw-normal"><?= $unconfirmed['note']; ?></h4>
                                                        <h5 class="m-0 fw-normal mt-1"><?= $unconfirmed['name']; ?> [
                                                            <?= $unconfirmed['from_bank']; ?> ]</h5>
                                                        <p class="mb-0 text-muted mt-1">รับรายการมาแล้ว
                                                            <?= round((time() - $unconfirmed['auto_update']))  / 86400 % 7; ?>
                                                            วัน
                                                            <?= round((time() - $unconfirmed['auto_update'])) / 3600 % 24; ?>
                                                            ชั่วโมง
                                                            <?= round((time() - $unconfirmed['auto_update']) / 60 % 60); ?>
                                                            นาที</p>
                                                        <h4 class="m-0 fw-normal mt-1">เวลาธนาคาร
                                                            <?= date('d-m-y h:i', $unconfirmed['auto_update']) ?></h4>
                                                        <?php if ($unconfirmed['cause'] != null) { ?>
                                                            <p class="mb-0 text-muted mt-1"><label class="text-danger">**สาเหตุ :
                                                                    <?= $unconfirmed['cause'] ?></label></p>
                                                        <?php } ?>
                                                    </td>

                                                    <td>
                                                        <span class="text-info" style="font-size: 1.0em;"> <span class="text-primary" style="font-size: 1.0em;"><b style="font-size: 1.2em;">DPS<?= $unconfirmed['id'] ?></b></span>
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="badge bg-info" style="font-size: 1.0em;">+<?= $unconfirmed['deposit']; ?></span>
                                                    </td>

                                                    <td><b style="font-size: 1.2em;"><?= $unconfirmed['from_name']; ?> </b></td>

                                                    <td>
                                                        <a href="javascript: void(0);" class="btn btn-success" onclick="add_user('<?= $unconfirmed['user_id'] ?>','<?= $unconfirmed['id'] ?>','<?= number_format($unconfirmed['deposit'], 2) ?>')"><i class="mdi mdi-plus"></i>เติม</a>
                                                        <a href="javascript: void(0);" class="btn btn-danger" onclick="hideDepositUnconfirmed('<?= $unconfirmed['id'] ?>','5','<?= $unconfirmed['id'] ?>')"><i class="mdi mdi-close-circle"></i> ซ่อน</a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan='6'>ไม่มีรายการที่รออนุมัติ</td>
                                            </tr>
                                        <?php } ?>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">เเอดลูกค้า
                                                            (กรอกเบอร์โทรหรือยูเซอร์)</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">รหัสฝาก : <span id="stm_id"></span> </label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">จำนวนเงิน : <span id="statement_amount"></span> </label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control h6" name="user" id="user" style="font-size: 1.1rem;">
                                                                <input type="hidden" class="form-control" name="statement_id" required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" onclick="showDatauser()">Send</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">รายละเอียด</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="show_data"></div>

                                                        <input type="hidden" class="form-control" name="add_user" required="required" autocomplete="off">
                                                        <input type="hidden" class="form-control" name="add_stm_id" required="required" autocomplete="off">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" onclick="add_credit()">Send</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>

                            <h4 class="header-title mb-3">รายการล่าสุด 20 รายการ</h4>

                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap table-hover table-centered m-0">
                                    <tbody>
                                        <?php if (!empty($state_confirmed)) { ?>
                                            <?php foreach ($state_confirmed as $confirmed) { ?>
                                                <tr>
                                                    <td style="width: 36px;">
                                                        <?php if ($confirmed['from_bank'] == '  K') { ?>
                                                            <img src="<?php echo base_url(); ?>/assets/images/Bank_show/K.png" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                                        <? } else { ?>
                                                            <img src="<?php echo base_url(); ?>/assets/images/Bank_show/<?= $confirmed['from_bank']; ?>.png" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                                        <?php } ?>
                                                    </td>

                                                    <td>
                                                        <h4 class="m-0 fw-normal">DPS<?= $confirmed['id'] ?></h4>
                                                        <h5 class="m-0 fw-normal mt-1"><?= $confirmed['name']; ?> [
                                                            <?= $confirmed['from_bank']; ?> ]</h5>
                                                        <p class="mb-0 fw-normal mt-1 badge bg-success">
                                                            <label><?= $confirmed['agent_username']; ?> ฝาก
                                                                <?= $confirmed['deposit']; ?> บาท </label>
                                                        </p>
                                                        <h5 class="m-0 fw-normal mt-1">เครดิตก่อนเติม <b>
                                                                <?= $confirmed['credit_before']; ?> </b></h5>
                                                        <h5 class="m-0 fw-normal mt-1">เวลาเติมสำเร็จ
                                                            <b><?= date('d-m-y h:i:s', $confirmed['auto_update']) ?></b>
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="m-0 fw-normal mt-4" style="padding-top: 0.7rem;">
                                                            เครดิตหลังเติม <b><?= $confirmed['credit_after']; ?></b></h5>
                                                    </td>
                                                    <td>
                                                        <h6 class="m-0 fw-normal mt-1">
                                                            <?= date('d-m-y h:i:s', $confirmed['auto_update']) ?></h6>
                                                        <span class="badge bg-info" style="font-size: 1.0em; margin-top: 5rem;"><?= $confirmed['admin_name']; ?></span>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan='6'>ไม่พบข้อมูล</td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive-->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script>
        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';

        function add_user(user_id, statement_id, deposit) {
            if (user_id != 0) {
                $.ajax({
                        url: '<?php echo base_url('/confirmCredit/getusername') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            user_id: user_id,
                            [csrfName]: csrfHash,
                        }
                    })
                    .done(function(re) {
                        if (re.status == true) {
                            $("input[name=user]").val(re.data);
                            document.getElementById("user").disabled = true;
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: re.msg,
                                showConfirmButton: false,
                            });
                        }
                    })
            }

            $("#exampleModal").modal('show');
            var statementShow = 'DPS' + statement_id;
            $("input[name=statement_id]").val(statement_id);
            $('#stm_id').html(statementShow);
            $('#statement_amount').html(deposit);
            $('#show_data').html();
        }

        function showDatauser() {
            try {
                var user = $("input[name=user]").val();
                var statement_id = $("input[name=statement_id]").val();
                $.ajax({
                        url: '<?php echo base_url('/confirmCredit/CheckUserBeforeConfirm') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            user: user,
                            statement_id: statement_id,
                            [csrfName]: csrfHash,
                        }
                    })
                    .done(function(re) {
                        if (re.status == true) {
                            $('#exampleModal').modal('hide');
                            $('#exampleModal1').modal('show');
                            $("input[name=add_user]").val(re.data.user);
                            $("input[name=add_stm_id]").val(re.data.stm_id);
                            var html = '';
                            html += '<div class="row">'
                            html += '<div class="col-md-6">'
                            html +=
                                ' <div class="d-flex flex-column"> <small>รหัส :</small> <span class="font-weight-bold">DPS' +
                                re.data.stm_id + '</span> </div>'
                            html += '</div>';
                            html += '<div class="col-md-6">'
                            html +=
                                ' <div class="d-flex flex-column"> <small>ยูสเซอร์ :</small> <span class="font-weight-bold">' +
                                re.data.user + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-6">'
                            html +=
                                ' <div class="d-flex flex-column"> <small>เบอร์โทร :</small> <span class="font-weight-bold">' +
                                re.data.username + '</span> </div>'
                            html += '</div>';
                            html += '<div class="col-md-6">'
                            html +=
                                ' <div class="d-flex flex-column"> <small>เครดิตคงเหลือ : </small> <span class="font-weight-bold">' +
                                re.data.UserCredit.credit + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-6">'
                            html +=
                                ' <div class="d-flex flex-column"> <small>ฝากเข้า : </small> <span class="font-weight-bold">' +
                                re.data.webName + ' [ ' + re.data.webBank + ' ]' + '</span> </div>'
                            html += '</div>';
                            html += '<div class="col-md-6">'
                            html +=
                                ' <div class="d-flex flex-column"> <small>รายละเอียด : </small> <span class="font-weight-bold">' +
                                re.data.note + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="form-check form-switch">'
                            // html += '<div class="mt-2">'
                            // html += '<input class="form-check-input" type="checkbox" id="getPromo">'
                            // html += '<label class="form-check-label" for="">ให้สิทธิ์รับโปรโมชั่น</label>'
                            // html += '</div>'
                            html += '</div>'

                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-12">'
                            html +=
                                ' <label class="radio1 text-center"> <input type="radio" name="payment" value="bank"> <span><i class="fa fa-bank"></i> ยอดฝาก : ' +
                                re.data.amount + ' ฿</span> </label>'
                            html += '</div>';
                            html += '</div>';
                        }
                        $('#show_data').html(html);
                    })
                    .fail(function(err) {
                        // console.log(err);
                        Swal.fire({
                            icon: "error",
                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                            showConfirmButton: false,
                        });
                        window.setTimeout(function() {
                            location.reload()
                        }, 500)
                    });
            } catch (err) {
                alert(err)
            }

        }


        function add_credit() {
            var user = $("input[name=add_user]").val();
            var statement_id = $("input[name=add_stm_id]").val();
            // var getBonus = document.getElementById('getPromo');
            Swal.fire({
                    title: 'ยืนยันเพิ่มเครดิต',
                    text: 'ยูสเซอร์ : ' + user + ' ?',
                    showDenyButton: true,
                    showCancelButton: true,
                    cancelButtonColor: "#f1556c",
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                                url: '<?php echo base_url('/confirmCredit/confirmAddCredit') ?>',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    user: user,
                                    statement_id: statement_id,
                                    getBonus: false,
                                    [csrfName]: csrfHash,
                                }
                            })
                            .done(function(re) {
                                if (re.status) {
                                    if (re.waitingConfirmation) {
                                        Swal.fire({
                                            title: 'แจ้งเตือน',
                                            text: 'users ติดโปรโมชั่น กรุณาทำรายการยกเลิกโปรโมชั่นเดิม',
                                            showDenyButton: true,
                                            // showCancelButton: true,
                                            cancelButtonColor: "#f1556c",
                                            confirmButtonText: 'OK',
                                        }).then((result2) => {
                                            // if (result2.isConfirmed) {
                                            //     $.ajax({
                                            //             url: '<?php echo base_url('/confirmCredit/confirmAndDelBonus') ?>',
                                            //             type: 'POST',
                                            //             dataType: 'json',
                                            //             data: {
                                            //                 user: user,
                                            //                 statement_id: statement_id,
                                            //                 getBonus: getBonus.checked
                                            //             }
                                            //         })
                                            //         .done(function(res) {
                                            //             console.log(res);
                                            //             if (res.status) {
                                            //                 Swal.fire({
                                            //                         icon: 'success',
                                            //                         title: res.msg,
                                            //                         showConfirmButton: false,
                                            //                         timer: 1600
                                            //                     })
                                            //                     .then((result) => {
                                            //                         location.reload();
                                            //                     })
                                            //             } else {
                                            //                 Swal.fire({
                                            //                     icon: 'error',
                                            //                     title: res.msg,
                                            //                     showConfirmButton: false,
                                            //                     timer: 1600
                                            //                 })
                                            //             }
                                            //         })
                                            //         .fail(function(err) {
                                            //             console.log(err);
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
                                        })
                                    } else {
                                        Swal.fire({
                                                icon: 'success',
                                                title: re.msg,
                                                showConfirmButton: false,
                                                timer: 1600
                                            })
                                            .then((result) => {
                                                location.reload();
                                            })
                                    }

                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: re.msg,
                                        showConfirmButton: false,
                                        timer: 1600
                                    })
                                }
                            })
                    } else if (result.isDenied) {
                        Swal.fire('ไม่สามารถทำรายการได้', '', 'info')
                    }
                })
                .fail(function(err) {
                    // console.log(err);
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

        function hideDepositUnconfirmed(statement_id, status, statement_id_show) {
            var showDpsId = 'DPS' + statement_id_show;
            Swal.fire({
                    title: 'ต้องการซ่อนรายการ?',
                    text: 'รหัส : ' + showDpsId,
                    showDenyButton: true,
                    showCancelButton: true,
                    cancelButtonColor: "#f1556c",
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?php echo base_url('/confirmCredit/hideDepositUnconfirmed') ?>",
                            type: 'POST',
                            data: {
                                statement_id: statement_id,
                                status: status,
                                [csrfName]: csrfHash,
                            },
                            dataType: "json",
                            success: function(res) {
                                if (res.status) {
                                    Swal.fire({
                                            icon: 'success',
                                            title: res.msg,
                                            showConfirmButton: false,
                                            timer: 1600
                                        })
                                        .then((result) => {
                                            location.reload();
                                        })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: res.msg,
                                        showConfirmButton: false,
                                        timer: 1600
                                    })
                                }
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('ไม่สามารถทำรายการได้', '', 'info')
                    }
                })
                .fail(function(err) {
                    // console.log(err);
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

        function type_statement1() {
            var status = $('#type').val();
            // var type_statement = $('#type_statement').val();
            var type_statement = document.querySelector('input[name="type_statement"]:checked').value;
            $.ajax({
                    url: '<?php echo base_url('/confirmCredit/filterTypeStatement') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        status: status,
                        type_statement: type_statement,
                        [csrfName]: csrfHash,
                    },
                }).done(function(res) {
                    if (res.status) {
                        var ShowData = '';
                        var count = res.data.length;
                        var stm = res.data;
                        if (stm.length >= 1) {

                            for (var i = 0; i < count; i++) {
                                ShowData += '<tr>';
                                if (stm[i].from_bank == '  K') {
                                    ShowData +=
                                        '<td style="width: 36px;"> <img src="<?php echo base_url(); ?>/assets/images/Bank_show/K.png"alt="contact-img" title="contact-img" class="rounded-circle avatar-sm"></td>';
                                } else {
                                    ShowData +=
                                        '<td style="width: 36px;"> <img src="<?php echo base_url(); ?>/assets/images/Bank_show/' +
                                        stm[i].from_bank +
                                        '.png"alt="contact-img" title="contact-img" class="rounded-circle avatar-sm"></td>';
                                }

                                ShowData += '<td>';
                                ShowData += '<h4 class="m-0 fw-normal">' + stm[i].note + '</h4>';
                                ShowData += ' <h5 class="m-0 fw-normal mt-1">' + stm[i].name + ' [ ' + stm[i]
                                    .from_bank + ' ]</h5>';
                                ShowData += '<p class="mb-0 text-muted mt-1">รับรายการมาแล้ว ' + Math.floor((Math
                                        .floor(new Date().getTime() / 1000) - stm[i].auto_update) / 86400 % 7) + " วัน " +
                                    Math.floor((Math
                                        .floor(new Date().getTime() / 1000) - stm[i].auto_update) / 3600 % 24) + " ชัวโมง " +
                                    Math.floor((Math
                                        .floor(new Date().getTime() / 1000) - stm[i].auto_update) / 60 % 60) + "  นาที</p>"
                                ShowData += '<h4 class="m-0 fw-normal mt-1">เวลาธนาคาร ' + moment.unix(stm[i]
                                        .auto_update)
                                    .format("DD-MM-YY HH:mm ") + '</h4>';
                                ShowData += '<h5 class="m-0 fw-normal mt-1 text-danger">**สาเหตุ ' + stm[i].cause + '</h5>';
                                ShowData += '</td>';
                                ShowData += '<td>';
                                ShowData +=
                                    '<span class="text-info" style="font-size: 1.0em;"> <span class="text-primary" style="font-size: 1.0em;"><b>DPS' +
                                    stm[i].id + '</b></span></span>';
                                ShowData += '</td>';
                                ShowData += '<td><span class="badge bg-info" style="font-size: 1.0em;">+' + stm[i]
                                    .deposit + '</span></td>';
                                ShowData += '<td>' + stm[i].from_name + ' </td>';
                                ShowData += '<td>';
                                ShowData +=
                                    '<a href="javascript: void(0);" class="btn btn-success" onclick="add_user(' + stm[i]
                                    .user_id + ',' + stm[i].id + ',' + stm[i].deposit.toFixed(2) +
                                    ')" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="mdi mdi-plus"></i>เติม</a>';
                                if (status == 1) {
                                    ShowData +=
                                        ' <a href="javascript: void(0);" class="btn btn-danger" onclick="hideDepositUnconfirmed(' +
                                        stm[i].id + ',' + 5 + ',' + stm[i].id +
                                        ')"><i class="mdi mdi-close-circle"></i> ซ่อน</a>';
                                } else if (status == 5) {
                                    //    ShowData += ' <a href="javascript: void(0);" class="btn btn-danger"><i class="mdi mdi-close"></i> ยกเลิก</a>';
                                }
                                ShowData += '</td>';
                                ShowData += '</tr>';
                            }
                        }
                        $('#ShowDatafilterByType').html('');
                        $('#ShowDatafilterByType').html(ShowData);
                    } else {
                        var ShowData = '<tr style="backroud-color:red"><td colspan="6" >ไม่พบข้อมูล</td></tr>';
                        $('#ShowDatafilterByType').html(ShowData);
                    }
                })
                .fail(function(err) {
                    // console.log(err);
                    Swal.fire({
                        icon: "error",
                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                        showConfirmButton: false,
                    });
                });
        }

        function type_statement() {
            var status = $('#type').val();
            // var type_statement = $('#type_statement').val();
            var type_statement = document.querySelector('input[name="type_statement"]:checked').value;
            $.ajax({
                    url: '<?php echo base_url('/confirmCredit/filterTypeStatement') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        status: status,
                        type_statement: type_statement
                    },
                }).done(function(res) {
                    if (res.status) {
                        var ShowData = '';
                        var count = res.data.length;
                        var stm = res.data;
                        if (stm.length >= 1) {

                            for (var i = 0; i < count; i++) {
                                ShowData += '<tr>';
                                if (stm[i].from_bank == '  K') {
                                    ShowData +=
                                        '<td style="width: 36px;"> <img src="<?php echo base_url(); ?>/assets/images/Bank_show/K.png"alt="contact-img" title="contact-img" class="rounded-circle avatar-sm"></td>';
                                } else {
                                    ShowData +=
                                        '<td style="width: 36px;"> <img src="<?php echo base_url(); ?>/assets/images/Bank_show/' +
                                        stm[i].from_bank +
                                        '.png"alt="contact-img" title="contact-img" class="rounded-circle avatar-sm"></td>';
                                }

                                ShowData += '<td>';
                                ShowData += '<h5 class="m-0 fw-normal">' + stm[i].note + '</h5>';
                                ShowData += ' <h6 class="m-0 fw-normal mt-1">' + stm[i].name + ' [ ' + stm[i]
                                    .from_bank + ' ]</h6>';
                                ShowData += '<p class="mb-0 text-muted mt-1">รับรายการมาแล้ว ' + Math.floor((Math
                                        .floor(new Date().getTime() / 1000) - stm[i].auto_update) / 86400 % 7) + " วัน " +
                                    Math.floor((Math
                                        .floor(new Date().getTime() / 1000) - stm[i].auto_update) / 3600 % 24) + " ชัวโมง " +
                                    Math.floor((Math
                                        .floor(new Date().getTime() / 1000) - stm[i].auto_update) / 60 % 60) + "  นาที</p>"
                                ShowData += '<h6 class="m-0 fw-normal mt-1">เวลาธนาคาร ' + moment.unix(stm[i]
                                        .auto_update)
                                    .format("DD-MM-YY HH:mm ") + '</h6>';
                                ShowData += '</td>';
                                ShowData += '<td>';
                                ShowData +=
                                    '<span class="text-info" style="font-size: 1.0em;"> <span class="text-primary" style="font-size: 1.0em;"><b>DPS' +
                                    stm[i].id + '</b></span></span>';
                                ShowData += '</td>';
                                ShowData += '<td><span class="badge bg-info" style="font-size: 1.0em;">+' + stm[i]
                                    .deposit + '</span></td>';
                                ShowData += '<td>' + stm[i].from_name + ' </td>';
                                ShowData += '<td>';
                                ShowData +=
                                    '<a href="javascript: void(0);" class="btn btn-success" onclick="add_user(' + stm[i]
                                    .user_id + ',' + stm[i].id + ',' + stm[i].deposit.toFixed(2) +
                                    ')" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="mdi mdi-plus"></i>เติม</a>';
                                if (status == 1) {
                                    ShowData +=
                                        ' <a href="javascript: void(0);" class="btn btn-danger" onclick="hideDepositUnconfirmed(' +
                                        stm[i].id + ',' + 5 + ',' + stm[i].id +
                                        ')"><i class="mdi mdi-close-circle"></i> ซ่อน</a>';
                                } else if (status == 5) {
                                    //    ShowData += ' <a href="javascript: void(0);" class="btn btn-danger"><i class="mdi mdi-close"></i> ยกเลิก</a>';
                                }
                                ShowData += '</td>';
                                ShowData += '</tr>';
                            }
                        }
                        $('#ShowDatafilterByType').html('');
                        $('#ShowDatafilterByType').html(ShowData);
                    } else {
                        var ShowData = '<tr style="backroud-color:red"><td colspan="6" >ไม่พบข้อมูล</td></tr>';
                        $('#ShowDatafilterByType').html(ShowData);
                    }
                })
                .fail(function(err) {
                    // console.log(err);
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
    </script>
    <?php $this->endSection(); ?>