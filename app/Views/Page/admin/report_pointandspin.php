<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>

<style>
    table tr {
        text-align: center;
        vertical-align: middle;
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
                        <h4 class="page-title">ข้อมูลจำนวนแต้ม และสปินของลูกค้าทั้งหมด</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 col-md-12 col-lg-12">
                                <form class="form-label-left input_mask" id="form_point">
                                    <?= csrf_field() ?>
                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-6 col-lg-3">
                                            <label class="form-label">ค้นหาด้วย</label>
                                            <select onchange="status(value);" name="statusDataSearch" class="form-select">
                                                <option value="1">ทั้งหมด</option>
                                                <option value="2">ID ผู้เล่น</option>
                                                <option value="3">เบอร์โทรศัพท์</option>
                                            </select>
                                        </div>
                                        <div id="textSearch" class="mb-3 col-12 col-md-6 col-lg-3" style="display: none;">
                                            <label class="form-label">ข้อมูลที่ต้องการค้นหา</label>
                                            <input type="text" name="textSearch" class="form-control" placeholder="กรอกข้อมูลที่ต้องการค้นหา...">
                                        </div>
                                </form>
                                <div class="mb-3 mt-1 col-12 col-md-6 col-lg-3">
                                    <label class="form-label"></label><br>
                                    <button type="button" onClick="filter()" class="btn btn-blue waves-effect waves-light">ค้นหา</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="custom10">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- / id="custom" -->
                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap mb-0 p-0 m-0">
                                <thead>
                                    <tr style="background-color: #10394B; color: white; vertical-align: middle;">
                                        <th>ลำดับ</th>
                                        <th>ID</th>
                                        <th>เบอร์โทรลูกค้า</th>
                                        <th>ID agent</th>
                                        <th>ชื่อลูกค้า</th>
                                        <th>จำนวน Point</th>
                                        <th>จำนวนสปิน</th>
                                        <th>รายละเอียดลูกค้า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($PSData)) { ?>
                                        <?php $i = 1;
                                        foreach ($PSData as $PSDatas) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?php echo $PSDatas['id']; ?></td>
                                                <td><?php echo $PSDatas['username']; ?></td>
                                                <td><?php echo $PSDatas['agent_username']; ?></td>
                                                <td><?php echo $PSDatas['name']; ?></td>
                                                <td><?php echo $PSDatas['point']; ?></td>
                                                <td><?php echo $PSDatas['spin']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('report_pointandspin/show_id/' . $PSDatas['id']); ?>"" class=" btn btn-blue">
                                                        <i class="mdi mdi-information-variant"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="table2" style="display: none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table w-100 nowrap mb-0 p-0 m-0">
                                <thead>
                                    <tr style="background-color: #10394B; color: white; vertical-align: middle;">
                                        <th>ลำดับ</th>
                                        <th>ID</th>
                                        <th>เบอร์โทรลูกค้า</th>
                                        <th>ID agent</th>
                                        <th>ชื่อลูกค้า</th>
                                        <th>จำนวน Point</th>
                                        <th>จำนวนสปิน</th>
                                        <th>รายละเอียดลูกค้า</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row-->
    </div><!-- end col-->


</div> <!-- content -->




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

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


<script>
    function status(status) {
        if (status == 2) {
            document.getElementById('textSearch').style.display = '';
        } else if (status == 3) {
            document.getElementById('textSearch').style.display = '';
        } else {
            document.getElementById('textSearch').style.display = 'none';
        }
    }

    document.getElementById('table2').style.display = 'none';
    document.getElementById('custom10').style.display = '';

    function filter() {
        document.getElementById('table2').style.display = '';
        document.getElementById('custom10').style.display = 'none';
        $("#loader").show();
        $.ajax({
                url: '<?php echo base_url('report_pointandspin/filter') ?>',
                type: "POST",
                data: $('#form_point').serialize(),
                dataType: "JSON",
            })
            .done(function(body) {
                const res = JSON.parse(body);
                console.log(res);

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
                        // pageLength: 50,
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
                                data: "id"
                            },
                            {
                                data: "username"
                            },
                            {
                                data: "agent_username"
                            },
                            {
                                data: "name"
                            },
                            {
                                data: "point"
                            },
                            {
                                data: "spin"
                            },
                            {
                                data: "id",
                                render: function(data) {
                                    var base_url = '<?php echo base_url() ?>';
                                    return ' <td> <a href="' + base_url + "/report_pointandspin/show_id/" + data + '"  class=" btn btn-blue"> <i class="mdi mdi-information-variant"></i></a></td>'

                                }
                            },


                        ],
                    });

                }




            })
            .fail(function() {
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