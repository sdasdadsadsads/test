<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $this->extend('template/head_admin');?>

<?php $this->section('content');?>
<style>
    table tr {
        text-align: center;
        font-size: 12px;
        vertical-align: middle;
    }
    .withdraw_loader {
    border: 5px solid #f3f3f3; /* Light grey */
    border-top: 5px solid #FFFFFF; /* Blue */
    border-radius: 50%;
    margin-left: auto;
    margin-right: auto;
    width: 35px;
    height: 35px;
    animation: spin 1s linear infinite;
}
@keyframes spin {
0% {
transform: rotate(0deg);
}
100% {
transform: rotate(360deg);
}
}
.btn-secondary1 {
    color: #000;
    background-color: #d8dcdf;
    border-color: #cfdde9;
}

</style>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">รายงานการถอนเงิน</h4>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs nav-bordered">
                <li class="nav-item">
                    <a href="" id="withdraw_total" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        ทั้งหมด
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" id="pending_confirmation" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        รอโอน
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" id="transfer_queue"  data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        คิวโอน
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" id="lists_error" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        ปัญหา
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" id="lists_cancel" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        ยกเลิก
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="" onclick="yesterday()" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        คิวออโต้
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" onclick="yesterday()" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        ถอนอัตโนมัติ
                    </a>
                </li> -->
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="table2">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach ($bankweb as $key => $value) {?>
                                            <div class="col-12 col-md-6 col-lg-2 mr-2 pr-2">
                                            <div class="card border-primary border-2 mb-3">
                                                <div class="card-body text-center py-2" style="border-bottom: 10px solid #ffd700;">
                                                <img src="<?php echo base_url() ?>/assets/images/Bank_show/<?=$value['bank_short']?>.png"  alt="user-image" class="me-1 mt-1" height="30">
                                                    <p class="m-0 p-0 mt-2">ชื่อบัญชี <span class="text-danger"><?=$value['name']?></span></p>
                                                    <p class="m-0 p-0">เลขที่บัญชี <span class="text-danger"><?=$value['account']?></span></p>
                                                    <p class="m-0 p-0">ยอดเงินคงเหลือ <span class="text-danger"><?=number_format($value['balance'], 2)?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>

                                    <div class="row">
                                        <div class="card-body">
                                            <h4 id="sum" class="mt-0 text-uppercase text-dark bg-light border p-2">

                                            </h4>
                                        </div>
                                    </div>
                                    <table class="table w-100 nowrap" id="tableTotal">
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th id="num">ลำดับ</th>
                                                <!-- <th >รหัสถอน</th> -->
                                                <th>ธนาคาร</th>
                                                <th>Username</th>
                                                <th>ยอดเงินถอน</th>
                                                <th>ผู้ตรวจสอบ</th>
                                                <th>ผู้โอน</th>
                                                <th>วันที่เข้าระบบ</th>
                                                <th>วันที่ยืนยัน</th>
                                                <th>หมายเหตุ</th>
                                                <th>สถานะ</th>
                                                <th>Action</th>
                                                <!-- <th>ถอนมือ</th> -->
                                                <!-- <th>เปลี่ยนสถานะ</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($withdraw)) {
                                              $i = 1;foreach ($withdraw as $key => $value) { ?>
                                              
                                             <tr>
                                                 <td class="bg-dangerlight2"><?=$i?></td>
                                                 <!-- <td ><?=$value['id'];?></td> -->
                                                 <td class="p-0 m-0"> <img src="<?php echo base_url() ?>/assets/images/Bank_show/<?=$value['user_bank_short']?>.png"  alt="user-image" class="me-1 mt-1" height="30"> <br> <p class="mt-2 text-blue"><?=$value['account']?></p></td>
                                                 <td><?=$value['user_username']?></td>
                                                 <td class="bg-success text-white"><?=$value['amount']?></td>
                                                 <td class="p-2 text-right" id="admin_check_name_<?=$value['id']?>" ><?=$value['admin_check_name'] == 1 ? 'Auto' : $value['admin_check_name']?></td>
                                                 <td class="p-2 text-right" id="admin_cf_name_<?=$value['id']?>"><?=$value['admin_cf_name'] == 1 ? 'Auto' : $value['admin_cf_name']?></td>
                                                 <td class="p-2 text-center"><?=date('d/m/y H:i:s ', $value['time'])?></td>
                                                 <td><?=$value['admin_cfTime'] == 0 ? '' : date('d/m/y H:i:s ', $value['admin_cfTime'])?></td>
                                                 <td><?=$value['cause']?></td>
                                                 <?php if ($value['status'] == 1) {
                                                            echo '<td><h4 id="waitauto1'.$value['id'].'"> <span class = "badge bg-warning text-white mdi mdi-clock"> wait </span></h4><h4 id="showresult1'.$value['id'].'"></h4></td>';
                                                        } else if ($value['status'] == 2) {
                                                            echo '<td><h4> <span class = "badge bg-success text-white mdi mdi-checkbox-marked-circle"> success </span></h4></td>';
                                                        } else if ($value['status'] == 3) {
                                                            echo '<td><h4> <span class = "badge bg-danger  text-white mdi mdi-close-circle" > cancel </span></h4></td>';
                                                        } else if ($value['status'] == -3) {
                                                            echo '<td><h4><span class = "badge bg-danger text-white mdi mdi-delete"> Delete </span></h4></td>';
                                                        } else if ($value['status'] == 4) {
                                                            echo '<td><h4> <span class = "badge bg-info text-white"> check </span></h4></td>';
                                                        } else if ($value['status'] == 5) {
                                                            echo '<td><h4> <span class = "badge bg-success text-white"> auto </span></h4></td>';
                                                        } else if ($value['status'] == 6) {
                                                            echo '<td><h4 id="waitauto'.$value['id'].'"> <span class = "badge bg-warning text-white mdi mdi-alarm-multiple"> wait auto </span></h4><h4 id="showresult'.$value['id'].'"></h4></td>';
                                                        } else if ($value['status'] == 7) {
                                                            echo '<td><h4> <span class = "badge bg-danger text-white mdi mdi-alert-circle"> error </span></h4></td>';
                                                        }?>
                                                  <td class="text-center"><div id="withdraw_status<?=$value['id']?>">
                                                   <?php if ($value['status'] == 1) {?>
                                                     <button type="button" class="btn btn-success waves-effect waves-light" onClick="accept_withdraw('<?=$value['id']?>')" title="เช็กรายการ" ><i class="mdi mdi-check-bold"></i> </button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" title="ยกเลิก" onClick="admin_reject('<?=$value['id']?>')" ><i class="mdi mdi-close-thick"></i></button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" title="ลบ" onClick="remove_withdraw('<?=$value['id']?>')"><i class="mdi mdi-delete-forever"></i></button>
                                                    <?php } else if ($value['status'] == 2) {
                                                            echo '<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal(' . $value['id'] . ')" ><i class="mdi mdi-refresh"></i> </button>';
                                                        } else if ($value['status'] == 3) {
                                                            echo '<h4><span class="mdi mdi-block-helper mdi-18px text-danger"></span></h4>';
                                                        } else if ($value['status'] == -3) {
                                                            echo '<h4><span class="mdi mdi-block-helper mdi-18px text-danger"></span></h4>';
                                                        } else if ($value['status'] == 4) {
                                                            echo ' <button type="button" class="btn btn-success waves-effect waves-light" title="" ><i class="mdi mdi-check-bold"></i> </button>';
                                                        } else if ($value['status'] == 6) {?>
                                                            <div><button type="button" class="btn btn-secondary1 waves-effect waves-light" id="timewait_<?=$value['id']?>" style="margin-right:2px;" ></button><hh id="rewithdraw_<?=$value['id']?>"></hh><dd id="showrefresh<?=$value['id']?>"></dd></div>
                                                            <script>
                                                           setInterval(function() {
                                                            var date = new Date();
                                                            var time = date.getTime();
                                                            var timewait = time - <?=$value['admin_cfTime'] * 1000?>;
                                                            var minutes = Math.floor((timewait % (1000 * 60 * 60)) / (1000 * 60));
                                                            var seconds = Math.floor((timewait % (1000 * 60)) / 1000);
                                                            var id = <?=$value['id']?>;
                                                            $('#timewait_'+id).html(('0'+minutes).slice(-2)+':'+('0'+seconds).slice(-2) );
                                                            if(minutes >= 3){
                                                                $('#rewithdraw_'+id).html('<button type="button" class="btn btn-warning waves-effect waves-light" onClick="reback_withdraw_modal('+id+')"><i class="mdi mdi-refresh"></i></button>');
                                                            }
                                                         },1000);
                                                        var chek = setInterval(function(){
                                                            var withdraw_id = <?=$value['id']?>;
                                                            $.ajax({
                                                            url: '<?php echo base_url('withdraw/checkStatusWithdraw') ?>',
                                                            type: 'POST',
                                                            dataType: 'json',
                                                            data: {withdraw_id:withdraw_id},
                                                            }).done( function(res) {
                                                                var re = JSON.parse(res);
                                                                if(re.status == true){
                                                                    console.log(re.data.status);
                                                                    if(re.data.status == 2 || re.data.status == 7 ){
                                                                      $('#timewait_'+withdraw_id).hide();
                                                                      $('#rewithdraw_'+withdraw_id).hide();
                                                                      $('#waitauto'+withdraw_id).hide();
                                                                      if(re.data.status == 7 ){
                                                                        $('#showresult'+withdraw_id).html('<span class = "badge bg-danger text-white"> error </span>');
                                                                        $('#showrefresh'+withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal('+withdraw_id+')" ><i class="mdi mdi-refresh"></i> </button>');   
                                                                      }else if(re.data.status == 2){
                                                                        $('#showresult'+withdraw_id).html('<span class = "badge bg-success text-white"> success </span>');  
                                                                        $('#showrefresh'+withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal('+withdraw_id+')" ><i class="mdi mdi-refresh"></i> </button>'); 
                                                                      } 
                                                                      clearInterval(chek);                                                   
                                                                    }
                                                                }else{
                                                                    // get status มาไม่ได้
                                                                }
                                                            })
                                                        }, 2000);
                                                          </script>
                                                <?php } else if ($value['status'] == 7) {?>
                                                      <button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal('<?=$value['id']?>')" ><i class="mdi mdi-refresh"></i> </button>
                                                   <?php }?>
                                                </div></td>
                                             </tr>
                                            <?php $i++;}} else {
                                                            echo '<tr><td colspan="11">ไม่มีข้อมูล</td></tr>';
                                                        }?>
                                        </tbody>
                                    </table>
                                    <table class="table w-100 nowrap" id="tableWait" style = "display:none;" >
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th id="num">ลำดับ</th>
                                                <!-- <th >รหัสถอน</th> -->
                                                <th>ธนาคาร</th>
                                                <th>Username</th>
                                                <th>ยอดเงินถอน</th>
                                                <th>ผู้ตรวจสอบ</th>
                                                <th>ผู้โอน</th>
                                                <th>วันที่เข้าระบบ</th>
                                                <th>วันที่ยืนยัน</th>
                                                <th>หมายเหตุ</th>
                                                <th>สถานะ</th>
                                                <th>Action</th>
                                                <!-- <th>ถอนมือ</th> -->
                                                <!-- <th>เปลี่ยนสถานะ</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="withdrawWait">
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="modal_withdraw" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">ตรวจสอบก่อนถอน</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <div class="row">
                     <div class="col-6">
                     <table class="table">
                        <h4> รายการ เพิ่ม - ลด เครดิต</h4>
                        <thead class="table-info">
                            <tr>
                                <th scope="col" class="text-dark">วันที่</th>
                                <th scope="col" class="text-dark">เวลา</th>
                                <th scope="col" class="text-dark">เพิ่ม</th>
                                <th scope="col" class="text-dark">ลด</th>
                            </tr>
                        </thead>
                        <tbody id="logCreditUser">
                        </tbody>
                    </table>
                     </div>
                     <div class="col-6">
                     <table class="table">
                        <h4> รายการ ฝาก - ถอน</h4>
                        <thead class="table-info">
                            <tr>
                                <th scope="col" class="text-dark">วันที่</th>
                                <th scope="col" class="text-dark">เวลา</th>
                                <th scope="col" class="text-dark">ฝาก</th>
                                <th scope="col" class="text-dark">ถอน</th>
                            </tr>
                        </thead>
                        <tbody id="statementUser">
                        </tbody>
                    </table>
                     </div>
                 </div>
                <input type="hidden" name="bank_id" id="bankGroup_id"  value="">
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-md-2 col-sm-3 text-end ">ธนาคารออก</label>
                        <div class="col-md-9 col-sm-9 " >
                            <input type="hidden" id="accept_id" value="" >
                            <select name="accept_bankWeb_id" id="accept_bankWeb_id" class="form-select" style="" >
                            </select>
                        </div>
                    </div>
					<div class="ln_solid"></div>
					<div class="row " style="">
						<div class="col-md-8" style="font-size: 16px">
                             <!-- <label > โปรโมชั่น : <span id="promotion_name"> </span> </label><br>

							<label > เทิร์นโอเวอร์ : <span id="promotion_turnover"> </span> </label><br> -->
						</div>
						<!-- <div class="col-md-4">

							<div class="checkbox">
                            <label>
                              <div class="icheckbox_flat-green checked" style="position: relative;">
								  <input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;" id="clear_turnover" checked>
								  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
								</div> ล้างเงื่อนไขโปรโมชั่น
                            </label>
                          </div>
							<div style="font-size: 11px">
									<span class="text-danger" id="alrt_clearTurn"> เลือกเพื่อยกเลิกเทิร์นและโปรโมชั่น </span>
							</div>

						</div> -->
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick="accept_true()">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                </div>
                </div>
            </div>
            </div>
            <div class="modal fade" id="modal_reback_withdraw" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">เลือกรายการ</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="bank_id" id="reback_withdraw_id"  value="">
                <div class="col-md-10">
                            <label class="btn btn-outline-danger text-start" id="success" style="width: 100%;font-size: 18px;">
                                <input type="radio"  class="form-check-input"  value="success" id="reback_withdraw_type" onClick="addColor()"  name="reback_withdraw_type">
                                ยกเลิก / บันทึกเป็นสำเร็จ </label>
                </div>
                <div class="col-md-10 mt-2">
                            <label class="btn btn-outline-danger text-start " id="rewithdraw" style="width: 100%;font-size: 18px;">
                                <input type="radio" class="form-check-input" value="rewithdraw" id="reback_withdraw_type" onClick="addColor()" name="reback_withdraw_type">
                                ยกเลิก / กลับไปถอนใหม่ </label>
                </div>
                <div class="col-md-10 mt-2">
                            <label class="btn btn-outline-danger text-start " id="delete" style="width: 100%;font-size: 18px;">
                                <input type="radio" class="form-check-input" value="delete" id="reback_withdraw_type" onClick="addColor()" name="reback_withdraw_type">
                                ยกเลิก / ลบทิ้ง </label>
                </div>
                <div class="row">
                        <div class="col-md-12 mt-3">
                            <p>
                                ยกเลิก : ยกเลิกรายการรอคิว<br>
                                ยกเลิก/บันทึกเป็นสำเร็จ : จะสร้างรายการในรายการธนาคารให้ กรณีมีอยู่แล้วจะสร้างทับ<br>
                                ยกเลิก/กลับไปถอนใหม่ : จะเปลี่ยนสถานะเป็นรอโอน และจะลบรายการธนาคารเดิมออกกรณีมีรายการ<br>
                                ยกเลิก/ลบทิ้ง : ลบรายการนี้ทิ้งไปเลยและจะลบรายการธนาคารออกเช่นกัน <br>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick="reback_withdraw()">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                </div>
                </div>
            </div>
            </div>
            <div id="modalView" class="modal fade mt-4" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <i class="dripicons-information h1 text-info"></i>
                                <p class="mt-2 font-16 text-dark">ทำรายการสำเร็จ</p>
                                <p class="mt-3 font-16 text-dark">
                                    โอนเงิน กรุงไทย - 7750305033<br>
                                    ชื่อบัญชี: MISSWANTHANEE MAISUWAN<br>
                                    จำนวนเงิน (฿) 200.00<br>
                                    ยอดเงินคงเหลือ 56,332.61 บาท
                                </p>
                                <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <style>
                th {
                    color: white;
                }

                .modal-busy {
                    position: fixed;
                    z-index: 999;
                    height: 100%;
                    width: 100%;
                    top: 0;
                    left: 0;
                    background-color: Black;
                    filter: alpha(opacity=60);
                    opacity: 0.6;
                    -moz-opacity: 0.8;
                }

                .center-busy {
                    z-index: 1000;
                    margin: 300px auto;
                    padding: 0px;
                    width: 130px;
                    filter: alpha(opacity=100);
                    opacity: 1;
                    -moz-opacity: 1;
                }

                .center-busy img {
                    height: 128px;
                    width: 128px;
                }
            </style>

            <div class="modal-busy" id="loader" style="display: none">
                <div class="center-busy" id="test-git">
                    <img alt="" src="<?php echo base_url(); ?>/assets/images/ZZ5H.gif" />
                </div>
            </div>


            <script>
                var pathname = window.location.pathname;
                var type = pathname.split('/');
                if(type['3'] == 'pending_confirmation'){
                    $('a#pending_confirmation').addClass('active');
                }else if(type['3'] == 'lists_error'){
                    $('a#lists_error').addClass('active');
                }else if(type['3'] == 'lists_cancel'){
                    $('a#lists_cancel').addClass('active');
                }else if(type['3'] == 'transfer_queue'){
                    $('a#transfer_queue').addClass('active');
                }
                $("a#withdraw_total").on('click', function(){
                    window.location = "<?= base_url('withdraw/show') ?>";    
                });
                $("a#pending_confirmation").on('click', function(){
                    window.location = "<?= base_url('withdraw/pending_confirmation') ?>";    
                });
                $("a#lists_error").on('click', function(){
                    window.location = "<?= base_url('withdraw/lists_error') ?>";    
                });
                $("a#lists_cancel").on('click', function(){
                    window.location = "<?= base_url('withdraw/lists_cancel') ?>";    
                });
                $("a#transfer_queue").on('click', function(){
                    window.location = "<?= base_url('withdraw/transfer_queue') ?>";    
                });
                $(document).ready(function () {
                    // เมื่อ Model withdraw ปิดทำรายการ ระบบดึงรายการเดิมกลับมา
                    $('#modal_withdraw').on('hidden.bs.modal', ()=>{
                        let id = $('#accept_id').val();
                        return_button_default(id);
                    });
                });
                function return_button_default(id){
                    let statu_value = '<button type="button" class="btn btn-success waves-effect waves-light" onClick="accept_withdraw('+id+')" title="เช็กรายการ" ><i class="mdi mdi-check-bold"></i> </button> '+
                                      '<button type="button" class="btn btn-danger waves-effect waves-light" onClick="admin_reject('+id+')" ><i class="mdi mdi-close-thick"></i></button> '+
                                      '<button type="button" class="btn btn-danger waves-effect waves-light" title="ลบ" onClick="remove_withdraw('+id+')"><i class="mdi mdi-delete-forever"></i></button>';
                    $('#withdraw_status'+id).html(statu_value);
                    $('#withdraw_status'+id).removeClass('withdraw_loader');
                }
                async function accept_withdraw(id) {
                    $('#withdraw_status'+id).html('');
                    $('#withdraw_status'+id).addClass('withdraw_loader');
                    const balance_bankweb = await get_bankweb_balanace();
                    var list_bankweb=`<option value="" > - กรุณาเลือก - </option>`;
                    $.each(balance_bankweb, function( index, value ) {
                    list_bankweb+=`<option  style="${(value.status == 3)?'background-color: #f5c6cb;padding: 4px;':''}"  value="${value.id}" > [${value.bank_short}] ${value.name} | ${addCommas(value.balance)} </option>`;
                    });
                    $('#accept_bankWeb_id').html(list_bankweb);
                    $.ajax({
                                 url: '<?php echo base_url('withdraw/see_withdraw') ?>',
                                type: 'POST',
                                dataType: 'json',
                                data: {id:id},
                                    }).done( function(res) {
                                        var re = JSON.parse(res);
                                        console.log(re.status);
                                        console.log(re.msg);
                                        if(re.status == true){
                                            var html = '';
                                            var htmll = '';
                                            var data = re.data;
                                            var data1 = re.data1
                                            for (let i = 0; i < re.data.length; i++){
                                                var d = new Date(data[i].auto_update * 1000);
                                                var day = d.getDate();
                                                var month = d.getMonth() + 1;
                                                var years = d.getFullYear();
                                                var Hours = d.getHours();
                                                var Minutes = d.getMinutes();
                                                var Seconds = d.getSeconds();
                                                // console.log(dateCreate);
                                                var date = day + '/' + month + '/' + years
                                                var time = Hours < 10 ? '0'+Hours + ':' + Minutes : Hours  + ':' + Minutes
                                                var withdraw = data[i].withdraw > 0 ? data[i].withdraw : '-';
                                                var deposit = data[i].deposit > 0 ? data[i].deposit : '-';
                                                html += '<tr>';
                                                html += '<td>'+date+'</td>';
                                                html += '<td>'+time+'</td>';
                                                html += '<td style="background-color: #a6dfb5">'+deposit+'</td>';
                                                html += '<td style="background-color: #f1556c75">'+withdraw+'</td>';
                                                html += '</tr>';
                                            }
                                            if(re.data.length == 0){
                                                html += '<tr><td colspan="4">ไม่มีข้อมูล</td></tr>';
                                            }
                                            for (let j = 0; j < re.data1.length; j++){
                                                var d = new Date(data1[j].create_time * 1000);
                                                var day = d.getDate();
                                                var month = d.getMonth() + 1;
                                                var years = d.getFullYear();
                                                var Hours = d.getHours();
                                                var Minutes = d.getMinutes();
                                                var Seconds = d.getSeconds();
                                                // console.log(dateCreate);
                                                var date = day + '/' + month + '/' + years;
                                                var time = Hours < 10 ? '0'+Hours + ':' + Minutes : Hours  + ':' + Minutes;
                                                htmll += '<tr>';
                                                htmll += '<td>'+date+'</td>';
                                                htmll += '<td>'+time+'</td>';
                                                if(data1[j].type == 1){
                                                    htmll += '<td style="background-color: #a6dfb5">'+data1[j].amount+'</td><td style="background-color: #f1556c75" >-</td>';
                                                }else if(data1[j].type == 2){
                                                    htmll += '<td style="background-color: #a6dfb5">-</td><td style="background-color: #f1556c75">'+data1[j].amount+'</td>';
                                                }
                                                htmll += '</tr>';
                                            }
                                            if(re.data1.length == 0){
                                                htmll += '<tr><td colspan="4">ไม่มีข้อมูล</td></tr>'
                                            }
                                            $('#statementUser').html(html);
                                            $('#logCreditUser').html(htmll);
                                        }
                                        $('#modal_withdraw').modal('show');
                                        $('#accept_id').val(id);

                                    })
                }
                async function get_bankweb_balanace()
                {
                    return await new Promise(async (resolve, reject) => {

                    try {
                        $.ajax({
                            url: '<?php echo base_url('withdraw/get_bankweb_balanace') ?>',
                            type: 'GET',
                            dataType: 'json',
                        }).done(function(res){
                            var re = JSON.parse(res);
                            if(re.status == true){
                                resolve(re.data);
                            }else{
                                resolve(false);
                            }
                        });

                    } catch (err) {
                        resolve(false);
                    }

                    });
                }
                function accept_true(){
                    var withdraw_id	= $('#accept_id').val();
                    var bank_web_id	= $('#accept_bankWeb_id').val();
                    if(bank_web_id != ''){
                        $.ajax({
                                url: '<?php echo base_url('withdraw/get_bankweb') ?>',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    bank_web_id:bank_web_id,
                                    withdraw_id:withdraw_id,
                                    },
                                      }).done(function(res) {
                                          var re = JSON.parse(res)
                                          if(re.status == true){
                                            let myData = re.data[0];
                                          let banktype = re.bw_type;
                                          let buttons_type = '';
                                          const wrapper = document.createElement('div');
                                            if(myData.blacklist == 0){
                                                wrapper.innerHTML  = "<div class='row' style='background-color:#D3F1F1;font-size: 16px;font-weight:200;color:#000000;border-radius: 10px;'>"+
                                                            "<div class='col-md-3 mt-1'>"+
                                                            "<img src='<?php echo base_url() ?>/assets/images/Bank_show/"+myData.bw_shortbank+".png'  width='90%'> "+
                                                            "</div>"+
                                                            "<div class='col-md-9 text-left' >"+
                                                                " <span style='color:blue;'>บัญชีเว็บไซต์ </span><br>"+
                                                                " <span> บ/ช : ["+myData.bw_shortbank+"]  "+myData.bw_account+
                                                                " <br> ชื่อ  : "+myData.bw_name+
                                                                " <br> จำนวนคิว  : "+myData.queus+"</span>"+
                                                            "</div>"+
                                                        "</div><br>"+
                                                        "<div class='row' style='background-color:#D3F1F1;font-size: 16px;font-weight:200;color:#000000;border-radius: 10px;'>"+
                                                            "<div class='col-md-3  mt-1'>"+
                                                            "<img src='<?php echo base_url() ?>/assets/images/Bank_show/"+myData.us_shortbank+".png'  width='90%'> "+
                                                            "</div>"+
                                                            "<div class='col-md-9 text-left' >"+
                                                                " <span style='color:blue;'> โอนไปยัง </span><br>"+
                                                                " <span> บ/ช : ["+myData.us_shortbank+"]  "+myData.us_account+
                                                                " <br> ชื่อ  : "+myData.us_name+
                                                                " <br> รหัส : "+myData.us_username+"</span>"+
                                                            "</div>"+
                                                        "</div>"+

                                                        "<div class='col-md-12 text-right' style='font-size: 25px;font-weight:700;color:#1B0670;background-color:#FFF;border-radius: 10px;'>"+
                                                        "<span style='color:#000;'>จำนวน : </span>" +
                                                        "<span style='color:#1B0670;'>"+myData.wd_amount+"</span>"+
                                                        "<span style='color:#000;'> เครดิต</span>" +
                                                        "</div>";
                                                    buttons_type = true;

                                                }else{
                                                    wrapper.innerHTML  = "<div class='row' style='background-color:#D3F1F1;font-size: 16px;font-weight:200;color:#000000;border-radius: 10px;'>"+
                                                            "<div class='col-md-3  mt-1'>"+
                                                            "<img src='<?php echo base_url() ?>/assets/images/Bank_show/"+myData.us_shortbank+".png'  width='90%'> "+
                                                            "</div>"+
                                                            "<div class='col-md-9 text-left' >"+
                                                                " <span style='color:danger;font-size: 21px;'> บัญชีโดนระงับ </span><br>"+
                                                                " <span style='color:danger;'> เนื่องด้วยอันเกินมาจากลูกค้าโกง มิจฉาชีพ หรือมีความผิดปกติที่ไม่ประสงค์ดีต่อเว็บไซต์ของท่าน </span><br>"+
                                                                " <span> บ/ช : ["+myData.us_shortbank+"]  "+myData.us_account+
                                                                " <br> ชื่อ  : "+myData.us_name+
                                                                " <br> รหัส : "+myData.us_username+"</span>"+
                                                            "</div>"+
                                                        "</div>";

                                                    buttons_type = false;
                                                }
                                                Swal.fire({
                                                           title: "รายการโอน",
                                                           html: wrapper,
                                                           cancelButtonColor: '#d33',
                                                           showCancelButton:buttons_type,
                                                           showConfirmButton: buttons_type
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                $.ajax({
                                                                                // url: '<?php echo base_url('withdraw') ?>/'+banktype,
                                                                                url: '<?php echo base_url('withdraw') ?>/confirm_withdraw_auto',
                                                                                type: 'POST',
                                                                                dataType: 'json',
                                                                                data: myData,
                                                                            }).done(function(res) {
                                                                                console.log(res);
                                                                                var resp = JSON.parse(res)
                                                                                 if(resp.status == true){
                                                                                    $('#modal_withdraw').modal('hide');
                                                                                    Swal.fire({
                                                                                                icon: "success",
                                                                                                title: resp.msg,
                                                                                            }).then((result) => {
                                                                                                $('#withdraw_status'+myData.withdraw_r.id).html('');
                                                                                                $('#withdraw_status'+myData.withdraw_r.id).html('<div><button type="button" class="btn btn-secondary1 waves-effect waves-light" id="timewaitR'+withdraw_id+'" style="margin-right:2px;" ></button><hh id="rewithdrawR'+withdraw_id+'"></hh><dd id="showrefreshR'+withdraw_id+'"></dd></div>');
                                                                                                var chek = setInterval(function(){
                                                                                                var withdraw_id = myData.withdraw_r.id;
                                                                                                $.ajax({
                                                                                                url: '<?php echo base_url('withdraw/checkStatusWithdraw') ?>',
                                                                                                type: 'POST',
                                                                                                dataType: 'json',
                                                                                                data: {withdraw_id:withdraw_id},
                                                                                                }).done( function(res) {
                                                                                                    var re = JSON.parse(res);  
                                                                                                    if(re.status == true){
                                                                                                        if(re.data.status == 6){
                                                                                                            setInterval(() => {
                                                                                                                var date = new Date();
                                                                                                                var time = date.getTime();
                                                                                                                var timewait = time - re.data.admin_cfTime * 1000;
                                                                                                                var minutes = Math.floor((timewait % (1000 * 60 * 60)) / (1000 * 60));
                                                                                                                var seconds = Math.floor((timewait % (1000 * 60)) / 1000);
                                                                                                                $('#timewaitR'+withdraw_id).html(('0'+minutes).slice(-2)+':'+('0'+seconds).slice(-2) );
                                                                                                                if(minutes >= 3){
                                                                                                                    $('#rewithdrawR'+withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" onClick="reback_withdraw_modal('+withdraw_id+')"><i class="mdi mdi-refresh"></i></button>');
                                                                                                                }
                                                                                                            }, 1000);
                                                                                                        }else if(re.data.status == 2){
                                                                                                            $('#timewaitR'+withdraw_id).hide();
                                                                                                            $('#waitauto1'+withdraw_id).hide();
                                                                                                            $('#showresult1'+withdraw_id).html('<span class = "badge bg-success text-white"> success </span>');  
                                                                                                            $('#showrefreshR'+withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal('+withdraw_id+')" ><i class="mdi mdi-refresh"></i> </button>'); 
                                                                                                        }else if(re.data.status == 7){
                                                                                                            $('#timewaitR'+withdraw_id).hide();
                                                                                                            $('#waitauto1'+withdraw_id).hide();
                                                                                                            $('#showresult'+withdraw_id).html('<span class = "badge bg-danger text-white"> error </span>');
                                                                                                            $('#showrefresh'+withdraw_id).html('<button type="button" class="btn btn-warning waves-effect waves-light" title="" onClick="reback_withdraw_modal('+withdraw_id+')" ><i class="mdi mdi-refresh"></i> </button>');   
                                                                                                        }
                                                                                                    }else{
                                                                                                        // get status มาไม่ได้
                                                                                                    }
                                                                                                })
                                                                                            }, 1000);
                                                                                                // let statu_value = '<span class = "badge bg-warning text-white"> wait auto </span>';
                                                                                                // $('#withdraw_status'+withdraw_id).html(statu_value);
                                                                                                // $('#withdraw_status'+withdraw_id).removeClass('withdraw_loader');
                                                                                            })
                                                                                 }else{
                                                                                    Swal.fire({
                                                                                                icon: "error",
                                                                                                title: resp.msg,
                                                                                                showConfirmButton: false,
                                                                                            });
                                                                                 }
                                                                            })
                                                                } else if (result.isDenied) {
                                                                    Swal.fire('ไม่สามารถทำรายการได้', 'กรุณาติดต่อพนักงาน', 'error');
                                                                }
                                                        })
                                          }else{
                                            Swal.fire({
                                                        icon: "error",
                                                        title: re.msg,
                                                        showConfirmButton: true,
                                                    });

                                          }
                                      })
                    }else{
                        Swal.fire('กรุณาเลือกธนาคารโอน', '', 'error');
                    }
                }
                function addCommas(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }
                function admin_reject(id){
                    $('#withdraw_status'+id).html('');
                    $('#withdraw_status'+id).addClass('withdraw_loader');
                    Swal.fire({
                                title: 'ต้องการยกเลิกรายการนี้ ?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?php echo base_url('withdraw/cancel_wd_check') ?>',
                                        type: 'POST',
                                        dataType: 'json',
                                        data: {id:id,},
                                    }).then(function(res) {
                                      var re = JSON.parse(res)
                                      if(re.status == true){
                                        Swal.fire({
                                                    title: 'ยืนยันการทำรายการ อีกครั้ง ?',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    }).then((result2) => {
                                                    if (result2.isConfirmed) {
                                                        $.ajax({
                                                                    url: '<?php echo base_url('withdraw/cancel_withdraw') ?>',
                                                                    type: 'POST',
                                                                    dataType: 'json',
                                                                    data: {id:id,},
                                                                }).done(function(scc) {
                                                                    var respon = JSON.parse(scc)
                                                                    if(respon.status == true){
                                                                        Swal.fire({
                                                                                   icon: "success",
                                                                                   title: respon.msg,
                                                                                   showConfirmButton: true,
                                                                                 }).then((result3) => {
                                                                                    location.reload();
                                                                                 })
                                                                    }else{
                                                                        Swal.fire({
                                                                                   icon: "error",
                                                                                   title: respon.msg,
                                                                                   showConfirmButton: true,
                                                                                 }).then((result4) => {
                                                                                    location.reload();
                                                                                 })
                                                                    }
                                                                })
                                                    }else{
                                                        Swal.fire('ยกเลิกการทำรายการ', '', 'error').then(()=>{
                                                            return_button_default(id);
                                                        });
                                                    }
                                                    })
                                      }else{
                                        Swal.fire('ไม่สามารถทำรายการได้', '', 'error').then(()=>{
                                            location.reload();
                                        });
                                      }
                                })
                                }else{
                                    return_button_default(id);
                                }
                                })
                }
                function remove_withdraw(id){
                        console.log(id);
                        $('#withdraw_status'+id).html('');
                        $('#withdraw_status'+id).addClass('withdraw_loader');
                        Swal.fire({
                                    title: 'ลบรายการ ไม่แอดเครดิตลูกค้า ?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    showConfirmButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                                    url: '<?php echo base_url('withdraw/remove_withdraw') ?>',
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    data: {id:id,},
                                                }).then(function(res) {
                                                    var re = JSON.parse(res)
                                                    if(re.status == true){
                                                        Swal.fire(re.title,re.msg, 'success').then(()=>{
                                                        location.reload();
                                                        });
                                                    }else{
                                                        Swal.fire(re.title,re.msg, 'error').then(()=>{
                                                        location.reload();
                                                        });
                                                    }
                                                })
                                    }else{
                                        return_button_default(id);
                                    }
                                    })
                }
                function reback_withdraw_modal(id){
                    $('#modal_reback_withdraw').modal('show');
                    $('#reback_withdraw_id').val(id);
                }
                function reback_withdraw(){
                    var withdraw_id = $('#reback_withdraw_id').val();
                    var rewithdraw_type = $("input[name='reback_withdraw_type']:checked").val();
                    console.log('5555');
                    Swal.fire({
                                title: 'ยืนยันการทำรายการ ?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: '<?php echo base_url('withdraw/reback_withdraw') ?>',
                                        type: 'POST',
                                        dataType: 'json',
                                        data: {
                                            withdraw_id:withdraw_id,
                                            rewithdraw_type:rewithdraw_type
                                        },
                                    }).done(function(res) {
                                        var re = JSON.parse(res);
                                        if(re.status == true){
                                            Swal.fire(re.title,re.msg, 'success').then(()=>{
                                            location.reload();
                                            });
                                        }else{
                                            Swal.fire(re.title,re.msg, 'error').then(()=>{
                                            location.reload();
                                            });
                                        }

                                    })
                                }
                                })
                }
                function addColor(){
                    var rewithdraw_type = $("input[name='reback_withdraw_type']:checked").val();
                    if(rewithdraw_type == 'success'){
                        document.getElementById(rewithdraw_type).classList.add("bg-danger");
                        document.getElementById(rewithdraw_type).classList.add("text-white");
                        document.getElementById("rewithdraw").classList.remove("bg-danger");
                        document.getElementById("rewithdraw").classList.remove("text-white");
                        document.getElementById("delete").classList.remove("bg-danger");
                        document.getElementById("delete").classList.remove("text-white");
                    }else if(rewithdraw_type == 'rewithdraw'){
                        document.getElementById("rewithdraw").classList.add("bg-danger");
                        document.getElementById("rewithdraw").classList.add("text-white");
                        document.getElementById("success").classList.remove("bg-danger");
                        document.getElementById("success").classList.remove("text-white");
                        document.getElementById("delete").classList.remove("bg-danger");
                        document.getElementById("delete").classList.remove("text-white");
                    }else if(rewithdraw_type == 'delete'){
                        document.getElementById("delete").classList.add("bg-danger");
                        document.getElementById("delete").classList.add("text-white");
                        document.getElementById("success").classList.remove("bg-danger");
                        document.getElementById("success").classList.remove("text-white");
                        document.getElementById("rewithdraw").classList.remove("bg-danger");
                        document.getElementById("rewithdraw").classList.remove("text-white");
                    }
                }
                function list_withdraw_total(){
                    $("#tableTotal").show();
                    $("#tableWait").hide();
                }
                function list_withdraw_wait(){
                    $("#tableTotal").hide();
                    $("#tableWait").show();
                    var status = 1;
                    $.ajax({
                                        url: '<?php echo base_url('withdraw/filtersWithdraw') ?>',
                                        type: 'POST',
                                        dataType: 'json',
                                        data: {status:status},
                                    }).done(function(res) {
                                            var re = JSON.parse(res);
                                            console.log(re);
                                            var html = '';
                                            var data = re.data;
                                            if(re.status == true){
                                                if(re.data.length > 0){
                                                    for (let i = 0; i < re.data.length; i++){
                                                        var load = 'withdraw_status'+data[i].id;
                                                        var created = formateDate(data[i].time);
                                                        var confirmation_date = data[i].admin_cfTime == 0 ? ' ' : formateDate(data[i].admin_cfTime);
                                                        var admin_check_name = data[i].admin_check_name == 1 ? 'Auto' : data[i].admin_check_name == null ? ' ' : data[i].admin_check_name  ;
                                                        var admin_cf_name = data[i].admin_cf_name == 1 ? 'Auto' : data[i].admin_cf_name == null ? ' ' : data[i].admin_cf_name;
                                                        html += '<tr>';
                                                        html += '<td class="bg-dangerlight2">'+(i+1)+'</td>';
                                                        html += '<td class="p-0 m-0"> <img src="<?php echo base_url() ?>/assets/images/Bank_show/'+data[i].user_bank_short+'.png"  alt="user-image" class="me-1 mt-1" height="30"> <br> <p class="mt-2 text-blue">'+data[i].account+'</p></td>';
                                                        html += '<td>'+data[i].user_username+'</td>';
                                                        html += '<td class="bg-success text-white">'+data[i].amount+'</td>';
                                                        html += '<td class="p-2 text-right" id="admin_check_name_'+data[i].id+'" >'+admin_check_name+'</td>';
                                                        html += '<td class="p-2 text-right" id="admin_cf_name_'+data[i].id+'" >'+admin_cf_name+'</td>';
                                                        html += ' <td class="p-2 text-center">'+created+'</td>';
                                                        html += ' <td class="p-2 text-center">'+confirmation_date+'</td>';
                                                        html += '<td class="p-2 text-center">-</td>';
                                                        html += '<td><h4> <span class = "badge bg-warning text-white"> wait </span></h4></td>';
                                                        html += '<td><div id="withdraw_status'+data[i].id+'">'
                                                        html += '<button type="button" class="btn btn-success waves-effect waves-light" onClick="accept_withdraw('+data[i].id+')" title="เช็กรายการ" ><i class="mdi mdi-check-bold"></i> </button> '+
                                                        '<button type="button" class="btn btn-danger waves-effect waves-light" title="ยกเลิก" onClick="admin_reject('+data[i].id+')" ><i class="mdi mdi-close-thick"></i></button> '+
                                                        '<button type="button" class="btn btn-danger waves-effect waves-light" title="ลบ" onClick="remove_withdraw('+data[i].id+')"><i class="mdi mdi-delete-forever"></i></button>';
                                                        html += '</div></td>'
                                                        html += '</tr>';
                                                 }
                                                }else{

                                                }
                                                $("#withdrawWait").html(html);
                                            }
                                    });
                }
                   function formateDate(unixTimestamp){
                    const milliseconds = unixTimestamp * 1000 // 1575909015000
                    const dateObject = new Date(milliseconds)
                    const humanDateFormat = dateObject.toLocaleString("es-MX")
                    return humanDateFormat;
                }
            </script>

            <?php $this->endSection();?>