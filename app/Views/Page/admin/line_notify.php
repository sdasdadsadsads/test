<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
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
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        border: 3px solid #1e90ff;
    }

    .button--play {
        border-radius: 50%;
    }

    .button--play .button__shape {
        width: 8px;
        height: 18px;
        background: #1e90ff;
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

    .bg-success1 {
        background-color: #00ff0ef5 !important;
        color: #1f9c00;
    }

    .btn-scb {
        color: #fff;
        background-color: #a500c3;
        border-color: #9d5ecd;
    }

    .btn-bbl {
        color: #fff;
        background-color: #1c1abc;
        border-color: #3c51eb;
    }

    .btn-kbank {
        color: #fff;
        background-color: #3b911f;
        border-color: #03a945;
    }

    .btn-ktb {
        color: #fff;
        background-color: #0092b3;
        border-color: #4fc6e1;
    }

    .btn-orther {
        color: #fff;
        background-color: #626262a1;
        border-color: #98a6ad;
    }

    .btn-general {
        color: #fff;
        background-color: #eb0000a1;
        border-color: #eb6565;
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
    padding: 3px 7px;
    font-size: 12px;
    line-height: 20px;
    white-space: nowrap;
    background: #d7ffbe;
    border: 1px solid #41d900;
    border-radius: 2px;
    opacity: 1;
    transition: all .3s;
}
.ant-tag-k {
    box-sizing: border-box;
    margin: 0 8px 0 0;
    font-variant: tabular-nums;
    list-style: none;
    font-feature-settings: "tnum","tnum";
    display: inline-block;
    height: auto;
    padding: 3px 7px;
    font-size: 12px;
    line-height: 20px;
    white-space: nowrap;
    background: #62ff00;
    border: 1px solid #4ab71b;
    border-radius: 2px;
    opacity: 1;
    transition: all .3s;
}
.ant-tag-color {
    color: #000000;
    background: #80ff00;
    border-color: #75bd3f;

}
.ant-tag-red {
    color: #cf1322;
    background: #fff1f0;
    border-color: #ffa39e;
}

.btn-vip {
    color: #fff;
    background-color: #ff7c00;
    border-color: #d58a07;
}
.form-switch .form-check-input {
    width: 3.7em;
    height: 1.9em;
    margin-left: -2.5em;
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


    <div class="tab-pane show active" style="margin-top:3rem;" id="today">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <b class="header-title">การเเจ้งเตือน (LINE Notify)</b>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <!-- <button class="btn btn-info" onClick="add_bank()"><i class="fa fa-plus"></i> เพิ่ม</button> -->
                            </div>
                        </div>
                        <p class="text-muted font-13 mb-4">
                            <!-- จำนวนลูกค้าทั้งหมด 24 คน -->
                        </p>
                        <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                            <thead>
                                <tr>
                                    <th class="text-dark">ลำดับ</th>
                                    <th class="text-dark">รายการเเจ้งเตือน</th>
                                    <th class="text-dark">token</th>
                                    <th class="text-dark">เปิด/ปิด การเเจ้งเตือน</th>
                                    <th class="text-dark">เเก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                                if (!empty($data)) {
                                    foreach ($data as $_b => $line) { ?>
                            <tr>
                                 <td><?= $i ?></td>
                                 <td><?= $line['name']; ?></td>
                                 <td><?= $line['token']; ?></td>
                                 <td><div class="form-check form-switch text-center d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" id="Status_notification" onclick="change_status('<?=$line['id']?>','<?=$line['status']?>')"  <?= $line['status'] == 1 ?  'checked' :  ''; ?>>
                                </div></td>
                                 <td><button type="button" class="btn btn-warning waves-effect waves-light" onclick="editDataNotifyModal('<?=$line['id']?>','<?= $line['name']; ?>','<?=$line['token'] ?>');"><i class="mdi mdi-file-document-edit-outline"></i></button></td>
                            </tr>
                            <?php $i++; }} ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div><!-- end col-->
    <div class="modal fade" id="editDataNotifyModal" tabindex="-1" aria-labelledby="editDataNotifyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="editDataNotifyModalLabel">เเก้ไขข้อมูล</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="dataNotify">
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">รายการเเจ้งเตือน:</label>
                <input type="hidden" class="form-control" name="id-notification" id="id-notification">
                <input type="text" class="form-control" name="notification-list" id="notification-list">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Token:</label>
                <textarea class="form-control" name="token" id="token"></textarea>
            </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="senUpdateData()">บันทึก</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
        </div>
        </div>
    </div>
    </div>
    <div class="modal-busy" id="loader" style="display: none">
        <div class="center-busy" id="test-git">
            <img alt="" src="<?php echo base_url(); ?>/assets/images/ZZ5H.gif" />
        </div>
    </div>
    <script>
        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';
        function editDataNotifyModal(id,name,token){
            $('#editDataNotifyModal').modal('show');
            $('#id-notification').val(id);
            $('#notification-list').val(name);
            $('#token').val(token);
        }
        function senUpdateData(){
          var id = $('#id-notification').val();
          var name = $('#notification-list').val();
          var token = $('#token').val();
          $.ajax({
                        url: '<?php echo base_url('/line_notify/updateData') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id:id,
                            name: name,
                            token:token,
                            [csrfName]: csrfHash,
                        }
                    })
                    .done(function(re) {
                        console.log(re);
                        if (re.status == true) {
                            dialogbox(re.msg,"success");
                            setTimeout(() => {
                                location.reload();   
                            }, 500);
                        } else {
                            dialogbox(re.msg,"error");
                            setTimeout(() => {
                                location.reload();   
                            }, 500);
                        }
                    })

        }
        function change_status(id,status){
            $.ajax({
                        url: '<?php echo base_url('/line_notify/change_status') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id:id,
                            status: status,
                            [csrfName]: csrfHash,
                        }
                    })
                    .done(function(re) {
                        console.log(re);
                        if (re.status == true) {
                            dialogbox(re.msg,"success");
                            setTimeout(() => {
                                location.reload();   
                            }, 500);
                        } else {
                            dialogbox(re.msg,"error");
                            setTimeout(() => {
                                location.reload();   
                            }, 500);
                        }
                    })
        }
      
    function dialogbox(msg,icon) {
        Swal.fire({
            icon: icon,
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
    </script>
    <?php $this->endSection(); ?>