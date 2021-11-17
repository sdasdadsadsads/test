<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo base_url(); ?>/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?php echo base_url(); ?>/assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="<?php echo base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
</head>

<?php $this->renderSection('content'); ?>


<?php if (isset($msg)) : ?>

    <?php foreach ($msg as $msgs) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '<?= esc($msgs) ?>',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php endforeach ?>

<?php endif; ?>


<script>
    <?php if (session()->has("success")) { ?>
        Swal.fire({
            icon: 'success',
            title: '<?= session("success") ?>',
            showConfirmButton: false,
            timer: 2000
        })
    <?php } ?>



    <?php if (session()->has("error")) { ?>
        Swal.fire({
            icon: 'error',
            title: '<?= session("error") ?>',
            showConfirmButton: false,
            timer: 2000
        })
    <?php } ?>
</script>


<!-- Vendor js -->
<script src="<?php echo base_url(); ?>/assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>

</body>

</html>

<?php require 'global_fn.php'; ?>