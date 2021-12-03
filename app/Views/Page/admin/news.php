<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>


<style>
    .shadownews {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }

    .blink {
        animation: blink_me 1s linear infinite;
    }

    @keyframes blink_me {
        0% {
            opacity: 1;
        }

        35% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .table th {
        text-align: left !important;
    }

    .table td {
        text-align: left !important;
        font-size: 15px !important;
        vertical-align: middle !important;
    }
</style>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                        <h4 class="page-title">ข่าวสาร <span class="text-danger">* สำคัญ</span> </h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadownews">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <p class="lead text-center">
                                                <span class="badge bg-danger blink">New !</span> รายการอัพเดท (เวอร์ชั่นปัจจุบัน
                                                <span class="text-blue">DEV</span>)
                                            </p>
                                            <ul>
                                                <li>
                                                    <p class="header-title">เปลี่ยนแปลงเมนูฝาก - ถอน</p>
                                                </li>
                                                <li>
                                                    <p class="header-title">ปิดปรับปรุงระบบเซลล์</p>
                                                </li>
                                                <li>
                                                    <p class="header-title">แก้ไขหน้าถอนใหม่จัดเรียงตามลำดับคิว</p>
                                                </li>
                                                <li>
                                                    <p class="header-title">แก้ bug หน้าสมาชิก</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card shadownews">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <p class="lead text-success text-bold">เข้าใช้งานล่าสุด</p>
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                        <th>ชื่อ</th>
                                                        <th>ตำแหน่ง</th>
                                                        <th>เวลาเข้าใช้งาน</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (isset($lastlogintData)) {
                                                        ?>
                                                            <?php $i = 1;
                                                            foreach ($lastlogintData as $lastlogintDatas) { ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td><?php echo $lastlogintDatas['username']; ?></td>
                                                                    <td><?php echo $lastlogintDatas['name']; ?></td>
                                                                    <?php if ($lastlogintDatas['class'] == 1) { ?>
                                                                        <td>Admin</td>
                                                                    <?php } else if ($lastlogintDatas['class'] == 2) { ?>
                                                                        <td>Manager</td>
                                                                    <?php } else { ?>
                                                                        <td>Owner</td>
                                                                    <?php } ?>

                                                                    <td><?php echo date('d/m/Y H:i:s', $lastlogintDatas['last_login']); ?></td>
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
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadownews">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <p class="lead text-center text-danger text-bold">บัญชีมิจฉาชีพ ล่าสุด</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <th>#</th>
                                                <th>ชื่อ - สกุล</th>
                                                <th>เลขที่บัญชี</th>
                                                <th>ธนาคาร</th>
                                                <th>เวลา</th>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($BlacklistData)) {
                                                ?>
                                                    <?php $i = 1;
                                                    foreach ($BlacklistData as $BlacklistDatas) { ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?php echo $BlacklistDatas['blacklist_name']; ?></td>
                                                            <td><?php echo $BlacklistDatas['account']; ?></td>
                                                            <td>
                                                                <img src="<?php echo base_url(); ?>/assets/images/Bank_show/<?php echo $BlacklistDatas['bank_short']; ?>.png" alt="" width="20">
                                                                [<?php echo $BlacklistDatas['bank_short']; ?>]
                                                            </td>
                                                            <td><?php echo date('d/m/Y H:i:s', $BlacklistDatas['created_at']); ?></td>
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
                </div>
            </div>

        </div>
    </div>

    <?php $this->endSection(); ?>