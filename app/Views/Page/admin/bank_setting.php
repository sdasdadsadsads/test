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
        border: 2px solid #01d20d;
        display: inline-block;
        color: #21a700;
        border-radius: 3px;
        text-transform: capitalize;
        width: 100%;
    }

    label.radio2 span {
        padding: 20px 12px;
        border: 2px solid #ff0000;
        display: inline-block;
        color: #f30022;
        border-radius: 3px;
        text-transform: capitalize;
        width: 100%;
    }

    label.radio2 {
        cursor: pointer;
        width: 100%;
        margin-right: 7px
    }

    label.radio2 input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none
    }

    .bg-success1 {
        background-color: #00ff0ef5 !important;
        color: #1f9c00;
    }

    .header-title {
        font-size: 1.5rem;
        margin: 0 0 7px 0;
    }

    .button1 {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        border: 3px solid #1e90ff;
    }

    .button--play {
        border-radius: 50%;
    }

    .button--play .button__shape {
        width: 8px;
        height: 18px;
        background: #1e90ff;
        transition: 0.3s ease-in-out;
    }

    .button--play .button__shape--one {
        -webkit-clip-path: polygon(0 0, 100% 25%, 100% 75%, 0% 100%);
        transform: translateX(5px);
    }

    .button--play .button__shape--two {
        -webkit-clip-path: polygon(0 25%, 100% 50%, 100% 50%, 0 75%);
        transform: translateX(4.9px);
    }

    .button--play.button--active .button__shape--one {
        -webkit-clip-path: polygon(0 15%, 50% 15%, 50% 85%, 0% 85%);
        transform: translateX(0px);
    }

    .button--play.button--active .button__shape--two {
        -webkit-clip-path: polygon(50% 15%, 100% 15%, 100% 85%, 50% 85%);
        transform: translateX(0px);
    }

    .bg-success1 {
        background-color: #00ff0ef5 !important;
        color: #1f9c00;
    }

    .btn-scb {
        color: #fff;
        background-color: #a500c3;
        border-color: #9d5ecd;
    }

    .btn-bbl {
        color: #fff;
        background-color: #1c1abc;
        border-color: #3c51eb;
    }

    .btn-kbank {
        color: #fff;
        background-color: #3b911f;
        border-color: #03a945;
    }

    .btn-ktb {
        color: #fff;
        background-color: #0092b3;
        border-color: #4fc6e1;
    }

    .btn-orther {
        color: #fff;
        background-color: #626262a1;
        border-color: #98a6ad;
    }

    .btn-general {
        color: #fff;
        background-color: #eb0000a1;
        border-color: #eb6565;
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
                        <h4 class="page-title"></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
        </div> <!-- end col -->
    </div>


    <div class="tab-pane show active" style="margin-top:3rem;" id="today">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <b class="header-title">ตั้งค่าการมองเห็นธนาคาร</b>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <!-- <button class="btn btn-info" onClick="add_bank()"><i class="fa fa-plus"></i> เพิ่ม</button> -->
                            </div>
                        </div>
                        <p class="text-muted font-13 mb-4">
                            <!-- จำนวนลูกค้าทั้งหมด 24 คน -->
                        </p>
                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                            <thead>
                                <tr>
                                    <th class="text-dark">รหัส</th>
                                    <th class="text-dark">ชื่อเเบงค์</th>
                                    <th class="text-dark">เลขที่บัญชี</th>
                                    <th class="text-dark">ธนาคาร</th>
                                    <th class="text-dark">ประเภท</th>
                                    <th class="text-dark">สร้างเมื่อ</th>
                                    <th class="text-dark">ผู้ที่สามารถเห็น</th>
                                    <th class="text-dark">สถานะ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                if (!empty($bankweb)) {
                                    foreach ($bankweb as $_b => $bnk) { ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td><?= $bnk['name'] ?></td>
                                            <td class="text-center"><?= $bnk['account'] ?></td>
                                            <td class="text-center"><?= $bnk['bank_short'] . '-' . substr($bnk['bank_th'], 18, 40) ?></td>
                                            <td class="text-center"><?php if ($bnk['type'] == '1') {
                                                                        echo '<span class="badge bg-success1 " style="font-size: 1.0em;">ฝาก</span>';
                                                                    } else {
                                                                        echo 'ถอน';
                                                                    } ?></td>
                                            <td class="text-center"><?= date('d/m/y H:i', $bnk['create_time']) ?></td>
                                            <td>
                                                <?php
                                                foreach ($bnk['bankgroup'][0] as $group) {
                                                    if ($group['name'] == 'กรุงไทย') {
                                                        echo ' <span class="btn btn-ktb btn-sm" id="ktb' . $i . '">' . $group['name'] . '</span>';
                                                    } elseif ($group['name'] == 'กรุงศรี') {
                                                        echo ' <span class="btn btn-warning text-dark btn-sm" id="bay' . $i . '">' . $group['name'] . '</span>';
                                                    } elseif ($group['name'] == 'ไทยพาณิชย์') {
                                                        echo ' <span class="btn btn-scb btn-sm" id="scb' . $i . '">' . $group['name'] . '</span>';
                                                    } elseif ($group['name'] == 'กรุงเทพ') {
                                                        echo ' <span class="btn btn-bbl btn-sm" id="bbl' . $i . '">' . $group['name'] . '</span>';
                                                    } elseif ($group['name'] == 'กสิกรไทย') {
                                                        echo ' <span class="btn btn-kbank  btn-sm" id="kbank' . $i . '">' . $group['name'] . '</span>';
                                                    } elseif ($group['name'] == 'แบงค์อื่นๆ') {
                                                        echo ' <span class="btn btn-orther btn-sm" id="bankorther' . $i . '">' . $group['name'] . '</span>';
                                                    } elseif ($group['name'] == 'ทั่วไป') {
                                                        echo ' <span class="btn btn-general btn-sm" id="bankgeneral' . $i . '">' . $group['name'] . '</span>';
                                                    }
                                                }
                                                ?>
                                                <button class="btn btn-sm" onClick="btn_addGroup('<?= $bnk['id'] ?>','<?= $i ?>')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($bnk['status']) && $bnk['status'] == 1) { ?>
                                                    <a href="#" onClick="edit_statusBank('<?= $bnk['id'] ?>','0')" title="ปิด">
                                                        <i style="color:#3AED33;" class="fa fa-check"></i>
                                                    </a>
                                                <?php } else if ($bnk['status'] == 3) { ?>
                                                    <i style="color:#3AED33;" class="fa fa-exchange"> Auto</i>
                                                <?php } else { ?>

                                                    <a href="#" onClick="edit_statusBank('<?= $bnk['id'] ?>','1')" title="เปิด">
                                                        <i style="color:#F51F23;" class="fa fa-remove"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php $i++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end card body-->
                    <div class="modal fade" id="mod_bankGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">เลือกกลุ่ม<small>(สำหรับพนักงาน)</small></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="form_bankGroup">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="bank_id" id="bankGroup_id" value="">
                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3 ">กลุ่ม</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <?php if (isset($group_r)) { ?>
                                                        <?php
                                                        foreach ($group_r as $_g => $gpr) {
                                                        ?>
                                                            <div class="form-check">
                                                                <input type="checkbox" name="<?= $gpr['id'] ?>" class="form-check-input" id="Check<?= $gpr['id'] ?>">
                                                                <label class="form-check-label" for="Check<?= $gpr['id'] ?>"><?= $gpr['name'] ?></label>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    <?php    } else { ?>
                                                        <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onClick="create_groupByuser()">Save</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div><!-- end col-->

    <div class="modal-busy" id="loader" style="display: none">
        <div class="center-busy" id="test-git">
            <img alt="" src="<?php echo base_url(); ?>/assets/images/ZZ5H.gif" />
        </div>
    </div>
    <script>
        function btn_addGroup(id, i) {
            var ktb = document.querySelector('#ktb' + i);
            var bay = document.querySelector('#bay' + i);
            var kbank = document.querySelector('#kbank' + i);
            var bbl = document.querySelector('#bbl' + i);
            var scb = document.querySelector('#scb' + i);
            var bankorther = document.querySelector('#bankorther' + i);
            var bankgeneral = document.querySelector('#bankgeneral' + i);
            ktb !== null ? document.getElementById("Check6").checked = true : document.getElementById("Check6").checked = false;
            bay !== null ? document.getElementById("Check4").checked = true : document.getElementById("Check4").checked = false;
            kbank !== null ? document.getElementById("Check2").checked = true : document.getElementById("Check2").checked = false;
            bbl !== null ? document.getElementById("Check3").checked = true : document.getElementById("Check3").checked = false;
            scb !== null ? document.getElementById("Check5").checked = true : document.getElementById("Check5").checked = false;
            bankorther !== null ? document.getElementById("Check7").checked = true : document.getElementById("Check7").checked = false;
            bankgeneral !== null ? document.getElementById("Check1").checked = true : document.getElementById("Check1").checked = false;
            $('#mod_bankGroup').modal('show');
            $('#bankGroup_id').val(id);
        }

        function create_groupByuser() {
            var data = $('#form_bankGroup').serializeArray();

            $.ajax({
                    url: '<?php echo base_url('/bank_auto/addgroupByuser') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: data
                }).done(function(res) {
                    var re = JSON.parse(res);
                    if (re.status == true) {
                        Swal.fire({
                            icon: "success",
                            title: re.msg,
                            showConfirmButton: true,
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: re.msg,
                            showConfirmButton: false,
                        })
                    }
                })
                .fail(function() {
                    Swal.fire({
                        icon: "error",
                        title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                        showConfirmButton: false,
                    });
                });

        }
    </script>
    <?php $this->endSection(); ?>