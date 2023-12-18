<!doctype html>
<html lang="en" class="light-theme">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- loader-->
     <link href="<?= base_url('assets/admin') ?>/css/pace.min.css" rel="stylesheet" />
     <script src="<?= base_url('assets/admin') ?>/js/pace.min.js"></script>

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
                         <a href="javascript:;"><img src="<?= base_url('assets/admin') ?>/images/logoo.png" width="140" alt="" /></a>
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                         </button>
                    </div>
               </nav>
          </header>
          <div class="container">
               <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-7 mx-auto mt-5">
                         <div class="card radius-10">
                              <div class="card-body p-4">
                                   <div class="text-center">
                                        <div class="position-relative border-bottom my-3">
                                             <div class="position-absolute seperator translate-middle-y"><strong>SSO | MASUK</strong></div>
                                        </div>
                                        <p>Silahkan masukan akun yang telah terdaftar!</p>
                                   </div>
                                   <form action="<?= site_url('customer/register') ?>" method="post" class="form-body row g-3 mt-2">
                                        <div class="col-12">
                                             <label for="inputEmail" class="form-label">No Identitas Kependudukan (KTP)</label>
                                             <input type="number" name="no_ktp" value="<?= set_value('no_ktp'); ?>" class="form-control" id="email">
                                             <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-12">
                                             <label for="inputEmail" class="form-label">Nama Lengkap</label>
                                             <input type="text" name="nama_customer" value="<?= set_value('nama_customer'); ?>" class="form-control" id="email">
                                             <?= form_error('nama_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-12">
                                             <label for="inputEmail" class="form-label">Jenis Kelamin</label>
                                             <br>
                                             <input type="radio" name="gender" value="Male"> Laki-laki
                                             <input type="radio" name="gender" value="Female"> Perempuan
                                        </div>
                                        <div class="col-12">
                                             <label for="inputEmail" class="form-label">Nomor Handphone</label>
                                             <input type="text" name="no_hp" value="<?= set_value('no_hp'); ?>" class="form-control" id="email">
                                             <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-12">
                                             <label for="inputEmail" class="form-label">Email Address</label>
                                             <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" id="email">
                                             <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-12">
                                             <label for="inputPassword" class="form-label">Password</label>
                                             <input type="password" name="password" class="form-control" id="password">
                                             <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-12">
                                             <label for="inputPassword" class="form-label">Confirm Password</label>
                                             <input type="password" name="confpassword" class="form-control" id="password">
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
                                                  <button type="submit" class="btn btn-primary">Sign up</button>
                                             </div>
                                        </div>
                                        <div class="col-12 col-lg-12 text-center">
                                             <p class="mb-0">Already an account? <a href="<?= base_url('customer/authcustomer') ?>">Login</a></p>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <footer class="my-5">
               <div class="container">
                    <div class="d-flex align-items-center gap-4 fs-5 justify-content-center social-login-footer">
                         <a href="javascript:;">
                              <ion-icon name="logo-twitter"></ion-icon>
                         </a>
                         <a href="javascript:;">
                              <ion-icon name="logo-linkedin"></ion-icon>
                         </a>
                         <a href="javascript:;">
                              <ion-icon name="logo-github"></ion-icon>
                         </a>
                         <a href="javascript:;">
                              <ion-icon name="logo-facebook"></ion-icon>
                         </a>
                         <a href="javascript:;">
                              <ion-icon name="logo-pinterest"></ion-icon>
                         </a>
                    </div>
               </div>
          </footer>
     </div>
</body>

</html>