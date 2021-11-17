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
</style>

<div class="content-page">
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">เเก้ไขข้อผิดพลาด</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <label class="form-label">กรุณาเลือกทำรายการ</label>
                            <div class="mb-3 col-2">
                                <select id="selectType" name="selectType" class="form-select" onchange="selectType()">
                                    <option value="1" selected>เพิ่มเครดิต</option>
                                    <option value="2">ตัดเครดิต</option>
                                </select>
                            </div>
                            <form class="form-label-left input_mask" id="add_credit">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="mb-3 col-3">
                                            <label class="form-label">ยูสเซอร์ *</label>
                                            <input type="text" id="user_add" name="user" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-2">
                                            <label class="form-label">จำนวนเงิน *</label>
                                            <input type="number" id="amount_add" name="amount" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">หมายเหตุ *</label>
                                            <input type="text" id="note_add" name="note_add" class="form-control" placeholder="">
                                        </div>
                                        <div class="mb-3 mt-1 col-2">
                                            <label class="form-label"></label><br>
                                            <button type="button" onClick="showDataUserADD()" class="btn btn-success waves-effect waves-light">
                                                เพิ่มเครดิต
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </form>

                            <form class="form-label-left input_mask" id="cut_credit" style="display: none;">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="mb-3 col-3">
                                            <label class="form-label">ยูสเซอร์ *</label>
                                            <input type="text" id="user_cut" name="user_cut" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-2">
                                            <label class="form-label">จำนวนเงิน *</label>
                                            <input type="number" id="amount_cut" name="amount_cut" name="inputDataSearch" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">หมายเหตุ *</label>
                                            <input type="text" id="note_cut" name="note_cut" class="form-control" placeholder="">
                                        </div>
                                        <div class="mb-3 mt-1 col-2">
                                            <label class="form-label"></label><br>
                                            <button type="button" onClick="showDataUserCut()" class="btn btn-danger waves-effect waves-light">
                                                ตัดเครดิต
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
            <div class="modal fade" id="dataUserAdd" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">รายละเอียด</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="show_data"></div>
                            <input type="hidden" class="form-control" id="add_user" name="add_user" required="required" autocomplete="off">
                            <input type="hidden" class="form-control" id="add_userId" name="add_userId" required="required" autocomplete="off">
                            <input type="hidden" class="form-control" id="add_amount" name="add_amount" required="required" autocomplete="off">
                            <input type="hidden" class="form-control" id="note_addCredit" name="note_addCredit" required="required" autocomplete="off">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="add_credit()">Send</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="dataUserCut" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">รายละเอียด</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="show_data1"></div>
                            <input type="hidden" class="form-control" id="user_ReduceCredit" name="user_ReduceCredit" required="required" autocomplete="off">
                            <input type="hidden" class="form-control" id="userId_ReduceCredit" name="userId_ReduceCredit" required="required" autocomplete="off">
                            <input type="hidden" class="form-control" id="amount_ReduceCredit" name="amount_ReduceCredit" required="required" autocomplete="off">
                            <input type="hidden" class="form-control" id="note_ReduceCredit" name="note_ReduceCredit" required="required" autocomplete="off">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="ReduceCredit()">Send</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row-->



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
                                        <option value="1">เติมเครดิต</option>
                                        <option value="2">ตัดเครดิต</option>
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
                                    <th>หัวข้อ</th>
                                    <th>ยูสเซอร์</th>
                                    <th>เครดิตก่อนปรับ</th>
                                    <th>เติม</th>
                                    <th id="num">ตัด</th>
                                    <th>โบนัส</th>
                                    <th id="num2">เครดิตหลังปรับ</th>
                                    <th>วันที่</th>
                                    <th>ทำโดย</th>
                                    <th>หมายเหตุ</th>
                                </tr>
                            </thead>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div><!-- end col-->







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

        function selectType() {
            var selectType = $('#selectType').val();
            console.log(selectType);
            if (selectType == 1) {
                document.getElementById('add_credit').style.display = 'block';
                document.getElementById('cut_credit').style.display = 'none';
            } else if (selectType == 2) {
                document.getElementById('add_credit').style.display = 'none';
                document.getElementById('cut_credit').style.display = 'block';
            }
        }

        function showDataUserADD() {
            var user = $('#user_add').val();
            var amount = $('#amount_add').val();
            var note = $('#note_add').val();
            if (user && amount && note) {
                $.ajax({
                        url: '<?php echo base_url('/editProblem/showDataUser') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            user: user,
                            [csrfName]: csrfHash,
                        }
                    }).done(function(res) {
                        if (res.status == true) {
                            console.log(res);
                            $('#dataUserAdd').modal('show');
                            $('#add_user').val(res.data.agent_username);
                            $('#add_userId').val(res.data.id);
                            $('#add_amount').val(amount);
                            $('#note_addCredit').val(note);
                            var html = '';
                            html += '<div class="row">'
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>ยูสเซอร์ :</small> <span class="font-weight-bold">' + res.data.agent_username + '</span> </div>'
                            html += '</div>';
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>เบอร์โทร :</small> <span class="font-weight-bold">' + res.data.username + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>ธนาคาร :</small> <span class="font-weight-bold">' + res.data.bank_short + '</span> </div>'
                            html += '</div>';
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>เลขที่บัญชี : </small> <span class="font-weight-bold">' + res.data.account + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>หมายเหตุ : </small> <span class="font-weight-bold">' + note + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-12">'
                            html += ' <label class="radio1 text-center"> <input type="radio" name="payment" value="bank"> <span><i class="fa fa-bank"></i>+' + amount + ' ฿</span> </label>'
                            html += '</div>';
                            html += '</div>';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: res.msg,
                                showConfirmButton: false,
                                timer: 1600
                            })
                        }
                        $('#show_data').html(html);
                    })
                    .fail(function(err) {
                        // console.log(err);
                        Swal.fire({
                            icon: "error",
                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                            showConfirmButton: false,
                        });
                    });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    showConfirmButton: false,
                    timer: 1600
                })
            }

        }

        function showDataUserCut() {
            var user = $('#user_cut').val();
            var amount = $('#amount_cut').val();
            var note = $('#note_cut').val();
            if (user && amount && note) {
                $.ajax({
                        url: '<?php echo base_url('/editProblem/showDataUser') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            user: user,
                            [csrfName]: csrfHash,
                        }
                    }).done(function(res) {
                        if (res.status == true) {
                            console.log(res);
                            $('#dataUserCut').modal('show');
                            $('#user_ReduceCredit').val(res.data.agent_username);
                            $('#userId_ReduceCredit').val(res.data.id);
                            $('#amount_ReduceCredit').val(amount);
                            $('#note_ReduceCredit').val(note);
                            var html = '';
                            html += '<div class="row">'
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>ยูสเซอร์ :</small> <span class="font-weight-bold">' + res.data.agent_username + '</span> </div>'
                            html += '</div>';
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>เบอร์โทร :</small> <span class="font-weight-bold">' + res.data.username + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>ธนาคาร :</small> <span class="font-weight-bold">' + res.data.bank_short + '</span> </div>'
                            html += '</div>';
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>เลขที่บัญชี : </small> <span class="font-weight-bold">' + res.data.account + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-6">'
                            html += ' <div class="d-flex flex-column"> <small>หมายเหตุ : </small> <span class="font-weight-bold">' + note + '</span> </div>'
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row mt-2">'
                            html += '<div class="col-md-12">'
                            html += ' <label class="radio2 text-center"> <input type="radio" name="payment" value="bank"> <span><i class="fa fa-bank"></i>-' + amount + ' ฿</span> </label>'
                            html += '</div>';
                            html += '</div>';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: res.msg,
                                showConfirmButton: false,
                                timer: 1600
                            })
                        }
                        $('#show_data1').html(html);
                    })
                    .fail(function(err) {
                        // console.log(err);
                        Swal.fire({
                            icon: "error",
                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                            showConfirmButton: false,
                        });
                    });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    showConfirmButton: false,
                    timer: 1600
                })
            }
        }

        function add_credit() {
            var add_user = $('#add_user').val();
            var add_amount = $('#add_amount').val();
            var add_userId = $('#add_userId').val();
            var note = $('#note_addCredit').val();
            Swal.fire({
                title: 'ยืนยันเพิ่มเครดิต',
                text: 'ยูสเซอร์ : ' + add_user + ' ?',
                showDenyButton: true,
                showCancelButton: true,
                cancelButtonColor: "#f1556c",
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            url: '<?php echo base_url('/editProblem/addCredit') ?>',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                user: add_user,
                                amount: add_amount,
                                user_id: add_userId,
                                note: note,
                                [csrfName]: csrfHash,
                            }
                        }).done(function(res) {
                            if (res.status == true) {
                                if (res.waitingConfirmation) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: res.msg,
                                        showConfirmButton: false,
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'success',
                                        title: res.msg,
                                        showConfirmButton: false,
                                        timer: 1600
                                    }).then((result) => {
                                        location.reload();
                                    })
                                }
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: res.msg,
                                    showConfirmButton: false,
                                    timer: 1600
                                })
                            }

                        })
                        .fail(function(err) {
                            // console.log(err);
                            Swal.fire({
                                icon: "error",
                                title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        });
                } else if (result.isDenied) {
                    Swal.fire('ไม่สามารถทำรายการได้', '', 'info')
                }
            })
        }

        function ReduceCredit() {
            var user_ReduceCredit = $('#user_ReduceCredit').val();
            var userId_ReduceCredit = $('#userId_ReduceCredit').val();
            var amount_ReduceCredit = $('#amount_ReduceCredit').val();
            var note_ReduceCredit = $('#note_ReduceCredit').val();
            Swal.fire({
                title: 'ยืนยันตัดเครดิต',
                text: 'ยูสเซอร์ : ' + user_ReduceCredit + ' ?',
                showDenyButton: true,
                showCancelButton: true,
                cancelButtonColor: "#f1556c",
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            url: '<?php echo base_url('/editProblem/ReduceCredit') ?>',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                user: user_ReduceCredit,
                                user_id: userId_ReduceCredit,
                                amount: amount_ReduceCredit,
                                note: note_ReduceCredit,
                                [csrfName]: csrfHash,
                            }
                        }).done(function(res) {
                            if (res.status == true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: res.msg,
                                    showConfirmButton: false,
                                    timer: 1600
                                }).then((result) => {
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
                        .fail(function(err) {
                            // console.log(err);
                            Swal.fire({
                                icon: "error",
                                title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        });
                } else if (result.isDenied) {
                    Swal.fire('ไม่สามารถทำรายการได้', '', 'info')
                }
            })
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
                    url: '<?php echo base_url('editProblem/filter') ?>',
                    type: "POST",
                    data: dataJson,
                    dataType: "JSON",
                })
                .done(function(res) {
                    var ProblemData = JSON.parse(res);
                    console.log(ProblemData);

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


                    if (ProblemData.getsumLogCredit == undefined) {
                        document.getElementById("sum").innerHTML = `วันที่ ` + today1 + ` ถึง ` + today2;
                    } else {
                        document.getElementById("sum").innerHTML = ` รายงานเเก้ไขข้อผิดพลาด ` + ProblemData.getsumLogCredit[0].sum + ` รายการล่าสุด ของวันที่ ` + today1 + ` ถึง ` + today2;
                    }

                    if (ProblemData.code == 0) {
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
                        if (ProblemData.getLogCredit == undefined) {
                            var Problem = [];
                        } else {
                            var Problem = ProblemData.getLogCredit;
                        }
                        $("#loader").hide();
                        $('#table').DataTable({
                            data: Problem,
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
                                    data: "type",
                                    render: function(data) {
                                        if (data == 1) {
                                            return ' <td><span class="badge bg-success" style="font-size: 1.0em;">เติมเครดิต</span></td>'
                                        } else if (data == 2) {
                                            return ' <span class="badge bg-danger" style="font-size: 1.0em;">ตัดเครดิต</span>'
                                        }
                                    }
                                },
                                {
                                    data: "agent_username"
                                },
                                {
                                    data: "credit_before"
                                },
                                {
                                    data: {
                                        type: "type",
                                        amount: "amount",
                                    },
                                    render: function(data) {
                                        if (data.type == 1) {
                                            return ' <td>' + data.amount + '</td>'
                                        } else {
                                            return ' <td> - </td>'
                                        }
                                    }
                                },
                                {
                                    data: {
                                        type: "type",
                                        amount: "amount",
                                    },
                                    className: "bg-dangerlight",
                                    targets: 1,
                                    render: function(data) {
                                        if (data.type == 1) {
                                            return '<td"><p class="text-dark" > - </p></td>'
                                        } else {
                                            return '<td<p class="text-dark" > ' + data.amount + '</p></td>'
                                        }
                                    }
                                },
                                {
                                    data: "bonus"
                                },
                                {
                                    data: "credit_after",
                                    className: "bg-infolight",
                                    targets: 1,
                                },
                                {
                                    data: "create_time",
                                    render: function(data) {

                                        const unixTimestamp = data

                                        const milliseconds = unixTimestamp * 1000 // 1575909015000

                                        const dateObject = new Date(milliseconds)

                                        const humanDateFormat = dateObject.toLocaleDateString("es-MX")
                                        const humanDateFormat2 = dateObject.toLocaleTimeString("es-MX")

                                        return '<td> ' + humanDateFormat + ' <br>' + humanDateFormat2 + '</td>'

                                    }
                                },
                                {
                                    data: "username"
                                },
                                {
                                    data: "note"
                                },
                            ],
                        });

                        var element = document.getElementById("num");
                        element.classList.remove("bg-dangerlight");
                        var element = document.getElementById("num2");
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