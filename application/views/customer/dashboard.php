<!-- start page content wrapper-->
<div class="page-content-wrapper">
     <!-- start page content-->
     <div class="page-content">

          <!--start breadcrumb-->
          <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-primary">
               <div class="d-flex align-items-center">
                    <div class="fs-3 text-primary"> <ion-icon name="shield-checkmark-sharp"></ion-icon>
                    </div>
                    <div class="ms-3">
                         <div class="text-primary">Halo, <b><?php echo $this->session->userdata('nama_customer') ?></b> Welcome To GoTrash, Silahkan lengkapi kebutuhan operasional anda.</div>
                    </div>
               </div>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          <div class="row row-cols-1 row-cols-md-12 row-cols-xl-12 row-cols-xxl-3">
               <div class="col">
                    <div class="card radius-10 
                    <?php if ($saldo->jumlah > 5000) {
                         echo 'bg-light-primary';
                    } else {
                         echo 'bg-light-pink';
                    } ?>">
                         <div class="card-body">
                              <div class="d-flex align-items-center">
                                   <div class=" 
                                   <?php if ($saldo->jumlah > 5000) {
                                        echo 'text-primary';
                                   } else {
                                        echo 'text-pink';
                                   } ?>">
                                        <p>
                                             <b>INFORMASI SALDO ANDA SAAT INI :</b> Rp <?php echo number_format($saldo->jumlah); ?>
                                             <hr>
                                             <?php if ($saldo->jumlah > 5000) {
                                                  echo 'Selamat saldo anda mencukupi untuk melakukan pesanan';
                                             } else {
                                                  echo 'Silahkan isi ulang saldo kamu agar bisa melakukan pesanan!';
                                             } ?>
                                        </p>
                                   </div>
                                   <div class="ms-auto fs-2 
                                   <?php if ($saldo->jumlah > 5000) {
                                        echo 'text-primary';
                                   } else {
                                        echo 'text-pink';
                                   } ?>">
                                        <ion-icon name="wallet-outline"></ion-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <!--end breadcrumb-->

          <!--start shop area-->
          <section class="shop-page">
               <div class="shop-container">
                    <div class="card shadow-sm border-0">
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-12">
                                        <div class="card radius-10">
                                             <div class="card-body">
                                                  <div class="toolbox d-flex flex-row align-items-center gap-2">
                                                       <div class="d-flex align-items-center flex-nowrap">
                                                            <p class="mb-0 font-15 text-nowrap"><b>
                                                                      <font color="#9932CC">PILIHAN KATEGORI MOTOR RODA TIGA</font>
                                                                 </b>
                                                            </p>
                                                            <!-- <select class="form-select ms-3" onchange="filter_paket()">
                                                                 <option value="Motor" selected="selected">Ojek Motor</option>
                                                                 <option value="Mobil">Ojek Mobil</option>
                                                            </select> -->
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>

                                   <div id="paket-data" class="col-12 col-xl-12">
                                        <div class="product-wrapper">
                                             <div class="product-grid">
                                                  <div class="row d-flex row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                                                       <?php foreach ($paket as $value) : ?>
                                                            <div class="col">
                                                                 <div class="card radius-10">
                                                                      <div class="card-header bg-transparent border-bottom-0">
                                                                           <div class="d-flex align-items-center justify-content-end">
                                                                                <a href="javascript:;">
                                                                                     <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                                                     </div>
                                                                                </a>
                                                                           </div>
                                                                      </div>

                                                                      <?php
                                                                      if ($value->jenis == "Mobil") {
                                                                           echo '<center><img src="' . base_url() . 'assets/images/MobiT.jpg" width="75%" height="56%" class="custom-block-image img-fluid" alt=""></center>';
                                                                      } else {
                                                                           echo '<img src="' . base_url() . 'assets/images/Motor3.jpg" width="75%" height="100%" class="custom-block-image img-fluid" alt="">';
                                                                      }
                                                                      ?>

                                                                      <div class="card-body">
                                                                           <div class="product-info">
                                                                                <a href="javascript:;">
                                                                                     <p class="product-catergory font-13 mb-1 text-center"><b>
                                                                                               <font color="orange"><?php echo $value->title ?></font>
                                                                                          </b></p>
                                                                                </a>
                                                                                <a href="javascript:;">
                                                                                     <h6 class="product-name mb-2 text-center"><?php echo $value->keterangan ?></h6>
                                                                                </a>
                                                                                <div class="d-flex align-items-center">
                                                                                     <div class="mb-1 product-price">
                                                                                          <?php if ($value->discount != 0) { ?>
                                                                                               <span class="me-1 text-decoration-line-through"> Rp <?php echo number_format($value->harga) ?></span>
                                                                                          <?php } ?>
                                                                                          <span class="fs-6"><b>Rp <?php echo number_format($value->harga - $value->discount) ?></b></span>
                                                                                     </div>
                                                                                     <div class="cursor-pointer ms-auto">
                                                                                          <i class="fadeIn animated bx bx-street-view"></i>
                                                                                          <?php
                                                                                          $pickup_time = 12;
                                                                                          $formatted_time = min($pickup_time, 5) . ($pickup_time % 5 == 0 ? "" : " Menit");
                                                                                          echo $formatted_time;
                                                                                          ?>
                                                                                     </div>
                                                                                </div>
                                                                                <div class="product-action mt-2">
                                                                                     <div class="d-grid">
                                                                                          <a href="<?= base_url('customer/pesanan/tambah_pesanan/' . $value->id_paket) ?>" class="btn btn-primary btn-ecomm"><i class="bx bxs-archive"></i>Pesan Sekarang</a>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       <?php endforeach; ?>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>

                              </div><!--end row-->
                         </div>
                    </div>
               </div>
          </section>
          <!--end shop area-->

          <!--start shop area-->
          <section class="shop-page">
               <div class="shop-container">
                    <div class="card shadow-sm border-0">
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-12">
                                        <div class="card radius-10">
                                             <div class="card-body">
                                                  <div class="toolbox d-flex flex-row align-items-center gap-2">
                                                       <div class="d-flex align-items-center flex-nowrap">
                                                            <p class="mb-0 font-15 text-nowrap"><b>
                                                                      <font color="#9932CC">PILIHAN KATEGORI MOBIL</font>
                                                                 </b>
                                                            </p>
                                                            <!-- <select class="form-select ms-3" onchange="filter_paket()">
                                                                 <option value="Motor" selected="selected">Ojek Motor</option>
                                                                 <option value="Mobil">Ojek Mobil</option>
                                                            </select> -->
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>


                                   <div id="paket-data" class="col-12 col-xl-12">
                                        <div class="product-wrapper">
                                             <div class="product-grid">
                                                  <div class="row d-flex row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                                                       <?php foreach ($paket2 as $value) : ?>
                                                            <div class="col">
                                                                 <div class="card radius-10">
                                                                      <div class="card-header bg-transparent border-bottom-0">
                                                                           <div class="d-flex align-items-center justify-content-end">
                                                                                <a href="javascript:;">
                                                                                     <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                                                     </div>
                                                                                </a>
                                                                           </div>
                                                                      </div>

                                                                      <?php
                                                                      if ($value->jenis == "Mobil") {
                                                                           echo '<center><img src="' . base_url() . 'assets/images/MobiT.jpg" width="75%" height="56%" class="custom-block-image img-fluid" alt=""></center>';
                                                                      } else {
                                                                           echo '<img src="' . base_url() . 'assets/images/Motor3.jpg" width="75%" height="100%" class="custom-block-image img-fluid" alt="">';
                                                                      }
                                                                      ?>

                                                                      <div class="card-body">
                                                                           <div class="product-info">
                                                                                <a href="javascript:;">
                                                                                     <p class="product-catergory font-13 mb-1 text-center"><b>
                                                                                               <font color="orange"><?php echo $value->title ?></font>
                                                                                          </b></p>
                                                                                </a>
                                                                                <a href="javascript:;">
                                                                                     <h6 class="product-name mb-2 text-center"><?php echo $value->keterangan ?></h6>
                                                                                </a>
                                                                                <div class="d-flex align-items-center">
                                                                                     <div class="mb-1 product-price">
                                                                                          <?php if ($value->discount != 0) { ?>
                                                                                               <span class="me-1 text-decoration-line-through"> Rp <?php echo number_format($value->harga) ?></span>
                                                                                          <?php } ?>
                                                                                          <span class="fs-6"><b>Rp <?php echo number_format($value->harga - $value->discount) ?></b></span>
                                                                                     </div>
                                                                                     <div class="cursor-pointer ms-auto">
                                                                                          <i class="fadeIn animated bx bx-street-view"></i>
                                                                                          <?php
                                                                                          $pickup_time = 12;
                                                                                          $formatted_time = min($pickup_time, 5) . ($pickup_time % 5 == 0 ? "" : " Menit");
                                                                                          echo $formatted_time;
                                                                                          ?>
                                                                                     </div>
                                                                                </div>
                                                                                <div class="product-action mt-2">
                                                                                     <div class="d-grid">
                                                                                          <a href="<?= base_url('customer/pesanan/tambah_pesanan/' . $value->id_paket) ?>" class="btn btn-primary btn-ecomm"><i class="bx bxs-archive"></i>Pesan Sekarang</a>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       <?php endforeach; ?>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>

                              </div><!--end row-->
                         </div>
                    </div>
               </div>
          </section>
          <!--end shop area-->

     </div>
     <!-- end page content-->
</div>


</div>
<!-- end page content-->
</div>
<!--end page content wrapper-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
     var paket_data = <?php echo json_encode($paket); ?>;

     function filter_paket() {
          var jenis_kendaraan = $('.form-select').val();
          $.ajax({
               type: "POST",
               url: "<?= base_url() ?>customer/filter_paket",
               data: {
                    jenis: jenis_kendaraan
               },
               success: function(response) {
                    var filtered_paket = response;
                    $('#paket-data').empty();
                    filtered_paket.forEach(function(paket) {
                         $('#paket-data').append(
                              '<div class="card mb-3" id="pakutkan- ' + paket.id_paket + '">' +
                              '<div class="card-body">' +
                              '<h5 class="card-title">' + paket.nama_paket + '</h5>' +
                              '<p class="card-text">Harga: ' + paket.harga + '</p>' +
                              '<p class="card-text">Jenis Kendaraan: ' + paket.jenis + '</p>' +
                              '</div>' +
                              '</div>'
                         );
                    });
               }
          });
     }
</script>

<script>
     function filter_paket() {
          var jenis = $('.form-select').val();
          $.ajax({
               url: "<?php echo base_url('customer/dashboard/filter_paket') ?>",
               method: "POST",
               data: {
                    jenis: jenis
               },
               success: function(data) {
                    var paket_data = JSON.parse(data);
                    $('#paket-data').empty();
                    $.each(paket_data, function(i, paket) {
                         $('#paket-data').append(
                              '<div class="col-12 col-xl-12">' +
                              '<div class="product-wrapper">' +
                              '<div class="product-grid">' +
                              '<div class="row d-flex row-cols-md-2 row-cols-lg-3 row-cols-xl-3">' +
                              '<div class="card product-card">' +
                              '<div class="card-header bg-transparent border-bottom-0">' +
                              '<h5 class="card-title">' + paket.title + '</h5>' +
                              '<p class="card-text">Harga: ' + paket.harga + '</p>' +
                              '<p class="card-text">Jenis Kendaraan: ' + paket.jenis + '</p>' +
                              '</div>' +
                              '</div>' +
                              '</div>' +
                              '</div>' +
                              '</div>' +
                              '</div>'
                         );
                    });
               }
          });
     }
</script>