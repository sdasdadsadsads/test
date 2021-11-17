<?php $this->extend('template/head_login'); ?>

<?php $this->section('content'); ?>

<body class="loading authentication-bg authentication-bg-pattern">

  <div class="account-pages mt-5 mb-5">
    <div class="container" style="margin-top: 200px;">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card bg-pattern">

            <div class="card-body p-4">

              <div class="text-center w-75 m-auto">
                <div class="auth-logo">
                  <a href="" class="logo logo-dark text-center">
                    <span class="logo-lg">
                      <img src="<?php echo base_url(); ?>/assets/images/logo12.png" alt="" height="50">
                    </span>
                  </a>

                  <a href="" class="logo logo-light text-center">
                    <span class="logo-lg">
                      <img src="<?php echo base_url(); ?>/assets/images/logo12.png" alt="" height="50">
                    </span>
                  </a>
                </div>

              </div>


              <form action="#" method="post" id="form">
                <div class="mb-2 mt-2">
                  <label for="emailaddress" class="form-label">ชื่อผู้ใช้</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-text">
                      <i class="icon-user"></i>
                    </div>
                    <input class="form-control" autocomplete="off" name="username" type="text" id="username" required="" placeholder="">
                  </div>
                </div>

                <div class="mb-2">
                  <label for="password" class="form-label">รหัสผ่าน</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-text">
                      <i class="icon-lock"></i>
                    </div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="">
                    <div class="input-group-text" data-password="false">
                      <span class="password-eye"></span>
                    </div>
                  </div>
                </div>

                <div class="mb-4">
                  <label for="" class="form-label">SafeCode</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-text">
                      <i class="icon-key"></i>
                    </div>
                    <input class="form-control" autocomplete="off" type="text" name="safecode" id="safecode" required="" placeholder="">
                  </div>
                </div>


                <div class="text-center d-grid">
                  <button class="btn btn-success" onclick="auth(this , event)"> เข้าสู่ระบบ </button>
                </div>


                <div class="mb-3">
                  <p class="text-muted mb-4 mt-3" style="text-align:center;">ในกรณีลูกค้าลืมรหัสผ่านหรือไม่สามารถเข้าสู่ระบบได้ <br> ให้ติดต่อพนักงาน</p>
                </div>



              </form>




            </div> <!-- end card-body -->
          </div>
          <!-- end card -->



        </div> <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end page -->
  <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <form action="<?= base_url('auth/auth2FT') ?>" method="post">
            <?= csrf_field() ?>

            <input type="hidden" name="username" id="username1" />
            <input type="hidden" name="password" id="password1" />
            <input type="hidden" name="safecode" id="safecode1" />


            <div class="mb-2">
              <p class="text-center h3">Two Factor</p>
              <br>
              <div class="input-group input-group-merge">
                <div class="input-group-text">
                  <i class="icon-lock"></i>
                </div>
                <input class="form-control" autocomplete="off" name="pin" type="text" id="pin" required="" placeholder="">
              </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary" type="submit">เข้าสู่ระบบ</button>
            </div>

          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>


  <footer class="footer footer-alt">
    2021 - <script>
      document.write(new Date().getFullYear())
    </script> &copy; 12iwinR
  </footer>


  <script type="text/javascript">
    function auth(elem, e) {
      e.preventDefault()

      sessionStorage.setItem("username", $("#username").val());
      sessionStorage.setItem("password", $("#password").val());
      sessionStorage.setItem("safecode", $("#safecode").val());


      $.ajax({
        url: "<?php echo base_url('auth/auth') ?>",
        type: "POST",
        data: $('#form').serialize(),
        dataType: "json",
        success: function(body) {
          const myObj = JSON.parse(body);
          if (myObj.code == 0) {

            Swal.fire({
              icon: "error",
              title: myObj.msg,
              showConfirmButton: false,
              timer: 1400
            });
            // window.setTimeout(function() {
            //   location.reload()
            // }, 2000)

          } else {

            if (myObj.scan2FT == true) {

              $('#modal_form').modal('show');

              var u = sessionStorage.getItem("username");
              var p = sessionStorage.getItem("password");
              var s = sessionStorage.getItem("safecode");

              $('[id="username1"]').val(u);
              $('[id="password1"]').val(p);
              $('[id="safecode1"]').val(s);

              document.getElementById("pin").click();

            } else if (myObj.scan2FT == false) {

              window.location.replace("<?php echo base_url('auth/scan2FT') ?>")

            }

          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: "error",
            title: "เกิดข้อผิดพลาดในการส่งข้อมูล กรุณาแจ้งเจ้าหน้าที่",
            showConfirmButton: false,
            timer: 1400
          })
        }
      });

    }
  </script>

  <?php $this->endSection(); ?>