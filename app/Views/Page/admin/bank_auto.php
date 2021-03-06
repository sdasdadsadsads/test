<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>


<style>
    table tr {
        text-align: center;
        font-size: 12px;
    }

    label.radio1 {
        cursor: pointer;
        width: 100%;
        margin-right: 7px
    }

    label.radio1 input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none
    }

    label.radio1 span {
        padding: 20px 12px;
        border: 2px solid #01d20d;
        display: inline-block;
        color: #21a700;
        border-radius: 3px;
        text-transform: capitalize;
        width: 100%;
    }

    label.radio2 span {
        padding: 20px 12px;
        border: 2px solid #ff0000;
        display: inline-block;
        color: #f30022;
        border-radius: 3px;
        text-transform: capitalize;
        width: 100%;
    }

    label.radio2 {
        cursor: pointer;
        width: 100%;
        margin-right: 7px
    }

    label.radio2 input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none
    }

    .bg-success1 {
        background-color: #00ff0ef5 !important;
        color: #1f9c00;
    }

    .header-title {
        font-size: 1.5rem;
        margin: 0 0 7px 0;
    }

    .button1 {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        border: 3px solid #ffffff;
    }

    .button--play {
        border-radius: 50%;
    }

    .button--play .button__shape {
        width: 5px;
        height: 15px;
        background: #ffffff;
        transition: 0.3s ease-in-out;
    }

    .button--play .button__shape--one {
        -webkit-clip-path: polygon(0 0, 100% 25%, 100% 75%, 0% 100%);
        transform: translateX(5px);
    }

    .button--play .button__shape--two {
        -webkit-clip-path: polygon(0 25%, 100% 50%, 100% 50%, 0 75%);
        transform: translateX(4.9px);
    }

    .button--play.button--active .button__shape--one {
        -webkit-clip-path: polygon(0 15%, 50% 15%, 50% 85%, 0% 85%);
        transform: translateX(0px);
    }

    .button--play.button--active .button__shape--two {
        -webkit-clip-path: polygon(50% 15%, 100% 15%, 100% 85%, 50% 85%);
        transform: translateX(0px);
    }

    .btn-group-sm>.btn,
    .btn-sm {
        padding: .13rem .1rem;
        font-size: .7rem;
        /* border-radius: .2rem; */
    }
  
.ant-tag-green {
    color: #4e8d34;
    background: #f6ffed;
    border-color: #b7eb8f;
}
.ant-tag {
    box-sizing: border-box;
    margin: 0 8px 0 0;
    font-variant: tabular-nums;
    list-style: none;
    font-feature-settings: "tnum","tnum";
    display: inline-block;
    height: auto;
    padding: 0 7px;
    font-size: 12px;
    line-height: 20px;
    white-space: nowrap;
    background: #d7ffbe;
    border: 1px solid #41d900;
    border-radius: 2px;
    opacity: 1;
    transition: all .3s;
}
.ant-tag-red {
    color: #cf1322;
    background: #fff1f0;
    border-color: #ffa39e;
}
.ant-tag-r {
    box-sizing: border-box;
    margin: 0 8px 0 0;
    font-variant: tabular-nums;
    list-style: none;
    font-feature-settings: "tnum","tnum";
    display: inline-block;
    height: auto;
    padding: 0 7px;
    font-size: 12px;
    line-height: 20px;
    white-space: nowrap;
    background: #fafafa;
    border: 1px solid #d9d9d9;
    border-radius: 2px;
    opacity: 1;
    transition: all .3s;
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
                        <h4 class="page-title"></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
        </div> <!-- end col -->
    </div>
    <!-- end row-->

    <!-- <ul class="nav nav-tabs nav-bordered">
        <li class="nav-item">
            <a onClick="today()" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                ??????????????????
            </a>
        </li>
        <li class="nav-item">
            <a onClick="yesterday()" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                ????????????????????????
            </a>
        </li>
    </ul> -->


    <div class="tab-pane show active" style="margin-top:3rem;" id="today">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <b class="header-title">????????????????????????????????????</b>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <button class="btn btn-info" onClick="add_bank()"><i class="fa fa-plus"></i> ???????????????</button>
                            </div>
                        </div>
                        <p class="text-muted font-13 mb-4">
                            <!-- ?????????????????????????????????????????????????????? 24 ?????? -->
                        </p>
                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                            <thead>
                                <tr>
                                    <th class="text-dark">????????????</th>
                                    <th class="text-dark">??????????????????????????????</th>
                                    <th class="text-dark">?????????????????????????????????</th>
                                    <th class="text-dark">??????????????????</th>
                                    <!-- <th class="text-dark">username</th>
                                    <th class="text-dark">password</th> -->
                                    <th class="text-dark">limit</th>
                                    <th class="text-dark">??????????????????</th>
                                    <th class="text-dark">????????????/????????? ???????????????????????????????????????</th>
                                    <th class="text-dark">??????????????? ???????????????????????????????????????</th>
                                    <th class="text-dark">??????????????????????????????</th>
                                    <th class="text-dark">??????????????????</th>
                                    <th class="text-dark">??????</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                if (!empty($bankAuto)) {
                                    foreach ($bankAuto as $_b => $bnk) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $bnk['name'] ?></td>
                                            <td><?= $bnk['account'] ?></td>
                                            <td><img src="<?php echo base_url(); ?>/assets/images/Bank_show/<?= $bnk['bank_short']; ?>.png" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm"></td>
                                            <td>
                                                <?php
                                                if ($bnk['type'] == 2) {
                                                    echo $bnk['limit_amount'];
                                                ?>
                                                    <a href="#" onClick="edit_limit('<?= $bnk['id'] ?>','<?= $bnk['limit_amount'] ?>')"><i class="fa fa-pencil-square-o"></i></a>
                                                <?php
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($bnk['type'] == 1) {
                                                    echo '<span class="badge ant-tag ant-tag-green " style="font-size: 1.0em;">?????????</span>';
                                                } else {
                                                    echo '<span class="badge ant-tag ant-tag-red" style="font-size: 1.0em;">?????????</span>';
                                                }
                                                ?>
                                            </td>
                                            <?php if ($bnk['name_process'] == "") {
                                                echo '<td>-</td><td>-</td>';
                                            } else { ?>
                                                <?php if (!empty($processlist)) {
                                                    foreach ($processlist as $_p => $pro) {
                                                        if ($bnk['name_process'] == $pro['name']) {
                                                            if ($pro['status'] == 'online') { ?>
                                                                <td style="display: flex; align-items: center;justify-content: center;" id="refresh1">
                                                                    <div class="btn btn-danger rounded-pill btn-sm" id="color<?= $i ?>" onClick="StatusSystem('','<?= $i ?>','<?= $pro['id'] ?>','<?= $pro['status'] ?>','<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>')">
                                                                        <div class="button1 button--play button--active" id="enable<?= $i ?>">
                                                                            <div class="button__shape button__shape--one">
                                                                            </div>
                                                                            <div class="button__shape button__shape--two"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge ant-tag ant-tag-green " style="font-size: 0.9em;">START</span></td>
                                                            <?php } else { ?>
                                                                <td style="display: flex; align-items: center;justify-content: center;">
                                                                    <div class="btn btn-success rounded-pill btn-sm" id="color<?= $i ?>" onClick="StatusSystem('','<?= $i ?>','<?= $pro['id'] ?>','<?= $pro['status'] ?>','<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>')">
                                                                        <div class="button1 button--play" id="enable<?= $i ?>">
                                                                            <div class="button__shape button__shape--one">
                                                                            </div>
                                                                            <div class="button__shape button__shape--two"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge ant-tag ant-tag-red " style="font-size: 0.9em;">STOP</span></td>
                                                            <?php } ?>
                                                <?php }
                                                    }
                                                } else {
                                                    echo '<td>ERROR</td>';
                                                } ?>
                                                <?php if ($bnk['bank_short'] == 'BAY' || $bnk['bank_short'] == 'KTB') {
                                                    if (!empty($processlist2)) {
                                                        foreach ($processlist2 as $_p => $pro2) {
                                                            if ($bnk['name_process'] == $pro2['name']) {
                                                                if ($pro2['status'] == 'online') { ?>
                                                                    <td style="display: flex; align-items: center;justify-content: center;" id="refresh1">
                                                                        <div class="btn btn-danger rounded-pill btn-sm" id="color<?= $i ?>" onClick="StatusSystem('<?= $bnk['bank_short'] ?>','<?= $i ?>','<?= $pro2['id'] ?>','<?= $pro2['status'] ?>','<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>')">
                                                                            <div class="button1 button--play button--active" id="enable<?= $i ?>">
                                                                                <div class="button__shape button__shape--one">
                                                                                </div>
                                                                                <div class="button__shape button__shape--two"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><span class="badge ant-tag ant-tag-green " style="font-size: 0.9em;">START</span></td>
                                                                <?php } else { ?>
                                                                    <td style="display: flex; align-items: center;justify-content: center;">
                                                                        <div class="btn btn-success rounded-pill btn-sm" id="color<?= $i ?>" onClick="StatusSystem('<?= $bnk['bank_short'] ?>','<?= $i ?>','<?= $pro2['id'] ?>','<?= $pro2['status'] ?>','<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>')">
                                                                            <div class="button1 button--play" id="enable<?= $i ?>">
                                                                                <div class="button__shape button__shape--one">
                                                                                </div>
                                                                                <div class="button__shape button__shape--two"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><span class="badge ant-tag ant-tag-red " style="font-size: 0.9em;">STOP</span></td>
                                                <?php }}}}}} ?>
                                            <td>
                                                <?php if (!empty($bnk['status']) && $bnk['status'] == 1) { ?>
                                                    <span class="badge  ant-tag ant-tag-green " style="font-size: 1.0em; cursor: pointer;" onClick="edit_statusBank('<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>','0')">????????????</span>
                                                    <!-- <button type="button" class="btn btn-success waves-effect waves-light" onClick="edit_statusBank('<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>','0')"><i class="mdi mdi-checkbox-marked-circle"></i></button> -->
                                                   
                                                <?php } else if ($bnk['status'] == 0) { ?>
                                                    <span class="badge  ant-tag ant-tag-red " style="font-size: 1.0em; cursor: pointer;" onClick="edit_statusBank('<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>','1')">?????????</span>
                                                    <!-- <button type="button" class="btn btn-danger waves-effect waves-light" onClick="edit_statusBank('<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>','1')"><i class="mdi mdi-close-circle"></i></button> -->
                                                  
                                                <?php } else { ?>
                                                   Error !!
                                                <?php } ?>
                                            </td>
                                            <td><button type="button" class="btn btn-warning waves-effect waves-light" onClick="editDataBank('<?= $bnk['bank_web_id'] ?>','<?= $bnk['id'] ?>','<?= $bnk['name'] ?>','<?= $bnk['account'] ?>','<?= $bnk['bankId']; ?>','<?= $bnk['type'] ?>','<?= $bnk['name_process'] ?>')"><i class="mdi mdi-file-document-edit-outline"></i></button></td>
                                            <td>
                                                <button type="button" class="btn btn-danger waves-effect waves-light" onClick="edit_statusBank('<?= $bnk['id'] ?>','<?= $bnk['bank_web_id'] ?>','4')"><i class="mdi mdi-delete-forever "></i></button>
                                            </td>
                                        </tr>
                                <?php $i++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">????????????????????????????????????????????????</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="form_bank">
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">??????????????????????????? :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">????????????????????????????????? :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="number" class="form-control" id="account" name="account">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="message-text" class="col-form-label col-md-3 col-sm-3">?????????????????? :</label>
                                            <div class="col-md-9 col-sm-9">

                                                <?php if (isset($bank)) { ?>
                                                    <select class="form-select" aria-label="Default select example" name="bank_id">
                                                        <?php
                                                        foreach ($bank as $b) {
                                                            echo '<option value="' . $b['id'] . '">' . $b['bank_short'] . '-' . substr($b['bank_th'], 18, 40) . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                <?php    } else { ?>
                                                    <input type="text" id="" disabled class="form-control" value='?????????????????????????????????????????????????????? Server ?????????' placeholder="">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">username :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">password :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="text" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="message-text" class="col-form-label col-md-3 col-sm-3">?????????????????? :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <select class="form-select" aria-label="Default select example" name="type" id="type">
                                                    <option value="1">?????????</option>
                                                    <option value="2">?????????</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onClick="form_createBank()">Save</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editDatabank" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">???????????????????????????????????????????????????</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="Editform_bank">
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">??????????????????????????? :</label>
                                            <div class="col-md-9 col-sm-9">
                                                 <input type="hidden" class="form-control" id="editid" name="editid">
                                                <input type="text" class="form-control" id="editname" name="editname">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">????????????????????????????????? :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="number" class="form-control" id="editaccount" name="editaccount">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="message-text" class="col-form-label col-md-3 col-sm-3">?????????????????? :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <select class="form-select" aria-label="Default select example" name="editbank_id" id="editbank_id">
                                                    <option value="2">KBANK-????????????????????????</option>
                                                    <option value="3">BBL-?????????????????????</option>
                                                    <option value="4">BAY-???????????????????????????????????????</option>
                                                    <option value="5">SCB-??????????????????????????????</option>
                                                    <option value="6">KTB-?????????????????????</option>
                                                    <option value="7">SCIB-??????????????????????????????</option>
                                                    <option value="8">UOB-??????????????????</option>
                                                    <option value="9">TTB-????????????????????????????????????</option>
                                                    <option value="10">TISCO-??????????????????</option>
                                                    <option value="11">ICBC-???????????????????????? (?????????)</option>
                                                    <option value="12">Kiatnakin-????????????????????????????????????</option>
                                                    <option value="13">TBANK-???????????????</option>
                                                    <option value="14">STANDARD-??????????????????????????????????????????</option>
                                                    <option value="15">GHB-??????????????????????????????????????????</option>
                                                    <option value="16">LHBANK-??????????????? ??????????????? ?????????</option>
                                                    <option value="17">GSB-??????????????????</option>
                                                    <option value="18">BAAC-??????????????????????????????????????????</option>
                                                    <option value="19">iBank-??????????????????????????????????????????</option>
                                                    <option value="20">CIMB-???????????????????????????????????????</option>
                                                    <option value="21">TRUEW-??????????????????????????????</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">username :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="text" class="form-control" id="username" name="username" value="xxxxxxxxxx" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">password :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="text" class="form-control" id="password" name="password"  value="xxxxxxxxxx" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="message-text" class="col-form-label col-md-3 col-sm-3">?????????????????? :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <select class="form-select" aria-label="Default select example" name="edittype" id="edittype">
                                                    <option value="1">?????????</option>
                                                    <option value="2">?????????</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="recipient-name" class="col-form-label col-md-3 col-sm-3">name in pm2 :</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="text" class="form-control" id="name_processlist" name="name_processlist">
                                                <input type="hidden" class="form-control" id="bank_web_id" name="bank_web_id">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onClick="form_editBank()">??????????????????</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">??????????????????</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div><!-- end col-->

    <div class="modal-busy" id="loader" style="display: none">
        <div class="center-busy" id="test-git">
            <img alt="" src="<?php echo base_url(); ?>/assets/images/ZZ5H.gif" />
        </div>
    </div>

    <script>
        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';


      

        function editDataBank(bank_web_id,id,name, acc, bank, type, name_process) {
            $('#editDatabank').modal('show');
            $('#editname').val(name);
            $('#editaccount').val(acc);
            $('#edittype').val(type);
            $('#editbank_id').val(bank);
            $('#bank_web_id').val(bank_web_id);
            $('#editid').val(id);
            $('#name_processlist').val(name_process);

        }
        function form_editBank(){
           var data =  $('#Editform_bank').serializeArray();
           $.ajax({
                    url: '<?php echo base_url('/bank_auto/editBankAuto') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {data:data ,[csrfName]: csrfHash},
                }).done(function(res) {
                    console.log(res);
                    var re = JSON.parse(res);
                    if(re.status == true){
                        ModalBox(re.msg,"success");
                        setTimeout((function() {
                        window.location.reload();
                        }), 500);
                    }else{
                        ModalBox(re.msg,"error");
                        setTimeout((function() {
                        window.location.reload();
                        }), 500);
                    }
                })
                .fail(function() {
                    ModalBox("???????????????????????????????????????????????????????????????????????????????????? ????????????????????????????????????????????????????????????","error");
                });
        }
        function ModalBox(msg,icon){
                 Swal.fire({
                            icon: icon,
                            title: msg,
                            showConfirmButton: false,
                        });
        }
        function StatusSystem(bank_short, i, id, status, id_acc, bank_web_id) {
            const playButton = document.querySelector('#enable' + i);
            const colorButton = document.querySelector('#color' + i);
            $.ajax({
                url: "<?php echo base_url('/bank_auto/changeStatusProcesslist') ?>",
                type: 'POST',
                data: {
                    id: id,
                    status: status,
                    bank_short: bank_short,
                    id_acc: id_acc,
                    bank_web_id: bank_web_id,
                    [csrfName]: csrfHash,
                },
                dataType: "json",
                success: function(res) {
                    var re = JSON.parse(res);
                    if (re.status == true) {
                        if (playButton.classList[2] == null) {
                            playButton.classList.add('button--active');
                            colorButton.classList.remove('btn-success');
                            colorButton.classList.add('btn-danger');
                            Swal.fire({
                                icon: 'success',
                                title: re.msg,
                                showConfirmButton: false,
                                timer: 1000
                            }).then(result => {
                                location.reload();
                            });
                        } else {
                            playButton.classList.remove('button--active');
                            colorButton.classList.remove('btn-danger');
                            colorButton.classList.add('btn-success');
                            Swal.fire({
                                icon: 'success',
                                title: re.msg,
                                showConfirmButton: false,
                                timer: 1000
                            }).then(result => {
                                location.reload();
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "???????????????????????????????????????????????????????????????????????????????????? ????????????????????????????????????????????????????????????",
                            showConfirmButton: false,
                        });
                    }
                }
            });
        }

        function add_bank() {
            $('#exampleModal').modal('show');
        }

        function form_createBank() {
            var data = $('#form_bank').serializeArray();
            $.ajax({
                    url: '<?php echo base_url('/bank_auto/createBankAuto') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: data
                }).done(function(res) {
                    var re = JSON.parse(res);
                    if (re.status == true) {
                        Swal.fire({
                            icon: "success",
                            title: re.msg,
                            showConfirmButton: true,
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: re.msg,
                            showConfirmButton: false,
                        })
                    }
                })
                .fail(function() {
                    Swal.fire({
                        icon: "error",
                        title: "???????????????????????????????????????????????????????????????????????????????????? ????????????????????????????????????????????????????????????",
                        showConfirmButton: false,
                    });
                });
        }

        function edit_statusBank(id, bank_web_id, status) {

            var message, statusBankweb;
            if (status == 0) {
                message = '????????????????????????????????????????????????????????? ?';
                statusBankweb = 0;
            } else if (status == 1) {
                message = '???????????????????????????????????????????????????????????? ?';
                statusBankweb = 3;
            } else if (status == 4) {
                message = '?????????????????????????????????????????????????????? ?';
                statusBankweb = 4;
            }
            Swal.fire({
                title: message,
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonColor: "#f1556c",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url('/bank_auto/changeStatusBank') ?>",
                        type: 'POST',
                        data: {
                            id: id,
                            bank_web_id: bank_web_id,
                            status: status,
                            statusBankweb: statusBankweb,
                            [csrfName]: csrfHash,
                        },
                        dataType: "json",
                        success: function(res) {
                            var re = JSON.parse(res);
                            if (re.status == true) {
                                Swal.fire({
                                        icon: 'success',
                                        title: re.msg,
                                        showConfirmButton: false,
                                        timer: 1600
                                    })
                                    .then((result) => {
                                        location.reload();
                                    })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: re.msg,
                                    showConfirmButton: false,
                                    timer: 1600
                                })
                            }
                        }
                    });
                    // Swal.fire('??????????????????', '', 'success').then((result) => { location.reload(); })
                } else if (result.isDenied) {
                    Swal.fire('?????????????????????????????????????????? ????????????????????????????????????????????????????????????', '', 'info')
                }
            })
        }
    </script>
    <?php $this->endSection(); ?>