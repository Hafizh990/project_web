<div class="page-content-wrapper">
     <!-- start page content-->
     <div class="page-content">
          <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-primary">
               <div class="d-flex align-items-center">
                    <div class="fs-3 text-primary"><ion-icon name="shield-checkmark-sharp"></ion-icon>
                    </div>
                    <div class="ms-3">
                         <div class="text-primary">Halo, <b><?php echo $this->session->userdata('nama_driver') ?></b> Welcome To GoTrash, Berikan pelayanan yang terbaik untuk para pelanggan!</div>
                    </div>
               </div>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <!--end breadcrumb-->

          <!--start shop area-->
          <section class="shop-page">
               <div class="shop-container">
                    <div class="card shadow-sm border-0">
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-12 col-xl-12">
                                        <div class="product-wrapper">
                                             <div class="col-12 mt-4">
                                                  <div class="card radius-10">
                                                       <form method="post" action="<?php echo site_url('driver/dashboard') ?>">
                                                            <div class="row g-3">
                                                                 <div class="col-12 col-lg-10 d-flex">
                                                                      <select class="single-select w-100" name="no_pesanan" id="id_customer">
                                                                           <option value="">Select Customer</option>
                                                                           <?php foreach ($orderid as $order) : ?>
                                                                                <option value="<?php echo $order->no_pesanan; ?>" <?php if ($this->input->post('no_pesanan') == $order->no_pesanan) {
                                                                                                                                       echo 'selected';
                                                                                                                                  } ?>>
                                                                                     <?php echo $order->no_pesanan; ?>
                                                                                </option>
                                                                           <?php endforeach; ?>
                                                                      </select>
                                                                 </div>
                                                                 <div class="col-12 col-lg">
                                                                      <button type="submit" class="btn btn-primary" style="float: left;">Search</button>
                                                                 </div>
                                                       </form>
                                                  </div>
                                             </div>


                                             <?php foreach ($pesanan as $value) : ?>
                                                  <div class="product-grid">
                                                       <div class="card radius-10">
                                                            <div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
                                                                 <a href="javascript:;">
                                                                      <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                                      </div>
                                                                 </a>
                                                            </div>
                                                            <div class="row g-0">
                                                                 <div class="col-md-8">
                                                                      <div class="card-body">
                                                                           <div class="product-info">
                                                                                <a href="javascript:;">
                                                                                     <p class="product-catergory font-13 mb-1"><?php echo date('d F Y, h:i:s', strtotime($value->created_at));  ?></p>
                                                                                </a>
                                                                                <h6 class="product-name mb-2"><?php echo $value->title ?></h6>
                                                                                <label>ID Pesanan :</label>
                                                                                <p class="card-text"><b><?php echo $value->no_pesanan ?> - <?php echo $value->nama_customer ?></b></p>
                                                                                <label>Lokasi Penjemputan :</label>
                                                                                <p class="card-text">
                                                                                     <b>
                                                                                          <a href="https://www.google.com/maps/place/<?php echo $value->lokasi_jemput ?>" target="_blank">
                                                                                               <?php echo $value->lokasi_jemput ?>
                                                                                          </a>
                                                                                     </b>
                                                                                </p>
                                                                                <label>Lokasi Tujuan :</label>
                                                                                <p class="card-text">
                                                                                     <b>
                                                                                          <a href="https://www.google.com/maps/place/<?php echo $value->lokasi_antar ?>" target="_blank">
                                                                                               <?php echo $value->lokasi_antar ?>
                                                                                          </a>
                                                                                     </b>
                                                                                </p>
                                                                                <hr>
                                                                                <div class="d-flex align-items-center">
                                                                                     <?php if ($value->discount != 0) { ?>
                                                                                          <span class="me-1 text-decoration-line-through"> Rp <?php echo number_format($value->harga) ?></span>
                                                                                     <?php } ?>
                                                                                     <span class="fs-6 text-primary"><b>Rp <?php echo number_format($value->harga - $value->discount) ?></b></span>
                                                                                </div>
                                                                                <div class="product-action mt-2">
                                                                                     <div class="d-flex gap-2">
                                                                                          <?php if ($value->status == '0') { ?>
                                                                                               <a id="terima-pesanan" onclick="konfirmasi('<?php echo $value->no_pesanan; ?>');" class="btn btn-primary btn-ecomm">Terima Pesanan</a>
                                                                                          <?php } ?>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             <?php endforeach; ?>

                                             <?php if (!empty($orders)) : ?>
                                                  <div class="product-grid">
                                                       <div class="card product-card">
                                                            <div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
                                                                 <a href="javascript:;">
                                                                      <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                                      </div>
                                                                 </a>
                                                            </div>
                                                            <div class="row g-0">
                                                                 <div class="col-md-8">
                                                                      <div class="card-body">
                                                                           <div class="product-info">
                                                                                <h6 class="product-name">
                                                                                     <?php
                                                                                     if ($orders->status == 1) {
                                                                                          echo "<span class='alert alert-dismissible fade show py-2 border-0 border-start border-3 border-primary text-primary'><i class='fadeIn animated bx bx-check-circle'></i> Pesanan Selesai</span>";
                                                                                     } else {
                                                                                          echo "<span class='alert alert-dismissible fade show py-2 border-0 border-start border-3 border-danger text-danger'><i class='fadeIn animated bx bx-x-circle'></i> Pesanan Batal</span>";
                                                                                     }
                                                                                     ?>
                                                                                </h6>
                                                                                <a href="javascript:;">
                                                                                     <p class="product-catergory font-13 mb-1 mt-4"><?php echo date('d F Y, h:i:s', strtotime($orders->created_at));  ?></p>
                                                                                </a>
                                                                                <h6 class="product-name mb-2"><?php echo $orders->title ?></h6>
                                                                                <label>ID Pesanan :</label>
                                                                                <p class="card-text"><b><?php echo $orders->no_pesanan ?> - <?php echo $orders->nama_customer ?></b></p>
                                                                                <label>Lokasi Penjemputan :</label>
                                                                                <p class="card-text">
                                                                                     <b>
                                                                                          <a href="https://www.google.com/maps/place/<?php echo $orders->lokasi_jemput ?>" target="_blank">
                                                                                               <?php echo $orders->lokasi_jemput ?>
                                                                                          </a>
                                                                                     </b>
                                                                                </p>
                                                                                <label>Lokasi Tujuan :</label>
                                                                                <p class="card-text">
                                                                                     <b>
                                                                                          <a href="https://www.google.com/maps/place/<?php echo $orders->lokasi_antar ?>" target="_blank">
                                                                                               <?php echo $orders->lokasi_antar ?>
                                                                                          </a>
                                                                                     </b>
                                                                                </p>
                                                                                <hr>
                                                                                <div class="d-flex align-items-center">
                                                                                     <?php if ($orders->discount != 0) { ?>
                                                                                          <span class="me-1 text-decoration-line-through"> Rp <?php echo number_format($orders->harga) ?></span>
                                                                                     <?php } ?>
                                                                                     <span class="fs-6 text-primary"><b>Rp <?php echo number_format($orders->harga - $orders->discount) ?></b></span>
                                                                                </div>

                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             <?php else : ?>
                                                  <p>Tidak ada data yang ditemukan</p>
                                             <?php endif; ?>

                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
     </div>
</div>