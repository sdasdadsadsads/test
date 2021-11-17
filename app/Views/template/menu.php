<style>
    #side-menu .menu-title {
        color: #217297;
        font-size: 14px;
    }

    #menutitle {
        color: #3B6073;
        font-size: 14px;
        font-weight: bold;
    }

    .nav-second-level li a {
        font-size: 15px;
    }
</style>


<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <?php
        $MENU_DATA = cache('menuAvailable');
        $permistions = session()->get('permissions');
        $menu = session()->get('menu');
        ?>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <?php foreach ($MENU_DATA as $element) : ?>
                    <?php if (!(in_array($element['id'], $menu))) { // ตรวจสอบสิทธิ์เข้าถึงหน้านี้
                        continue; // Not approve get Menu
                    } else if ((session()->get('class') < $element['class']) && $element['class'] !== 3) {
                        // ตรวจสอบระดับการใช้งาน
                        continue;
                    }
                    ?>
                    <li>
                        <?php if (isset($element['subMenu'])) : ?>
                            <a href="#collapse-<?php echo $element['id']; ?>" data-bs-toggle="collapse">
                                <i class="<?php echo $element['icon']; ?>"></i>
                                <span id="menutitle"> <?php echo $element['nameTH']; ?></span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="collapse-<?php echo $element['id']; ?>">
                                <?php foreach ($element['subMenu'] as $subMenu) : ?>
                                    <!-- ตรวจสอบระดับการใช้งาน -->
                                    <?php if ((session()->get('class') == 1)) {
                                        if ($subMenu['class'] == 2) {
                                            continue;
                                        }
                                        // Not approve get Menu
                                    }
                                    if (!(in_array($subMenu['id'], $permistions))) {  // ตรวจสอบสิทธิ์เข้าถึงหน้านี้ 
                                        continue; // Not approve get Menu
                                    }
                                    ?>
                                    <ul class="nav-second-level">
                                        <li>
                                            <?php if ($subMenu['status'] == 1) : ?>
                                                <a href="<?php echo base_url('' . $subMenu['link'] . ''); ?>">
                                                    <?php echo $subMenu['nameTH']; ?>
                                                </a>
                                            <?php else : ?>
                                                <a href="#" class="text-danger">
                                                    <?php echo $subMenu['nameTH']; ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <a href="<?php echo base_url('' . $element['link'] . ''); ?>">
                                <i class="<?php echo $element['icon']; ?>"></i>
                                <!-- <span class="badge bg-info rounded-pill float-end">2</span> -->
                                <span id="menutitle"> <?php echo $element['nameTH']; ?> </span>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>


                <!-- <li>
                    <a href="<?= base_url('dashboard/show') ?>">
                        <i data-feather="airplay"></i>
                        <span id="menutitle"> Dashboards </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('confirmCredit/show') ?>">
                        <i data-feather="book"></i>
                        <span id="menutitle"> รายการเดินบัญชี </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('withdraw/show') ?>">
                        <i data-feather="book"></i>
                        <span id="menutitle"> ถอนเงิน </span>
                    </a>
                </li>



                <li>
                    <a href="#player" data-bs-toggle="collapse">
                        <i class="icon-user"></i>
                        <span id="menutitle"> สมาชิก</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="player">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?php echo base_url('registration_user/show'); ?>">สมัครสมาชิก</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">ธนาคารฝากของลูกค้า</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">ธนาคารฝาก (ทศนิยม)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('report_player/show'); ?>">รายงาน สมาชิก</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('check_player/show'); ?>">ตรวจสอบรายการเล่น</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">ข้อมูลเชิงลึก</a>
                            </li>
                        </ul>
                    </div>
                </li>

["1","4","5","7","8","9","11","12","13","15","20","21","24","28","33","35","36","38","39","40","41","47","48","46"]
["10","11","62","1","2","3","4","5","6","7","8","27","31","55","57","59","9","12","13","25","26","28","29","30","32","33","41","63","47","48","49","50","51","53","58","45","46","37","38","35","42","36","34","64","39","40","43","44","60","61"]

                <li>
                    <a href=" #emp" data-bs-toggle="collapse">
                        <i class="icon-people"></i>
                        <span id="menutitle"> พนักงาน </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="emp">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url('admin/show') ?>">ข้อมูลพนักงาน</a>
                            </li>
                            <li>
                                <a href="<?= base_url('safecode/show') ?>">Safe Code</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('work_time/show'); ?>">รอบทำงาน</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">ตั้งค่าการเข้าระบบ</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#bank" data-bs-toggle="collapse">
                        <i class="icon-credit-card"></i>
                        <span id="menutitle"> ธนาคาร </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="bank">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?php echo base_url('bank_auto/show'); ?>">ธนาคารอัตโนมัติ</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('bank_statement/show'); ?>">รายการธนาคาร</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('bank_auto/bank_setting'); ?>">ตั้งค่าการมองเห็น</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">True Wallet</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('withdraw_setting/show'); ?>">ตั้งค่าการถอน</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#promotion" data-bs-toggle="collapse">
                        <i class="icon-present"></i>
                        <span id="menutitle"> โปรโมชั่น </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="promotion">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url('promotion/show') ?>">โปรโมชั่น</a>
                            </li>
                            <li>
                                <a href="<?= base_url('promotion/acceptPromoManual') ?>">รับโปรโมชั่น (Manual)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('report_promotion/show'); ?>">รายงานโปรโมชั่น</a>
                            </li>
                            <li>
                                <a href="#" class="text-danger">เครดิตเงินคืน</a>
                            </li>
                            <li>
                                <a href="#" class="text-danger">เครดิตเงินคืน Excel</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#point" data-bs-toggle="collapse">
                        <i class="icon-game-controller"></i>
                        <span id="menutitle"> คะแนน </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="point">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?php echo base_url('report_pointandspin/show'); ?>">คะแนนสมาชิก</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">เกมส์หมุน</a>
                            </li>
                            <li>
                                <a href="#" class="text-danger">แลกรางวัล</a>
                            </li>
                            <li>
                                <a href="#" class="text-danger">ตั้งค่าคะแนน</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#SMS" data-bs-toggle="collapse">
                        <i class="icon-bubbles"></i>
                        <span id="menutitle"> SMS </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="SMS">
                        <ul class="nav-second-level">
                            <li>
                                <a class="text-danger" href="#">ส่ง SMS</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('report_otp/show'); ?>">รายงาน OTP</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">ตั้งค่าข้อความ SMS</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#Broadcast" data-bs-toggle="collapse">
                        <i class="icon-bubbles"></i>
                        <span id="menutitle"> Broadcast </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Broadcast">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url('broadcast/show') ?>" s>จัดการ Broadcast</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#mistake" data-bs-toggle="collapse">
                        <i class="icon-info"></i>
                        <span id="menutitle"> ข้อผิดพลาด </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="mistake">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url('editProblem/show') ?>">แก้ไขข้อผิดพลาด</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#report" data-bs-toggle="collapse">
                        <i class="icon-book-open"></i>
                        <span id="menutitle"> รายงาน </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="report">
                        <ul class="nav-second-level">
                             <li>
                                <a href="<?php echo base_url('report_withdraw/show'); ?>">รายงานการถอนเงิน</a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url('report_deposit/show'); ?>">รายงานการฝากเงิน</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">รายงานตามบุคคล</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('report_otp/show'); ?>">รายงาน OTP</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('report_first_deposit/show'); ?>">รายงานการฝากแรก</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('report_deposit_decimal/show'); ?>">รายงานการสร้างฝากทศนิยม</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('report_promotion/show'); ?>">รายงานโปรโมชั่น</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('report_activity_logs/show'); ?>">รายงานพฤติกรรมพนักงาน</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">รายงานการถอนค่าแนะนำ</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">รายงาน Affiliate</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">รายงานรายได้แนะนำ</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#system" data-bs-toggle="collapse">
                        <i class="icon-reload"></i>
                        <span id="menutitle"> เกี่ยวกับระบบ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="system">
                        <ul class="nav-second-level">
                            <li>
                                <a class="text-danger" href="#">รายการอัพเดท Version</a>
                            </li>
                            <li>
                                <a class="text-danger" href="#">ตั้งค่าระบบ</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('withdraw_setting/show'); ?>">ตั้งค่าการถอน</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#favmenu" data-bs-toggle="collapse">
                        <i data-feather="star" class="icon-dual-warning"></i>
                        <span id="menutitle" class="text-danger"> เมนูที่ใช้บ่อย </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="favmenu">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">fav menu 1</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#graph" data-bs-toggle="collapse">
                        <i class="icon-graph"></i>
                        <span id="menutitle" class="text-danger"> กราฟ (ตามช่วงเวลา) </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="graph">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">กราฟ 1</a>
                            </li>
                            <li>
                                <a href="#">กราฟ 2</a>
                            </li>

                        </ul>
                    </div>
                </li> -->


                <!-- <li>
                    <a href="#anlz" data-bs-toggle="collapse">
                        <i data-feather="bar-chart-2"></i>
                        <span id="menutitle" class="text-danger"> Analyze ข้อมูลผู้เล่น </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="anlz">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">Analyze ..</a>
                            </li>
                            <li>
                                <a href="#">Analyze ..</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#deposit" data-bs-toggle="collapse">
                        <i class="icon-wallet"></i>
                        <span id="menutitle" class="text-danger"> เงินฝาก - ถอน </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="deposit">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">ถอนเงิน / ฝากเงิน</a>
                            </li>
                            <li>
                                <a href="#">ฝากครั้งแรก</a>
                            </li>
                            <li>
                                <a href="#">ฝากติดต่อ 7 วัน</a>
                            </li>
                            <li>
                                <a href="#">แบ่งตามจำนวนเงิน</a>
                            </li>
                            <li>
                                <a href="#">ถอนค่าแนะนำ</a>
                            </li>
                            <li>
                                <a href="#">รายได้แนะนำ</a>
                            </li>
                            <li>
                                <a href="#">ยกเลิกรายการถอน</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#rank" data-bs-toggle="collapse">
                        <i class="icon-trophy"></i>
                        <span id="menutitle" class="text-danger"> Rank </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="rank">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?php echo base_url('Admin/ranking'); ?>">รายการ Rank</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Admin/season'); ?>">ฤดูการ Rank</a>
                            </li>
                            <li>
                                <a href="#">จัดการ Rank</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sale" data-bs-toggle="collapse">
                        <i class="ti-id-badge"></i>
                        <span id="menutitle" class="text-danger"> เซลล์ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sale">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?php echo base_url('Admin/sale'); ?>">ข้อมูลเซลล์</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Admin/turnoversale'); ?>">Turnover sale</a>
                            </li>
                            <li>
                                <a href="#">รายงานเซลล์</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#spin" data-bs-toggle="collapse">
                        <i class="icon-support"></i>
                        <span id="menutitle" class="text-danger"> วงล้อ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="spin">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">จัดการวงล้อ</a>
                            </li>
                            <li>
                                <a href="#">ตั้งค่าวงล้อ</a>
                            </li>
                            <li>
                                <a href="#">รายงานวงล้อ</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#coupon" data-bs-toggle="collapse">
                        <i class="icon-badge"></i>
                        <span id="menutitle" class="text-danger"> คูปอง </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="coupon">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">ข้อมูลคูปอง</a>
                            </li>
                            <li>
                                <a href="#">แจกคูปอง</a>
                            </li>
                            <li>
                                <a href="#">ตั้งค่าคูปอง</a>
                            </li>
                            <li>
                                <a href="#">รายงานคูปอง</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#checkin" data-bs-toggle="collapse">
                        <i class="icon-location-pin"></i>
                        <span id="menutitle" class="text-danger"> เช็คอิน </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="checkin">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">จัดการเช็คอิน</a>
                            </li>
                            <li>
                                <a href="#">ตั้งค่าเช็คอิน</a>
                            </li>
                            <li>
                                <a href="#">รายงานเช็คอิน</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#product" data-bs-toggle="collapse">
                        <i class="icon-handbag"></i>
                        <span id="menutitle" class="text-danger"> ระบบสินค้า </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">รายการสินค้า</a>
                            </li>
                            <li>
                                <a href="#">รายการแลกสินค้า</a>
                            </li>
                            <li>
                                <a href="#">รายการยกเลิกสินค้า</a>
                            </li>
                            <li>
                                <a href="#">คืนคะแนน</a>
                            </li>
                            <li>
                                <a href="#">ตั้งค่ารายการสินค้า</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#line" data-bs-toggle="collapse">
                        <i class="fab fa-line"></i>
                        <span id="menutitle" class="text-danger"> Line </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="line">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">Line notify</a>
                            </li>
                            <li>
                                <a href="#">Line bot</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#SEO" data-bs-toggle="collapse">
                        <i class="icon-notebook"></i>
                        <span id="menutitle" class="text-danger"> SEO </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="SEO">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">แก้ไขบทความ</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#share" data-bs-toggle="collapse">
                        <i class="icon-share"></i>
                        <span id="menutitle" class="text-danger"> แนะนำเพื่อน </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="share">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">ค้นหาผู้เล่น</a>
                            </li>
                            <li>
                                <a href="#">ข้อมูลการแนะนำเพื่อน</a>
                            </li>
                            <li>
                                <a href="#">รายการปันผล</a>
                            </li>
                            <li>
                                <a href="#">รออนุมัติผล</a>
                            </li>
                            <li>
                                <a href="#">ตั้งค่า</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#crooks" data-bs-toggle="collapse">
                        <i class="icon-user-unfollow"></i>
                        <span id="menutitle" class="text-danger"> มิจฉาชีพ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="crooks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">รายชื่อมิจฉาชีพ</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#support" data-bs-toggle="collapse">
                        <i class="icon-earphones-alt"></i>
                        <span id="menutitle" class="text-danger"> Support </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="support">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">คำถามที่พบบ่อย</a>
                            </li>
                            <li>
                                <a href="#">แจ้งปัญหา / ข้อเสนอแนะ</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#reportSum" data-bs-toggle="collapse">
                        <i class="icon-book-open"></i>
                        <span id="menutitle" class="text-danger"> รายงานสรุป </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="reportSum">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">รายงานสรุปกำไรขาดทุน</a>
                            </li>
                            <li>
                                <a href="#">รายงานสรุปโปรโมชั่น</a>
                            </li>
                            <li>
                                <a href="#">รายงานการฝากที่ถูกซ่อน</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#crypto" data-bs-toggle="collapse">
                        <i class="icon-rocket"></i>
                        <span id="menutitle" class="text-danger"> Cryptocurrency </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="crypto">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">คู่มือ Cryptocurrency</a>
                            </li>
                            <li>
                                <a href="#">VDO Cryptocurrency</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#manual" data-bs-toggle="collapse">
                        <i class="ti-bookmark-alt"></i>
                        <span id="menutitle" class="text-danger"> คู่มือการใช้งาน </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="manual">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">E-Book</a>
                            </li>
                            <li>
                                <a href="#">VDO คู่มือการใช้งาน</a>
                            </li>
                            <li>
                                <a href="#">คู่มือการตั้งค่าธนาคาร</a>
                            </li>
                            <li>
                                <a href="#">คู่มือการฝากแบบทศนิยม</a>
                            </li>
                            <li>
                                <a href="#">คู่มือสร้างรหัสยืนยันตัวตน</a>
                            </li>
                            <li>
                                <a href="#">คู่มือการตั้งค่า Line Notify</a>
                            </li>
                            <li>
                                <a href="#">คู่มือการตั้งค่าสิทธิ์เมนู</a>
                            </li>
                            <li>
                                <a href="#">คู่มือการผูกบัญชี Line</a>
                            </li>
                            <li>
                                <a href="#">คู่มือการเติมเงิน</a>
                            </li>
                            <li>
                                <a href="#">คู่มือการปิดระบบ</a>
                            </li>
                        </ul>
                    </div>
                </li> -->




            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->