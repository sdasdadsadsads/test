<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>

<style>
    table tr {
        text-align: center;
        font-size: 14px;
    }
</style>


<?php
$session = session();
if (($session->get("permissions")) != null) {
    $permissionAdmin = ($session->get("permissions"));
} else {
    $permissionAdmin = ["0"];
}

?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">รายงาน OTP</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form_OTP">
                            <?= csrf_field() ?>
                            <div class="card-body">

                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="mb-3 col-3">
                                            <label class="form-label">เบอร์โทรศัพท์</label>
                                            <input type="number" name="telSearch" class="form-control" placeholder="เบอร์โทรศัพท์">
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">สถานะ</label>
                                            <select name="statusDataSearch" class="form-select">
                                                <option value="3">ทั้งหมด</option>
                                                <option value="2">ยืนยันแล้ว</option>
                                                <option value="1">ยังไม่ยืนยัน</option>
                                            </select>
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

                                        <div class="mb-3 mt-1 col-2">
                                            <label class="form-label"></label><br>
                                            <button type="button" onClick="filter()" class="btn btn-blue waves-effect waves-light">ค้นหา</button>
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
                                    <table id="table" class="table w-100 nowrap">
                                        <thead>
                                            <tr class="bg-info">
                                                <th id="myCheck">No</th>
                                                <th>เบอร์</th>
                                                <th>REF</th>
                                                <th>OTP</th>
                                                <th>วัน / เดือน / ปี</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
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
                url: '<?php echo base_url('report_otp/filter') ?>',
                type: "POST",
                data: $('#form_OTP').serialize(),
                dataType: "JSON",
            })
            .done(function(body) {
                const res = JSON.parse(body);

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
                    // // console.log(res);
                    $('#table').DataTable({
                        data: res,
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
                                data: "tel"
                            },
                            {
                                data: "ref"
                            },
                            {
                                data: "otp"
                            },
                            {
                                data: "dateTime"
                            },

                            {
                                data: {
                                    status: "status",
                                    id: "id",
                                    tel: "tel"
                                },

                                render: function(data) {
                                    var country = '';
                                    switch (data.status) {
                                        case 1:
                                            <?php if ((in_array(34, $permissionAdmin))) { ?>
                                                country = '<button  class="btn btn-info waves-effect waves-light" onclick="confrim(`' + data.id + '` ,' + '`' + data.tel + '`' + ')">ยืนยัน</button>';
                                                break;
                                            <?php
                                            } else {
                                            ?>
                                                country = '<td><i class=" fa fa-exclamation-triangle icon-dual-danger"></i></td>';
                                                break;
                                            <?php
                                            }

                                            ?>

                                        case 2:
                                            country = '<td><i class="fa fa-check icon-dual-success"></i></td>';
                                            break;
                                    }


                                    return country;

                                }
                            }

                        ],
                    });

                }


            })
            .fail(function(err) {
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

    // function confrim(id) {
    //     var tel = $('#tel').html();
    //     swal({
    //             title: "ยืนยันเบอร์โทร " + tel,
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 $.ajax({
    //                     url: "otp/confrim",
    //                     type: 'post',
    //                     data: {
    //                         id: id
    //                     },
    //                     dataType: "json",
    //                     success: function(res) {
    //                         if (res.code == 1) {
    //                             swal({
    //                                 icon: "success",
    //                                 text: "success",
    //                                 button: false,
    //                                 timer: 800
    //                             }).then((value) => {
    //                                 location.reload();
    //                             });
    //                         } else if (res.code == -1) {
    //                             window.location.replace("<?= base_url() . 'backend' ?>");
    //                         } else {
    //                             swal({
    //                                 icon: "error",
    //                                 title: res.title,
    //                                 text: res.msg,
    //                                 button: false,
    //                                 timer: 1200
    //                             })
    //                         }
    //                     }
    //                 });

    //             } else {
    //                 return false;
    //             }
    //         });
    // }



    function confrim(id, tel) {

        Swal.fire({
            title: "คุณแน่ใจที่จะยืนยัน OTP เบอร์โทร " + tel,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: "<?php echo base_url('report_otp/confrim') ?>/" + id,
                        type: "GET",
                        dataType: "JSON",
                    }).done(function(re) {
                        const res = JSON.parse(re);

                        if (res.code == 1) {
                            Swal.fire({
                                icon: "success",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        }
                    })
                    .fail(function(err) {
                        Swal.fire({
                            icon: "error",
                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                            showConfirmButton: false,
                        });
                        window.setTimeout(function() {
                            location.reload()
                        }, 500)
                    });
            }
        })
    }
</script>

<?php $this->endSection(); ?>