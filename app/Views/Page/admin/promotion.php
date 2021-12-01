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

    .ck-editor__editable_inline {
        min-height: 150px;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
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
                        <h4 class="page-title">โปรโมชั่น</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class=" mt-1 col-12 col-md-5 col-lg-3">
                                            <button type="button" onclick="clearData()" class="btn btn-success waves-effect waves-light mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#addPromotion">
                                                <span class="btn-label"><i class="mdi mdi-plus-thick"></i></span>เพิ่มโปรโมชั่น
                                            </button>
                                        </div>

                                    </div>


                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th>โปรโมชั่น</th>
                                                <th>ประเภท</th>
                                                <th>ฝากต่ำสุด</th>
                                                <th>ฝากสูงสุด</th>
                                                <th>โบนัสสูงสุด</th>
                                                <th>อั้นถอน(เท่า)</th>
                                                <th>จำนวน Players ที่รับไป</th>
                                                <th>สถานะ</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if (isset($promotion)) : ?>
                                                <?php foreach ($promotion as $pro) : ?>
                                                    <?php foreach ($pro as $index) : ?>
                                                        <tr>
                                                            <td>
                                                                <img src="<?php echo base_url(); ?>/assets/uploads/<?php echo $index['promotion_img']; ?>" alt="user-image" height="140" width="140" style="object-fit: cover;">
                                                            </td>
                                                            <td><?php echo $index['promotion_name']; ?></td>
                                                            <td><?php echo $index['category']; ?></td>
                                                            <td><?php echo $index['min_deposit']; ?></td>
                                                            <td><?php echo $index['max_deposit']; ?></td>

                                                            <?php if ($index['bonus_type'] === 0) { ?>
                                                                <td><?php echo $index['max_bonus']; ?></td>
                                                            <?php } else { ?>
                                                                <td><?php echo $index['max_bonus']; ?>%</td>
                                                            <?php } ?>

                                                            <td><?php echo $index['max_withdraw']; ?></td>
                                                            <?php if ($index['receives'] > 0) : ?>
                                                                <td><span class="badge badge-outline-success"><?php echo $index['receives']; ?> ครั้ง</span></td>
                                                            <?php else : ?>
                                                                <td><span class="badge badge-outline-danger"><?php echo $index['receives']; ?> ครั้ง</span></td>
                                                            <?php endif; ?>

                                                            <?php if ($index['status'] === 0) { ?>
                                                                <td>
                                                                    <h4><span class="badge badge-outline-danger">Active</span></h4>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td>
                                                                    <?php if ($index['isNoLimitTime'] == 1) : ?>
                                                                        <?php if ($index['isExpire'] == 1) : ?>
                                                                            <h4><span class="badge badge-outline-success">Active</span></h4>
                                                                        <?php elseif ($index['isExpire'] == 2) : ?>
                                                                            <h4><span class="badge badge-outline-warning">ยังไม่ถึงเวลา</span></h4>
                                                                        <?php else : ?>
                                                                            <h4><span class="badge badge-outline-danger">หมดเวลา</span></h4>
                                                                        <?php endif; ?>
                                                                    <?php else : ?>
                                                                        <h4><span class="badge badge-outline-success">Actiave</span></h4>
                                                                    <?php endif; ?>

                                                                </td>
                                                            <?php } ?>

                                                            <td>
                                                                <button type="button" class="btn btn-info waves-effect waves-light" onClick="open_modal_edit('<?= $index['id'] ?>')"><i class="mdi mdi-file-document-edit-outline"></i></button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>




                                        </tbody>
                                    </table>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>



                </div>
            </div> <!-- container -->

        </div> <!-- content -->

    </div>
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


<!-- ============================================================================================================================================= -->

<div class="col-xl-12">
    <div id="addPromotion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">เพิ่มโปรโมชั่น</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">

                    <form id="form_promo" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">ชื่อโปรโมชั่น</label>
                                    <input type="text" name="promoName" id='promoName' class="form-control" placeholder="ชื่อโปรโมชั่น">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">ประเภทโบนัส</label>
                                    <select onchange="toggle_condition(value);" name="bonusType" id="bonusType" class="form-select">
                                        <option value="0">ค่าคงที่</option>
                                        <option value="1">%</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">ประเภท </label>

                                    <?php if (isset($promoCategory)) { ?>
                                        <select onchange="toggle_promotion_category(value);" name="promoCategory" id="promoCategory" class="form-select">
                                            <?php foreach ($promoCategory as $promoCategorys) { ?>
                                                <option value="<?php echo $promoCategorys['id']; ?>"><?php echo $promoCategorys['promotion_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php    } else { ?>
                                        <input type="text" id="" disabled class="form-control" value='ไม่สามารถเชื่อมต่อ Server ได้' placeholder="">
                                    <?php } ?>

                                </div>
                            </div>

                            <div class="col-md-6" id='col-continuousDeposit' style='display:none'>
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">จำนวนวันฝากติดต่อ</label>
                                    <input type="number" name="continuousDeposit" id="continuousDeposit" class="form-control" value="1" placeholder="จำนวนวันฝากติดต่อ">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">โบนัสสูงสุด</label>
                                    <input type="number" name="maxBonus" id="maxBonus" class="form-control" placeholder="โบนัสสูงสุด">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" id="col-minDeposit">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">ฝากต่ำสุด</label>
                                    <input type="number" name="minDeposit" id="minDeposit" class="form-control" placeholder="ฝากต่ำสุด">
                                </div>
                            </div>
                            <div class="col-md-6" id="col-maxDeposit">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">ฝากสูงสุด</label>
                                    <input type="number" name="maxDeposit" id="maxDeposit" class="form-control" placeholder="ฝากสูงสุด">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label mb-2">ปิด / เปิด ระยะเวลาโปโมชั่น</label><br>
                                <label class="switch mb-2">
                                    <input type="checkbox" id="myCheck" onclick="toggle_no_limit_time()">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">วันที่เริ่มต้นโปร</label>
                                    <input type="text" id="startDate" name="startDate" class="basic-datepicker form-control bg-light" disabled placeholder="วันที่เริ่มต้นโปร">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-2" id='col-endDate'>
                                    <label for="field-2" class="form-label">วันที่สิ้นสุดโปร</label>
                                    <input type="text" id="endDate" name="endDate" class="basic-datepicker form-control bg-light" disabled placeholder="วันที่เริ่มต้นโปร">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="display: none;" id="Time">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">เวลาเริ่มต้น</label>
                                    <input type="text" name="startTime" id="startTime" class="24hours-timepicker form-control" placeholder="เวลาเริ่มต้น">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">เวลาสิ้นสุด</label>
                                    <input type="text" name="endTime" id="endTime" class="24hours-timepicker form-control" placeholder="เวลาสิ้นสุด">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6" id='col-amountAcceptPerDay'>
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">จำนวนครั้งการรับ โปรโมชั่นต่อวัน <h6 class="text-danger">ตั้ง 0 คือไม่จำกัดการรับโบนัส </h6></label>
                                    <input type="number" name="amountAcceptPerDay" value="1" id="amountAcceptPerDay" class="form-control" placeholder="จำนวนครั้งการรับ โปรโมชั่นต่อวัน">
                                </div>
                            </div>
                            <div class="col-md-6" id='col-maxWithdraw'>
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">จำนวนยอดถอน สูงสุดกี่เท่า <h6 class="text-danger"> คิดจากยอดฝากบวกกับโบนัส เช่น ถอนสูงสุด 5 เท่า ยอดฝาก 100 โบนัส 20 ถอนได้สูงสุด 600 </h6></label>
                                    <input type="number" name="maxWithdraw" value="1" id="maxWithdraw" class="form-control" placeholder="จำนวนยอดถอน สูงสุดกี่เท่า">
                                </div>
                            </div>
                        </div>

                        <div class="depositOnlyOnTheDay" id="depositOnlyOnTheDay" style="display: none;">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="field-2" class="form-label">เลือกฝากเฉพาะวัน</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row p-1">
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label for="field-2" class="form-label">วันจันทร์</label>
                                        <input type="checkbox" class="form-check-input" id="monday" name="monday">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label for="field-2" class="form-label">วันอังคาร</label>
                                        <input type="checkbox" class="form-check-input" id="tuesday" name="tuesday">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label for="field-2" class="form-label">วันพุธ</label>
                                        <input type="checkbox" class="form-check-input" id="wednesday" name="wednesday ">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label for="field-2" class="form-label">วันพฤหัสบดี</label>
                                        <input type="checkbox" class="form-check-input" id="thursday" name="thursday">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label for="field-2" class="form-label">วันศุกร์</label>
                                        <input type="checkbox" class="form-check-input" id="friday" name="friday">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label for="field-2" class="form-label">วันเสาร์</label>
                                        <input type="checkbox" class="form-check-input" id="saturday" name="saturday">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-2">
                                        <label for="field-2" class="form-label">วันอาทิตย์</label>
                                        <input type="checkbox" class="form-check-input" id="sunday" name="sunday">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">Turnover Game (สล็อต ยิงปลา) <h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverGame" id="turnoverGame" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">Turnover Trading (เทรนดิ้ง) <h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverTrading" id="turnoverTrading" class="form-control" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">Turnover Mix Parlay <h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverParlay" id="turnoverParlay" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">Turnover Mix Step <h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverStep" id="turnoverStep" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">Turnover Casino (คาสิโน)<h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverCasino" id="turnoverCasino" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">Turnover Lotto (หวย)<h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverLotto" id="turnoverLotto" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">Turnover M2 <h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverM2" id="turnoverM2" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">Turnover Multiplayer (ไพ่) <h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverMultiPlayer" id="turnoverMultiPlayer" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">Turnover Keno (คีโน่)<h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverKeno" id="turnoverKeno" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">Turnover Poker <h6 class="text-danger"> ตั้ง 1 คือไม่ติดเทิร์น </h6></label>
                                    <input type="number" value="1" name="turnoverPoker" id="turnoverPoker" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-2">
                                    <label for="field-2" class="form-label">Turnover Esport (กีฬา)<h6 class="text-danger">กรณีเลือก Esport เป็นประเภท ทำเทิร์นทุกเกมส์ </h6></label>
                                    <input type="number" value="1" name="turnoverEsport" id="turnoverEsport" onchange="set_turnover_all_games(this.value)" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">Turnover Football (กีฬา)<h6 class="text-danger"> กรณีเลือก Football เป็นประเภท ทำเทิร์นทุกเกมส์ </h6></label>
                                    <input type="number" value="1" name="turnoverFootball" id="turnoverFootball" onchange="set_turnover_all_games(this.value)" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2" id="warning-turnover" style="display: none;">
                            <div>
                                <div class="alert alert-warning" role="alert">
                                    <h3 class="alert-heading">แจ้งเตือน</h3>
                                    <p>กรณีเลือก Football หรือ Esport เป็นประเภท ทำเทิร์นทุกเกมส์ ทุกเกมส์จะมีค่าเทิร์นเท่ากับเกมส์ Football และ Esport</p>
                                    <p class="mb-0"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-1" class="form-label">รายละเอียด</label>
                                    <div style="height:500" id="editor" id="promoExplainCondition">
                                        <!-- <textarea required name="promoExplainCondition" id="promoExplainCondition" class="form-control"></textarea> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="field-2" class="form-label">อัพโหลดรูป</label>
                                    <input type="file" name="image" id="image" data-plugins="dropify" data-default-file="" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label mb-2">ปิด / เปิด การใช้งานโปรโมชั่น
                                </label><br>
                                <label class="switch mb-2">
                                    <input type="checkbox" id="myCheck2" >
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </form>



                    <div id="Area">
                        <label for="field-2" class="form-label">เงื่อนไข</label>
                        <h6 class="text-danger"> กรุณากดปุ่มเพิ่มเพื่อกรอกรายละเอียดโปรโมชั่น </h6>
                        <div class="row" id="AreaCondition">


                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button id="addCondition" onclick="addCondition()" class="btn btn-secondary waves-effect waves-light width-md"><i class="mdi mdi-plus-thick"></i> เพิ่ม</button>
                            </div>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button class="btn btn-success waves-effect waves-light" onclick="controller_to_save()">บันทึก</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">ปิด</button>
                    </div>

                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
</div>



<script>
    var YourEditor;
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: {
                items: ['bold', 'italic', '|', 'comment']
            },
        })
        .then(editor => {
            YourEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    var buffer_condition = [];
    var order_condition = 0;
    var isEdit = false;
    var promoId;


    function set_turnover_all_games(value) {
        set_turnover_casino(value)
        set_turnover_esport(value)
        set_turnover_football(value)
        set_turnover_game(value)
        set_turnover_keno(value)
        set_turnover_lotto(value)
        set_turnover_m2(value)
        set_turnover_multiPlayer(value)
        set_turnover_parlay(value)
        set_turnover_poker(value)
        set_turnover_step(value)
        set_turnover_trading(value)
        set_alert_warning_turnover(true)
    }

    function clearData() {
        buffer_condition = [];
        order_condition = 0;
        isEdit = false;
        set_default_promotion_name();
        set_default_promotion_category();
        set_default_bonus_type();
        set_default_min_deposit();
        set_default_max_deposit();
        set_default_max_withdraw();
        set_default_amount_accept_per_day()
        set_default_isNolimitTime();
        set_default_init_promotion();
        set_default_end_promotion();
        set_default_start_time();
        set_default_end_time();
        set_default_deposit_only_on_the_day();
        set_default_continuous_deposit();
        set_default_turnover_casino();
        set_default_turnover_esport();
        set_default_turnover_football();
        set_default_turnover_game();
        set_default_turnover_keno();
        set_default_turnover_lotto();
        set_default_turnover_m2();
        set_default_turnover_multiplayer();
        set_default_turnover_parlay();
        set_default_turnover_poker();
        set_default_turnover_step();
        set_default_turnover_trading();
        set_default_explain_condition();
        set_default_status();
        set_default_max_bonus();
        set_condition_be_null();
        set_default_image();
        toggle_promotion_category();
        set_alert_warning_turnover(false);
    }



    function set_alert_warning_turnover(isTrue) {
        if (isTrue) {
            document.getElementById('warning-turnover').style.display = 'block';
        } else {
            document.getElementById('warning-turnover').style.display = 'none';
        }
    }

    async function fetchData_and_setterData(id) {
        isEdit = true;
        $.ajax({
            url: "<?php echo base_url('promotion/promotions_get') ?>/" + id,
            type: "GET",
            dataType: "json",
        }).done(function(res) {
            let promoData = JSON.parse(res).data[0];
            let condition = JSON.parse(res).condition;
            set_min_deposit(promoData.min_deposit);
            set_max_deposit(promoData.max_deposit);
            set_max_bonus(promoData.max_bonus);
            set_promotion_category(promoData.category_id)
            set_bonus_type(promoData.bonus_type);
            set_isLimitTime(promoData.isNoLimitTime);
            if (promoData.isNoLimitTime === 1) {
                set_init_promotion(promoData.start_promotion)
                set_end_promotion(promoData.end_promotion)
                set_toggle_no_limit_time(1)
            } else {
                set_init_promotion('')
                set_end_promotion('')
                set_toggle_no_limit_time(0)
            }
            set_amount_accept_per_day(promoData.max_accepte_promotion);
            set_max_withdraw(promoData.max_withdraw);
            set_turnover_casino(promoData.turnover_casino)
            set_turnover_esport(promoData.turnover_esport)
            set_turnover_football(promoData.turnover_football)
            set_turnover_game(promoData.turnover_game)
            set_turnover_keno(promoData.turnover_keno)
            set_turnover_lotto(promoData.turnover_lotto)
            set_turnover_m2(promoData.turnover_m2)
            set_turnover_multiPlayer(promoData.turnover_multi_player)
            set_turnover_parlay(promoData.turnover_parlay)
            set_turnover_poker(promoData.turnover_poker)
            set_turnover_step(promoData.turnover_step)
            set_turnover_trading(promoData.turnover_trading)
            set_explain_condition(promoData.condition);
            set_image("<?php echo base_url(); ?>/assets/uploads/" + promoData.promotion_img);
            set_promotion_name(promoData.promotion_name)
            set_value_status(promoData.status)
            set_continuous_deposit(promoData.continuousDepositAmount)
            set_start_time_promotion(promoData.start_time)
            set_end_time_promotion(promoData.end_time)
            set_deposit_only_on_the_day(promoData.depositOnlyOnTheDay);

            if (condition != undefined || condition != null && promoData.bonus_type == 0) {
                set_condition_promotion(condition);
            }
            toggle_condition(promoData.bonus_type);
            toggle_promotion_category();
        })
    }

    async function open_modal_edit(id) {
        isEdit = true;
        promoId = id;
        buffer_condition = [];
        order_condition = 0;
        set_condition_be_null();
        set_alert_warning_turnover(false)

        let promotionData = await fetchData_and_setterData(id);
        $("#addPromotion").modal('show');
    }



    function addCondition() {
        document.getElementById('AreaCondition').insertAdjacentHTML(`beforeend`,
            `<div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-2"><label for="field-1" class="form-label">ต่ำสุด</label><input  type="number" onchange='setBufferCondition(this)' id="minDeposit-${order_condition}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-2">
                        <label for="field-1" class="form-label">สูงสุด</label>
                        <input type="number" id="maxDeposit-${order_condition}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-2">
                        <label for="field-1" class="form-label">โบนัส</label>
                        <input type="number" id="getBonus-${order_condition}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-2">
                        <label for="field-1" class="form-label text-white"></label>
                        <br>
                        <button class="btn btn-danger waves-effect waves-light" id="rmvbtn" onclick="set_remove_condition(${order_condition})">
                            <i class="mdi mdi-delete"></i>
                            ลบ
                        </button>
                    </div>
                </div>
            </div>`)
        buffer_condition.push(order_condition);
        order_condition += 1;
    }

    function set_condition_be_null() {
        document.getElementById('AreaCondition').innerHTML = "";
    }

    async function check_data_input_of_promotion_category(category_id, isNoLimitTime, bonusType) {
        if (category_id == 1) {
            if (isEmpty_promotion_name()) return false //terminate
            if (isEmpty_max_bonus()) return false //terminate
            if (isEmpty_min_deposit()) return false //terminate
            if (isEmpty_max_deposit()) return false //terminate
            if (isMinDepositMoreMaxDeposit()) return false //terminate
            if (isEmpty_amount_accept_per_day()) return false //terminate
            if (isEmpty_max_withdraw()) return false //terminate
        } else if (category_id == 2) {
            if (isEmpty_promotion_name()) return false //terminate
            if (isEmpty_max_bonus()) return false //terminate
            if (isEmpty_min_deposit()) return false //terminate
            if (isMinDepositMoreMaxDeposit()) return false //terminate
            if (isEmpty_max_deposit()) return false //terminate
            if (isEmpty_max_withdraw()) return false //terminate
        } else if (category_id == 3) {
            if (isEmpty_promotion_name()) return false //terminate
            if (isEmpty_max_bonus()) return false //terminate
            if (isEmpty_min_deposit()) return false //terminate
            if (isMinDepositMoreMaxDeposit()) return false //terminate
            if (isEmpty_max_deposit()) return false //terminate
            if (isEmpty_max_withdraw()) return false //terminate
        } else if (category_id == 4) {
            if (isEmpty_promotion_name()) return false //terminate
            if (isEmpty_max_bonus()) return false //terminate
            if (isEmpty_min_deposit()) return false //terminate
            if (isEmpty_max_deposit()) return false //terminate
            if (isMinDepositMoreMaxDeposit()) return false //terminate
            if (isEmpty_amount_accept_per_day()) return false //terminate
            if (isEmpty_max_withdraw()) return false //terminate
            if (isEmpty_start_time()) return false //terminate
            if (isEmpty_end_time()) return false //terminate
        } else if (category_id == 6) {
            if (isEmpty_promotion_name()) return false //terminate
            if (isEmpty_max_bonus()) return false //terminate
            if (isEmpty_min_deposit()) return false //terminate
            if (isEmpty_max_deposit()) return false //terminate
            if (isMinDepositMoreMaxDeposit()) return false //terminate
            if (isEmpty_amount_accept_per_day()) return false //terminate
            if (isEmpty_max_withdraw()) return false //terminate
        } else if (category_id == 7) {
            if (isEmpty_promotion_name()) return false //terminate
            if (isEmpty_max_bonus()) return false //terminate
            if (isEmpty_min_deposit()) return false //terminate
            if (isEmpty_max_withdraw()) return false //terminate
            if (isEmpty_continuous_deposit()) return false //terminate

        }

        if (isNoLimitTime) {
            if (isEmpty_init_promotion()) return false //terminate
            if (isEmpty_end_promotion()) return false //terminate
            if (isInit_date_more_end_date()) return false //terminate
        }

        if (bonusType == 0) {
            if ((await check_condition_data_input()) !== true) return false
        }
        return true
    }

    async function check_condition_data_input(msg) {
        const len_buffer = buffer_condition.length;
        const minDeposit = get_min_deposit();
        const maxDeposit = get_max_deposit();
        const maxBonus = get_max_bonus();
        let isNotPass = false;
        if (len_buffer === 0) {
            let isNext = await dialogbox_condition('คุณต้องการที่จะไม่เพิ่มเงือนไข ใช่หรือไม่ !! ถ้าไม่ระบบจะคิดโบนัสจากจำนวนโบนัสสูงสุด');
            if (isNext === true)
                return true
            else
                return false
        } else {
            buffer_condition.forEach((index, i) => {
                let getMinDeposit = parseInt(document.getElementById('minDeposit-' + buffer_condition[index]).value);
                let getMaxDeposit = parseInt(document.getElementById('maxDeposit-' + buffer_condition[index]).value);
                let getBonus = parseInt(document.getElementById('getBonus-' + buffer_condition[index]).value);

                if (getMinDeposit == '' || getMaxDeposit == '' || getBonus == '') {
                    dialogbox_warning('เงือนไข ห้ามว่าง !!')
                    isNotPass = true
                    return false;
                }
                if (i == 0) {
                    if (getMinDeposit != minDeposit) {
                        dialogbox_warning('เงือนไขช่องแรกค่าต่ำสุด ต้องเท่ากับจำนวนฝากขั้นต่ำเท่านั้น !!')
                        isNotPass = true
                        return false
                    }
                }

                if (i == (len_buffer - 1)) {
                    if (getMaxDeposit != maxDeposit) {
                        dialogbox_warning('เงือนไขช่องสุดท้ายค่าสูงสุด ต้องเท่ากับจำนวนฝากสูงสุดเท่านั้น !!')
                        isNotPass = true
                        return false;
                    }
                    if (getBonus != maxBonus) {
                        dialogbox_warning('เงือนไขช่องสุดท้าย โบนัส ต้องเท่ากับโบนัสสูงสุด !!')
                        isNotPass = true
                        return false
                    }
                }
                if (getMinDeposit > getMaxDeposit) {
                    dialogbox_warning('เงือนไข ต่ำสุดห้ามมากกว่า สูงสุด !!')
                    isNotPass = true
                    return false;
                }

                try {
                    let getDecreaseMinDeposit = parseInt(document.getElementById('minDeposit-' + buffer_condition[index - 1]).value);
                    let getDecreaseMaxDeposit = parseInt(document.getElementById('maxDeposit-' + buffer_condition[index - 1]).value);
                    let getDecreaseMaxBonus = parseInt(document.getElementById('getBonus-' + buffer_condition[index - 1]).value);

                    if (getMinDeposit <= getDecreaseMinDeposit) {
                        dialogbox_warning(`เงือนไข ช่องที่ ${i + 1} ค่าต่ำสุดต้องมากกว่า ช่องที่ ${i} !!`)
                        isNotPass = true
                        return false;
                    }
                    if (getMinDeposit <= getDecreaseMaxDeposit) {
                        dialogbox_warning(`เงือนไข ช่องที่ ${i + 1} ค่าต่ำสุดต้องมากกว่า ค่าสูงสุด ช่องที่ ${i} !!`)
                        isNotPass = true
                        return false;
                    }
                    if (getMaxDeposit <= getDecreaseMaxDeposit) {
                        dialogbox_warning(`เงือนไข ช่องที่ ${i + 1} ค่าสูงสุดต้องมากกว่า ช่องที่ ${i} !!`)
                        isNotPass = true
                        return false;
                    }
                    if (getBonus < getDecreaseMaxBonus) {
                        console.log(getBonus);
                        console.log(getDecreaseMaxBonus);

                        dialogbox_warning(`เงือนไข ช่องที่ ${i + 1} โบนัสต้องมากกว่า ช่องที่ ${i} !!`)
                        isNotPass = true
                        return false;
                    }
                } catch (err) {
                    // is row one 
                }
            })
        }
        if (isNotPass)
            return fasle
        return true;
    }

    function dialogbox_warning(msg) {
        Swal.fire({
            icon: "warning",
            title: msg,
            showConfirmButton: false,
        });
    }

    function dialogbox_error(msg) {
        Swal.fire({
            icon: "error",
            title: msg,
            showConfirmButton: false,
        });
    }

    function dialogbox_success(msg) {
        Swal.fire({
            icon: "success",
            title: msg,
            showConfirmButton: false,
        });
    }

    async function dialogbox_condition(msg) {
        try {
            let dialog = await Swal.fire({
                title: msg,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่',
                cancelButtonText: 'ยกเลิก'
            });
            if (dialog.isConfirmed) {
                return true

            }
            return false
        } catch (err) {
            return false
        }
    }


    function get_value_from() {
        let bonusType = get_bonus_type();
        let category_id = get_promotion_category();
        let formData = $('#form_promo')[0];
        formData = new FormData(formData);
        let value_condition = get_values_condition_by_array();
        formData.append('promoCondition', JSON.stringify(value_condition));
        let depositOnlyOnTheDay = JSON.stringify(getDepositOnlyOnTheDay());
        formData.append('depositOnlyOnTheDay', depositOnlyOnTheDay);
        formData.append('isNoLimitTime', get_value_isNolimitTime());
        formData.append('promoStatus', get_value_status());
        formData.append('promoid', promoId);
        formData.append('promoExplainCondition', get_explain_condition());

        return formData;
    }


    function get_value_isNolimitTime() {
        let isNolimitTime = document.getElementById('myCheck').checked;
        if (isNolimitTime) {
            return 1
        }
        return 0
    }

    function get_value_status() {
        var status = document.getElementById("myCheck2").checked;
        if (status == true) {
            return 1
        } else if (status == false) {
            return 0
        }
    }

    function set_value_status(value) {
        if (value == 1) {
            document.getElementById("myCheck2").checked = true;
        } else if (status == false) {
            document.getElementById("myCheck2").checked = false;
        }
    }

    function set_continuous_deposit(value) {
        document.getElementById("continuousDeposit").value = value;
    }

    function set_start_time_promotion(value) {
        document.getElementById("startTime").value = value;
    }

    function set_end_time_promotion(value) {
        document.getElementById("endTime").value = value;
    }

    function set_deposit_only_on_the_day(value) {
        if (value.monday) document.getElementById('monday').checked = true
        if (value.tuesday) document.getElementById('tuesday').checked = true
        if (value.wednesday) document.getElementById('wednesday').checked = true
        if (value.thursday) document.getElementById('thursday').checked = true
        if (value.friday) document.getElementById('friday').checked = true
        if (value.saturday) document.getElementById('saturday').checked = true
        if (value.sunday) document.getElementById('sunday').checked = true
    }


    function set_condition_promotion(value) {
        try {
            for (let i = 0; i < value.length; i++) {
                let max = value[i].max_deposit;
                let min = value[i].min_deposit;
                let bonus = value[i].getBonus
                state = order_condition;
                document.getElementById('AreaCondition').insertAdjacentHTML(
                    'beforeend', '<div><div class="row"><div class="col-lg-3"><div class="mb-2"><label for="field-1" class="form-label">ต่ำสุด</label><input  type="number"  id="minDeposit-' + state + '" value=' + min + ' class="form-control" placeholder=""></div></div><div class="col-lg-3"><div class="mb-2"><label for="field-1" class="form-label">สูงสุด</label><input type="number" id="maxDeposit-' + state + '"  value=' + max + ' class="form-control" placeholder=""></div></div><div class="col-lg-3"><div class="mb-2"><label for="field-1" class="form-label">โบนัส</label><input type="number" id="getBonus-' + state + '" value=' + bonus + ' class="form-control" placeholder=""></div></div><div class="col-lg-3"><div class="mb-2"><label for="field-1" class="form-label text-white"></label><br><button class="btn btn-danger waves-effect waves-light" id="rmvbtn" onclick="set_remove_condition(' + state + ')"><i class="mdi mdi-delete"></i>ลบ</button></div></div></div></div>')
                buffer_condition.push(state);
                order_condition += 1;
            }
        } catch (err) {
            console.log(err);
        }

    }

    function get_value_continus() {
        var status = document.getElementById("myCheck2").checked;
        if (status == true) {
            return 1
        } else if (status == false) {
            return 0
        }
    }


    async function is_more_one_esport_football_and_setter_all_games() {
        let esport_turnover = document.getElementById("turnoverEsport").value;
        let football_turnover = document.getElementById("turnoverFootball").value;
        if (esport_turnover > 1) {
            set_turnover_all_games(esport_turnover);
            return true
        } else if (football_turnover > 1) {
            set_turnover_all_games(football_turnover);
            return true
        }
        return false;
    }

    async function controller_to_save() {
        is_more_one_esport_football_and_setter_all_games();
        let category_id = get_promotion_category();
        let isLimitTime = get_isLimitTime();
        let bonusType = get_bonus_type();
        let result_check_data_input = await check_data_input_of_promotion_category(category_id, isLimitTime, bonusType);
        if (!result_check_data_input) {
            return false // Terminate
        }
        let formData = get_value_from();
        if (isEdit) {
            return update(formData);
        }
        return save(formData);
    }


    function update(formData) {
        $.ajax({
                url: '<?php echo base_url('promotion/promotions_id') ?>',
                type: "POST",
                data: formData,
                dataType: "JSON",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
            })
            .done(function(re) {
                const res = JSON.parse(re);
                if (res.code == 1) {
                    dialogbox_success(res.msg);
                    window.setTimeout(function() {
                        location.reload()
                    }, 500)
                } else {
                    dialogbox_error(res.msg);
                }
            })
            .fail(function(err) {
                console.log(err);
                dialogbox_error('เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่');
            });
    }

    function save(formData) {
        $.ajax({
                url: '<?php echo base_url('promotion/promotions') ?>',
                type: "POST",
                data: formData,
                dataType: "JSON",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
            })
            .done(function(re) {
                const res = JSON.parse(re);
                if (res.code == 1) {
                    dialogbox_success(res.msg);
                    window.setTimeout(function() {
                        location.reload()
                    }, 500)
                } else {
                    dialogbox_error(res.msg);
                }
            })
            .fail(function(err) {
                dialogbox_error('เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่');
            });
    }



    function get_isLimitTime() {
        if (document.getElementById('myCheck').checked) return true;
        return false
    }

    function set_isLimitTime(value) {
        document.getElementById('myCheck').checked = value
    }


    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }

    function set_init_promotion(value) {
        let formated = value != null && value != 'null' && value != '' ?
            formatDate(value) : null;
        document.getElementById('startDate').value = formated
    }

    function set_end_promotion(value) {
        let formated = value != null && value != 'null' && value != '' ?
            formatDate(value) : null;
        document.getElementById('endDate').value = formated
    }

    function get_min_deposit() {
        return document.getElementById('minDeposit').value
    }

    function set_min_deposit(value) {
        document.getElementById('minDeposit').value = value
    }

    function get_max_deposit() {
        return document.getElementById('maxDeposit').value
    }

    function set_max_deposit(value) {
        document.getElementById('maxDeposit').value = value
    }

    function get_max_bonus() {
        return document.getElementById('maxBonus').value
    }

    function set_max_bonus(value) {
        document.getElementById('maxBonus').value = value
    }

    function get_promotion_category() {
        return document.getElementById('promoCategory').value
    }

    function set_promotion_category(value) {
        document.getElementById('promoCategory').value = value
    }

    function set_amount_accept_per_day(value) {
        document.getElementById('amountAcceptPerDay').value = value
    }

    function set_max_withdraw(value) {
        document.getElementById('maxWithdraw').value = value
    }

    function set_turnover_game(value) {
        document.getElementById('turnoverGame').value = value
    }

    function set_turnover_trading(value) {
        document.getElementById('turnoverTrading').value = value
    }

    function set_turnover_parlay(value) {
        document.getElementById('turnoverParlay').value = value
    }

    function set_turnover_step(value) {
        document.getElementById('turnoverStep').value = value
    }

    function set_turnover_casino(value) {
        document.getElementById('turnoverCasino').value = value
    }

    function set_turnover_lotto(value) {
        document.getElementById('turnoverLotto').value = value
    }

    function set_turnover_m2(value) {
        document.getElementById('turnoverM2').value = value
    }

    function set_turnover_multiPlayer(value) {
        document.getElementById('turnoverMultiPlayer').value = value
    }

    function set_turnover_keno(value) {
        document.getElementById('turnoverKeno').value = value
    }

    function set_turnover_poker(value) {
        document.getElementById('turnoverPoker').value = value
    }

    function set_turnover_esport(value) {
        document.getElementById('turnoverEsport').value = value
    }

    function set_turnover_football(value) {
        document.getElementById('turnoverFootball').value = value
    }

    function set_explain_condition(value) {
        YourEditor.setData(value)
        // document.getElementById('promoExplainCondition').value = value
    }

    function set_image(value) {
        var drEvent = $('#image').dropify({
            efaultFile: value
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = value;
        drEvent.destroy();
        drEvent.init();
    }

    function set_status(value) {
        document.getElementById('myCheck2').value = value
    }

    function set_promotion_name(value) {
        document.getElementById('promoName').value = value
    }



    function get_bonus_type() {
        return document.getElementById('bonusType').value
    }

    function set_bonus_type(value) {
        document.getElementById('bonusType').value = value
    }


    function getDepositOnlyOnTheDay() {
        let json = {
            monday: false,
            tuesday: false,
            wednesday: false,
            thursday: false,
            friday: false,
            saturday: false,
            sunday: false,
        };
        if (document.getElementById('monday').checked === true) json.monday = true;
        if (document.getElementById('tuesday').checked === true) json.tuesday = true;
        if (document.getElementById('wednesday').checked === true) json.wednesday = true;
        if (document.getElementById('thursday').checked === true) json.thursday = true;
        if (document.getElementById('friday').checked === true) json.friday = true;
        if (document.getElementById('saturday').checked === true) json.saturday = true;
        if (document.getElementById('sunday').checked === true) json.sunday = true;

        return json;
    }

    function get_values_condition_by_array() {
        let list = Array();
        buffer_condition.forEach(index => {
            getMin = document.getElementById(`minDeposit-${index}`).value
            getMax = document.getElementById(`maxDeposit-${index}`).value
            getBonus = document.getElementById(`getBonus-${index}`).value
            list.push(
                [getMin, getMax, getBonus]
            );
        })
        return list;
    }

    function get_explain_condition() {
        return YourEditor.getData();
    }


    function set_remove_condition(n) {
        let index = buffer_condition.indexOf(n);
        let childNodes = document.getElementById("AreaCondition").childNodes;
        console.log(childNodes.length);
        console.log(index);
        buffer_condition.splice(index, 1);
        childNodes[index].remove();
    }

    function toggle_condition(value) {
        if (value == 0) {
            document.getElementById('Area').style.display = 'block';
        } else if (value == 1) {
            document.getElementById('Area').style.display = 'none';
        }
    }



    function toggle_no_limit_time() {
        var isNolimitTime = document.getElementById("myCheck").checked;
        if (isNolimitTime == true) {
            document.getElementById("startDate").disabled = false;
            document.getElementById("endDate").disabled = false;
            var startDate = document.getElementById("startDate");
            var endDate = document.getElementById("endDate");
            startDate.classList.remove("bg-light");
            endDate.classList.remove("bg-light");
        } else {
            document.getElementById("startDate").disabled = true;
            document.getElementById("endDate").disabled = true;
            document.getElementById("startDate").className += "basic-datepicker form-control bg-light";
            document.getElementById("endDate").className += "basic-datepicker form-control bg-light";
        }
    }

    function set_toggle_no_limit_time(value) {
        var isNolimitTime = document.getElementById("myCheck").checked;
        if (value === 1) {
            document.getElementById("startDate").disabled = false;
            document.getElementById("endDate").disabled = false;
            var startDate = document.getElementById("startDate");
            var endDate = document.getElementById("endDate");
            startDate.classList.remove("bg-light");
            endDate.classList.remove("bg-light");
        } else {
            document.getElementById("startDate").disabled = true;
            document.getElementById("endDate").disabled = true;
            document.getElementById("startDate").className += "basic-datepicker form-control bg-light";
            document.getElementById("endDate").className += "basic-datepicker form-control bg-light";
        }
    }


    async function toggle_promotion_category() {
        promoCategoryId = document.getElementById("promoCategory").value;
        if (promoCategoryId == 1)
            oepn_form_deposit_all_day()
        else if (promoCategoryId == 2)
            oepn_form_new_member()
        else if (promoCategoryId == 3)
            oepn_form_first_deposit_day()
        else if (promoCategoryId == 4)
            oepn_form_golden_minute()
        else if (promoCategoryId == 6) {
            oepn_form_deposit_only_on_the_day()
        } else if (promoCategoryId == 7)
            oepn_form_continuous_deposit()
    }

    async function set_toggle_promotion_category(value) {
        if (value == 1)
            oepn_form_deposit_all_day()
        else if (value == 2)
            oepn_form_new_member()
        else if (value == 3)
            oepn_form_first_deposit_day()
        else if (value == 4)
            oepn_form_golden_minute()
        else if (value == 6)
            oepn_form_deposit_only_on_the_day()
        else if (value == 7)
            oepn_form_continuous_deposit()
    }

    function oepn_form_deposit_all_day() {
        document.getElementById('col-amountAcceptPerDay').style.display = '';
        document.getElementById('Time').style.display = 'none';
        document.getElementById('col-minDeposit').style.display = 'block';
        document.getElementById('col-maxDeposit').style.display = 'block';
        document.getElementById('bonusType').style.display = '';
        document.getElementById('depositOnlyOnTheDay').style.display = 'none';
        document.getElementById('col-continuousDeposit').style.display = 'none';
        toggle_condition(document.getElementById('bonusType').value);
        set_disabled_bonus_type(false);
    }

    function oepn_form_new_member() {
        document.getElementById('col-amountAcceptPerDay').style.display = 'none';
        document.getElementById('Time').style.display = 'none';
        document.getElementById('col-minDeposit').style.display = 'block';
        document.getElementById('col-maxDeposit').style.display = 'block';
        document.getElementById('bonusType').style.display = '';
        document.getElementById('depositOnlyOnTheDay').style.display = 'none';
        document.getElementById('col-continuousDeposit').style.display = 'none';
        toggle_condition(document.getElementById('bonusType').value);
        set_disabled_bonus_type(false);
    }

    function oepn_form_first_deposit_day() {
        document.getElementById('col-amountAcceptPerDay').style.display = 'none';
        document.getElementById('Time').style.display = 'none';
        document.getElementById('col-minDeposit').style.display = 'block';
        document.getElementById('col-maxDeposit').style.display = 'block';
        document.getElementById('bonusType').style.display = '';
        document.getElementById('depositOnlyOnTheDay').style.display = 'none';
        document.getElementById('col-continuousDeposit').style.display = 'none';
        toggle_condition(document.getElementById('bonusType').value);
        set_disabled_bonus_type(false);
    }

    function oepn_form_golden_minute() {
        document.getElementById('col-amountAcceptPerDay').style.display = '';
        document.getElementById('Time').style.display = '';
        document.getElementById('col-minDeposit').style.display = 'block';
        document.getElementById('col-maxDeposit').style.display = 'block';
        document.getElementById('bonusType').style.display = '';
        document.getElementById('depositOnlyOnTheDay').style.display = 'none';
        document.getElementById('col-continuousDeposit').style.display = 'none';
        toggle_condition(document.getElementById('bonusType').value);
        set_disabled_bonus_type(false);
    }

    function oepn_form_deposit_only_on_the_day() {
        document.getElementById('col-amountAcceptPerDay').style.display = '';
        document.getElementById('Time').style.display = 'none';
        document.getElementById('col-minDeposit').style.display = 'block';
        document.getElementById('col-maxDeposit').style.display = 'block';
        document.getElementById('bonusType').style.display = '';
        document.getElementById('depositOnlyOnTheDay').style.display = 'block';
        document.getElementById('col-continuousDeposit').style.display = 'none';
        toggle_condition(document.getElementById('bonusType').value);
        set_disabled_bonus_type(false);

    }

    function oepn_form_continuous_deposit() {
        document.getElementById('col-amountAcceptPerDay').style.display = 'none';
        document.getElementById('Time').style.display = 'none';
        document.getElementById('col-minDeposit').style.display = '';
        document.getElementById('col-maxDeposit').style.display = 'none';
        document.getElementById('bonusType').style.display = '';
        document.getElementById('depositOnlyOnTheDay').style.display = 'none';
        document.getElementById('col-continuousDeposit').style.display = 'block';
        set_bonus_type(0);
        toggle_condition(1);
        set_disabled_bonus_type(true);
    }



    function set_disabled_bonus_type(isTure) {
        if (isTure === true) {
            document.getElementById('bonusType').disabled = true;
        } else {
            document.getElementById('bonusType').disabled = false;
        }
    }

    function isEmpty_promotion_name() {
        let promoName = document.getElementById('promoName').value;
        if (promoName == '') {
            dialogbox_warning('ชื่อผู้ใช้ห้ามว่าง !!')
            return true
        }
        return false
    }

    function isEmpty_max_bonus() {
        let maxBonus = document.getElementById('maxBonus').value;
        if (maxBonus == '' || maxBonus <= 0) {
            dialogbox_warning('จำนวนโบนัสสูงสุดห้ามน้อยกว่า 0 !!')
            return true
        }
        return false
    }

    function isEmpty_min_deposit() {
        let minDeposit = document.getElementById('minDeposit').value;
        if (minDeposit == '' || minDeposit <= 0) {
            dialogbox_warning('จำนวนฝากขั้นต่ำ ห้ามน้อยกว่า 0 !!')
            return true
        }
        return false
    }

    function isEmpty_max_deposit() {
        let maxDeposit = document.getElementById('maxDeposit').value;
        if (maxDeposit == '' || maxDeposit <= 0) {
            dialogbox_warning('จำนวนฝากสูงสุด ห้ามน้อยกว่า 0 !!')
            return true
        }
        return false
    }

    function isMinDepositMoreMaxDeposit() {
        let minDeposit = document.getElementById('minDeposit').value;
        let maxDeposit = document.getElementById('maxDeposit').value;
        if (parseInt(minDeposit) > parseInt(maxDeposit)) {
            dialogbox_warning('จำนวนฝากขั่นต่ำ มีค่ามากกว่า ฝากสูงสุด !!')
            return true
        }
        return false
    }


    function isEmpty_init_promotion() {
        let startDate = document.getElementById('startDate').value;
        if (startDate == '' || startDate == null) {
            dialogbox_warning('วันที่เริ่มต้นโปรโมชั่น ห้ามว่าง !!')
            return true
        }
        return false
    }

    function isEmpty_end_promotion() {
        let endDate = document.getElementById('endDate').value;
        if (endDate == '' || endDate == null) {
            dialogbox_warning('วันที่สิ้นสุดโปรโมชั่น ห้ามว่าง !!')
            return true
        }
        return false
    }

    function isEmpty_max_withdraw() {
        let maxWithdraw = document.getElementById('maxWithdraw').value;
        if (maxWithdraw == '' || maxWithdraw <= 0) {
            dialogbox_warning('จำนวนถอนสูงสุด ห้ามว่าง !!')
            return true
        }
        return false
    }

    function isInit_date_more_end_date() {
        let startDate = document.getElementById('startDate').value;
        let endDate = document.getElementById('endDate').value;
        let isInitDateMoreEndDate = new Date(startDate).getTime() > new Date(endDate).getTime();
        if (isInitDateMoreEndDate) {
            dialogbox_warning('วันที่เริ่มต้นห้ามน้อยกว่า วันที่สิ้นสุดโปรโมชั่น !!')
            return true
        }
        return false
    }


    function isEmpty_amount_accept_per_day() {
        let amountAcceptPerDay = document.getElementById('amountAcceptPerDay').value;
        if (amountAcceptPerDay == '' || amountAcceptPerDay <= 0) {
            dialogbox_warning('จำนวนการรับ โปรโมชั่นต่อวัน ห้ามว่าง !!')
            return true
        }
        return false
    }


    function isEmpty_continuous_deposit() {
        let continuousDeposit = document.getElementById('continuousDeposit').value;
        if (continuousDeposit == '' || continuousDeposit <= 0) {
            dialogbox_warning('จำนวนวันฝากติดต่อ ห้ามว่าง !!')
            return true
        }
        return false
    }


    function isEmpty_start_time() {
        let startTime = document.getElementById('startTime').value;
        if (startTime == '' || startTime == null) {
            dialogbox_warning('เวลาเริ่มต้น นาทีทอง ห้ามว่าง !!')
            return true
        }
        return false
    }

    function isEmpty_end_time() {
        let endTime = document.getElementById('endTime').value;
        if (endTime == '' || endTime == null) {
            dialogbox_warning('เวลาสิ้นสุด นาทีทอง ห้ามว่าง !!')
            return true
        }
        return false
    }


    function set_default_promotion_name() {
        document.getElementById('promoName').value = '';
    }

    function set_default_promotion_category() {
        document.getElementById('promoCategory').value = 1;
    }

    function set_default_bonus_type() {
        document.getElementById('bonusType').value = 0;
    }

    function set_default_min_deposit() {
        document.getElementById('minDeposit').value = 0;
    }

    function set_default_max_deposit() {
        document.getElementById('maxDeposit').value = 0;
    }

    function set_default_max_bonus() {
        document.getElementById('maxBonus').value = 0;
    }

    function set_default_isNolimitTime() {
        document.getElementById('myCheck').checked = false;
    }

    function set_default_init_promotion() {
        document.getElementById('startDate').value = null;
    }

    function set_default_end_promotion() {
        document.getElementById('endDate').value = null;
    }

    function set_default_max_withdraw() {
        document.getElementById('maxWithdraw').value = 1;
    }

    function set_default_amount_accept_per_day() {
        document.getElementById('amountAcceptPerDay').value = 1;
    }

    function set_default_start_time() {
        document.getElementById('startTime').value = null;
    }

    function set_default_end_time() {
        document.getElementById('endTime').value = null;
    }

    function set_default_end_time() {
        document.getElementById('endTime').value = null;
    }

    function set_default_continuous_deposit() {
        document.getElementById('continuousDeposit').value = 1;
    }

    function set_default_deposit_only_on_the_day() {
        document.getElementById('monday').checked = false
        document.getElementById('tuesday').checked = false
        document.getElementById('wednesday').checked = false
        document.getElementById('thursday').checked = false
        document.getElementById('friday').checked = false
        document.getElementById('saturday').checked = false
        document.getElementById('sunday').checked = false
    }

    function set_default_turnover_game() {
        document.getElementById('turnoverGame').value = 1;
    }

    function set_default_turnover_trading() {
        document.getElementById('turnoverTrading').value = 1;
    }

    function set_default_turnover_parlay() {
        document.getElementById('turnoverParlay').value = 1;
    }

    function set_default_turnover_step() {
        document.getElementById('turnoverStep').value = 1;
    }

    function set_default_turnover_casino() {
        document.getElementById('turnoverCasino').value = 1;
    }

    function set_default_turnover_lotto() {
        document.getElementById('turnoverLotto').value = 1;
    }

    function set_default_turnover_m2() {
        document.getElementById('turnoverM2').value = 1;
    }

    function set_default_turnover_multiplayer() {
        document.getElementById('turnoverMultiPlayer').value = 1;
    }

    function set_default_turnover_keno() {
        document.getElementById('turnoverKeno').value = 1;
    }

    function set_default_turnover_poker() {
        document.getElementById('turnoverPoker').value = 1;
    }

    function set_default_turnover_esport() {
        document.getElementById('turnoverEsport').value = 1;
    }

    function set_default_turnover_football() {
        document.getElementById('turnoverFootball').value = 1;
    }

    function set_default_explain_condition() {
        YourEditor.setData('')
        // document.getElementById('promoExplainCondition').value = null;
    }

    function set_default_status() {
        document.getElementById('myCheck2').checked = false;
    }

    function set_default_image() {
        var drEvent = $('#image').dropify({
            efaultFile: null
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = null;
        drEvent.destroy();
        drEvent.init();
    }
</script>

<?php $this->endSection(); ?>