<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>



<style>
    table tr {
        text-align: center;
        font-size: 12px;
        vertical-align: middle;
    }
</style>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">รายงานพฤติกรรมพนักงาน</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form_deposit_decimal" method="post" action="<?= base_url('report_activity_logs/csv') ?>">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <!-- <h4 class="header-title">ค้นหา</h4> -->
                                <p class="sub-header">ระบบค้นหา
                                </p>


                                <div class="col-12 col-md-12 col-lg-10">
                                    <div class="row">

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label class="form-label">เมนู</label>
                                            <?php if (isset($data)) { ?>
                                                <select class="form-select" id='menuDataSearch' name='menuDataSearch'>
                                                    <option value="">ทั้งหมด</option>
                                                    <?php foreach ($data->data as $element) : ?>
                                                        <option value="<?php echo $element->id ?>"><?php echo $element->nameTH; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php    } else { ?>
                                                <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                            <?php } ?>


                                        </div>

                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label for="field-2" class="form-label">ค้นหาด้วย</span></label>
                                            <select id="typeSearch" name="typeSearch" class="form-select">
                                                <option value="">ทั้งหมด</option>
                                                <option value="1">admin</option>
                                                <option value="2">user agent</option>
                                            </select>
                                        </div>


                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label class="form-label">ข้อมูลที่ต้องการค้นหา</label>
                                            <input type="text" id="DataSearch" name="DataSearch" class="form-control" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12">
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
                <div class="tab-pane show active" id="today">

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

                                    <table id="table" class="table w-100 nowrap">
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>admin</th>
                                                <th>user agent</th>
                                                <th>เมนู</th>
                                                <th>เมนูย่อย</th>
                                                <th>activity</th>
                                                <th>วันที่</th>
                                            </tr>
                                        </thead>
                                    </table>

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
                            url: '<?php echo base_url('report_activity_logs/filter') ?>',
                            type: "POST",
                            data: $('#form_deposit_decimal').serialize(),
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

                            if (res.sumactivityData == undefined) {
                                document.getElementById("sum").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;
                            } else {
                                document.getElementById("sum").innerHTML = ` จำนวนลูกค้าทั้งหมด ` + res.sumactivityData[0].sum + ` คน ของวันที่ ` + today1 + ` ถึง ` + today2;
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
                            } else {

                                $("#loader").hide();
                                if (res.activityData == undefined) {
                                    var activity = [];
                                } else {
                                    var activity = res.activityData;
                                }
                                // // console.log(res);
                                $('#table').DataTable({
                                    data: activity,
                                    // pageLength: 20,
                                    // lengthChange: false,
                                    // searching: false,
                                    // paging: false,
                                    // ordering: false,
                                    // info: false,
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
                                            data: "admin"
                                        },
                                        {
                                            data: "user_agent",
                                            render: function(data) {
                                                if (data == null) {
                                                    return ' <td> - </td>';
                                                } else {
                                                    return '<td>' + data + '</td>'
                                                }
                                            }
                                        },
                                        {
                                            data: "name_menus"
                                        },
                                        {
                                            data: "name_permissions"
                                        },
                                        {
                                            data: "activity"
                                        },
                                        {
                                            data: "created_at",
                                            render: function(data) {
                                                const unixTimestamp = data

                                                const milliseconds = unixTimestamp * 1000 // 1575909015000

                                                const dateObject = new Date(milliseconds)

                                                const humanDateFormat = dateObject.toLocaleString("es-MX")


                                                return '<td> ' + humanDateFormat + ' </td>'

                                            }
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