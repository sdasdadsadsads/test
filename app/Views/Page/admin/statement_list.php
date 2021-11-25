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

    .bg-infolight {
        background-color: #85ff4f94 !important;
        color: #013158 !important;
    }

    .bg-successlight {
        background-color: #10c70075 !important;
        color: #580101 !important;
    }
    .btn-outline-secondary1 {
    color: #6c757d !important;
    /* border-color: #6c757d; */
}
.btn1 {
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #6c757d;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.45rem 0.9rem;
    font-size: 20px;
    border-radius: 0.15rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.mdi-18px.mdi-set, .mdi-18px.mdi:before {
    font-size: 29px;
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous1 {
  background-color: #f1f1f1;
  color: black;
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
                        <b class="header-title">รายการธนาคาร</b>
                        <div class="d-flex flex-row bd-highlight mb-3 mt-5">
                        <a href="javascript:history.back()" class="previous1">&laquo; ย้อนกลับ</a>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                <div class="card border-primary border-2 mb-3">
                                    <div class="card-body text-center py-2" style="border-bottom: 10px solid #ffd700;">
                                        <img src="<?php echo base_url(); ?>/assets/images/Bank_show/<?= $bankWeb['bank_short'] ?>.png" alt="user-image" class="me-1 mt-1" height="30">
                                        <p class="m-0 p-0 mt-2">ชื่อบัญชี <span class="text-danger"><?= $bankWeb['name'] ?></span></p>
                                        <p class="m-0 p-0">เลขที่บัญชี <span class="text-danger"><?= $bankWeb['account'] ?></span></p>
                                        <p class="m-0 p-0">ยอดเงินคงเหลือ <span class="text-danger"><?= $bankWeb['balance'] ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <button class="btn btn-info" onclick="show_createStamentModal()"><i class="fa fa-plus"></i> เพิ่ม</button>
                            </div>
                        </div>
                        <hr>
                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                            <thead>
                                <tr>
                                    <th class="text-dark">No</th>
                                    <th class="text-dark">วันที่ - เวลา</th>
                                    <th class="text-dark">ฝาก</th>
                                    <th class="text-dark">ถอน</th>
                                    <th class="text-dark">ลูกค้า</th>
                                    <th class="text-dark">พนักงาน</th>
                                    <th class="text-dark">สถานะ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($state as $_s => $sta) { ?>
                                    <tr align="center">
                                        <td><?php echo $i; ?></td>
                                        <td><?= date('d-m-Y H:i', $sta['auto_update']) ?></td>
                                        <td class="bg-successlight">
                                            <?php
                                            if ($sta['deposit'] != 0) {
                                                echo number_format($sta['deposit'], 2);
                                            } else {
                                                echo '-';
                                            }

                                            ?>
                                        </td>
                                        <td class=" bg-dangerlight">
                                            <?php
                                            if ($sta['withdraw'] != 0) {
                                                echo number_format($sta['withdraw'], 2);
                                            } else {
                                                echo '-';
                                            }

                                            ?>
                                        </td>
                                        <td><?= $sta['agent_username'] ?></td>
                                        <td><?= $sta['admin_name'] ?></td>
                                        <td><?php
                                            if ($sta['status'] == 1) {
                                                echo '<span class="badge bg-warning mdi mdi-clock" style="font-size: 1.0em;"> รอยืนยัน</span>';
                                            } else if ($sta['status'] == 2) {
                                                echo '<span class="badge bg-success mdi mdi-checkbox-marked-circle" style="font-size: 1.0em;"> สำเร็จ</span>';
                                            } else if ($sta['status'] == 3) {
                                                echo '<span class="badge bg-info mdi mdi-credit-card" style="font-size: 1.0em;"> ระบบ</span>';
                                            } else if ($sta['status'] == 4) {
                                                echo '<span class="badge bg-danger mdi mdi-close-circle" style="font-size: 1.0em;"> ยกเลิก</span>';
                                            } else {
                                                echo '<span class="badge bg-danger mdi mdi-close-circle" style="font-size: 1.0em;"> ปิด</span>';
                                            }
                                            ?></td>
                                    </tr>

                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div><!-- end col-->
    <div class="modal fade" id="create_statementModal" tabindex="-1" aria-labelledby="create_statementModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create_statementModalLabel">รายการบัญชี</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_bank">
                        <div class="mb-3 row">
                        <input type="hidden" name="bank_id" value="<?= $bankWeb['id'] ?>">
                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">ระบบ/ลูกค้า :</label>
                           <div class="col-md-9 col-sm-9">
                                <select class="form-select" name="statuss" id="statuss">
                                <option value="3">ระบบ</option>
                                <option value="1">ลูกค้า</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">รายการ :</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-select" name="type" id="type">
                                <option value="1">ฝาก</option>
                               <option value="2">ถอน</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                                            <label for="message-text" class="col-form-label col-md-3 col-sm-3">ธนาคาร :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <select class="form-select" aria-label="Default select example" name="BankName" id="BankName">
                                                    <option value="KBANK">KBANK-กสิกรไทย</option>
                                                    <option value="BBL">BBL-กรุงเทพ</option>
                                                    <option value="BAY">BAY-กรุงศรีอยุธยา</option>
                                                    <option value="SCB">SCB-ไทยพาณิชย์</option>
                                                    <option value="KTB">KTB-กรุงไทย</option>
                                                    <option value="SCIB">SCIB-นครหลวงไทย</option>
                                                    <option value="UOB">UOB-ยูโอบี</option>
                                                    <option value="TTB">TTB-ทหารไทยธนชาต</option>
                                                    <option value="TISCO">TISCO-ทิสโก้</option>
                                                    <option value="ICBC">ICBC-ไอซีบีซี (ไทย)</option>
                                                    <option value="Kiatnakin">Kiatnakin-เกียรตินาคิน</option>
                                                    <option value="TBANK">TBANK-ธนชาต</option>
                                                    <option value="STANDARD">STANDARD-สแตนดาร์ดชาร์</option>
                                                    <option value="GHB">GHB-อาคารสงเคราะห</option>
                                                    <option value="LHBANK">LHBANK-แลนด์ แอนด์ เฮ</option>
                                                    <option value="GSB">GSB-ออมสิน</option>
                                                    <option value="BAAC">BAAC-เพื่อการเกษตร</option>
                                                    <option value="iBank">iBank-อิสลามแห่งประเทศไทย</option>
                                                    <option value="CIMB">CIMB-ซีไอเอ็มบีไทย</option>
                                                    <option value="TRUEW">TRUEW-ทรูวอลเล็ท</option>
                                                </select>
                                            </div>
                                        </div>
                        <div class="mb-3 row">
                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">วันที่เวลา :</label>
                            <div class="col-md-4 col-sm-9">
                            <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                <input type="text" name="state_date" class="form-control" value="<?=date('d/m/Y')?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-9">
                            <input type="text" id="time1" name="state_time" class="24hours-timepicker form-control" value="<?=date('H:i')?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">จำนวนเงิน :</label>
                            <div class="col-md-9 col-sm-9">
                            <input type="number" name="amount" class="form-control" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">บันทึก :</label>
                            <div class="col-md-9 col-sm-9">
                            <textarea class="form-control" name="note" rows="3" placeholder="โอนจากหรือโอนไป"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onClick="create_Statement()">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-busy" id="loader" style="display: none">
        <div class="center-busy" id="test-git">
            <img alt="" src="<?php echo base_url(); ?>/assets/images/ZZ5H.gif" />
        </div>
    </div>
    <script> 
          $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';

        function show_createStamentModal() {
            $("#create_statementModal").modal('show');
        }
        function create_Statement() {
            var data = $('#form_bank').serializeArray();
            console.log(data);
            $.ajax({
                        url: '<?php echo base_url('/bank_statement/create_Statement') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            data,
                            [csrfName]: csrfHash,
                        }
                    })
                    .done(function(res) {
                        console.log(res);
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
                    })
        }
    </script>
    <?php $this->endSection(); ?>