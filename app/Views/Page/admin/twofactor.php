<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA | Authenticator</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/favicon.ico">


    <!-- App css -->

    <link href="<?php echo base_url();?>/assets/css/config/creative/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?php echo base_url();?>/assets/css/config/creative/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?php echo base_url();?>/assets/css/config/creative/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?php echo base_url();?>/assets/css/config/creative/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />


    <!-- icons -->
    <link href="<?php echo base_url();?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Animation css -->
    <link href="<?php echo base_url();?>/assets/libs/animate.css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/assets/libs/animate.css/animate.compat.css" rel="stylesheet" type="text/css" />



    
		


</head>
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
                                                        <img src="<?php echo base_url();?>/assets/images/install.png" class="float-start" alt="" width="215">
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
                                                            <img src="<?php echo base_url();?>/assets/images/qr-code-ios.png" alt="" width="200">
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
                                                            <img src="<?php echo base_url();?>/assets/images/qr-code-android.png" alt="" width="200">
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
                                                <img src="<?php echo base_url();?>/assets/images/qrcode_test.png" alt="" class="img-fluid center-block" width="400">                                          
                                        </div>

                                        <form class="">
                                            <div class="row justify-content-center">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                            <input type="number" class="form-control" id="inputPassword2" placeholder="รหัสยืนยัน">
                                                            <button class="btn input-group-text btn-success waves-light waves-effect" type="button">ยืนยัน</button>
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

<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>
</html>