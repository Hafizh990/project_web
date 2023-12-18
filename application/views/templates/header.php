<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <meta name="description" content="">
     <meta name="author" content="">

     <title>CV. Go-Trash</title>

     <!-- CSS FILES -->
     <link href="<?= base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">

     <link href="<?= base_url('assets') ?>/css/bootstrap-icons.css" rel="stylesheet">

     <link href="<?= base_url('assets') ?>/css/templatemo-kind-heart-charity.css" rel="stylesheet">
</head>

<body id="section_1">

     <header class="site-header">
          <div class="container">
               <div class="row">

                    <div class="col-lg-8 col-12 d-flex flex-wrap">
                         <p class="d-flex me-4 mb-0">
                              <i class="bi-geo-alt me-2"></i>
                              Jl. Ir. Haji Juanda No.17, Sarimulya, Kec. Kota Baru, Karawang, Jawa Barat 41374
                         </p>
                    </div>
               </div>
          </div>
     </header>

     <nav class="navbar navbar-expand-lg bg-light shadow-lg">
          <div class="container">
               <a class="navbar-brand" href="index.html">
                    <img src="<?= base_url('assets') ?>/images/logo1.png" class="logo img-fluid" alt="Kind Heart Charity">
                    <span>
                         Go-Trash
                         <small>Non-profit Organization</small>
                    </span>
               </a>

               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                              <a href="<?= base_url('dashboard') ?>" class="nav-link">Beranda</a>
                         </li>
                         <li class="nav-item">
                              <a href="<?= base_url('#bar') ?>" class="nav-link">Lokasi</a>
                         </li>
                         <li class="nav-item ms-3">
                              <div class="dropdown">
                                   <a href="javascript:void(0);" class="nav-link custom-btn custom-border-btn btn dropdown-toggle" data-toggle="dropdown">Masuk</a>
                                   <div class="dropdown-menu">
                                        <a href="<?= base_url('customer/authcustomer') ?>" class="dropdown-item">Customer</a>
                                        <a href="<?= base_url('driver/authdriver') ?>" class="dropdown-item">Driver</a>
                                        
                                   </div>
                              </div>
                         </li>
                         <div class="footer-left">
                    </ul>
               </div>
          </div>
     </nav>