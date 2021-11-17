<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<!--! register form-->
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">สมัครสมาชิก</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row" id="from1">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <form id="form_creUser" method="post">
                                        <?= csrf_field() ?>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">ชื่อ - นามสกุล <span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="fullName" id="" placeholder="ชื่อ">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">หมายเลขบัญชีธนาคาร<span class="text-danger"> *</span></label>
                                                <input type="text" name="account" class="form-control" id="" placeholder="หมายเลขบัญชีธนาคาร">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">ธนาคาร (ตามสมุดบัญชี)<span class="text-danger"> *</span></label>
                                                <?php if (isset($bankCategory)) { ?>
                                                    <select id="bankId" name="bankId" class="form-select">
                                                        <?php foreach ($bankCategory as $bankCategorys) { ?>
                                                            <option value="<?php echo $bankCategorys['id']; ?>"><?php echo $bankCategorys['bank_th']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                <?php    } else { ?>
                                                    <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                                <?php } ?>

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">Username (เบอร์โทรศัพท์)<span class="text-danger"> กรอกให้ครบ 10 หลัก *</span></label>
                                                <input type="number" name="username" class="form-control" id="" placeholder="เบอร์โทรศัพท์">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">รับโบนัส<span class="text-danger"> </span></label>
                                                <select id="getBonus" name="getBonus" class="form-select">
                                                    <option value="0">ไม่รับโบนัส</option>
                                                    <option value="1">รับโบนัส</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">Line ID<span class="text-danger"></span></label>
                                                <input type="text" name="lineId" class="form-control" id="" placeholder="Line ID">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">บุคคลแนะนำ</label>
                                                <input type="text" name="recUsername" class="form-control" id="" placeholder="บุคคลแนะนำ">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">รู้จักผ่าน<span class="text-danger"> </span></label>
                                                <select class="form-select">
                                                    <option selected disabled>โปรดเลือก</option>
                                                    <option value="1">Google</option>
                                                    <option value="2">Facebook</option>
                                                    <option value="3">Line</option>
                                                    <option value="4">เพื่อนแนะนำ</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label">เพิ่มเติม</label>
                                                <input type="text" class="form-control" id="" placeholder="เพิ่มเติม">
                                            </div>

                                        </div>
                                    </form>
                                    <div class="text-end">
                                        <button class="btn btn-outline-danger waves-effect waves-light" type="reset" value="Reset">เคลียร์</button>
                                        <button class="btn btn-success waves-effect waves-light" onclick="cre_admin()" type="submit">บันทึก</button>
                                    </div>

                                </div> <!-- end col -->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- container -->





            <div class="row" id="from2" style="display: none;">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">


                                    <div class="tab-content b-0 mb-0 pt-0">
                                        <div class="tab-pane active" id="finish">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                        <h3 class="mt-0">สมัครสมาชิกสำเร็จ !</h3>
                                                        <hr>

                                                        <h4 class="w-80 mb-2 mx-auto">Username : <a id="username1" class="text-blue"></a></h4>
                                                        <h4 class="w-80 mb-2 mx-auto">Password : <a id="password1" class="text-blue"></a></h4>
                                                        <h4 class="w-80 mb-2 mx-auto">ชื่อ - สกุล : <a id="fullName1" class="text-blue"></a></h4>
                                                        <h4 class="w-80 mb-2 mx-auto">line Id : <a id="lineId1" class="text-blue"></a></h4>

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
                <!-- end row -->
            </div> <!-- container -->

        </div> <!-- content -->



    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    <script>
        document.getElementById('from1').style.display = '';
        document.getElementById('from2').style.display = 'none';

        function cre_admin() {
            $.ajax({
                    url: '<?php echo base_url('registration_user/create') ?>',
                    type: "POST",
                    data: $('#form_creUser').serialize(),
                    dataType: "JSON",
                })
                .done(function(re) {
                    const res = JSON.parse(re);

                    if (res.code == 0) {

                        Swal.fire({
                            icon: "error",
                            title: res.msg,
                            showConfirmButton: false,
                        });

                    } else {
                        document.getElementById('from1').style.display = 'none';
                        document.getElementById('from2').style.display = '';

                        document.getElementById("username1").innerHTML = res.username;
                        document.getElementById("password1").innerHTML = res.password;
                        document.getElementById("fullName1").innerHTML = res.fullName;
                        document.getElementById("lineId1").innerHTML = res.lineId;

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