<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>

<style>
    table tr {
        text-align: center;
        font-size: 12px;
        vertical-align: middle;
    }

    .card-body label {
        cursor: pointer;
    }
</style>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->



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
                        <h4 class="page-title">ตั้งค่าการถอน</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-12">
                                <div class="row">
                                    <div class="mb-1 col-7">
                                        <label class="form-label">ถอนยอดขั้นต่ำ</label>
                                        <?php if (isset($wd_min)) { ?>
                                            <input type="text" id="wd_min_amount" value="<?php echo $wd_min['amount']; ?>" class="form-control mb-1">
                                        <?php    } else { ?>
                                            <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                        <?php } ?>
                                    </div>
                                    <?php if (isset($wd_min)) { ?>
                                        <?php if (isset($permissionAdmin)) : ?>
                                            <?php if (in_array(39, $permissionAdmin)) : ?>
                                                <div class="mb-3 mt-1 col-2">
                                                    <label class="form-label"></label><br>
                                                    <button type="button" onClick="setWD('wd_min')" class="btn btn-success waves-effect waves-light">
                                                        บันทึก
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php    } else { ?>
                                    <?php } ?>


                                </div>



                                <div class="row">
                                    <div class="mb-3 col-7">
                                        <label class="form-label">ถอนยอดต่อวัน</label>
                                        <?php if (isset($count_wd)) { ?>
                                            <input type="text" id="wd_count_amount" value="<?php echo $count_wd['amount']; ?>" class="form-control mb-1">
                                        <?php    } else { ?>
                                            <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                        <?php } ?>
                                    </div>
                                    <?php if (isset($count_wd)) { ?>
                                        <?php if (isset($permissionAdmin)) : ?>
                                            <?php if (in_array(39, $permissionAdmin)) : ?>
                                                <div class="mb-3 mt-1 col-2">
                                                    <label class="form-label"></label><br>
                                                    <button type="button" onClick="setWD('count_wd')" class="btn btn-success waves-effect waves-light">
                                                        บันทึก
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php    } else { ?>
                                    <?php } ?>
                                </div>




                                <div class="row">
                                    <div class="col-7">
                                        <label class="form-label">ถอนยอดสูงสุดต่อครั้ง</label>
                                        <?php if (isset($wd_max)) { ?>
                                            <input type="text" id="wd_max_amount" value="<?php echo $wd_max['amount']; ?>" class="form-control mb-1">
                                        <?php    } else { ?>
                                            <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                        <?php } ?>
                                    </div>
                                    <?php if (isset($wd_max)) { ?>
                                        <?php if (isset($permissionAdmin)) : ?>
                                            <?php if (in_array(39, $permissionAdmin)) : ?>
                                                <div class="mb-3 mt-1 col-2">
                                                    <label class="form-label"></label><br>
                                                    <button type="button" onClick="setWD('wd_max')" class="btn btn-success waves-effect waves-light">
                                                        บันทึก
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php    } else { ?>
                                    <?php } ?>
                                </div>




                            </div>




                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row-->

            <script>
                var csrfName = '<?= csrf_token() ?>';
                var csrfHash = '<?= csrf_hash() ?>';

                function setWD(type) {
                    if (type == 'wd_min') {
                        var amount = $('#wd_min_amount').val();
                    } else if (type == 'count_wd') {
                        var amount = $('#wd_count_amount').val();
                    } else if (type == 'wd_max') {
                        var amount = $('#wd_max_amount').val();
                    }
                    Swal.fire({
                        title: 'คุณต้องการแก้ไข เป็น : ' + amount + ' ใช่ไหม?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                    url: "<?php echo base_url('withdraw_setting/setWD') ?>",
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        types: type,
                                        amount: amount,
                                        [csrfName]: csrfHash,
                                    },
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
                    })
                }
            </script>

            <?php $this->endSection(); ?>