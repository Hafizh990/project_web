<!doctype html>
<html lang="en" class="light-theme">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- loader-->
     <link href="<?= base_url('assets/admin') ?>/css/pace.min.css" rel="stylesheet" />
     <script src="<?= base_url('assets/admin') ?>/js/pace.min.js"></script>
     <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/plugins/notifications/css/lobibox.min.css" />

     <!--plugins-->
     <link href="<?= base_url('assets/admin') ?>/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

     <!-- CSS Files -->
     <link href="<?= base_url('assets/admin') ?>/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?= base_url('assets/admin') ?>/css/bootstrap-extended.css" rel="stylesheet">
     <link href="<?= base_url('assets/admin') ?>/css/style.css" rel="stylesheet">
     <link href="<?= base_url('assets/admin') ?>/css/icons.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

     <title>CV. Go-Trash</title>
</head>

<body>

     <!--start wrapper-->
     <div class="wrapper">
          <header>
               <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-3">
                    <div class="container-fluid">
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                         </button>
                    </div>
               </nav>
          </header>
          <div class="container">
               <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
                         <div class="card radius-10">
                              <div class="card-body p-4">
                                   <div class="text-center">
                                        <div class="position-relative border-bottom my-3">
                                             <div class="position-absolute seperator translate-middle-y"><strong>SSO | MASUK</strong></div>
                                        </div>
                                        <p>Silahkan masukan akun yang telah terdaftar!</p>
                                   </div>
                                   <form action="<?= site_url('driver/authdriver') ?>" method="post" class="form-body row g-3 mt-2" enctype="multipart/form-data">
                                        <div class="col-12">
                                             <label for="inputEmail" class="form-label">Email Address</label>
                                             <input type="email" name="email" class="form-control" id="email">
                                        </div>
                                        <div class="col-12">
                                             <label for="inputPassword" class="form-label">Password</label>
                                             <input type="password" name="password" class="form-control" id="password">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">
                                                  <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                                             </div>
                                        </div>
                                        <div class="col-12 col-lg-6 text-end">
                                             <a href="javascript:void(0);">Forgot Password?</a>
                                        </div>
                                        <div class="col-12 col-lg-12">
                                             <div class="d-grid">
                                                  <button type="submit" class="btn btn-primary">Sign In</button>
                                             </div>
                                        </div>
                                        <div class="col-12 col-lg-12 text-center">
                                             <p class="mb-0">Don't have an account? <a href="<?= base_url('driver/register') ?>">Sign up</a></p>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- JS Files-->
          <script src="<?= base_url('assets/admin') ?>/js/jquery.min.js"></script>
          <script src="<?= base_url('assets/admin') ?>/plugins/simplebar/js/simplebar.min.js"></script>
          <script src="<?= base_url('assets/admin') ?>/plugins/metismenu/js/metisMenu.min.js"></script>
          <script src="<?= base_url('assets/admin') ?>/js/bootstrap.bundle.min.js"></script>
          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <!--plugins-->
          <script src="<?= base_url('assets/admin') ?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
          <script src="<?= base_url('assets/admin') ?>/plugins/chartjs/chart.min.js"></script>
          <script src="<?= base_url('assets/admin') ?>/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
          <script src="<?= base_url('assets/admin') ?>/js/index2.js"></script>
          <!--notification js -->
          <script src="<?= base_url('assets/admin') ?>/plugins/notifications/js/lobibox.min.js"></script>
          <script src="<?= base_url('assets/admin') ?>/plugins/notifications/js/notifications.min.js"></script>
          <script src="<?= base_url('assets/admin') ?>/plugins/notifications/js/notification-custom-script.js"></script>
          <!-- Main JS-->
          <script src="<?= base_url('assets/admin') ?>/js/main.js"></script>
          <script>
               $(window).on('load', function() {
                    let pesan = "<?= $this->session->flashdata('failed'); ?>";
                    if (pesan) {
                         Lobibox.notify('error', {
                              pauseDelayOnHover: true,
                              size: 'mini',
                              rounded: true,
                              icon: 'bx bx-x-circle',
                              delayIndicator: false,
                              continueDelayOnInactiveTab: false,
                              position: 'top center',
                              msg: pesan,
                              delay: 4000
                         });
                    }
               });
          </script>

          <script>
               $(window).on('load', function() {
                    let pesan = "<?= $this->session->flashdata('waiting'); ?>";
                    if (pesan) {
                         Lobibox.notify('info', {
                              pauseDelayOnHover: false,
                              size: 'mini',
                              rounded: true,
                              icon: 'bx bx-info-circle',
                              delayIndicator: false,
                              continueDelayOnInactiveTab: false,
                              position: 'top center',
                              msg: pesan,
                              delay: 4000
                         });
                    }
               });
          </script>
</body>

</html>