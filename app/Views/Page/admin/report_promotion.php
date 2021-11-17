<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>

<style>
    table tr {
        text-align: center;
        font-size: 14px;
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
                        <h4 class="page-title">รายงานโปรโมชั่น</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form_promo" method="post" action="<?= base_url('report_promotion/csv') ?>">
                            <?= csrf_field() ?>
                            <div class=" card-body">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="mb-3 col-2">
                                            <label class="form-label">สถานะ</label>
                                            <select name="statusDataSearch" class="form-select">
                                                <option value="">ทั้งหมด</option>
                                                <option value="0">ไม่ผ่านโปโมชั่น</option>
                                                <option value="1">ผ่านโปโมชั่น</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">Username</label>
                                            <input type="number" name="usernameSearch" class="form-control" placeholder="Username">
                                        </div>

                                        <div class="mb-3 col-2">
                                            <label class="form-label">ประเภทโปรโมชั่น</label>
                                            <?php if (isset($promoCategory)) { ?>
                                                <select name="promotioncategoryDataSearch" class="form-select">
                                                    <option value="">กรุณาเลือก</option>
                                                    <?php foreach ($promoCategory as $promoCategorys) { ?>
                                                        <option value="<?php echo $promoCategorys['id']; ?>"><?php echo $promoCategorys['promotion_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <?php    } else { ?>
                                                <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                            <?php } ?>
                                        </div>


                                        <div class="mb-3 col-3">
                                            <label class="form-label">ชื่อโปรโมชั่น</label>
                                            <input type="text" name="promotionnameDataSearch" class="form-control" placeholder="ชื่อโปรโมชั่น">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="mb-3 col-3">
                                            <label class="form-label">วันที่เริ่มต้น</label>
                                            <input type="text" id="date1" name="startDate" class="basic-datepicker form-control" placeholder="วันที่เริ่มต้น">
                                        </div>

                                        <div class="mb-3 col-2">
                                            <label class="form-label">เวลา</label>
                                            <input type="text" id="time1" name="startTime" class="24hours-timepicker form-control" placeholder="เวลาเริ่มต้น">
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">ถึงวันที่</label>
                                            <input type="text" id="date2" name="endDate" class="basic-datepicker form-control" placeholder="ถึงวันที่">
                                        </div>

                                        <div class="mb-3 col-2">
                                            <label class="form-label">เวลา</label>
                                            <input type="text" id="time2" name="endTime" class="24hours-timepicker form-control" placeholder="เวลาสิ้นสุด">
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
                <div class="tab-pane show active" id="table1">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="card-body">
                                            <h4 id="sum2" class="mt-0 text-uppercase text-dark bg-light border p-2">

                                            </h4>
                                        </div>
                                    </div>

                                    <table id="table2" class="table w-100 nowrap" style="overflow: auto;">
                                        <thead>
                                            <tr class="bg-info">
                                                <th>ชื่อโปรโมชั่น</th>
                                                <th>จำนวนครั้ง</th>
                                                <th>จำนวนโบนัส</th>
                                            </tr>
                                        </thead>
                                        <tbody style="overflow: auto;">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div><!-- end col-->

            </div>



            <div class="tab-content">
                <div class="tab-pane show active" id="table2">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="card-body">
                                            <h4 id="sum" class="mt-0 text-uppercase text-dark bg-light border p-2">

                                            </h4>
                                        </div>
                                    </div>

                                    <table id="table" class="table w-100 nowrap" style="overflow: auto;">
                                        <thead>
                                            <tr class="bg-info">
                                                <th>No</th>
                                                <th>username</th>
                                                <th>agent username</th>
                                                <th>ชื่อโปรโมชั่น</th>
                                                <th>ประเภทโปรโมชั่น</th>
                                                <th>จำนวนเเงินเติม</th>
                                                <th>โบนัส</th>
                                                <th>โบนัส + จำนวนเเงินเติม</th>
                                                <th>เวลา</th>
                                                <th>สถานะ</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="overflow: auto;">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div><!-- end col-->

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
                url: '<?php echo base_url('report_promotion/filter') ?>',
                type: "POST",
                data: $('#form_promo').serialize(),
                dataType: "JSON",
            })
            .done(function(body) {
                const res = JSON.parse(body);
                console.log(res);
                var date11 = document.getElementById('date1').value;
                var date22 = document.getElementById('date2').value;

                var today1 = new Date(date11.replace(/-/g, "/"));
                var dd1 = String(today1.getDate()).padStart(2, '0');
                var mm1 = String(today1.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy1 = today1.getFullYear();

                today1 = dd1 + '/' + mm1 + '/' + yyyy1;


                var today2 = new Date(date22.replace(/-/g, "/"));
                var dd2 = String(today2.getDate()).padStart(2, '0');
                var mm2 = String(today2.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy2 = today2.getFullYear();

                today2 = dd2 + '/' + mm2 + '/' + yyyy2;

                if (res.sumuserData == undefined) {
                    document.getElementById("sum").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;
                } else {
                    document.getElementById("sum").innerHTML = ` จำนวนทั้งหมด ` + res.sumuserData[0].sum + ` รายการ ของวันที่ ` + today1 + ` ถึง ` + today2;
                }


                if (res.sumbonusData == undefined) {
                    document.getElementById("sum2").innerHTML = ` ยอดรวมทั้งหมด  - `;
                } else {
                    var sumbonusData = new Intl.NumberFormat().format(res.sumbonusData[0].sum);
                    document.getElementById("sum2").innerHTML = ` ยอดรวมทั้งหมด ` + sumbonusData + ` บาท `;
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
                } else {

                    $("#loader").hide();
                    if (res.PromoData == undefined) {
                        var Promo = [];
                    } else {
                        var Promo = res.PromoData;
                    }
                    // // console.log(res);
                    $('#table').DataTable({
                        data: Promo,
                        // pageLength: 20,
                        // lengthChange: false,
                        // searching: false,
                        // paging: false,
                        // ordering: false,
                        // info: false,
                        scrollX: true,
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
                                    return '<td><p id="count">' + data + '</p></td>'
                                }
                            },
                            {
                                data: "username"
                            },
                            {
                                data: "agent_username"
                            },
                            {
                                data: "promotion_name"
                            },
                            {
                                data: "category_name"
                            },
                            {
                                data: "amount"
                            },
                            {
                                data: "bonus"
                            },
                            {
                                data: "bonus_included"
                            },
                            {
                                data: "created_at",
                                render: function(data) {

                                    const unixTimestamp = data

                                    const milliseconds = unixTimestamp * 1000 // 1575909015000

                                    const dateObject = new Date(milliseconds)

                                    const humanDateFormat = dateObject.toLocaleDateString("es-MX")
                                    const humanDateFormat2 = dateObject.toLocaleTimeString([], {
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    });

                                    return '<td> ' + humanDateFormat + ' <br>' + humanDateFormat2 + '</td>'

                                }
                            },
                            {
                                data: {
                                    status: "status",
                                },

                                render: function(data) {
                                    var country = '';
                                    switch (data.status) {
                                        case 0:
                                            country = `<td><label id="label-status-${data.row_num}" class="text-danger">ติดโปร</label></td>`;
                                            break;
                                        case 1:
                                            country = `<td><label id="label-status-${data.row_num}" class="text-success">ผ่าน</label></td>`;
                                            break;
                                    }


                                    return country;

                                }
                            }, {
                                data: {
                                    status: "status",
                                    username: "username",
                                    row: 'row_num',
                                },
                                render: function(data) {
                                    var country = '';
                                    switch (data.status) {
                                        case 0:
                                            country = `<tb id='tb-action-${data.row_num}'><button id="btn-cancel-${data.row_num}" name="${data.row_num}" class="btn btn-danger" onclick="cancelPromotion('${data.username}' , 0, this)">ยกเลิก</button> `
                                            country += `<button id="btn-cancel-bonus-${data.row_num}" class="btn btn-danger"  name="${data.row_num}"  onclick="cancelPromotion('${data.username}' , 1 ,this)">ยกเลิก + ลบโบนัส</button></td>`
                                            break;
                                        case 1:
                                            country = '<td>-</td>'
                                            break;
                                    }
                                    return country;
                                }
                            },

                        ],
                    });


                    if (res.sumbonussData == undefined) {
                        var bonuss = [];
                    } else {
                        var bonuss = res.sumbonussData;
                    }
                    // // console.log(res);
                    $('#table2').DataTable({
                        data: bonuss,
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
                                data: "promotion_name"
                            },
                            {
                                data: "sum"
                            },
                            {
                                data: {
                                    bonus: "bonus",
                                },

                                render: function(data) {

                                    var bonusdata = new Intl.NumberFormat().format(data.bonus);

                                    return '<td> ' + bonusdata + '</td>'
                                }
                            },

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



    async function dialog_confirm(msg) {
        try {
            let data = await Swal.fire({
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

    function dialog_alert(msg, status) {
        Swal.fire({
            position: 'top-end',
            icon: status,
            title: msg,
            showConfirmButton: false,
            timer: 3500
        })
    }

    async function cancelPromotion(username, isDelBonus, element) {
        console.log(element);
        let dialog = await dialog_confirm(`คุณต้องการจะลบโปรโมชั่น ${isDelBonus === 1 ? 'และลบโบนัส':''} ${username} ใช่หรือไม่`);
        if (!dialog) return;
        $.ajax({
                url: '<?php echo base_url('report_promotion/cancelPromotion') ?>',
                type: "POST",
                data: {
                    ['<?= csrf_token() ?>']: '<?= csrf_hash() ?>',
                    username: username,
                    isDelBonus: isDelBonus
                },
                dataType: "JSON",
            })
            .done(function(res) {
                let json = JSON.parse(res);
                if (json.status == true) {
                    document.getElementById(`label-status-${element.name}`).innerHTML = 'ผ่าน';
                    document.getElementById(`label-status-${element.name}`).setAttribute('class', 'text-success');
                    document.getElementById(`tb-action-${element.name}`).innerHTML = '-';
                    dialog_alert('ระบบได้ทำการลบโปรโมชั่น username : ' + username, 'success')
                } else {
                    dialog_alert(json.msg, 'error')
                }
            }).fail(function(err) {
                dialog_alert('Connected Fail', 'error')
            })
    }
</script>

<?php $this->endSection(); ?>