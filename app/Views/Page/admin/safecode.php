<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php $this->extend('template/head_admin'); ?>

<?php $this->section('content'); ?>

<?php
$session = session();
if (($session->get("permissions")) != null) {
    $permissionAdmin = ($session->get("permissions"));
} else {
    $permissionAdmin = ["0"];
}

?>


<style>
    table tr {
        text-align: center;
        font-size: 14px;
        vertical-align: middle;
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
        background-color: #ff5d48;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #ff5d48;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .spinners {
        display: inline-block;
        width: 2rem;
        height: 2rem;
        vertical-align: text-bottom;
        background-color: currentColor;
        border-radius: 50%;
        opacity: 0;
    }
</style>
<!-- ============================================================== -->
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
                        <h4 class="page-title">Safe Code</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <!-- <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <form action="#" class="parsley-examples">
                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="mb-3 col-3">
                                                    <label class="form-label">รอบการทำงาน</label>

                                                    <?php if (isset($rounds)) { ?>
                                                        <select id="s_rounds" class="form-select">
                                                            <option value="0">ทั้งหมด</option>
                                                            <?php foreach ($rounds as $r => $re) { ?>
                                                                <option value="<?php echo $re['id']; ?>"><?php echo $re['rounds_desc'] . ' ' . $re['time_start'] . '-' . $re['time_end']; ?></option>
                                                               
                                                            <?php } ?>
                                                        </select>
                                                    <?php    } else { ?>
                                                        <h3 class="text-danger">กรุณากดรีเซ็ตใหม่</h3>
                                                    <?php } ?>
                                                </div>

                                                <div class="mb-3 col-3">

                                                    <label class="form-label mt-2"></label><br>
                                                    <?php if (isset($permissionAdmin)) : ?>
                                                        <?php if ((in_array(29, $permissionAdmin))) { ?>
                                                            <button type="button" class="btn btn-blue waves-effect waves-light">
                                                                Safe Code
                                                            </button>
                                                        <?php } ?>
                                                    <?php endif; ?>

                                                    <?php if (isset($permissionAdmin)) : ?>
                                                        <?php if ((in_array(29, $permissionAdmin))) { ?>
                                                            <button type="button" class="btn btn-blue waves-effect waves-light">
                                                                Logout
                                                            </button>
                                                        <?php } ?>
                                                    <?php endif; ?>
                                                </div>


                                            </div>



                                        </div>
                                    </form>
                                </div> 
                            </div>





                        </div> 
                    </div> -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>ประเภท</th>
                                                <th>Rounds</th>
                                                <th>Status</th>
                                                <th>Safe code </th>
                                                <th>Safe Time</th>
                                                <th>Safe code</th>
                                                <th>ลบ Safecode</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if (isset($admin)) : ?>
                                                <?php $i = 1;
                                                foreach ($admin as $_a => $a) { ?>
                                                    <tr>
                                                        <td><?php echo $i;
                                                            $i++; ?></td>
                                                        <td id="username"><?php echo $a['username']; ?></td>
                                                        <td><?php echo $a['name']; ?></td>
                                                        <td><?= $a['class'] == 0 ? 'หัวหน้าใหญ่' : ($a['class'] == 1 ? 'หัวหน้างาน' : 'พนักงานทั่วไป') ?></td>
                                                        <td><?php echo $a['rounds_desc']; ?></td>
                                                        <td>
                                                            <label class="switch">
                                                                <?php if ($a['safestatus'] == '0') { ?>
                                                                    <input type="checkbox" onclick="open_statussafe(<?= $a['id'] ?>);" id="id" value="<?= $a['safestatus'] ?>" name="<?= $a['safestatus'] ?>" <?= $a['safestatus'] == 0 ? '' : '' ?> />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" onclick="close_statussafe(<?= $a['id'] ?>);" id="id" value="<?= $a['safestatus'] ?>" name="<?= $a['safestatus'] ?>" <?= $a['safestatus'] == 1 ? 'checked' : '' ?> />
                                                                <?php } ?>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>


                                                        <td><?php echo $a['safecode']; ?></td>
                                                        <?php
                                                        $safetime =  $a['safetime'];
                                                        if ($a['safetime'] != "") {
                                                            $safetime = date("d-m-Y H:i:s", $a['safetime']);
                                                        }
                                                        ?>
                                                        <td><?php echo $safetime; ?></td>

                                                        <td class="text-center">
                                                            <?php if ((in_array(29, $permissionAdmin))) { ?>
                                                                <button class="btn btn-info btn-sm" onClick="confrim_gen(<?= $a['id'] ?>)">Safecode</button>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-danger btn-sm" onClick="confrim_delete(<?= $a['id'] ?>)">delete</button>
                                                        </td>

                                                    </tr>
                                                <?php } ?>
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



<script>
    function confrim_gen(id) {
        Swal.fire({
            title: 'คุณต้องการ สร้าง safecode ใช่ไหม?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: "<?php echo base_url('safecode/save_safecode') ?>/" + id,
                        type: "GET",
                        dataType: "JSON",
                    }).done(function(re) {
                        const res = JSON.parse(re);

                        if (res.code == 1) {
                            Swal.fire({
                                icon: "success",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        }
                    })
                    .fail(function() {
                        Swal.fire({
                            icon: "error",
                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                            showConfirmButton: false,
                        });
                        window.setTimeout(function() {
                            location.reload()
                        }, 500)
                    });
            }
        })
    }


    function confrim_delete(id) {
        Swal.fire({
            title: 'คุณต้องการ แตะพนักงานออกจากระบบ ใช่ไหม?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: "<?php echo base_url('safecode/delete_safecode') ?>/" + id,
                        type: "GET",
                        dataType: "JSON",
                    }).done(function(re) {
                        const res = JSON.parse(re);

                        if (res.code == 1) {
                            Swal.fire({
                                icon: "success",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        }
                    })
                    .fail(function() {
                        Swal.fire({
                            icon: "error",
                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                            showConfirmButton: false,
                        });
                        window.setTimeout(function() {
                            location.reload()
                        }, 500)
                    });
            }
        })
    }



    function delete_select() {

        var id = $('#s_rounds').val();

        swal({
                title: "แตะพนักงานออกจากระบบ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "safe_code/delete_select",
                        type: 'post',
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res.code == 1) {
                                swal(res.title, res.msg, 'success')
                                    .then((result) => {
                                        location.reload();
                                    })

                            } else {
                                swal(res.title, res.msg, 'error')
                                    .then((result) => {
                                        location.reload();
                                    })
                            }

                        }
                    });

                } else {
                    return false;
                }
            });
    }

    function gen_select() {
        var id = $('#s_rounds').val();
        swal({
                title: "gen safecode ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "safe_code/gen_select",
                        type: 'post',
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res.code == 1) {
                                swal(res.title, res.msg, 'success')
                                    .then((result) => {
                                        location.reload();
                                    })

                            } else {
                                swal(res.title, res.msg, 'error')
                                    .then((result) => {
                                        location.reload();
                                    })
                            }

                        }
                    });

                } else {
                    return false;
                }
            });
    }

    function open_statussafe(id) {
        Swal.fire({
            title: 'คุณต้องการเปิดใช้งาน Safecode ใช่ไหม?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: "<?php echo base_url('safecode/open_statussafe') ?>/" + id,
                        type: "GET",
                        dataType: "JSON",
                    }).done(function(re) {
                        const res = JSON.parse(re);

                        if (res.code == 1) {
                            Swal.fire({
                                icon: "success",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        }
                    })
                    .fail(function() {
                        Swal.fire({
                            icon: "error",
                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                            showConfirmButton: false,
                        });
                        window.setTimeout(function() {
                            location.reload()
                        }, 500)
                    });
            }
        })
    }


    function close_statussafe(id) {
        Swal.fire({
            title: 'คุณต้องการปิดใช้งาน Safecode ใช่ไหม?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: "<?php echo base_url('safecode/close_statussafe') ?>/" + id,
                        type: "GET",
                        dataType: "JSON",
                    }).done(function(re) {
                        const res = JSON.parse(re);

                        if (res.code == 1) {
                            Swal.fire({
                                icon: "success",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: res.msg,
                                showConfirmButton: false,
                            });
                            window.setTimeout(function() {
                                location.reload()
                            }, 500)
                        }
                    })
                    .fail(function() {
                        Swal.fire({
                            icon: "error",
                            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
                            showConfirmButton: false,
                        });
                        window.setTimeout(function() {
                            location.reload()
                        }, 500)
                    });
            }
        })
    }
</script>


<?php $this->endSection(); ?>