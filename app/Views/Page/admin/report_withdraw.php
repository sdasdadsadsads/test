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
</style>

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
                        <form id="form_withdraw" method="post" action="<?= base_url('report_withdraw/csv') ?>">
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
                    <a href="" onclick="today()" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                        วันนี้
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" onclick="yesterday()" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        เมื่อวาน
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="table2">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                            <div class="card border-primary border-2 mb-3">
                                                <div class="card-body text-center py-2" style="border-bottom: 10px solid #ffd700;">
                                                    <img src="<?php echo base_url(); ?>/assets/images/bank/scb.png" alt="user-image" class="me-1 mb-1" height="30">
                                                    <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">1</span></p>
                                                    <p class="m-0 p-0">จำนวน <span class="text-danger">20</span> ครั้ง</p>
                                                    <p class="m-0 p-0">จำนวนเงินถอน <span class="text-danger">24,583.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                            <div class="card border-primary border-2 mb-3">
                                                <div class="card-body text-center py-2" style="border-bottom: 10px solid #ffafc1;">
                                                    <img src="<?php echo base_url(); ?>/assets/images/bank/scb.png" alt="user-image" class="me-1 mb-1" height="30">
                                                    <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">2</span></p>
                                                    <p class="m-0 p-0">จำนวน <span class="text-danger">50</span> ครั้ง</p>
                                                    <p class="m-0 p-0">จำนวนเงินถอน <span class="text-danger">118,252.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                            <div class="card border-primary border-2 mb-3">
                                                <div class="card-body text-center py-2" style="border-bottom: 10px solid #56bc8a;">
                                                    <img src="<?php echo base_url(); ?>/assets/images/bank/scb.png" alt="user-image" class="me-1 mb-1" height="30">
                                                    <p class="m-0 p-0">บัญชีธนาคารชุดที่ <span class="text-danger">3</span></p>
                                                    <p class="m-0 p-0">จำนวน <span class="text-danger">91</span> ครั้ง</p>
                                                    <p class="m-0 p-0">จำนวนเงินถอน <span class="text-danger">125,437.33</span></p>
                                                </div>
                                            </div>
                                        </div> -->
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
                                                <th id="myCheck">ธนาคาร</th>
                                                <th>Username</th>
                                                <th>ยอดเงินถอน</th>
                                                <th>สถานะ</th>
                                                <th>ผู้ตรวจสอบ</th>
                                                <th>ผู้โอน</th>
                                                <th>วันที่เข้าระบบ</th>
                                                <th>วันที่ยืนยัน</th>
                                                <th>หมายเหตุ</th>
                                                <th>อนุมัติ</th>
                                                <th>ยกเลิกถอน</th>
                                                <th>Reset</th>
                                                <th>ถอนมือ</th>
                                                <th>เปลี่ยนสถานะ</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
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
                var time = 23 - 00;
                document.getElementById("time1").value = time;
                document.getElementById("time2").value = time;


                var x = setInterval(function index() {

                    var d1 = new Date(new Date().setDate(new Date().getDate() - 1));
                    var d2 = new Date();

                    var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()
                    var date2 = d2.getFullYear() + "-" + (d2.getMonth() + 1) + "-" + d2.getDate()
                    document.getElementById("date1").value = date1;
                    document.getElementById("date2").value = date2;

                    filter();
                    clearInterval(x);

                }, 500);

                function today() {

                    var d1 = new Date(new Date().setDate(new Date().getDate() - 1));
                    var d2 = new Date();

                    var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()
                    var date2 = d2.getFullYear() + "-" + (d2.getMonth() + 1) + "-" + d2.getDate()
                    document.getElementById("date1").value = date1;
                    document.getElementById("date2").value = date2;

                    filter();

                }

                function yesterday() {

                    var d1 = new Date(new Date().setDate(new Date().getDate() - 2));
                    var d2 = new Date(new Date().setDate(new Date().getDate() - 1));

                    var date1 = d1.getFullYear() + "-" + (d1.getMonth() + 1) + "-" + d1.getDate()
                    var date2 = d2.getFullYear() + "-" + (d2.getMonth() + 1) + "-" + d2.getDate()
                    document.getElementById("date1").value = date1;
                    document.getElementById("date2").value = date2;

                    filter();


                }

                function filter() {
                    $("#loader").show();
                    $.ajax({
                            url: '<?php echo base_url('report_withdraw/filter') ?>',
                            type: "POST",
                            data: $('#form_withdraw').serialize(),
                            dataType: "JSON",
                        })
                        .done(function(body) {
                            const res = JSON.parse(body);
                            // console.log(res);
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
                                if (res.withdrawData == undefined) {
                                    var withdraw = [];
                                } else {
                                    var withdraw = res.withdrawData;
                                }
                                // // console.log(res);
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
                                                bank_short: "bank_short",
                                                account: "account",
                                            },
                                            render: function(data) {

                                                var base_url = '<?php echo base_url() ?>';
                                                return '  <td class="p-0 m-0"> <img src="' + base_url + "/assets/images/Bank_show/" + data.bank_short + '.png"  alt="user-image" class="me-1 mt-1" height="30"> <br> <p class="mt-2 text-blue">' + data.account + '</p></td>'

                                            }
                                        },
                                        {
                                            data: "username"
                                        },
                                        {
                                            data: "amount"
                                        },
                                        {
                                            data: "status",
                                            render: function(data) {
                                                if (data == 1) {
                                                    return '<td><h2><span class = "badge bg-success text-white">wait</span></h2></td>';
                                                } else if (data == 2) {
                                                    return '<td><h2><span class = "badge bg-success text-white">success</span></h2></td>';
                                                } else if (data == 3) {
                                                    return '<td><h2><span class = "badge bg-success text-white">reject</span></h2></td>';
                                                } else if (data == 4) {
                                                    return '<td><h2><span class = "badge bg-success text-white">check</span></h2></td>';
                                                } else if (data == 5) {
                                                    return '<td><h2><span class = "badge bg-success text-white">auto</span></h2></td>';
                                                } else if (data == 6) {
                                                    return '<td><h2><span class = "badge bg-success text-white">wait auto</span></h2></td>';
                                                }
                                            }
                                        },
                                        {
                                            data: "name"
                                        },
                                        {
                                            data: "name"
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
                                                const unixTimestamp = data

                                                const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                const dateObject = new Date(milliseconds)

                                                const humanDateFormat = dateObject.toLocaleString("es-MX")


                                                return '<td> ' + humanDateFormat + ' </td>'

                                            }
                                        },
                                        {
                                            data: "id",
                                            render: function(data) {

                                                return ' <td> <a href="#!" data-bs-toggle="modal" data-bs-target="#modalView">View</a> </td>';

                                            }
                                        },
                                        {
                                            data: "id",
                                            render: function(data) {

                                                return '  <td><button type="button" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-check-bold"></i> </button> </td>';

                                            }
                                        },
                                        {
                                            data: "id",
                                            render: function(data) {

                                                return '   <td> <button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close-thick"></i></button> </td>';

                                            }
                                        },
                                        {
                                            data: "id",
                                            render: function(data) {

                                                return ' <td> <button type="button" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-refresh"></i></button></td>';

                                            }
                                        },
                                        {
                                            data: "id",
                                            render: function(data) {

                                                return '<td><button type="button" class="btn btn-secondary waves-effect waves-light"><i class="mdi mdi-checkbox-blank-circle-outline"></i></button></td>';

                                            }
                                        },
                                        {
                                            data: "id",
                                            render: function(data) {

                                                return '  <td> <button type="button" class="btn btn-pink waves-effect waves-light"><i class="mdi mdi-circle-edit-outline"></i></button></td>';

                                            }
                                        },
                                    ],
                                });

                            }
                            var element = document.getElementById("num");
                            element.classList.remove("bg-dangerlight2");
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
            </script>

            <?php $this->endSection(); ?>