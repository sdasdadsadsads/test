<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>
<style>
    table tr {
        text-align: center;
        font-size: 12px;
        vertical-align: middle;
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

    .btn-secondary1 {
        color: #000;
        background-color: #d8dcdf;
        border-color: #cfdde9;
    }

    .bg-dangerlight3 {
        background-color: #462279 !important;
        color: #ffca6f !important;
        border-right: 10px solid #ffd700 !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">รายงานการถอนเงิน</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form_withdraw" method="post" action="<?= base_url('withdraw/csv') ?>">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <!-- <h4 class="header-title">ค้นหา</h4> -->
                                <p class="sub-header">ระบบค้นหา
                                </p>

                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label class="form-label">สถานะ</label>
                                            <select name="statusDataSearch" class="form-select">
                                                <option selected value="">ทั้งหมด</option>
                                                <option value="1">wait</option>
                                                <option value="2">success</option>
                                                <option value="3">reject</option>
                                                <option value="4">check</option>
                                                <option value="5">auto</option>
                                                <option value="6">wait auto</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label class="form-label">ชื่อผู้ใช้</label>
                                            <input type="text" name="usernameSearch" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="row">

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">วันที่เริ่มต้น</label>
                                            <input type="text" name="startDate" id="date1" class="basic-datepicker form-control" placeholder="วันที่เริ่มต้น" />
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">เวลา</label>
                                            <input type="text" name="startTime" id="time1" class="24hours-timepicker form-control" placeholder="เวลาเริ่มต้น">
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">ถึงวันที่</label>
                                            <input type="text" name="endDate" id="date2" class="basic-datepicker form-control" placeholder="ถึงวันที่">
                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-2">
                                            <label class="form-label">เวลา</label>
                                            <input type="text" name="endTime" id="time2" class="24hours-timepicker form-control" placeholder="เวลาสิ้นสุด">
                                        </div>

                                        <div class="mb-3 mt-1 col-12 col-md-6 col-lg-2">
                                            <label class="form-label"></label><br>
                                            <button type="button" onclick="filter()" class="btn btn-blue waves-effect waves-light">
                                                ค้นหา
                                            </button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">
                                                Export
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs nav-bordered">
                <li class="nav-item">
                    <a href="" id="withdraw_total" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                        ทั้งหมด
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" id="pending_confirmation" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        รอโอน
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" id="transfer_queue" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        คิวโอน
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" id="lists_error" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        ปัญหา
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" id="lists_cancel" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        ยกเลิก
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="" onclick="yesterday()" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        คิวออโต้
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" onclick="yesterday()" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        ถอนอัตโนมัติ
                    </a>
                </li> -->
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="table2">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php if (!empty($bankweb)) { ?>
                                            <?php foreach ($bankweb as $key => $value) { ?>
                                                <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                                    <div class="card border-primary border-2 mb-3">
                                                        <div class="card-body text-center py-2" style="border-bottom: 10px solid #ffd700;">
                                                            <img src="<?php echo base_url() ?>/assets/images/Bank_show/<?= $value['bank_short'] ?>.png" alt="user-image" class="me-1 mt-1" height="30">
                                                            <p class="m-0 p-0 mt-2">ชื่อบัญชี <span class="text-danger"><?= $value['name'] ?></span></p>
                                                            <p class="m-0 p-0">เลขที่บัญชี <span class="text-danger"><?= $value['account'] ?></span></p>
                                                            <p class="m-0 p-0">ยอดเงินคงเหลือ <span class="text-danger"><?= number_format($value['balance'], 2) ?></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php   } else { ?>

                                        <?php   } ?>
                                    </div>

                                    <div class="row">
                                        <div class="card-body">
                                            <h4 id="sum" class="mt-0 text-uppercase text-dark bg-light border p-2">

                                            </h4>
                                        </div>
                                    </div>
                                        <table id="table" class="table w-100 nowrap">
                                            <thead class="bg-info text-white">
                                                <tr>
                                                    <th id="num">ลำดับ</th>
                                                    <th>ธนาคาร</th>
                                                    <th>Username</th>
                                                    <th id="num2">ยอดเงินถอน</th>
                                                    <th>ผู้ตรวจสอบ</th>
                                                    <th>ผู้โอน</th>
                                                    <th>วันที่เข้าระบบ</th>
                                                    <th>วันที่ยืนยัน</th>
                                                    <th>หมายเหตุ</th>
                                                    <th>สถานะ</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="insertRow">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal fade" id="modal_withdraw" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">ตรวจสอบก่อนถอน</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table">
                                            <h4> รายการ เพิ่ม - ลด เครดิต</h4>
                                            <thead class="table-info">
                                                <tr>
                                                    <th scope="col" class="text-dark">วันที่</th>
                                                    <th scope="col" class="text-dark">เวลา</th>
                                                    <th scope="col" class="text-dark">เพิ่ม</th>
                                                    <th scope="col" class="text-dark">ลด</th>
                                                </tr>
                                            </thead>
                                            <tbody id="logCreditUser">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table class="table">
                                            <h4> รายการ ฝาก - ถอน</h4>
                                            <thead class="table-info">
                                                <tr>
                                                    <th scope="col" class="text-dark">วันที่</th>
                                                    <th scope="col" class="text-dark">เวลา</th>
                                                    <th scope="col" class="text-dark">ฝาก</th>
                                                    <th scope="col" class="text-dark">ถอน</th>
                                                </tr>
                                            </thead>
                                            <tbody id="statementUser">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <input type="hidden" name="bank_id" id="bankGroup_id" value="">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <div class="form-group row mt-2">
                                        <label class="col-form-label col-md-2 col-sm-3 text-end ">ธนาคารออก</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="hidden" id="accept_id" value="">
                                            <select name="accept_bankWeb_id" id="accept_bankWeb_id" class="form-select" style="">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" onClick="accept_true()">ยืนยัน</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal_reback_withdraw" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel1">เลือกรายการ</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="bank_id" id="reback_withdraw_id" value="">
                                <div class="col-md-10">
                                    <label class="btn btn-outline-danger text-start" id="success" style="width: 100%;font-size: 18px;">
                                        <input type="radio" class="form-check-input" value="success" id="reback_withdraw_type" onClick="addColor()" name="reback_withdraw_type">
                                        ยกเลิก / บันทึกเป็นสำเร็จ </label>
                                </div>
                                <div class="col-md-10 mt-2">
                                    <label class="btn btn-outline-danger text-start " id="rewithdraw" style="width: 100%;font-size: 18px;">
                                        <input type="radio" class="form-check-input" value="rewithdraw" id="reback_withdraw_type" onClick="addColor()" name="reback_withdraw_type">
                                        ยกเลิก / กลับไปถอนใหม่ </label>
                                </div>
                                <div class="col-md-10 mt-2">
                                    <label class="btn btn-outline-danger text-start " id="delete" style="width: 100%;font-size: 18px;">
                                        <input type="radio" class="form-check-input" value="delete" id="reback_withdraw_type" onClick="addColor()" name="reback_withdraw_type">
                                        ยกเลิก / ลบทิ้ง </label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <p>
                                            ยกเลิก : ยกเลิกรายการรอคิว<br>
                                            ยกเลิก/บันทึกเป็นสำเร็จ : จะสร้างรายการในรายการธนาคารให้ กรณีมีอยู่แล้วจะสร้างทับ<br>
                                            ยกเลิก/กลับไปถอนใหม่ : จะเปลี่ยนสถานะเป็นรอโอน และจะลบรายการธนาคารเดิมออกกรณีมีรายการ<br>
                                            ยกเลิก/ลบทิ้ง : ลบรายการนี้ทิ้งไปเลยและจะลบรายการธนาคารออกเช่นกัน <br>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" onClick="reback_withdraw()">ยืนยัน</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modalView" class="modal fade mt-4" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-information h1 text-info"></i>
                                    <p class="mt-2 font-16 text-dark">ทำรายการสำเร็จ</p>
                                    <p class="mt-3 font-16 text-dark">
                                        โอนเงิน กรุงไทย - 7750305033<br>
                                        ชื่อบัญชี: MISSWANTHANEE MAISUWAN<br>
                                        จำนวนเงิน (฿) 200.00<br>
                                        ยอดเงินคงเหลือ 56,332.61 บาท
                                    </p>
                                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <style>
                    th {
                        color: white;
                    }

                    .modal-busy {
                        position: fixed;
                        z-index: 999;
                        height: 100%;
                        width: 100%;
                        top: 0;
                        left: 0;
                        background-color: Black;
                        filter: alpha(opacity=60);
                        opacity: 0.6;
                        -moz-opacity: 0.8;
                    }

                    .center-busy {
                        z-index: 1000;
                        margin: 300px auto;
                        padding: 0px;
                        width: 130px;
                        filter: alpha(opacity=100);
                        opacity: 1;
                        -moz-opacity: 1;
                    }

                    .center-busy img {
                        height: 128px;
                        width: 128px;
                    }
                </style>

                <div class="modal-busy" id="loader" style="display: none">
                    <div class="center-busy" id="test-git">
                        <img alt="" src="<?php echo base_url(); ?>/assets/images/ZZ5H.gif" />
                    </div>
                </div>


                <script>
                    var csrfName = '<?= csrf_token() ?>';
                    var csrfHash = '<?= csrf_hash() ?>';
                    $("a#withdraw_total").on('click', function() {
                        window.location = "<?= base_url('withdraw/show') ?>";
                    });
                    $("a#pending_confirmation").on('click', function() {
                        window.location = "<?= base_url('withdraw/pending_confirmation') ?>";
                    });
                    $("a#lists_error").on('click', function() {
                        window.location = "<?= base_url('withdraw/lists_error') ?>";
                    });
                    $("a#lists_cancel").on('click', function() {
                        window.location = "<?= base_url('withdraw/lists_cancel') ?>";
                    });
                    $("a#transfer_queue").on('click', function() {
                        window.location = "<?= base_url('withdraw/transfer_queue') ?>";
                    });
                    $(document).ready(function() {
                        // เมื่อ Model withdraw ปิดทำรายการ ระบบดึงรายการเดิมกลับมา
                        $('#modal_withdraw').on('hidden.bs.modal', () => {
                            let id = $('#accept_id').val();
                            return_button_default(id);
                        });
                    });
                    const data_id = [];
                    setInterval(update_withdraw, 10000);

                    function update_withdraw() {
                        var base_url = '<?php echo base_url() ?>';
                        $.ajax({
                            url: '<?php echo base_url('withdraw/check_withdrawal') ?>',
                            type: 'GET',
                            dataType: 'json'
                        }).done(async function(res) {
                            var re = JSON.parse(res);
                            if (re.status == true) {
                                for (let i = 0; i < re.data.length; i++) {
                                    if (re.data[i].id > data_id[0]) {
                                        await data_id.shift();
                                        await data_id.push(re.data[i].id);
                                        var table = document.getElementById("insertRow");
                                        var row = table.insertRow(0);
                                        var cell1 = row.insertCell(0);
                                        var cell2 = row.insertCell(1);
                                        var cell3 = row.insertCell(2);
                                        var cell4 = row.insertCell(3);
                                        var cell5 = row.insertCell(4);
                                        var cell6 = row.insertCell(5);
                                        var cell7 = row.insertCell(6);
                                        var cell8 = row.insertCell(7);
                                        var cell9 = row.insertCell(8);
                                        var cell10 = row.insertCell(9);
                                        var cell11 = row.insertCell(10);
                                        row.setAttribute('class', 'animate__animated animate__fadeInLeft bg-light');
                                        row.setAttribute('id', 'New' + re.data[i].id);
                                        cell1.setAttribute('class', 'bg-dangerlight3');
                                        cell4.setAttribute('class', 'bg-success text-white');
                                        cell1.innerHTML = 'New';
                                        cell2.innerHTML = '<img src="' + base_url + "/assets/images/Bank_show/" + re.data[i].user_bank_short + '.png"  alt="user-image" class="me-1 mt-1" height="30"> <br> <p class="mt-2 text-blue">' + re.data[i].account + '</p>';
                                        cell3.innerHTML = re.data[i].user_username;
                                        cell4.innerHTML = re.data[i].amount;
                                        cell5.innerHTML = '<h5 class="p-2 text-right" id="inspector' + re.data[i].id + '"></h5>';
                                        cell6.innerHTML = '<h5 class="p-2 text-right" id="confirmer' + re.data[i].id + '"></h5>';
                                        cell7.innerHTML = formateDate(re.data[i].time);
                                        cell8.innerHTML = '<h5 class="p-2 text-right" id="confirm_time' + re.data[i].id + '"></h5>';;
                                        cell9.innerHTML = '-';
                                        myAction(re.data[i].id);
                                        if (re.data[i].status == 1) {
                                            cell10.innerHTML = '<h3 id="in_progress' + re.data[i].id + '"> <span class = "badge bg-warning text-white mdi mdi-clock"> wait </span></h3><h3 id="result' + re.data[i].id + '"></h3>';
                                        }
                                        if (re.data[i].status == 1) {
                                            cell11.innerHTML = '<td class="text-center"><div id="Withdrawal_Status' + re.data[i].id + '"> ' +
                                                ' <button type="button" class="btn btn-success waves-effect waves-light" onClick="accept_withdraw(' + re.data[i].id + ')" title="เช็กรายการ"><i class="mdi mdi-check-bold"></i> </button>' +
                                                ' <button type="button" class="btn btn-danger waves-effect waves-light" title="ยกเลิก" onClick="admin_reject(' + re.data[i].id + ')"><i class="mdi mdi-close-thick"></i></button>' +
                                                ' <button type="button" class="btn btn-danger waves-effect waves-light" title="ลบ" onClick="remove_withdraw(' + re.data[i].id + ')"><i class="mdi mdi-delete-forever"></i></button> </div></td>';
                                        }
                                    } else {
                                        // console.log('เเสดงเเล้ว');
                                    }
                                }
                            }
                        });
                    }

                    function myAction(withdraw_id) {
                      var myAction = setInterval(function() {
                            $.ajax({
                                url: '<?php echo base_url('withdraw/check_status') ?>',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    withdraw_id: withdraw_id
                                },
                            }).done(function(res) {
                                var re = JSON.parse(res);
                                if (re.status == true) {
                                    if (re.data[0].status == 2) {
                                        $('#inspector' + withdraw_id).html('<h5 class="p-2 text-right">' + re.data[0].admin_cf + '</h5>');
                                        $('#confirmer' + withdraw_id).html('<h5 class="p-2 text-right">' + re.data[0].admin_cf + '</h5>');
                                        $('#confirm_time' + withdraw_id).html('<h5 class="p-2 text-right">' + formateDate(re.data[0].admin_cfTime) + '</h5>');
                                        $('#in_progress' + withdraw_id).hide();
                                        $('#result' + withdraw_id).html('<h3> <span class = "badge bg-success text-white mdi mdi-checkbox-marked-circle"> success </span></h3>');
                                        $('#Withdrawal_Status' + withdraw_id).html('<div id="Withdrawal_Status' + withdraw_id + '"> ' +
                                        '<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + withdraw_id + ')" ><i class="mdi mdi-refresh"></i> </button> </div>');

                                    } else if (re.data[0].status == 6) {
                                        $('#in_progress' + withdraw_id).hide();
                                        $('#result' + withdraw_id).html('<h3 id="waitauto' + withdraw_id + '"> <span class = "badge bg-warning text-white mdi mdi-alarm-multiple"> wait auto </span></h3><h4 id="showresult' + withdraw_id + '"></h3>');
                                        $('#Withdrawal_Status' + withdraw_id).html('<div id="Withdrawal_Status' +withdraw_id + '">  <div><button type="button" class="btn btn-secondary1 waves-effect waves-light" id="timewait2_' +withdraw_id + '" style="margin-right:2px;"></button>' +
                                         '<hh id="rewithdraw2_' + withdraw_id + '"></hh><dd id="showrefresh2' +withdraw_id + '"></dd></div></div></td>');
                                          pending_withdrawal2(withdraw_id, re.data[0].admin_cfTime);
                                    } else if (re.data[0].status == 7) {
                                        $('#in_progress' + withdraw_id).hide();
                                        $('#result' + withdraw_id).html('<h3><span class = "badge bg-danger text-white mdi mdi-alert-circle"> error </span></h3>');
                                        $('#Withdrawal_Status' + withdraw_id).html('<td class="text-center"><div id="Withdrawal_Status' + withdraw_id + '">    <button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + withdraw_id + ')"><i class="mdi mdi-refresh"></i></button> </div></td>');
                                    }
                                } else {

                                }
                            });
                        }, 3000);

                    }

                    function return_button_default(id) {
                        let statu_value = '<button type="button" class="btn btn-success waves-effect waves-light" onClick="accept_withdraw(' + id + ')" title="เช็กรายการ" ><i class="mdi mdi-check-bold"></i> </button> ' +
                            '<button type="button" class="btn btn-danger waves-effect waves-light" onClick="admin_reject(' + id + ')" ><i class="mdi mdi-close-thick"></i></button> ' +
                            '<button type="button" class="btn btn-danger waves-effect waves-light" title="ลบ" onClick="remove_withdraw(' + id + ')"><i class="mdi mdi-delete-forever"></i></button>';
                        $('#withdraw_status' + id).html(statu_value);
                        $('#withdraw_status' + id).removeClass('withdraw_loader');
                    }
                    async function accept_withdraw(id) {
                        $('#withdraw_status' + id).html('');
                        $('#withdraw_status' + id).addClass('withdraw_loader');
                        const balance_bankweb = await get_bankweb_balanace();
                        var list_bankweb = `<option value="" > - กรุณาเลือก - </option>`;
                        $.each(balance_bankweb, function(index, value) {
                            list_bankweb += `<option  style="${(value.status == 3)?'background-color: #f5c6cb;padding: 4px;':''}"  value="${value.id}" > [${value.bank_short}] ${value.name} | ${addCommas(value.balance)} </option>`;
                        });
                        $('#accept_bankWeb_id').html(list_bankweb);
                        $.ajax({
                            url: '<?php echo base_url('withdraw/see_withdraw') ?>',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                id: id
                            },
                        }).done(function(res) {
                            var re = JSON.parse(res);
                            if (re.status == true) {
                                var html = '';
                                var htmll = '';
                                var data = re.data;
                                var data1 = re.data1
                                for (let i = 0; i < re.data.length; i++) {
                                    var d = new Date(data[i].auto_update * 1000);
                                    var day = d.getDate();
                                    var month = d.getMonth() + 1;
                                    var years = d.getFullYear();
                                    var Hours = d.getHours();
                                    var Minutes = d.getMinutes();
                                    var Seconds = d.getSeconds();
                                    // console.log(dateCreate);
                                    var date = day + '/' + month + '/' + years
                                    var time = Hours < 10 ? '0' + Hours + ':' + Minutes : Hours + ':' + Minutes
                                    var withdraw = data[i].withdraw > 0 ? data[i].withdraw : '-';
                                    var deposit = data[i].deposit > 0 ? data[i].deposit : '-';
                                    html += '<tr>';
                                    html += '<td>' + date + '</td>';
                                    html += '<td>' + time + '</td>';
                                    html += '<td style="background-color: #a6dfb5">' + deposit + '</td>';
                                    html += '<td style="background-color: #f1556c75">' + withdraw + '</td>';
                                    html += '</tr>';
                                }
                                if (re.data.length == 0) {
                                    html += '<tr><td colspan="4">ไม่มีข้อมูล</td></tr>';
                                }
                                for (let j = 0; j < re.data1.length; j++) {
                                    var d = new Date(data1[j].create_time * 1000);
                                    var day = d.getDate();
                                    var month = d.getMonth() + 1;
                                    var years = d.getFullYear();
                                    var Hours = d.getHours();
                                    var Minutes = d.getMinutes();
                                    var Seconds = d.getSeconds();
                                    // console.log(dateCreate);
                                    var date = day + '/' + month + '/' + years;
                                    var time = Hours < 10 ? '0' + Hours + ':' + Minutes : Hours + ':' + Minutes;
                                    htmll += '<tr>';
                                    htmll += '<td>' + date + '</td>';
                                    htmll += '<td>' + time + '</td>';
                                    if (data1[j].type == 1) {
                                        htmll += '<td style="background-color: #a6dfb5">' + data1[j].amount + '</td><td style="background-color: #f1556c75" >-</td>';
                                    } else if (data1[j].type == 2) {
                                        htmll += '<td style="background-color: #a6dfb5">-</td><td style="background-color: #f1556c75">' + data1[j].amount + '</td>';
                                    }
                                    htmll += '</tr>';
                                }
                                if (re.data1.length == 0) {
                                    htmll += '<tr><td colspan="4">ไม่มีข้อมูล</td></tr>'
                                }
                                $('#statementUser').html(html);
                                $('#logCreditUser').html(htmll);
                            }
                            $('#modal_withdraw').modal('show');
                            $('#accept_id').val(id);

                        })
                    }
                    async function get_bankweb_balanace() {
                        return await new Promise(async (resolve, reject) => {

                            try {
                                $.ajax({
                                    url: '<?php echo base_url('withdraw/get_bankweb_balanace') ?>',
                                    type: 'GET',
                                    dataType: 'json',
                                }).done(function(res) {
                                    var re = JSON.parse(res);
                                    if (re.status == true) {
                                        resolve(re.data);
                                    } else {
                                        resolve(false);
                                    }
                                });

                            } catch (err) {
                                resolve(false);
                            }

                        });
                    }

                    function accept_true() {
                        var withdraw_id = $('#accept_id').val();
                        var bank_web_id = $('#accept_bankWeb_id').val();
                        if (bank_web_id != '') {
                            $.ajax({
                                url: '<?php echo base_url('withdraw/get_bankweb') ?>',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    bank_web_id: bank_web_id,
                                    withdraw_id: withdraw_id,
                                },
                            }).done(function(res) {
                                var re = JSON.parse(res)
                                if (re.status == true) {
                                    let myData = re.data[0];
                                    let banktype = re.bw_type;
                                    let buttons_type = '';
                                    const wrapper = document.createElement('div');
                                    if (myData.blacklist == 0) {
                                        wrapper.innerHTML = "<div class='row' style='background-color:#D3F1F1;font-size: 16px;font-weight:200;color:#000000;border-radius: 10px;'>" +
                                            "<div class='col-md-3 mt-1'>" +
                                            "<img src='<?php echo base_url() ?>/assets/images/Bank_show/" + myData.bw_shortbank + ".png'  width='90%'> " +
                                            "</div>" +
                                            "<div class='col-md-9 text-left' >" +
                                            " <span style='color:blue;'>บัญชีเว็บไซต์ </span><br>" +
                                            " <span> บ/ช : [" + myData.bw_shortbank + "]  " + myData.bw_account +
                                            " <br> ชื่อ  : " + myData.bw_name +
                                            " <br> จำนวนคิว  : " + myData.queus + "</span>" +
                                            "</div>" +
                                            "</div><br>" +
                                            "<div class='row' style='background-color:#D3F1F1;font-size: 16px;font-weight:200;color:#000000;border-radius: 10px;'>" +
                                            "<div class='col-md-3  mt-1'>" +
                                            "<img src='<?php echo base_url() ?>/assets/images/Bank_show/" + myData.us_shortbank + ".png'  width='90%'> " +
                                            "</div>" +
                                            "<div class='col-md-9 text-left' >" +
                                            " <span style='color:blue;'> โอนไปยัง </span><br>" +
                                            " <span> บ/ช : [" + myData.us_shortbank + "]  " + myData.us_account +
                                            " <br> ชื่อ  : " + myData.us_name +
                                            " <br> รหัส : " + myData.us_username + "</span>" +
                                            "</div>" +
                                            "</div>" +

                                            "<div class='col-md-12 text-right' style='font-size: 25px;font-weight:700;color:#1B0670;background-color:#FFF;border-radius: 10px;'>" +
                                            "<span style='color:#000;'>จำนวน : </span>" +
                                            "<span style='color:#1B0670;'>" + myData.wd_amount + "</span>" +
                                            "<span style='color:#000;'> เครดิต</span>" +
                                            "</div>";
                                        buttons_type = true;

                                    } else {
                                        wrapper.innerHTML = "<div class='row' style='background-color:#D3F1F1;font-size: 16px;font-weight:200;color:#000000;border-radius: 10px;'>" +
                                            "<div class='col-md-3  mt-1'>" +
                                            "<img src='<?php echo base_url() ?>/assets/images/Bank_show/" + myData.us_shortbank + ".png'  width='90%'> " +
                                            "</div>" +
                                            "<div class='col-md-9 text-left' >" +
                                            " <span style='color:danger;font-size: 21px;'> บัญชีโดนระงับ </span><br>" +
                                            " <span style='color:danger;'> เนื่องด้วยอันเกินมาจากลูกค้าโกง มิจฉาชีพ หรือมีความผิดปกติที่ไม่ประสงค์ดีต่อเว็บไซต์ของท่าน </span><br>" +
                                            " <span> บ/ช : [" + myData.us_shortbank + "]  " + myData.us_account +
                                            " <br> ชื่อ  : " + myData.us_name +
                                            " <br> รหัส : " + myData.us_username + "</span>" +
                                            "</div>" +
                                            "</div>";

                                        buttons_type = false;
                                    }

                                    Swal.fire({
                                        title: "รายการโอน",
                                        html: wrapper,
                                        cancelButtonColor: '#d33',
                                        showCancelButton: buttons_type,
                                        showConfirmButton: buttons_type
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                // url: '<?php echo base_url('withdraw') ?>/'+banktype,
                                                url: '<?php echo base_url('withdraw') ?>/confirm_withdraw_auto',
                                                type: 'POST',
                                                dataType: 'json',
                                                data: myData,
                                            }).done(function(res) {
                                                var resp = JSON.parse(res)
                                                if (resp.status == true) {
                                                    $('#modal_withdraw').modal('hide');
                                                    Swal.fire({
                                                        icon: "success",
                                                        title: resp.msg,
                                                    }).then((result) => {
                                                        $('#withdraw_status' + myData.withdraw_r.id).html('');
                                                        $('#withdraw_status' + myData.withdraw_r.id).html('<div><button type="button" class="btn btn-secondary1 waves-effect waves-light" id="timewaitR' + withdraw_id + '" style="margin-right:2px;" ></button><hh id="rewithdrawR' + withdraw_id + '"></hh><dd id="showrefreshR' + withdraw_id + '"></dd></div>');
                                                        var chek = setInterval(function() {
                                                            var withdraw_id = myData.withdraw_r.id;
                                                            $.ajax({
                                                                url: '<?php echo base_url('withdraw/checkStatusWithdraw') ?>',
                                                                type: 'POST',
                                                                dataType: 'json',
                                                                data: {
                                                                    withdraw_id: withdraw_id
                                                                },
                                                            }).done(function(res) {
                                                                var re = JSON.parse(res);
                                                                console.log(re.data);
                                                                if (re.status == true) {
                                                                    if (re.data.status == 6) {
                                                                        $('#showresult1' + withdraw_id).html('<h3> <span class = "badge bg-warning text-white mdi mdi-alarm-multiple"> wait auto </span></h3>');
                                                                        $('#waitauto1' + withdraw_id).hide();
                                                                        setInterval(() => {
                                                                            var date = new Date();
                                                                            var time = date.getTime();
                                                                            var timewait = time - re.data.admin_cfTime * 1000;
                                                                            var minutes = Math.floor((timewait % (1000 * 60 * 60)) / (1000 * 60));  
                                                                            var seconds = Math.floor((timewait % (1000 * 60)) / 1000);
                                                                            $('#timewaitR' + withdraw_id).html(('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2));
                                                                            if (minutes >= 3) {
                                                                                $('#rewithdrawR' + withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" onClick="reback_withdraw_modal(' + withdraw_id + ')"><i class="mdi mdi-refresh"></i></button>');
                                                                            }
                                                                        }, 1000);
                                                                    } else if (re.data.status == 2) {
                                                                        $('#timewaitR' + withdraw_id).hide();
                                                                        $('#waitauto1' + withdraw_id).hide();
                                                                        // $('#showresult1' + withdraw_id).hide();
                                                                        $('#admin_cf_name_' + withdraw_id).html(re.data.admin_cf);
                                                                        $('#admin_check_name_' + withdraw_id).html(re.data.admin_cf);
                                                                        $('#showresult1' + withdraw_id).html('<h3><span class = "badge bg-success text-white mdi mdi-checkbox-marked-circle"> success </span></h3>');
                                                                        $('#showrefreshR' + withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + withdraw_id + ')" ><i class="mdi mdi-refresh"></i> </button>');
                                                                        clearInterval(chek);
                                                                    } else if (re.data.status == 7) {
                                                                        $('#timewaitR' + withdraw_id).hide();
                                                                        $('#waitauto1' + withdraw_id).hide();
                                                                        $('#showresult1' + withdraw_id).html('<h3><span class = "badge bg-danger text-white"> error </span></h3>');
                                                                        $('#showrefreshR' + withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + withdraw_id + ')" ><i class="mdi mdi-refresh"></i> </button>');
                                                                        clearInterval(chek);
                                                                    }
                                                                } else {
                                                                    // get status มาไม่ได้
                                                                }
                                                            })
                                                        }, 2000);
                                                        // let statu_value = '<span class = "badge bg-warning text-white"> wait auto </span>';
                                                        // $('#withdraw_status'+withdraw_id).html(statu_value);
                                                        // $('#withdraw_status'+withdraw_id).removeClass('withdraw_loader');
                                                    })
                                                } else {
                                                    Swal.fire({
                                                        icon: "error",
                                                        title: resp.msg,
                                                        showConfirmButton: false,
                                                    });
                                                }
                                            })
                                        } else if (result.isDenied) {
                                            Swal.fire('ไม่สามารถทำรายการได้', 'กรุณาติดต่อพนักงาน', 'error');
                                        }
                                    })
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: re.msg,
                                        showConfirmButton: true,
                                    });

                                }
                            })
                        } else {
                            Swal.fire('กรุณาเลือกธนาคารโอน', '', 'error');
                        }
                    }

                    function addCommas(nStr) {
                        nStr += '';
                        x = nStr.split('.');
                        x1 = x[0];
                        x2 = x.length > 1 ? '.' + x[1] : '';
                        var rgx = /(\d+)(\d{3})/;
                        while (rgx.test(x1)) {
                            x1 = x1.replace(rgx, '$1' + ',' + '$2');
                        }
                        return x1 + x2;
                    }

                    function admin_reject(id) {
                        $('#withdraw_status' + id).html('');
                        $('#withdraw_status' + id).addClass('withdraw_loader');
                        Swal.fire({
                            title: 'ต้องการยกเลิกรายการนี้ ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '<?php echo base_url('withdraw/cancel_wd_check') ?>',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        id: id,
                                    },
                                }).then(function(res) {
                                    var re = JSON.parse(res)
                                    if (re.status == true) {
                                        Swal.fire({
                                            title: 'สาเหตุที่ยกเลิก ?',
                                            icon: 'warning',
                                            input: 'text',
                                            inputAttributes: {
                                                autocapitalize: 'off'
                                            },
                                            showLoaderOnConfirm: true,
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            preConfirm: (login) => {
                                                return login;
                                            },
                                            allowOutsideClick: () => !Swal.isLoading()
                                        }).then((result2) => {
                                            if (result2.isConfirmed) {
                                                if (result2.value) {
                                                    $.ajax({
                                                        url: '<?php echo base_url('withdraw/cancel_withdraw') ?>',
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        data: {
                                                            id: id,
                                                            cause: result2.value
                                                        },
                                                    }).done(function(scc) {
                                                        var respon = JSON.parse(scc)
                                                        if (respon.status == true) {
                                                            Swal.fire({
                                                                icon: "success",
                                                                title: respon.msg,
                                                                showConfirmButton: true,
                                                            }).then((result3) => {
                                                                location.reload();
                                                            })
                                                        } else {
                                                            Swal.fire({
                                                                icon: "error",
                                                                title: respon.msg,
                                                                showConfirmButton: true,
                                                            }).then((result4) => {
                                                                location.reload();
                                                            })
                                                        }
                                                    })
                                                } else {
                                                    Swal.fire('กรุณากรอกสาเหตุที่ยกเลิก', '', 'error').then(() => {
                                                        return_button_default(id);
                                                    });
                                                }
                                            } else {
                                                Swal.fire('ยกเลิกการทำรายการ', '', 'error').then(() => {
                                                    return_button_default(id);
                                                });
                                            }
                                        })
                                    } else {
                                        Swal.fire('ไม่สามารถทำรายการได้', '', 'error').then(() => {
                                            location.reload();
                                        });
                                    }
                                })
                            } else {
                                return_button_default(id);
                            }
                        })
                    }

                    function remove_withdraw(id) {
                        $('#withdraw_status' + id).html('');
                        $('#withdraw_status' + id).addClass('withdraw_loader');
                        Swal.fire({
                            title: 'ลบรายการ ไม่แอดเครดิตลูกค้า ?',
                            icon: 'warning',
                            showCancelButton: true,
                            showConfirmButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '<?php echo base_url('withdraw/remove_withdraw') ?>',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        id: id,
                                    },
                                }).then(function(res) {
                                    var re = JSON.parse(res)
                                    if (re.status == true) {
                                        Swal.fire(re.title, re.msg, 'success').then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire(re.title, re.msg, 'error').then(() => {
                                            location.reload();
                                        });
                                    }
                                })
                            } else {
                                return_button_default(id);
                            }
                        })
                    }

                    function reback_withdraw_modal(id) {
                        $('#modal_reback_withdraw').modal('show');
                        $('#reback_withdraw_id').val(id);
                    }

                    function reback_withdraw() {
                        var withdraw_id = $('#reback_withdraw_id').val();
                        var rewithdraw_type = $("input[name='reback_withdraw_type']:checked").val();
                        console.log('5555');
                        Swal.fire({
                            title: 'ยืนยันการทำรายการ ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '<?php echo base_url('withdraw/reback_withdraw') ?>',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        withdraw_id: withdraw_id,
                                        rewithdraw_type: rewithdraw_type
                                    },
                                }).done(function(res) {
                                    var re = JSON.parse(res);
                                    if (re.status == true) {
                                        Swal.fire(re.title, re.msg, 'success').then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire(re.title, re.msg, 'error').then(() => {
                                            location.reload();
                                        });
                                    }

                                })
                            }
                        })
                    }

                    function addColor() {
                        var rewithdraw_type = $("input[name='reback_withdraw_type']:checked").val();
                        if (rewithdraw_type == 'success') {
                            document.getElementById(rewithdraw_type).classList.add("bg-danger");
                            document.getElementById(rewithdraw_type).classList.add("text-white");
                            document.getElementById("rewithdraw").classList.remove("bg-danger");
                            document.getElementById("rewithdraw").classList.remove("text-white");
                            document.getElementById("delete").classList.remove("bg-danger");
                            document.getElementById("delete").classList.remove("text-white");
                        } else if (rewithdraw_type == 'rewithdraw') {
                            document.getElementById("rewithdraw").classList.add("bg-danger");
                            document.getElementById("rewithdraw").classList.add("text-white");
                            document.getElementById("success").classList.remove("bg-danger");
                            document.getElementById("success").classList.remove("text-white");
                            document.getElementById("delete").classList.remove("bg-danger");
                            document.getElementById("delete").classList.remove("text-white");
                        } else if (rewithdraw_type == 'delete') {
                            document.getElementById("delete").classList.add("bg-danger");
                            document.getElementById("delete").classList.add("text-white");
                            document.getElementById("success").classList.remove("bg-danger");
                            document.getElementById("success").classList.remove("text-white");
                            document.getElementById("rewithdraw").classList.remove("bg-danger");
                            document.getElementById("rewithdraw").classList.remove("text-white");
                        }
                    }

                    function formateDate(unixTimestamp) {
                        const milliseconds = unixTimestamp * 1000 // 1575909015000
                        const dateObject = new Date(milliseconds)
                        const humanDateFormat = dateObject.toLocaleString("es-MX")
                        return humanDateFormat;
                    }



                    var time1 = "00:00";
                    var time2 = "23:59";

                    document.getElementById("time1").value = time1;
                    document.getElementById("time2").value = time2;


                    var x = setInterval(function index() {

                        var d1 = new Date();

                        var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()
                        document.getElementById("date1").value = date1;
                        document.getElementById("date2").value = date1;

                        filter();
                        clearInterval(x);

                    }, 500);

                    function today() {

                        var d1 = new Date();

                        var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()
                        document.getElementById("date1").value = date1;
                        document.getElementById("date2").value = date1;

                        filter();

                    }

                    function yesterday() {

                        var d1 = new Date(new Date().setDate(new Date().getDate() - 1));


                        var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()

                        document.getElementById("date1").value = date1;
                        document.getElementById("date2").value = date1;

                        filter();

                    }

                    function filter() {
                        $("#loader").show();
                        $.ajax({
                                url: '<?php echo base_url('withdraw/filter') ?>',
                                type: "POST",
                                data: $('#form_withdraw').serialize(),
                                dataType: "JSON",
                            })
                            .done(function(body) {
                                const res = JSON.parse(body);
                                if (res.withdrawData.length !== 0) {
                                    data_id.shift();
                                    data_id.push(res.withdrawData[0].id);
                                } else {
                                    data_id.shift();
                                    data_id.push(res.lastId[0].id);
                                }

                                var date11 = document.getElementById('date1').value;
                                var date22 = document.getElementById('date2').value;

                                var today1 = new Date(date11);
                                var dd1 = String(today1.getDate()).padStart(2, '0');
                                var mm1 = String(today1.getMonth() + 1).padStart(2, '0'); //January is 0!
                                var yyyy1 = today1.getFullYear();

                                today1 = dd1 + '/' + mm1 + '/' + yyyy1;


                                var today2 = new Date(date22);
                                var dd2 = String(today2.getDate()).padStart(2, '0');
                                var mm2 = String(today2.getMonth() + 1).padStart(2, '0'); //January is 0!
                                var yyyy2 = today2.getFullYear();

                                today2 = dd2 + '/' + mm2 + '/' + yyyy2;

                                if (res.sumuserData == undefined) {
                                    document.getElementById("sum").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;
                                } else {
                                    document.getElementById("sum").innerHTML = ` จำนวนลูกค้าทั้งหมด ` + res.sumuserData[0].sum + ` คน ของวันที่ ` + today1 + ` ถึง ` + today2;
                                }

                                if (res.code == 0) {
                                    Swal.fire({
                                        icon: "error",
                                        title: res.msg,
                                        showConfirmButton: false,
                                    });

                                    $("#loader").hide();
                                    $('#table').DataTable({
                                        destroy: true,
                                        processing: true,
                                        deferRender: true,
                                        language: {
                                            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                                            paginate: {
                                                previous: "<i class='mdi mdi-chevron-left'>",
                                                next: "<i class='mdi mdi-chevron-right'>",
                                            },
                                        },
                                        drawCallback: function() {
                                            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                                        },
                                    });

                                    document.getElementById("myCheck").click();
                                } else {

                                    $("#loader").hide();
                                    if (res.withdrawData == false) {
                                        var withdraw = [];
                                    } else {
                                        var withdraw = res.withdrawData;
                                    }
                                    $('#table').DataTable({
                                        data: withdraw,
                                        // pageLength: 20,
                                        // lengthChange: false,
                                        // searching: false,
                                        // paging: false,
                                        // ordering: false,
                                        // info: false,
                                        destroy: true,
                                        processing: true,
                                        deferRender: true,
                                        scrollX: true,
                                        language: {
                                            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                                            paginate: {
                                                previous: "<i class='mdi mdi-chevron-left'>",
                                                next: "<i class='mdi mdi-chevron-right'>",
                                            },
                                        },
                                        drawCallback: function() {
                                            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                                        },
                                        columns: [{
                                                data: "row_num",
                                                className: "bg-dangerlight2",
                                                targets: 1,
                                                render: function(data) {

                                                    return '<td><p>' + data + '</p></td>'

                                                }
                                            },
                                            {
                                                data: {
                                                    user_bank_short: "user_bank_short",
                                                    account: "account",
                                                },
                                                render: function(data) {

                                                    var base_url = '<?php echo base_url() ?>';
                                                    return '  <td class="p-0 m-0"> <img src="' + base_url + "/assets/images/Bank_show/" + data.user_bank_short + '.png"  alt="user-image" class="me-1 mt-1" height="30"> <br> <p class="mt-2 text-blue">' + data.account + '</p></td>'

                                                }
                                            },
                                            {
                                                data: "user_username"
                                            },
                                            {
                                                data: "amount",
                                                className: "bg-success text-white",
                                                targets: 1,
                                                render: function(data) {

                                                    return '<td><p>' + data + '</p></td>'

                                                }
                                            },
                                            {
                                                data: {
                                                    admin_check_name: "admin_check_name",
                                                    id: "id",
                                                },
                                                render: function(data) {


                                                    if (data.admin_check_name == 1) {
                                                        return '<td class="p-2 text-right" id="admin_check_name_' + data.id + ' "> Auto </td>';
                                                    } else if (data.admin_check_name == null) {
                                                        return '<td class="p-2 text-right" id="admin_check_name_' + data.id + ' "> -  </td>';
                                                    } else {
                                                        return '<td class="p-2 text-right" id="admin_check_name_' + data.id + ' "> ' + data.admin_check_name + ' </td>';
                                                    }

                                                }
                                            },
                                            {
                                                data: {
                                                    admin_cf_name: "admin_cf_name",
                                                    id: "id",
                                                },
                                                render: function(data) {


                                                    if (data.admin_cf_name == 1) {
                                                        return '<td class="p-2 text-right" id="admin_cf_name_' + data.id + ' "> Auto </td>';
                                                    } else if (data.admin_cf_name == null) {
                                                        return '<td class="p-2 text-right" id="admin_cf_name_' + data.id + ' "> -  </td>';
                                                    } else {
                                                        return '<td class="p-2 text-right" id="admin_cf_name_' + data.id + ' "> ' + data.admin_check_name + ' </td>';
                                                    }

                                                }
                                            },
                                            {
                                                data: "time",
                                                render: function(data) {

                                                    const unixTimestamp = data

                                                    const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                    const dateObject = new Date(milliseconds)

                                                    const humanDateFormat = dateObject.toLocaleString("es-MX")


                                                    return '<td> ' + humanDateFormat + ' </td>'

                                                }
                                            },
                                            {
                                                data: "admin_cfTime",
                                                render: function(data) {

                                                    if (data == "0") {
                                                        return '<td> - </td>';
                                                    } else {

                                                        const unixTimestamp = data

                                                        const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                        const dateObject = new Date(milliseconds)

                                                        const humanDateFormat = dateObject.toLocaleString("es-MX")


                                                        return '<td> ' + humanDateFormat + ' </td>'

                                                    }

                                                }
                                            },
                                            {
                                                data: "admin_cfTime",
                                                render: function(data) {


                                                    return '<td> - </td>';



                                                }
                                            },
                                            {
                                                data: {
                                                    status: "status",
                                                    id: "id",
                                                },
                                                render: function(data) {
                                                    if (data.status == 1) {
                                                        return '<td><h3 id="waitauto1' + data.id + '"> <span class = "badge bg-warning text-white mdi mdi-clock"> wait </span></h3><h3 id="showresult1'+ data.id+ '"></h3></td>';
                                                    } else if (data.status == 2) {
                                                        return '<td><h3 id="waitauto1' + data.id + '"> <span class = "badge bg-success text-white mdi mdi-checkbox-marked-circle"> success </span></h3><h3 id="showresult1'+ data.id+ '"></h3></td>';
                                                    } else if (data.status == 3) {
                                                        return '<td><h3 id="waitauto1' + data.id + '"> <span class = "badge bg-danger  text-white mdi mdi-close-circle" > cancel </span></h3><h3 id="showresult1'+ data.id+ '"></h3></td';
                                                    } else if (data.status == -3) {
                                                        return '<td><h3 id="waitauto1' + data.id + '"><span class = "badge bg-danger text-white mdi mdi-delete"> Delete </span></h3><h3 id="showresult1'+ data.id+ '"></h3></td>';
                                                    } else if (data.status == 4) {
                                                        return '<td><h3 id="waitauto1' + data.id + '"> <span class = "badge bg-info text-white"> check </span></h3><h3 id="showresult1'+ data.id+ '"></h3></td>';
                                                    } else if (data.status == 5) {
                                                        return '<td><h3 id="waitauto1' + data.id + '"> <span class = "badge bg-success text-white"> auto </span></h3><h3 id="showresult1'+ data.id+ '"></h3></td>';
                                                    } else if (data.status == 6) {
                                                        return '<td><h3 id="waitauto1' + data.id + '"> <span class = "badge bg-warning text-white mdi mdi-alarm-multiple"> wait auto </span></h3><h3 id="showresult1'+ data.id+ '"></h3></td>';
                                                    } else if (data.status == 7) {
                                                        return '<td><h3 id="waitauto1' + data.id + '"> <span class = "badge bg-danger text-white mdi mdi-alert-circle"> error </span></h3><h3 id="showresult1'+ data.id+ '"></h3></td>';
                                                    }
                                                }
                                            },
                                            {
                                                data: {
                                                    status: "status",
                                                    id: "id",
                                                },
                                                render: function(data) {
                                                    if (data.status == 1) {
                                                        return '<td class="text-center"><div id="withdraw_status' + data.id + '"> ' +
                                                            ' <button type="button" class="btn btn-success waves-effect waves-light" onClick="accept_withdraw(' + data.id + ')" title="เช็กรายการ"><i class="mdi mdi-check-bold"></i> </button>' +
                                                            ' <button type="button" class="btn btn-danger waves-effect waves-light" title="ยกเลิก" onClick="admin_reject(' + data.id + ')"><i class="mdi mdi-close-thick"></i></button>' +
                                                            ' <button type="button" class="btn btn-danger waves-effect waves-light" title="ลบ" onClick="remove_withdraw(' + data.id + ')"><i class="mdi mdi-delete-forever"></i></button> </div></td>';

                                                    } else if (data.status == 2) {
                                                        return '<td class="text-center"><div id="withdraw_status' + data.id + '"> ' +
                                                            '<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + data.id + ')" ><i class="mdi mdi-refresh"></i> </button> </div></td>';
                                                    } else if (data.status == 3) {
                                                        return '<td class="text-center"><div id="withdraw_status' + data.id + '"> ' +
                                                            '<h4><span class="mdi mdi-block-helper mdi-18px text-danger"></span></h4> </div></td>';
                                                    } else if (data.status == -3) {
                                                        return '<td class="text-center"><div id="withdraw_status' + data.id + '"> ' +
                                                            '<h4><span class="mdi mdi-block-helper mdi-18px text-danger"></span></h4> </div></td>';
                                                    } else if (data.status == 4) {
                                                        return '<td class="text-center"><div id="withdraw_status' + data.id + '"> <button type="button" class="btn btn-success waves-effect waves-light" title="" ><i class="mdi mdi-check-bold"></i> </button> </div></td>';
                                                    } else if (data.status == 6) {
                                                        pending_withdrawal(data.id, data.admin_cfTime);
                                                        return '<td class="text-center"><div id="withdraw_status' + data.id + '">  <div><button type="button" class="btn btn-secondary1 waves-effect waves-light" id="timewait_' + data.id + '" style="margin-right:2px;"></button>' +
                                                            ' <hh id="rewithdraw_' + data.id + '"></hh>' +
                                                            ' <dd id="showrefresh' + data.id + '"></dd>' +
                                                            ' </div></div></td>';
                                                    } else if (data.status == 7) {
                                                        return '<td class="text-center"><div id="withdraw_status' + data.id + '">    <button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + data.id + ')"><i class="mdi mdi-refresh"></i> </button> </div></td>';
                                                    }
                                                }
                                            },

                                        ],
                                    });

                                }
                                var element = document.getElementById("num");
                                element.classList.remove("bg-dangerlight2");
                                var element = document.getElementById("num2");
                                element.classList.remove("bg-success");
                                document.getElementById("myCheck").click();

                            })
                            .fail(function(err) {
                                // console.log(err);
                                Swal.fire({
                                    icon: "error",
                                    title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                    showConfirmButton: false,
                                });

                                $("#loader").hide();
                                $('#table').DataTable({
                                    destroy: true,
                                    processing: true,
                                    deferRender: true,
                                    language: {
                                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                                        paginate: {
                                            previous: "<i class='mdi mdi-chevron-left'>",
                                            next: "<i class='mdi mdi-chevron-right'>",
                                        },
                                    },
                                    drawCallback: function() {
                                        $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                                    },
                                });
                                document.getElementById("myCheck").click();
                            });
                    }

                    function pending_withdrawal(id, admin_cfTime) {

                        setInterval(function() {
                            var date = new Date();
                            var time = date.getTime();
                            var timewait = time - admin_cfTime * 1000;
                            var minutes = Math.floor((timewait % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((timewait % (1000 * 60)) / 1000);
                            $('#timewait_' + id).html(('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2));
                            if (minutes >= 3) {
                                $('#rewithdraw_' + id).html('<button type="button" class="btn btn-warning waves-effect waves-light" onClick="reback_withdraw_modal(' + id + ')"><i class="mdi mdi-refresh"></i></button>');
                            }
                        }, 1000);
                        var chek = setInterval(function() {
                            var withdraw_id = id;
                            $.ajax({
                                url: '<?php echo base_url('withdraw/checkStatusWithdraw') ?>',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    withdraw_id: withdraw_id
                                },
                            }).done(function(res) {
                                var re = JSON.parse(res);
                                if (re.status == true) {
                                        if (re.data.status == 7) {
                                          $('#timewait_' + withdraw_id).hide();
                                          $('#rewithdraw_' + withdraw_id).hide();
                                            $('#showresult' + withdraw_id).html('<span class = "badge bg-danger text-white"> error </span>');
                                            $('#showrefresh' + withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + withdraw_id + ')" ><i class="mdi mdi-refresh"></i> </button>');
                                            $('#waitauto' + withdraw_id).hide();
                                            clearInterval(chek);
                                        } else if (re.data.status == 2) {
                                            $('#timewait_' + withdraw_id).hide();
                                           $('#rewithdraw_' + withdraw_id).hide();
                                            $('#waitauto' + withdraw_id).hide();
                                            $('#showresult' + withdraw_id).html('<span class = "badge bg-success text-white"> success </span>');
                                            $('#showrefresh' + withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + withdraw_id + ')" ><i class="mdi mdi-refresh"></i> </button>');
                                            clearInterval(chek);
                                        }
                                } else {
                                    // get status มาไม่ได้
                                }
                            })
                        }, 2000);
                    }
                    function pending_withdrawal2(id, admin_cfTime) {

                        setInterval(function() {
                            var date = new Date();
                            var time = date.getTime();
                            var timewait = time - admin_cfTime * 1000;
                            var minutes = Math.floor((timewait % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((timewait % (1000 * 60)) / 1000);
                            $('#timewait2_' + id).html(('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2));
                            if (minutes >= 3) {
                                $('#rewithdraw2_' + id).html('<button type="button" class="btn btn-warning waves-effect waves-light" onClick="reback_withdraw_modal(' + id + ')"><i class="mdi mdi-refresh"></i></button>');
                            }
                        }, 1000);
                        var chek = setInterval(function() {
                            var withdraw_id = id;
                            $.ajax({
                                url: '<?php echo base_url('withdraw/checkStatusWithdraw') ?>',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    withdraw_id: withdraw_id
                                },
                            }).done(function(res) {
                                var re = JSON.parse(res);
                                if (re.status == true) {
                                    console.log(re.data.status);
                                    if (re.data.status == 2 || re.data.status == 7) {
                                        $('#timewait2_' + withdraw_id).hide();
                                        $('#rewithdraw2_' + withdraw_id).hide();
                                        $('#waitauto2' + withdraw_id).hide();
                                        if (re.data.status == 7) {
                                            $('#showresult2' + withdraw_id).html('<span class = "badge bg-danger text-white"> error </span>');
                                            $('#showrefresh2' + withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + withdraw_id + ')" ><i class="mdi mdi-refresh"></i> </button>');
                                        } else if (re.data.status == 2) {
                                            $('#showresult2' + withdraw_id).html('<span class = "badge bg-success text-white"> success </span>');
                                            $('#showrefresh2' + withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' + withdraw_id + ')" ><i class="mdi mdi-refresh"></i> </button>');
                                        }
                                        clearInterval(chek);
                                    }
                                } else {
                                    // get status มาไม่ได้
                                }
                            })
                        }, 2000);
                        }
                </script>

                <?php $this->endSection(); ?>