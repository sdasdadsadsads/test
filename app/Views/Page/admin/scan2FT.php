<?php $this->extend('template/head_login'); ?>

<?php $this->section('content'); ?>

<style>
    body {
        background-image: url('../assets/images/bg-material2.png');
    }
</style>

<body class="loading" data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">




        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page" style="padding-top: 0px; padding-bottom: 0px;">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-4">
                            <div class="card ribbon-box">
                                <div class="card-body">
                                    <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-cellphone-iphone me-1"></i> วิธีการตั้งค่าการ Login 2 ชั้น</div>
                                    <h5 class="text-blue float-end mt-0"></h5>
                                    <div class="ribbon-content">
                                        <img src="<?php echo base_url(); ?>/assets/images/install.png" class="float-start" alt="" width="215">
                                        <p class="mb-1">&nbsp; 1. ดาวน์โหลดแอพ Google Authenticator</p>
                                        <p class="mb-1">&nbsp; 2. เปิดแอพที่ดาวน์โหลด</p>
                                        <p class="mb-1">&nbsp; 3. กดปุ่ม "สแกนบาร์โค้ด"</p>
                                        <p class="mb-1">&nbsp; 4. กรอกเลขยืนยัน ภายใน 5 นาที</p>
                                        <p class="mb-1">&nbsp; 5. กดปุ่มยืนยัน</p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="card ribbon-box">
                                <div class="card-body">
                                    <div class="ribbon ribbon-primary float-end"><i class="mdi mdi-qrcode-scan me-1"></i> iOS</div>
                                    <h5 class="text-primary float-start mt-0">สแกนเพื่อ Download</h5>
                                    <div class="ribbon-content">
                                        <center>
                                            <img src="<?php echo base_url(); ?>/assets/images/qr-code-ios.png" alt="" width="200">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="card ribbon-box">
                                <div class="card-body">
                                    <div class="ribbon ribbon-blue float-end"><i class="mdi mdi-qrcode-scan me-1"></i> Android</div>
                                    <!-- <h5 class="text-blue float-start mt-0">Download</h5> -->
                                    <div class="ribbon-content">
                                        <center>
                                            <img src="<?php echo base_url(); ?>/assets/images/qr-code-android.png" alt="" width="200">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-2">
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="">2FA | ยืนยันตัวตน</h3>
                                    <p class="sub-header">Authenticator</p>

                                    <div class="text-center">
                                        <img src="<?= session('qrCode'); ?>" class="img-fluid center-block" width="400">

                                    </div>
                                    <br>
                                    <form action="<?= base_url('auth/scan_auth2FT') ?>" method="post">
                                        <?= csrf_field() ?>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input name="pin" type="text" id="pin" class="form-control" placeholder="รหัสยืนยัน">
                                                    <button class="btn input-group-text btn-success waves-light waves-effect" type="submit">ยืนยัน</button>
                                                </div>
                                                <!-- /input-group -->

                                            </div> <!-- end col-->
                                        </div> <!-- end row-->

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>



                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->

            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->





        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


       

        <?php $this->endSection(); ?>