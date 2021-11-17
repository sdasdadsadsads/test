<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>

<style>
    table tr {
        text-align: center;
        font-size: 14px;
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
                        <h4 class="page-title">รอบการทำงาน</h4>
                        <button type="button" class="btn btn-blue waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#addrounds"><i class="icon-plus"></i> เพิ่มรอบทำงาน</button>
                    </div>
                </div>
            </div>


            <!-- end page title -->


            <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>รหัสรอบ</th>
                                                <th>รอบ</th>
                                                <th>เวลาเริ่มต้น</th>
                                                <th>เวลาสิ้นสุด</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if (isset($rounds)) : ?>
                                                <?php foreach ($rounds as $a) { ?>
                                                    <tr>
                                                        <td><?php echo $a['id']; ?></td>
                                                        <td><?php echo $a['rounds_desc']; ?></td>
                                                        <td><?php echo $a['time_start']; ?></td>
                                                        <td><?php echo $a['time_end']; ?></td>
                                                        <td>
                                                            <button onClick="edit_get('<?= $a['id'] ?>')" class="btn btn-info waves-effect waves-light" title="แก้ไขสิทธิ์"> แก้ไข </button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>



                </div>
            </div> <!-- container -->

        </div> <!-- content -->

    </div>
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->



<!-- ====================================================================================================== -->
<div class="col-xl-12">
    <div id="addrounds" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">สร้างรอบงาน</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">

                    <form id="form_addrounds">
                        <?= csrf_field() ?>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-2" class="form-label">ชื่อรอบ</label>
                                    <input type="text" class="form-control" name="rounds_desc" placeholder="ชื่อรอบ">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-2" class="form-label">เวลาเริ่มต้น</label>
                                    <input type="text" class="24hours-timepicker form-control" name="rounds_start" placeholder="เวลาเริ่มต้น">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-2" class="form-label">เวลาสิ้นสุด</label>
                                    <input type="text" class="24hours-timepicker form-control" name="rounds_end" placeholder="เวลาเริ่มต้น">
                                </div>
                            </div>

                        </div>
                    </form>


                    <div class="modal-footer">
                        <button onClick="cre_Rounds()" class="btn btn-success waves-effect waves-light" type="submit">บันทึก</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                    </div>

                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>



    <!-- //  ====================================================================================================== -->
    <div class="col-xl-12">
        <div id="editrounds" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title">แก้ไขรอบงาน</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">

                        <form id="form_editrounds">
                            <?= csrf_field() ?>
                            <div class="row">
                                <input type="hidden" name="editid" id="editcheck_id">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">ชื่อรอบ</label>
                                        <input type="text" class="form-control" id="rounds_desc" name="rounds_desc" placeholder="ชื่อรอบ">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">เวลาเริ่มต้น</label>
                                        <input type="text" class="24hours-timepicker form-control" id="rounds_start" name="rounds_start">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">เวลาสิ้นสุด</label>
                                        <input type="text" class="24hours-timepicker form-control" id="rounds_end" name="rounds_end">
                                    </div>
                                </div>

                            </div>
                        </form>


                        <div class="modal-footer">
                            <button onClick="update_Rounds()" class="btn btn-success waves-effect waves-light" type="submit">บันทึก</button>
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                        </div>

                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
        </div>

        <script>
            function cre_Rounds() {
                $.ajax({
                        url: '<?php echo base_url('work_time/cre_rounds') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: $('#form_addrounds').serialize(),
                    })
                    .done(function(re) {
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
                    .fail(function() {
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

            function update_Rounds() {
                $.ajax({
                        url: '<?php echo base_url('work_time/update_rounds') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: $('#form_editrounds').serialize(),
                    })
                    .done(function(re) {
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
                    .fail(function() {
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



            function edit_get(id) {
                $.ajax({
                        url: "<?php echo base_url('work_time/rounds_getid') ?>/" + id,
                        type: "GET",
                        dataType: "JSON",
                    }).done(function(body) {
                        const res = JSON.parse(body);
                        $('#editrounds').modal('show');

                        if (res.code == 0) {
                            Swal.fire({
                                icon: "error",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        } else {
                            $("#editcheck_id").val(res.rounds[0].id);
                            $("#rounds_desc").val(res.rounds[0].rounds_desc);
                            $("#rounds_start").val(res.rounds[0].time_start);
                            $("#rounds_end").val(res.rounds[0].time_end);
                            console.log(res.rounds);
                        }

                    })
                    .fail(function() {
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
        </script>



        <?php $this->endSection(); ?>