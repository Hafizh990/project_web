 <!-- start page content wrapper-->
 <div class="page-content-wrapper">
     <div class="page-content">
         <div class="row">
             <div class="col-12 col-lg-12 mx-auto">
                 <font color="#9932CC">
                     <h6 class="mb-0 text-uppercase">Riwayat Transaksi Pesanan</h6>
                 </font>
                 <hr>
                 <?php foreach ($historypesanan as $value) : ?>
                     <div class="card radius-10 bg-info">
                         <div class="card-body text-white">
                             <div class="d-flex align-items-center">
                                 <div class="flex-grow-1 ms-3">
                                     <p class="mb-0"><?php echo date('d F Y, h:i:s', strtotime($value->created_at));  ?></p>
                                     <h6 class="mt-2">ID Pesanan &nbsp;: <?php echo $value->no_pesanan ?> - <?php echo $value->nama_customer ?></h6>
                                     <h6 class="mt-2">Driver &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $value->nama_driver ?></h6>
                                     <h6 class="mt-2">Kendaraan &nbsp;&nbsp;: <?php echo $value->merk ?> (<?php echo $value->no_pol ?>)</h6>
                                     <h6 class="mt-2">Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo number_format($value->discount) ?></h6>
                                     <h6 class="mt-2">Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo number_format($value->harga) ?></h6>
                                     <hr>
                                     <h6 class="mb-2 text-primary">Rp <?php echo number_format($value->total_amount) ?></h6>
                                     <h6>
                                         <?php
                                            if ($value->status == 0) {
                                                echo "Sedang Menunggu Driver";
                                            } else if ($value->status == 1) {
                                                echo "<i class='fadeIn animated bx bx-check-circle'></i> Transaksi Pesanan Berhasil";
                                            } else {
                                                echo "Transaksi Pesanan Batal";
                                            }
                                            ?>
                                     </h6>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>
             </div>
         </div>
     </div>
 </div>