<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>• Admin - 12iwinR •</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="<?php echo base_url(); ?>/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="<?php echo base_url(); ?>/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />



    <!-- Plugins css picker -->
    <link href="<?php echo base_url(); ?>/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />


    <!-- Sweet Alert-->
    <link href="<?php echo base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo base_url(); ?>/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?php echo base_url(); ?>/assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css -->
    <link href="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
    <!-- Plugins css -->
    <link href="<?php echo base_url(); ?>/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</head>

<style>
    * {
        font-family: 'Prompt', sans-serif;
        font-size: 17px;
    }

    .page-title {
        font-family: 'Prompt', sans-serif;
        font-size: 16px;
        font-weight: bold;
    }
</style>

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom" style="background-color: #2196f3;">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">
                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle">
                            <button onclick="getModalEmergencyLock()" data-bs-whatever="@mdo" class="btn btn-danger waves-effect waves-light" type="submit"><i class="fe-alert-octagon"></i> Emergency Lock</button>
                        </a>
                    </li>

                    <!-- <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo base_url(); ?>/assets/images/flags/thailand.jpg" alt="user-image" height="16">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">

                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="<?php echo base_url(); ?>/assets/images/flags/thailand.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">ไทย</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="<?php echo base_url(); ?>/assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                            </a>

                        </div>
                    </li> -->


                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo base_url(); ?>/assets/images/users/user-4.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ms-1 text-light">
                                <?= session('username'); ?> <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome Admin!</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Profile</span>
                            </a>



                            <div class="dropdown-divider"></div>

                            <!-- item-->

                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item notify-item">
                                <i class="fe-log-out text-danger"></i>
                                <span class="text-danger">Logout</span>
                            </a>

                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="<?php echo base_url(); ?>/dashboard" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="<?php echo base_url(); ?>/assets/images/logo_sm.png" alt="" height="">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo base_url(); ?>/assets/images/logo_lg.png" alt="" height="">
                        </span>
                    </a>

                    <a href="?php echo base_url();?>/dashboard" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="<?php echo base_url(); ?>/assets/images/logo_sm.png" alt="" height="" width="">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo base_url(); ?>/assets/images/logo_lg.png" alt="" height="" width="">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu" style="font-size: 25px;"></i>
                        </button>
                    </li>

                    <li>
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>

                    <li class="dropdown d-none d-xl-block">
                        <p class="nav-link text-light" id="time"></p>
                    </li>

                    </li>
                </ul>


                <div class="clearfix"></div>
            </div>
        </div>


        <div class="modal fade" id="EmegencyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="recipient-name" class="col-form-label"><i class="fe-alert-octagon h3 text-warning"></i> <b class="h4"> คุณต้องการปิดระบบของท่านหรือไม่</b> </label>
                        </div>
                        <div class="mb-2">
                            <b class="h4">โปรดเลือก กลุ่ม ที่คุณต้องการจะปิดระบบ !!</b>
                            <div>
                                <div id="groub_admin">
                                    <!-- load js -->
                                </div>
                            </div>
                        </div>
                        <div class="mb">
                            <label class="h4 text-danger" for=""> * คำเตือน : หากระบบถูกปิด users ที่อยู่ใน กลุ่ม จะไม่สามารถใช้งานได้</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" onclick="callEmergency()">OK</button>
                    </div>
                </div>
            </div>
        </div>






        <?= $this->include('template/menu') ?>

        <?php $this->renderSection('content'); ?>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2021 - <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; 12iwinR
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block">
                            <a href="#">About Us</a>
                            <a href="#">Help</a>
                            <a href="#">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <div class="rightbar-overlay"></div>




    <script src="<?php echo base_url(); ?>/assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="<?php echo base_url(); ?>/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="<?php echo base_url(); ?>/assets/libs/selectize/js/standalone/selectize.min.js"></script>


    <!-- Plugins js-->
    <script src="<?php echo base_url(); ?>/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Init js-->
    <script src="<?php echo base_url(); ?>/assets/js/pages/form-pickers.init.js"></script>

    <!-- Init js-->
    <script src="<?php echo base_url(); ?>/assets/js/pages/form-advanced.init.js"></script>

    <!-- Dashboar 1 init js-->
    <script src=".<?php echo base_url(); ?>/assets/js/pages/dashboard-1.init.js"></script>

    <!-- App js-->
    <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>


    <script src="<?php echo base_url(); ?>/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/select2/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>



    <!-- third party js -->
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>/assets/libs/pdfmake/build/pdfmake.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>/assets/libs/pdfmake/build/vfs_fonts.js"></script> -->
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="<?php echo base_url(); ?>/assets/js/pages/datatables.init.js"></script>


    <!-- Sweet Alerts js -->
    <script src="<?php echo base_url(); ?>/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="<?php echo base_url(); ?>/assets/js/pages/sweet-alerts.init.js"></script>


    <!-- Plugins js -->
    <script src="<?php echo base_url(); ?>/assets/libs/dropzone/min/dropzone.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/dropify/js/dropify.min.js"></script>

    <!-- Init js-->
    <script src="<?php echo base_url(); ?>/assets/js/pages/form-fileuploads.init.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">


    <script>
        var timeDisplay = document.getElementById("time");

        function refreshTime() {
            var dateString = new Date().toLocaleString("en-GB", {
                timeZone: "Asia/Bangkok"
            });
            var formattedString = dateString.replace(", ", " | ");
            timeDisplay.innerHTML = '<img src="<?php echo base_url(); ?>/assets/images/brands/clock.png" alt="" width="30"> ' + formattedString;
        }

        setInterval(refreshTime, 1000);
    </script>


    <script>
        <?php if (session()->has("success")) { ?>
            Swal.fire({
                icon: 'success',
                title: '<?= session("success") ?>',
                showConfirmButton: false,
                timer: 1500
            })
        <?php } ?>

        <?php if (session()->has("error")) { ?>
            Swal.fire({
                icon: 'error',
                title: '<?= session("error") ?>',
                showConfirmButton: false,
                timer: 1500
            })
            <?php session()->remove('error'); ?>
        <?php } ?>


        <?php if (session()->has("auth")) { ?>
            Swal.fire({
                icon: 'success',
                title: '<?= session("auth") ?>',
                showConfirmButton: false,
                timer: 1400
            })
        <?php } ?>
    </script>

</body>

</html>
<?php require 'global_fn.php'; ?>