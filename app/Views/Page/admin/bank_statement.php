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
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        border: 3px solid #ffffff;
    }

    .button--play {
        border-radius: 50%;
    }

    .button--play .button__shape {
        width: 5px;
        height: 15px;
        background: #ffffff;
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

    .btn-group-sm>.btn,
    .btn-sm {
        padding: .13rem .1rem;
        font-size: .7rem;
        /* border-radius: .2rem; */
    }

    .bg-success1 {
        background-color: #00ff0ef5 !important;
        color: #1f9c00;
    }

    .bg-successlight {
        background-color: #10c70075 !important;
        color: #580101 !important;
    }

    .withdraw_loader {
        border: 5px solid #f3f3f3;
        /* Light grey */
        border-top: 5px solid #FFFFFF;
        /* Blue */
        border-radius: 50%;
        margin-left: auto;
        margin-right: auto;
        width: 35px;
        height: 35px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
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
    <!-- end row-->

    <!-- <ul class="nav nav-tabs nav-bordered">
        <li class="nav-item">
            <a onClick="today()" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                วันนี้
            </a>
        </li>
        <li class="nav-item">
            <a onClick="yesterday()" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                เมื่อวาน
            </a>
        </li>
    </ul> -->


    <div class="tab-pane show active" style="margin-top:3rem;" id="today">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <b class="header-title">รายชื่อแบงค์</b>
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
                                    <th class="text-dark">ยอดคงเหลือ</th>
                                    <th class="text-dark">ดูรายการ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (isset($bank_web)) {
                                    $i = 1;
                                    foreach ($bank_web as $_b => $bnk) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $bnk['name'] ?></td>
                                            <td><?= $bnk['account'] ?></td>
                                            <td><img src="<?php echo base_url(); ?>/assets/images/Bank_show/<?= $bnk['bank_short']; ?>.png" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm"></td>
                                            <td style="text-align:center;"><?php
                                                                            if ($bnk['type'] == '1') {
                                                                                echo '<span class="badge bg-success1 " style="font-size: 1.0em;">ฝาก</span>';
                                                                            } else {
                                                                                echo '<span class="badge bg-danger " style="font-size: 1.0em;">ถอน</span>';
                                                                            }
                                                                            ?></td>
                                            <td class="bg-successlight text-white">
                                                <div id="checkBalane<?= $bnk['id'] ?>"></div>
                                                <div id="balance<?= $bnk['id'] ?>"><?php echo number_format($bnk['balance'], 2); ?>
                                                    <span class="mdi mdi-refresh mdi-18px" style="cursor: pointer;" onClick="check_balance('<?= $bnk['id'] ?>')"></span>
                                                </div>
                                                <!-- <i  style="font-size: 15px;opacity: 0.2;cursor: pointer;" onClick="check_balance('<?= $bnk['id'] ?>')" ></i> -->
                                            </td>
                                            <td style="text-align:center;">
                                                <button type="button" class="btn btn-info waves-effect waves-light" onclick="location.href='<?php echo base_url('bank_statement/statement_list/' . $bnk['id'] . '') ?>'"><i class="mdi mdi-eye mdi-18px"></i></button>
                                                <!-- <a href="bank/bank_statement/<?= $bnk['id'] ?>" class="mdi mdi-eye mdi-24px"></a> -->
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>

                                <?php } else {
                                    echo '<tr><td colspan="11">ไม่มีข้อมูล</td></tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
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
        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';

        function check_balance(bank_id) {
            $('#balance' + bank_id).html('');
            document.getElementById("checkBalane" + bank_id).classList.add("withdraw_loader");
            $.ajax({
                url: '<?php echo base_url('/bank_statement/check_balance') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    bank_id: bank_id,
                    [csrfName]: csrfHash
                }
            }).done(function(res) {
                if (res.status == true) {
                    var data_balance = res.balane;
                    setTimeout(function(type) {
                        document.getElementById("checkBalane" + bank_id).classList.remove("withdraw_loader");
                        $('#balance' + bank_id).html(data_balance);
                    }, 1000)
                }
            });
        }
    </script>
    <?php $this->endSection(); ?>