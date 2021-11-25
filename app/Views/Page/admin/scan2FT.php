<?php $this->extend('template/head_login'); ?>

<?php $this->section('content'); ?>

<style>
    body {
        background-image: url('../assets/images/bg-material2.png');
    }
</style>

<body class="loading pb-4" data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <div id="wrapper">
        <div class="content-page" style="padding-top: 0px; padding-bottom: 0px;">
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card ribbon-box" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                                <div class="card-body">
                                    <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-cellphone-iphone me-1"></i> วิธีการตั้งค่าการ Login 2 ชั้น</div>
                                    <div class="ribbon-content">
                                        <div class="row justify-content-center">
                                            <div class="col-10 col-md-4 col-lg-5">
                                                <img src="<?php echo base_url(); ?>/assets/images/install.png" class="float-start" alt="" width="90%">
                                            </div>
                                            <div class="col-10 col-md-5 col-lg-6 px-0 mt-2">
                                                <p class="mb-1">1. ดาวน์โหลดแอพ Google Authenticator</p>
                                                <p class="mb-1">2. เปิดแอพที่ดาวน์โหลด</p>
                                                <p class="mb-1">3. กดปุ่ม "สแกนบาร์โค้ด"</p>
                                                <p class="mb-1">4. กรอกเลขยืนยัน ภายใน 5 นาที</p>
                                                <p class="mb-1">5. กดปุ่มยืนยัน</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <div class="card ribbon-box" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                                <div class="card-body">
                                    <div class="ribbon ribbon-primary float-end"><i class="mdi mdi-qrcode-scan me-1"></i> iOS</div>
                                    <h5 class="text-primary float-start mt-0">สแกนเพื่อ Download</h5>
                                    <div class="ribbon-content">
                                        <center>
                                            <img src="<?php echo base_url(); ?>/assets/images/qr-code-ios.png" alt="" width="90%">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2">
                            <div class="card ribbon-box" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                                <div class="card-body">
                                    <div class="ribbon ribbon-blue float-end"><i class="mdi mdi-qrcode-scan me-1"></i> Android</div>
                                    <h5 class="text-blue float-start mt-0">สแกนเพื่อ Download</h5>
                                    <div class="ribbon-content">
                                        <center>
                                            <img src="<?php echo base_url(); ?>/assets/images/qr-code-android.png" alt="" width="90%">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                                <div class="card-body">
                                    <h3 class="">2FA | ยืนยันตัวตน</h3>
                                    <p class="sub-header p-0 m-0">Authenticator</p>
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6 col-lg-9 my-3 pt-0 text-center">
                                            <img src="<?= session('qrCode'); ?>" class="img-fluid center-block" width="75%">
                                        </div>
                                        <div class="col-12 col-md-9 col-lg-12">
                                            <center>
                                                <form action="<?= base_url('auth/scan_auth2FT') ?>" method="post">
                                                    <?= csrf_field() ?>
                                                    <div class="input-group w-75">
                                                        <input name="pin" type="text" id="pin" class="form-control" placeholder="รหัสยืนยัน">
                                                        <button class="btn input-group-text btn-success waves-light waves-effect" type="submit">ยืนยัน</button>
                                                    </div>
                                                </form>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rightbar-overlay"></div>




        <?php $this->endSection(); ?>