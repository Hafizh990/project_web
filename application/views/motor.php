  <section class="section-padding">
       <div class="container">
            <div class="row">
                 <div class="col-lg-12 col-12 text-center mb-4">
                      <h2>Transportasi Motor Roda Tiga</h2><small>
                           <font color="gray">Ke mana pun kamu mau pergi, Ayo kami antar ke sana!</font>
                      </small>
                 </div>
                 <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                      <div class="custom-block-wrap">
                           <img src="<?= base_url('assets') ?>/images/Roda3.jpg" class="custom-block-image img-fluid" alt="">

                           <div class="custom-block">
                                <div class="custom-block-body">
                                     <?php foreach ($paket as $value) : ?>
                                          <h5 class="mb-3"> <?php echo $value->title ?></h5>

                                          <p><?php echo $value->keterangan ?></p>

                                          <div class="progress mt-4">
                                               <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>

                                          <div class="d-flex align-items-center my-2">
                                               <p class="mb-0">
                                                    Rp <?php echo number_format($value->harga) ?> / (km)
                                               </p>
                                               <p class="ms-auto mb-0">
                                                    <?php
                                                       $pickup_time = 12;
                                                       $formatted_time = min($pickup_time, 5) . ($pickup_time % 5 == 0 ? "" : " Menit");
                                                       echo $formatted_time;
                                                       ?>
                                               </p>
                                          </div>
                                </div>

                                <a href="<?= base_url('customer/authcustomer') ?>"></a>
                           </div>
                      </div>
                 </div>
            <?php endforeach; ?>

            </div>
       </div>
  </section>