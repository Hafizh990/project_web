<!doctype html>
<html lang="en" class="headercolor8">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- loader-->
     <link href="<?= base_url('assets/admin') ?>/css/pace.min.css" rel="stylesheet" />
     <script src="<?= base_url('assets/admin') ?>/js/pace.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

     <!--plugins-->
     <link href="<?= base_url('assets/admin') ?>/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
     <link href="<?= base_url('assets/admin') ?>/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
     <link href="<?= base_url('assets/admin') ?>/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/plugins/notifications/css/lobibox.min.css" />
     <link href="<?= base_url('assets/admin') ?>/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
     <link href="<?= base_url('assets/admin') ?>/plugins/OwlCarousel/css/owl.carousel.min.css" rel="stylesheet" />

     <!-- CSS Files -->
     <link href="<?= base_url('assets/admin') ?>/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?= base_url('assets/admin') ?>/css/bootstrap-extended.css" rel="stylesheet">
     <link href="<?= base_url('assets/admin') ?>/css/style.css" rel="stylesheet">
     <link href="<?= base_url('assets/admin') ?>/css/icons.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

     <!--Theme Styles-->
     <link href="<?= base_url('assets/admin') ?>/css/dark-theme.css" rel="stylesheet" />
     <link href="<?= base_url('assets/admin') ?>/css/semi-dark.css" rel="stylesheet" />
     <link href="<?= base_url('assets/admin') ?>/css/header-colors.css" rel="stylesheet" />

     <!-- select 2 -->
     <link href="<?= base_url('assets/admin') ?>/plugins/select2/css/select2.min.css" rel="stylesheet" />
     <link href="<?= base_url('assets/admin') ?>/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />

     <title>CV. Go-Trash</title>
</head>

<body>
     <!--start wrapper-->
     <div class="wrapper">
          <!--start sidebar -->
          <aside class="sidebar-wrapper" data-simplebar="true">
               <div class="sidebar-header">
                    <div>
                         <img src="<?= base_url('assets/admin') ?>/images/logo1.png" class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                         <h4 class="logo-text">Go-Trash</h4>
                    </div>
                    <div class="toggle-icon ms-auto"><ion-icon name="menu-sharp"></ion-icon>
                    </div>
               </div>
               <!--navigation-->
               <ul class="metismenu" id="menu">
                    <li>
                         <a href="<?= base_url('superadmin/dashboard') ?>">
                              <div class="parent-icon"><i class="fadeIn animated bx bx-archive"></i>
                              </div>
                              <div class="menu-title">DASHBOARD</div>
                         </a>
                    </li>
                    <li>
                         <a class="has-arrow" href="javascript:;">
                              <div class="parent-icon"><i class="fadeIn animated bx bx-user-plus"></i>
                              </div>
                              <div class="menu-title">CUSTOMER</div>
                         </a>
                         <ul>
                              <li><a href="<?= base_url('superadmin/customer') ?>"><ion-icon name="ellipse-outline"></ion-icon>Data Pribadi</a>
                              </li>
                         </ul>
                    </li>
                    <li>
                         <a class="has-arrow" href="javascript:;">
                              <div class="parent-icon"><i class="fadeIn animated bx bx-group"></i>
                              </div>
                              <div class="menu-title">DRIVER</div>
                         </a>
                         <ul>
                              <li><a href="<?= base_url('superadmin/driver') ?>"><ion-icon name="ellipse-outline"></ion-icon>Data Pribadi</a>
                              </li>
                              <li><a href="<?= base_url('superadmin/kendaraan') ?>"><ion-icon name="ellipse-outline"></ion-icon>Data Kendaraan</a>
                              </li>
                              <li><a href="<?= base_url('superadmin/paket') ?>"><ion-icon name="ellipse-outline"></ion-icon>Paket Harga</a>
                              </li>
                         </ul>
                    </li>
                    <li>
                         <a class="has-arrow" href="javascript:;">
                              <div class="parent-icon"><i class="fadeIn animated bx bx-wallet-alt"></i>
                              </div>
                              <div class="menu-title">TOP-UP SALDO</div>
                         </a>
                         <ul>
                              <li><a href="<?= base_url('superadmin/topup') ?>"><ion-icon name="ellipse-outline"></ion-icon>Isi Ulang Saldo</a>
                              </li>
                         </ul>
                    </li>
                    <li>
                         <a class="has-arrow" href="javascript:;">
                              <div class="parent-icon"><i class="fadeIn animated bx bx-shopping-bag"></i>
                              </div>
                              <div class="menu-title">TRANSACTION</div>
                         </a>
                         <ul>
                              <li><a href="<?= base_url('superadmin/pesanan') ?>"><ion-icon name="ellipse-outline"></ion-icon>Daftar Pesanan</a>
                              </li>
                         </ul>
                    </li>
               </ul>
               <!--end navigation-->
          </aside>
          <!--end sidebar -->
          <!--start top header-->
          <header class="top-header">
               <nav class="navbar navbar-expand gap-3">
                    <div class="mobile-menu-button"><ion-icon name="menu-sharp"></ion-icon></div>
                    <form class="searchbar">
                         <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><ion-icon name="search-sharp"></ion-icon></div>
                         <input class="form-control" type="text" placeholder="Search for anything">
                         <div class="position-absolute top-50 translate-middle-y search-close-icon"><ion-icon name="close-sharp"></ion-icon></div>
                    </form>
                    <div class="top-navbar-right ms-auto">

                         <ul class="navbar-nav align-items-center">
                              <li class="nav-item mobile-search-button">
                                   <a class="nav-link" href="javascript:;">
                                        <div class="">
                                             <ion-icon name="search-sharp"></ion-icon>
                                        </div>
                                   </a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link dark-mode-icon" href="javascript:;">
                                        <div class="mode-icon">
                                             <ion-icon name="moon-sharp"></ion-icon>
                                        </div>
                                   </a>
                              </li>
                              <li class="nav-item dropdown dropdown-user-setting">
                                   <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                                        <div class="user-setting">
                                             <img src="<?= base_url('assets/admin') ?>/images/avatars/06.png" class="user-img" alt="">
                                        </div>
                                   </a>
                                   <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                             <a class="dropdown-item" href="#">
                                                  <div class="d-flex flex-row align-items-center gap-2">
                                                       <img src="<?= base_url('assets/admin') ?>/images/avatars/06.png" alt="" class="rounded-circle" width="54" height="54">
                                                       <div class="">
                                                            <h6 class="mb-0 dropdown-user-name"><?php echo $this->session->userdata('nama_admin') ?></h6>
                                                            <small class="mb-0 dropdown-user-designation text-secondary">Super Admin</small>
                                                       </div>
                                                  </div>
                                             </a>
                                        </li>
                                        <li>
                                             <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                             <a class="dropdown-item" href="<?= base_url('superadmin/authadmin/logout') ?>">
                                                  <div class="d-flex align-items-center">
                                                       <div class=""><ion-icon name="log-out-outline"></ion-icon></div>
                                                       <div class="ms-3"><span>Logout</span></div>
                                                  </div>
                                             </a>
                                        </li>
                                   </ul>
                              </li>

                         </ul>

                    </div>
               </nav>
          </header>
          <!--end top header-->