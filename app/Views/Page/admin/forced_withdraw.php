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

    ::-webkit-input-placeholder {
        color: #000 !important;
        font-size: 14px;
    }

    :-moz-placeholder {
        color: #000 !important;
        opacity: 1 !important;
        font-size: 14px;
    }

    ::-moz-placeholder {
        color: #000 !important;
        opacity: 1 !important;
        font-size: 14px;
    }

    :-ms-input-placeholder {
        color: #000 !important;
        font-size: 1px;
    }

    ::-ms-input-placeholder {
        color: #000 !important;
        font-size: 14px;
    }

    ::placeholder {
        color: #000 !important;
        font-size: 14px;
    }
</style>



<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">บังคับถอนเงิน</h4>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="mb-3 col-12 col-md-4 col-lg-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" placeholder="">
                                    </div>
                                    <div class="mb-3 mt-1 col-12 col-md-6 col-lg-2">
                                        <label class="form-label"></label><br>
                                        <button type="button" onClick="filter()" class="btn btn-blue waves-effect waves-light">
                                            ค้นหา
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <ul class="nav nav-tabs nav-bordered">
                <li class="nav-item">
                    <a href="#user" id="users" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                        ข้อมูลลูกค้า
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#af" id="afs" data-bs-toggle="tab" aria-expanded="true" class="nav-link" disabled>
                        แนะนำเพื่อน
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="user">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-dark py-3 text-white">
                                    <h5 class="card-title mb-0 text-white">
                                        <a class="text-white" data-bs-toggle="collapse" href="#checkuser" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-chevron-down"></i> &nbsp;เช็คข้อมูลลูกค้า</a>
                                    </h5>
                                </div>
                                <div id="checkuser" class="collapse">
                                    <div class="card-body">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="mb-3 col-12 col-md-4 col-lg-2" id="usersss">

                                                </div>
                                                <div class="mb-3 col-12 col-md-4 col-lg-2" id="credit">

                                                </div>
                                                <div class="mb-3 col-12 col-md-4 col-lg-2" id="promoName">

                                                </div>
                                                <div class="mb-3 col-12 col-md-4 col-lg-2" id="promoStatus">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive border">
                                            <table class="table table-bordered mb-0">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th>ประเภท</th>
                                                        <th>Turnover</th>
                                                        <th>Win/Lose Target</th>
                                                        <th>Win/Lose</th>
                                                        <th>Out standing</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="Turnover">

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-dark py-3 text-white">
                                    <h5 class="card-title mb-0 text-white">
                                        <a class="text-white" data-bs-toggle="collapse" href="#list" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-chevron-down"></i> &nbsp;รายการฝากล่าสุด 20 รายการ</a>
                                    </h5>
                                </div>
                                <div id="list" class="collapse">
                                    <div class="card-body">
                                        <div class="table-responsive border">
                                            <table id="table" class="table w-100 nowrap ">
                                                <thead class="bg-info text-white">
                                                    <tr>
                                                        <th>ธนาคาร</th>
                                                        <th>เงินฝาก</th>
                                                        <th id="ddd">เครดิตก่อนเติม</th>
                                                        <th>โบนัส</th>
                                                        <th id="ccc">เครดิตหลังเติม</th>
                                                        <th>เวลา</th>
                                                        <th>หมา่ยเหตู</th>
                                                    </tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="tab-pane" id="af">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="table-responsive border">
                                                <table class="table table-bordered mb-0">
                                                    <thead class="bg-info text-white text-center">
                                                        <tr>
                                                            <th colspan="2">แนะนำเพื่อนทั้งหมด 0 คน</th>
                                                        </tr>
                                                        <tr>
                                                            <th rowspan="2">ลำดับ</th>
                                                            <th rowspan="2">Username</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>iwin8866699</td>
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

                function filter() {
                    $("#loader").show();

                    var dataJson = {
                        [csrfName]: csrfHash, // adding csrf here
                        username: $("#username").val(),
                    };

                    $.ajax({
                            url: '<?php echo base_url('forced_withdraw/filter') ?>',
                            type: "POST",
                            data: dataJson,
                            dataType: "json",
                        })
                        .done(function(body) {
                            if (body.code == 1) {

                                $("#loader").hide();

                                document.getElementById("checkuser").className = "collapse show";
                                document.getElementById("list").className = "collapse show";

                                var u = document.getElementById("username").value;


                                document.getElementById("usersss").innerHTML =
                                    `  <label class="form-label"  >Username</label> <input type="text" id="" value="` +
                                    u +
                                    `" class="form-control text-dark " placeholder="" disabled style="width: 100%!important; outline: none!important; border: none; border-bottom: 1px solid #ced4da; height: 32px;"> 
                                    `;

                                document.getElementById("credit").innerHTML =
                                    `  <label class="form-label"  >เครดิตปัจจุบันของลูกค้า</label> <input type="text" id="" value="` +
                                    body.getCredit.credit +
                                    `" class="form-control text-dark " placeholder="" disabled style="width: 100%!important; outline: none!important; border: none; border-bottom: 1px solid #ced4da; height: 32px;"> 
                                    `;

                                let isPassTurnover = false;
                                if (body.Turnover.status == true) {
                                   

                                    document.getElementById('Turnover').innerHTML = "";
                                    for (let i = 0; i < body.Turnover.turnoverToDo.length; i++) {
                                        if (body.Turnover.turnoverToDo[i][5] <= body.Turnover.turnoverToDo[i][2]) isPassTurnover = true;
                                        document.getElementById('Turnover').innerHTML += `
                                <tr>
                                <td>${body.Turnover.turnoverToDo[i][0]}</td>
                                <td>${body.Turnover.turnoverToDo[i][4]}</td>
                                <td>${body.Turnover.turnoverToDo[i][5]}</td>
                                <td>${body.Turnover.turnoverToDo[i][2]}</td>
                                <td>${body.Turnover.turnoverToDo[i][3]}</td>
                                </tr>
                                `;
                                    }
                                    if (body.Turnover.promotion != undefined) {
                                        if (body.Turnover.promotion.promoStatus == 1) isPassTurnover = true;
                                        document.getElementById("promoName").innerHTML =
                                            `  <label class="form-label"  >โปรโมชั่น</label> <input type="text" id="" value="` +
                                            body.Turnover.promotion.promoName +
                                            `" class="form-control text-dark" placeholder="" disabled style="width: 100%!important; outline: none!important; border: none; border-bottom: 1px solid #ced4da; height: 32px;"> 
                                    `;
                                        document.getElementById("promoStatus").innerHTML =
                                            `  <label class="form-label">สถานะโปรโมชั่น</label> <input type="text" id="" value="` +
                                            `${isPassTurnover === true ? 'ผ่านโปรโมชั่น' : 'ติดโปรโมชั่น'}` +
                                            `" class="form-control ${isPassTurnover === true ? 'text-success':'text-danger'}" placeholder="" disabled style="width: 100%!important; outline: none!important; border: none; border-bottom: 1px solid #ced4da; height: 32px;"> 
                                        `;
                                    } else {
                                        document.getElementById("promoName").innerHTML =
                                            `  <label class="form-label"  >Promotion</label> <input type="text" id="" value="` +
                                            '-' +
                                            `" class="form-control text-dark" placeholder="" disabled style="width: 100%!important; outline: none!important; border: none; border-bottom: 1px solid #ced4da; height: 32px;"> 
                                    `;

                                        document.getElementById("promoStatus").innerHTML =
                                            `  <label class="form-label"  >สถานะโปรโมชั่น</label> <input type="text" id="" value="` +
                                            `-` +
                                            `" class="form-control text-dark" placeholder="" disabled style="width: 100%!important; outline: none!important; border: none; border-bottom: 1px solid #ced4da; height: 32px;"> 
                                        `;
                                    }

                                    // console.log(res);
                                    $('#table').DataTable({
                                        data: body.deposit.statement,
                                        pageLength: 20,
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
                                                data: "from_bank",
                                                render: function(data) {

                                                    var base_url = '<?php echo base_url() ?>';
                                                    if (data == null || data == '') {
                                                        return ' <td><p>-</p></td>'
                                                    }
                                                    if (data === "  K") {
                                                        return `<td> <img src='${base_url}/assets/images/Bank_show/KBANK.png'  alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">KBANK</p></td>`
                                                    }
                                                    return ' <td> <img src="' + base_url + "/assets/images/Bank_show/" + data + '.png"  alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">' + data + '</p></td>'

                                                }
                                            },
                                            {
                                                data: "deposit"
                                            },
                                            {
                                                data: "credit_before",
                                                className: "bg-infolight",
                                                targets: 1,
                                                render: function(data) {
                                                    return '<td > ' + data + ' </td>'

                                                }
                                            },
                                            {
                                                data: "bonus"
                                            },
                                            {
                                                data: "credit_after",
                                                className: "bg-dangerlight",
                                                targets: 1,
                                                render: function(data) {

                                                    return '<td > ' + data + ' </td>'

                                                }
                                            },
                                            {
                                                data: "created_at",
                                                render: function(data) {
                                                    const unixTimestamp = data

                                                    const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                    const dateObject = new Date(milliseconds)

                                                    const humanDateFormat = dateObject.toLocaleString("es-MX")


                                                    return '<td> ' + humanDateFormat + '</td>'

                                                }
                                            },
                                            {
                                                data: "cause",
                                                render: function(data) {
                                                    if (data == null) {
                                                        return '<td> - </td>'
                                                    } else {
                                                        return '<td> ' + data + '</td>'
                                                    }


                                                }
                                            },

                                        ],
                                    });
                                    var element = document.getElementById("ccc");
                                    element.classList.remove("bg-dangerlight");
                                    var element = document.getElementById("ddd");
                                    element.classList.remove("bg-infolight");

                                } else if (body.Turnover.status == false) {
                                    document.getElementById("REF").innerHTML =
                                        `  <label class="form-label"  >REF ล่าสุด</label> <input type="text" id="" value="" class="form-control text-dark" placeholder="" disabled style="width: 100%!important; outline: none!important; border: none; border-bottom: 1px solid #ced4da; height: 32px;"> 
                                    `;

                                    $('#table').DataTable({
                                        data: body.deposit.statement,
                                        pageLength: 20,
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
                                                data: "from_bank",
                                                render: function(data) {

                                                    var base_url = '<?php echo base_url() ?>';
                                                    return ' <td> <img src="' + base_url + "/assets/images/Bank_show/" + data + '.png"  alt="user-image" class="me-1" height="30"> <br> <p class="mt-1">' + data + '</p></td>'

                                                }
                                            },
                                            {
                                                data: "deposit"
                                            },
                                            {
                                                data: "credit_before",
                                                className: "bg-infolight",
                                                targets: 1,
                                                render: function(data) {
                                                    return '<td > ' + data + ' </td>'

                                                }
                                            },
                                            {
                                                data: "bonus"
                                            },
                                            {
                                                data: "credit_after",
                                                className: "bg-dangerlight",
                                                targets: 1,
                                                render: function(data) {

                                                    return '<td > ' + data + ' </td>'

                                                }
                                            },
                                            {
                                                data: "created_at",
                                                render: function(data) {
                                                    const unixTimestamp = data

                                                    const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                    const dateObject = new Date(milliseconds)

                                                    const humanDateFormat = dateObject.toLocaleString("es-MX")


                                                    return '<td> ' + humanDateFormat + '</td>'

                                                }
                                            },
                                            {
                                                data: "ref_deposit_amb",
                                                render: function(data) {

                                                    return '<a href="" onclick="ref_deposit("' + data + '")" >' + data + '</a>'

                                                }
                                            },
                                        ],
                                    });
                                    var element = document.getElementById("ccc");
                                    element.classList.remove("bg-dangerlight");
                                    var element = document.getElementById("ddd");
                                    element.classList.remove("bg-infolight");

                                }




                            } else if (body.code == undefined) {
                                const res = JSON.parse(body);
                                Swal.fire({
                                    icon: "error",
                                    title: res.msg,
                                    showConfirmButton: false,
                                });

                                $("#loader").hide();

                                document.getElementById("checkuser").className = "collapse show";
                                document.getElementById("list").className = "collapse show";


                                $('#table').DataTable({
                                    pageLength: 20,
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


                            }


                        })
                        .fail(function(err) {
                            console.log(err);
                            Swal.fire({
                                icon: "error",
                                title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                showConfirmButton: false,
                            });

                            $("#loader").hide();

                            document.getElementById("checkuser").className = "collapse show";
                            document.getElementById("list").className = "collapse show";



                            var u = document.getElementById("username").value;


                            document.getElementById("usersss").innerHTML =
                                `  <label class="form-label"  >Username</label> <input type="text" id="" value="` +
                                u +
                                `" class="form-control text-dark " placeholder="" disabled style="width: 100%!important; outline: none!important; border: none; border-bottom: 1px solid #ced4da; height: 32px;"> 
                                    `;

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

                        });
                }


ห
            </script>

            <?php $this->endSection(); ?>