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
                        <h4 class="page-title">ประวัติการได้คะแนน และสปิน</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a type="button" class="btn btn-danger waves-effect waves-light mt-1 mb-3" href="<?php echo base_url('report_pointandspin/show'); ?>">
                                <span class="btn-label"><i class="icon-arrow-left"></i></span>กลับ
                            </a>
                            <div class="table-responsive">
                                <!-- id="custom2" -->
                                <table id="scroll-horizontal-datatable" class="table w-100 nowrap mb-0 p-0 m-0">
                                    <thead>
                                        <tr style="background-color: #10394B; color: white; vertical-align: middle;">
                                            <th>ลำดับ</th>
                                            <th>User</th>
                                            <th>ที่มา Point</th>
                                            <th>จำนวน Point</th>
                                            <th>วัน-เดือน-ปี เวลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($PSData)) {
                                        ?>
                                            <?php $i = 1;
                                            foreach ($PSData as $PSDatas) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?php echo $PSDatas['agent_username']; ?></td>
                                                    <td><?php echo $PSDatas['type']; ?></td>
                                                    <td><?php echo $PSDatas['point']; ?></td>
                                                    <td><?php echo date('d/m/Y H:i:s', $PSDatas['create_time']); ?></td>
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
        </div> <!-- content -->
    </div>
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

<?php $this->endSection(); ?>