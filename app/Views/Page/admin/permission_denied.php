<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>


<style>
    table tr {
        text-align: center;
        font-size: 14px;
        vertical-align: middle;
    }

    textarea {
        height: 200px;
        resize: none;
    }

    .card-body label {
        cursor: pointer;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #009933;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #009933;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<!-- ============================================================= -->
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
                        <h4 class="page-title">คุณไม่ได้รับอนุญาติเข้าถึง Web Page นี้</h4>
                    </div>
                </div>
            </div>
            <!-- end page titqweqwele -->


            <div class="row">
                <!-- end col-->
            </div> <!-- container -->

        </div> <!-- content -->

    </div>
</div>
<?php $this->endSection(); ?>