<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>


<style>
    table tr {
        text-align: center;
        font-size: 12px;
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
                        <h4 class="page-title">ระบบรับโปรโมชั่น แมนวล</h4>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form_acceptPromo" method="post" action=''>
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <!-- <h4 class="header-title">ค้นหา</h4> -->
                                <p class="sub-header">ระบบรับโปรโมชั่น แมนวล
                                </p>

                                <div class="col-12 col-md-12 col-lg-10">
                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                                            <label class="form-label">รหัส agent หรือ เบอร์โทรศัพท์ ผู้เล่น</label>
                                            <input type="text" id="username-input" name="username" class="form-control mx-1" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                                            <label class="form-label">โปรโมชั่น (เฉพาะ เปิดใช้งาน)</label>
                                            <?php if (isset($data)) : ?>
                                                <select class="form-select form-select" id="promotion_id" name="promotion_id">
                                                    <?php foreach ($data as $value) : ?>
                                                        <option value="<?php echo $value['id']; ?>">
                                                            <?php echo $value['promotion_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php else : ?>
                                                <input type="text" id="" disabled class="form-control mx-1" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                                            <label class="form-label">จำนวนเงินฝาก</label>
                                            <input type="number" id="deposit-input" name="deposit" class="form-control mx-1" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                                            <label class="form-label">โบนัส</label>
                                            <input type="number" id="bonus-input" name="bonus" class="form-control mx-1" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                                            <label class="form-label text-danger">หมายเหตุ</label>
                                            <input type="text" id="cause-input" name="cause" class="form-control mx-1" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="form-label">รูปแบบให้เครดิต</label>
                                        <div class="mb-3 col-12 mx-1">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" value='1' name='addcredit_type' type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">โบนัส</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" value='2' type="radio" name='addcredit_type' name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">เงินฝาก</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" value='3' type="radio" name='addcredit_type' name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">โบนัส +
                                                    เงินฝาก</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" value='0' type="radio" name='addcredit_type' checked name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                <label class="form-check-label text-danger" for="inlineRadio3">*
                                                    ไม่รับเครดิต</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md-6 col-lg-4">
                                                <input type="button" id="" onclick="save(this)" name="depositDataSearch" class="form-control btn-info" placeholder="" value='บันทึก'>
                                            </div>
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

            <div class="tab-pane show active" id="today">

                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="mb-3 col-2">
                                            <label class="form-label">ประเภทของลูกค้า</label>
                                            <select id="selectStatement" name="selectStatement" class="form-select">
                                                <option selected value="">ทั้งหมด</option>
                                                <option value="1">user</option>
                                                <option value="2">admin</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-2">
                                            <label class="form-label">ข้อมูลที่ต้องการค้นหา</label>
                                            <input type="text" id="inputDataSearch" name="inputDataSearch" class="form-control" placeholder="">
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


                                        <div class="mb-1 mt-1 col-2">
                                            <label class="form-label"></label><br>
                                            <button type="button" onClick="filter()" class="btn btn-blue waves-effect waves-light">
                                                ค้นหา
                                            </button>
                                        </div>


                                    </div>
                                </div>

                                <h4 id="sum" class="mt-0 text-uppercase text-dark bg-light border p-2"></h4>


                                <br>
                                <table id="table" class="table w-100 nowrap">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th>ลำดับ</th>
                                            <th>ชื่อโปโมชั้น</th>
                                            <th>agent user</th>
                                            <th>username user</th>
                                            <th id="num">เงินฝาก</th>
                                            <th id="num2">โบนัส</th>
                                            <th id="num3">โบนัส + เงินฝาก</th>
                                            <th>รูปแบบให้เครดิต</th>
                                            <th>วันที่</th>
                                            <th>ทำโดย</th>
                                            <th>หมายเหตุ</th>
                                        </tr>
                                    </thead>
                                </table>

                            </div>

                        </div>
                    </div>
                    <!-- end card
      -->
                </div>
                <!-- end row-->
            </div><!-- end col-->
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
            function save(event) {
                let checkForm = checkFormDataInput();
                if (!checkForm) {
                    return;
                }
                $.ajax({
                        url: '<?php echo base_url('promotion/acceptPromoManual_execute') ?>',
                        type: "POST",
                        data: $('#form_acceptPromo').serialize(),
                        dataType: "JSON",
                    })
                    .done(function(res) {
                        try {
                            if (res.status && res.status == true) {
                                dialog(res.msg, 'success');
                                location.reload();
                            } else {
                                dialog(res.msg, 'error');
                            }
                        } catch (err) {
                            dialog('เกิดข้อผิดพลาด', 'error');
                        }

                    })
                    .fail(function(err) {
                        dialog('ไม่สามารถติดต่อไปยัง Server ได้', 'error')
                    })
            }

            function isNull(value) {
                if (value === null || value === "" || value === undefined) {
                    return true;
                }
                return false
            }

            function dialog(msg, status) {
                Swal.fire(
                    msg,
                    '',
                    status
                )
            }

            function checkFormDataInput() {
                let usernameDataInput = document.getElementById('username-input').value;
                let promotionId = document.getElementById('promotion_id').value;
                let deposit = document.getElementById('deposit-input').value;
                let bonus = document.getElementById('bonus-input').value;
                let cause = document.getElementById('cause-input').value;

                if (isNull(usernameDataInput)) {
                    dialog('username ห้ามว่าง !!', 'error')
                    return false
                }
                if (isNull(promotionId)) {
                    dialog('Promotion ห้ามว่าง !!', 'error')
                    return false
                }
                if (isNull(deposit)) {
                    dialog('จำนวนฝาก ห้ามว่าง !!', 'error')
                    return false
                }
                if (isNull(bonus)) {
                    dialog('โบนัส ห้ามว่าง !!', 'error')
                    return false
                }
                if (isNull(cause)) {
                    dialog('หมายเหตุ ห้ามว่าง !!', 'error')
                    return false
                }


                return true;
            }



            var csrfName = '<?= csrf_token() ?>';
            var csrfHash = '<?= csrf_hash() ?>';
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
                var dataJson = {
                    [csrfName]: csrfHash, // adding csrf here
                    selectStatement: $("#selectStatement").val(),
                    inputDataSearch: $("input[name=inputDataSearch]").val(),
                    startDate: $("input[name=startDate]").val(),
                    startTime: $("input[name=startTime]").val(),
                    endDate: $("input[name=endDate]").val(),
                    endTime: $("input[name=endTime]").val(),
                };
                $.ajax({
                        url: '<?php echo base_url('promotion/filter') ?>',
                        type: "POST",
                        data: dataJson,
                        dataType: "JSON",
                    })
                    .done(function(res) {
                        var promotionData = JSON.parse(res);
                        console.log(promotionData);

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


                        if (promotionData.getsumLogacceptPromoManual == undefined) {
                            document.getElementById("sum").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;
                        } else {
                            document.getElementById("sum").innerHTML = ` รายงานเเก้ไขข้อผิดพลาด ` + promotionData.getsumLogacceptPromoManual[0].sum + ` รายการล่าสุด ของวันที่ ` + today1 + ` ถึง ` + today2;
                        }
                        if (promotionData.code == 0) {
                            Swal.fire({
                                icon: "error",
                                title: ProblemData.msg,
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
                            if (promotionData.getLogacceptPromoManual == undefined) {
                                var promotion = [];
                            } else {
                                var promotion = promotionData.getLogacceptPromoManual;
                            }
                            $("#loader").hide();
                            $('#table').DataTable({
                                data: promotion,
                                // pageLength: 20,s
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
                                        data: "row_num"
                                    },
                                    {
                                        data: "promotion_name"
                                    },
                                    {
                                        data: "agent_user"
                                    },
                                    {
                                        data: "username_user"
                                    },
                                    {
                                        data: "amount",
                                        className: "bg-greenlight2",
                                        targets: 1,
                                        render: function(data) {
                                            return '<td<p class="text-dark" > ' + data + '</p></td>'
                                        }
                                    },
                                    {
                                        data: "bonus",
                                        className: "bg-yellowlight2",
                                        targets: 1,
                                        render: function(data) {
                                            return '<td<p class="text-dark" > ' + data + '</p></td>'
                                        }
                                    },
                                    {
                                        data: "bonus_included",
                                        className: "bg-infolight",
                                        targets: 1,
                                        render: function(data) {
                                            return '<td<p class="text-dark" > ' + data + '</p></td>'
                                        }
                                    },
                                    {
                                        data: "addCredit_type",
                                        render: function(data) {
                                            if (data == 0) {
                                                return ' <td><span class="badge bg-secondary" style="font-size: 1.0em;">ไม่รับเครดิต</span></td>'
                                            } else if (data == 1) {
                                                return ' <span class="badge bg-warning" style="font-size: 1.0em;">โบนัส</span>'
                                            } else if (data == 2) {
                                                return ' <span class="badge bg-success" style="font-size: 1.0em;">เงินฝาก</span>'
                                            } else if (data == 3) {
                                                return ' <span class="badge bg-info" style="font-size: 1.0em;">โบนัส + เงินฝาก</span>'
                                            }
                                        }
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
                                        data: "username_admin"
                                    },
                                    {
                                        data: "cause"
                                    },
                                ],
                            });

                            var element = document.getElementById("num");
                            element.classList.remove("bg-greenlight2");
                            var element = document.getElementById("num2");
                            element.classList.remove("bg-yellowlight2");
                            var element = document.getElementById("num3");
                            element.classList.remove("bg-infolight");
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