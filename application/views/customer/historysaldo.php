 <!-- start page content wrapper-->
 <div class="page-content-wrapper">
     <!-- start page content-->
     <div class="page-content">

         <div class="row">
             <div class="col-12 col-lg-12 mx-auto">
                 <font color="#9932CC">
                     <h6 class="mb-0 text-uppercase">Riwayat Isi Ulang Saldo</h6>
                 </font>
                 <hr>
                 <?php foreach ($historysaldo as $value) : ?>
                     <div class="card radius-10 bg-info">
                         <div class="card-body text-white">
                             <div class="d-flex align-items-center">
                                 <div class="flex-grow-1 ms-3">
                                     <p class="mb-0"><?php echo date('d F Y, h:i:s', strtotime($value->topup_at));  ?></p>
                                     <h6 class="mt-2"><?php echo $value->no_ktp ?> - <?php echo $value->nama_customer ?></h6>
                                     <hr>
                                     <h6 class="mb-2 text-primary">Rp <?php echo number_format($value->jumlah) ?></h6>
                                     <h6>Isi Ulang Saldo Berhasil</h6>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>