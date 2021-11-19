<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>


<style>
    table tr {
        text-align: center;
        font-size: 14px;
        vertical-align: middle;
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="form_dashboard" method="post">
                                        <?= csrf_field() ?>
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md-6 col-lg-2">
                                                <label class="form-label">วันที่เริ่มต้น</label>
                                                <input type="text" id="date1" name="startDate" class="basic-datepicker form-control" placeholder="วันที่เริ่มต้น" />
                                            </div>

                                            <div class="mb-3 col-12 col-md-6 col-lg-2">
                                                <label class="form-label">เวลา</label>
                                                <input type="text" id="time1" name="startTime" class="24hours-timepicker form-control" placeholder="เวลาเริ่มต้น">
                                            </div>

                                            <div class="mb-3 col-12 col-md-6 col-lg-2">
                                                <label class="form-label">ถึงวันที่</label>
                                                <input type="text" id="date2" name="endDate" class="basic-datepicker form-control" placeholder="ถึงวันที่">
                                            </div>

                                            <div class="mb-3 col-12 col-md-6 col-lg-2">
                                                <label class="form-label">เวลา</label>
                                                <input type="text" id="time2" name="endTime" class="24hours-timepicker form-control" placeholder="เวลาสิ้นสุด">
                                            </div>
                                            <div class="mb-3 mt-1 col-12 col-md-5 col-lg-3">
                                                <label class="form-label"></label><br>
                                                <button type="button" onclick="filter()" class="btn btn-blue waves-effect waves-light">
                                                    ค้นหา
                                                </button>
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
                <div class="col-12 col-md-7 col-lg-4">
                    <div class="card shadow-lg" id="tooltip-container">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="mt-0 mb-3 font-16">User สมัครใหม่</h4>
                                <div class="col-6">
                                    <div class="avatar-md rounded-circle bg-soft-light border-info border">
                                        <i class="fe-user-check font-18 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h2 class="text-blue text-center"><span id="sumuserData" class="font-26" style="font-weight: bold;"></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-4">
                    <div class="card shadow-lg" id="tooltip-container">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="mt-0 mb-3 font-16">User ฝากยอดแรก</h4>
                                <div class="col-6">
                                    <div class="avatar-md rounded-circle bg-soft-light border-info border">
                                        <i class="fe-user font-18 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h2 class="text-blue text-center"><span id="sumfirststatementuserData" class="font-26" style="font-weight: bold;"></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-4">
                    <div class="card shadow-lg" id="tooltip-container">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="mt-0 mb-3 font-16">User ทั้งหมด</h4>
                                <div class="col-6">
                                    <div class="avatar-md rounded-circle bg-soft-light border-info border">
                                        <i class="fe-users font-18 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h2 class="text-blue text-center"><span id="sumsuserData" class="font-26" style="font-weight: bold;"></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg" id="tooltip-container">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="mt-0 mb-3 font-16">รายการฝากวันนี้</h4>
                                <div class="col-6">
                                    <div class="avatar-md rounded-circle bg-soft-light border-info border">
                                        <i class="mdi mdi-cash-multiple font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h2 class="text-blue text-center"><span id="sumdepositlistData" class="font-26" style="font-weight: bold;"></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg" id="tooltip-container">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="mt-0 mb-3 font-16">ยอดฝากวันนี้</h4>
                                <div class="col-6">
                                    <div class="avatar-md rounded-circle bg-soft-light border-info border">
                                        <i class="mdi mdi-cash-plus font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h2 class="text-blue text-center"><span id="sumdepositData" class="font-26" style="font-weight: bold;"></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg" id="tooltip-container">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="mt-0 mb-3 font-16">รายการถอนวันนี้</h4>
                                <div class="col-6">
                                    <div class="avatar-md rounded-circle bg-soft-light border-info border">
                                        <i class="mdi mdi-cash-minus font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h2 class="text-blue text-center"><span id="sumwithdrawlistData" class="font-26" style="font-weight: bold;"></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg" id="tooltip-container">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="mt-0 mb-3 font-16">ยอดถอนวันนี้</h4>
                                <div class="col-6">
                                    <div class="avatar-md rounded-circle bg-soft-light border-info border">
                                        <i class="mdi mdi-cash-usd-outline font-22 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h2 class="text-blue text-center"><span id="sumwithdrawData" class="font-26" style="font-weight: bold;"></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title font-16">รายการฝากต่อธนาคาร</h4>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="table" class="table w-100 nowrap">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="text-dark">#</th>
                                                    <th class="text-dark">ชื่อบัญชี</th>
                                                    <th class="text-dark">ธนาคาร</th>
                                                    <th class="text-dark">รูป</th>
                                                    <th class="text-dark">จำนวน</th>
                                                    <th class="text-dark">ยอดเงิน</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title font-16">รายการถอนต่อธนาคาร</h4>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="table2" class="table w-100 nowrap">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="text-dark">#</th>
                                                    <th class="text-dark">ชื่อบัญชี</th>
                                                    <th class="text-dark">ธนาคาร</th>
                                                    <th class="text-dark">รูป</th>
                                                    <th class="text-dark">จำนวน</th>
                                                    <th class="text-dark">ยอดเงิน</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-12 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title font-16">การใช้งานลูกค้า</h4>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mb-0 p-0 m-0 border">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="text-dark">Platform</th>
                                                    <th class="text-dark">จำนวน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img class="" src="<?php echo base_url(); ?>/assets/images/platform/iphone.png" alt="">
                                                    </td>
                                                    <td>
                                                        <p id="sumMobileiOSData" class="h3"></p>
                                                        <span class="text-dark h4" style="font-weight: bold;">iPhone</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="" src="<?php echo base_url(); ?>/assets/images/platform/android.png" alt="">
                                                    </td>
                                                    <td>
                                                        <p id="sumMobileAndroidData" class="h3"></p>
                                                        <span class="text-dark h4" style="font-weight: bold;">Android</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="" src="<?php echo base_url(); ?>/assets/images/platform/ipad.png" alt="">
                                                    </td>
                                                    <td>
                                                        <p id="sumiPadMacData" class="h3"></p>
                                                        <span class="text-dark h4" style="font-weight: bold;">iPad</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="" src="<?php echo base_url(); ?>/assets/images/platform/tablet.png" alt="">
                                                    </td>
                                                    <td>
                                                        <p id="sumTabletAndroidData" class="h3"></p>
                                                        <span class="text-dark h4" style="font-weight: bold;">Tablet</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <img class="" src="<?php echo base_url(); ?>/assets/images/platform/pc.png" alt="">
                                                    </td>
                                                    <td>
                                                        <p id="sumPcWindowsData" class="h3"></p>
                                                        <span class="text-dark h4" style="font-weight: bold;">Pc Windows</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="" src="<?php echo base_url(); ?>/assets/images/platform/mac.png" alt="">
                                                    </td>
                                                    <td>
                                                        <p id="sumPcMacData" class="h3"></p>
                                                        <span class="text-dark h4" style="font-weight: bold;">MacBook</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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



    function filter() {
        $("#loader").show();
        $.ajax({
                url: '<?php echo base_url('dashboard/filter') ?>',
                type: "POST",
                data: $('#form_dashboard').serialize(),
                dataType: "JSON",
            })
            .done(function(body) {

                $("#loader").hide();
                const res = JSON.parse(body);
                console.log(res);
                if (res.code == 0) {
                    Swal.fire({
                        icon: "error",
                        title: res.msg,
                        showConfirmButton: false,
                    });



                    $('#table').DataTable({
                        lengthChange: false,
                        searching: false,
                        paging: false,
                        ordering: false,
                        info: false,
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

                    $('#table2').DataTable({
                        lengthChange: false,
                        searching: false,
                        paging: false,
                        ordering: false,
                        info: false,
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


                    document.getElementById("sumuserData").innerHTML = "-";
                    document.getElementById("sumfirststatementuserData").innerHTML = "-";
                    document.getElementById("sumsuserData").innerHTML = "-";

                    document.getElementById("sumdepositlistData").innerHTML = "-";
                    document.getElementById("sumdepositData").innerHTML = "-";

                    document.getElementById("sumwithdrawlistData").innerHTML = "-";
                    document.getElementById("sumwithdrawData").innerHTML = "-";

                    document.getElementById("sumPcWindowsData").innerHTML = "-";
                    document.getElementById("sumPcMacData").innerHTML = "-";
                    document.getElementById("sumMobileAndroidData").innerHTML = "-";
                    document.getElementById("sumMobileiOSData").innerHTML = "-";
                    document.getElementById("sumiPadMacData").innerHTML = "-";
                    document.getElementById("sumTabletAndroidData").innerHTML = "-";
                } else {
                    console.log(res.depositData);

                    var sumuserData = new Intl.NumberFormat().format(res.sumuserData[0].sum);
                    var sumfirststatementuserData = new Intl.NumberFormat().format(res.sumfirststatementuserData[0].sum);
                    var sumsuserData = new Intl.NumberFormat().format(res.sumsuserData[0].sum);

                    var sumdepositlistData = new Intl.NumberFormat().format(res.sumdepositlistData[0].sum);
                    var sumdepositData = new Intl.NumberFormat('th-TH', {
                        style: 'currency',
                        currency: 'THB'
                    }).format(res.sumdepositData[0].sum);

                    var sumwithdrawlistData = new Intl.NumberFormat().format(res.sumwithdrawlistData[0].sum);
                    var sumwithdrawData = new Intl.NumberFormat('th-TH', {
                        style: 'currency',
                        currency: 'THB'
                    }).format(res.sumwithdrawData[0].sum);

                    var sumPcWindowsData = new Intl.NumberFormat().format(res.sumPcWindowsData[0].sum);
                    var sumPcMacData = new Intl.NumberFormat().format(res.sumPcMacData[0].sum);
                    var sumMobileAndroidData = new Intl.NumberFormat().format(res.sumMobileAndroidData[0].sum);
                    var sumMobileiOSData = new Intl.NumberFormat().format(res.sumMobileiOSData[0].sum);
                    var sumiPadMacData = new Intl.NumberFormat().format(res.sumiPadMacData[0].sum);
                    var sumTabletAndroidData = new Intl.NumberFormat().format(res.sumTabletAndroidData[0].sum);

                    document.getElementById("sumuserData").innerHTML = sumuserData;
                    document.getElementById("sumfirststatementuserData").innerHTML = sumfirststatementuserData;
                    document.getElementById("sumsuserData").innerHTML = sumsuserData;

                    document.getElementById("sumdepositlistData").innerHTML = sumdepositlistData;
                    document.getElementById("sumdepositData").innerHTML = sumdepositData;

                    document.getElementById("sumwithdrawlistData").innerHTML = sumwithdrawlistData;
                    document.getElementById("sumwithdrawData").innerHTML = sumwithdrawData;

                    document.getElementById("sumPcWindowsData").innerHTML = sumPcWindowsData;
                    document.getElementById("sumPcMacData").innerHTML = sumPcMacData;
                    document.getElementById("sumMobileAndroidData").innerHTML = sumMobileAndroidData;
                    document.getElementById("sumMobileiOSData").innerHTML = sumMobileiOSData;
                    document.getElementById("sumiPadMacData").innerHTML = sumiPadMacData;
                    document.getElementById("sumTabletAndroidData").innerHTML = sumTabletAndroidData;

                    
                    $('#table').DataTable({
                        data: res.depositData,
                        lengthChange: false,
                        searching: false,
                        paging: false,
                        ordering: false,
                        info: false,
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

                        columns: [{
                                data: "row_num",
                                render: function(data) {

                                    return '<td>' + data + '</td>'

                                }
                            },
                            {
                                data: "name"
                            },
                            {
                                data: "bank_short"
                            },
                            {
                                data: "bank_short",
                                render: function(data) {
                                    if (data == "  K") {
                                        return ' <td><img src="<?php echo base_url(); ?>/assets/images/Bank_show/K.png" alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">' + data + '</p></td>';
                                    } else {
                                        var base_url = '<?php echo base_url() ?>';
                                        return ' <td> <img src="' + base_url + "/assets/images/Bank_show/" + data + '.png"  alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">' + data + '</p></td>'
                                    }


                                }
                            },
                            {
                                data: "sum"
                            },
                            {
                                data: "deposit"
                            }
                        ],
                    });

                    $('#table2').DataTable({
                        data: res.withdrawData,
                        lengthChange: false,
                        searching: false,
                        paging: false,
                        ordering: false,
                        info: false,
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

                        columns: [{
                                data: "row_num",
                                render: function(data) {

                                    return '<td>' + data + '</td>'

                                }
                            },
                            {
                                data: "name"
                            },
                            {
                                data: "user_bank_short"
                            },
                            {
                                data: "user_bank_short",
                                render: function(data) {
                                    if (data == "  K") {
                                        return ' <td><img src="<?php echo base_url(); ?>/assets/images/Bank_show/K.png" alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">' + data + '</p></td>';
                                    } else {
                                        var base_url = '<?php echo base_url() ?>';
                                        return ' <td> <img src="' + base_url + "/assets/images/Bank_show/" + data + '.png"  alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">' + data + '</p></td>'
                                    }

                                }
                            },
                            {
                                data: "sum"
                            },
                            {
                                data: "amount"
                            }
                        ],
                    });
                }

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
                    lengthChange: false,
                    searching: false,
                    paging: false,
                    ordering: false,
                    info: false,
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

                $('#table2').DataTable({
                    lengthChange: false,
                    searching: false,
                    paging: false,
                    ordering: false,
                    info: false,
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
            });
    }
</script>


<?php $this->endSection(); ?>