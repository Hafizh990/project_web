          <!-- start page content wrapper-->
          <div class="page-content-wrapper">
               <!-- start page content-->
               <div class="page-content">
                    <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-primary">
                         <div class="d-flex align-items-center">
                              <div class="fs-3 text-primary"><ion-icon name="shield-checkmark-sharp"></ion-icon>
                              </div>
                              <div class="ms-3">
                                   <div class="text-primary">Halo, <b><?php echo $this->session->userdata('nama_admin') ?></b> welcome to Ngojek Online Transportation, silahkan kelola ekosistem untuk kebutuhan pesanan!</div>
                              </div>
                         </div>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="col-12 mt-4">
                         <div class="card">
                              <div class="card-body">
                                   <form method="post" action="<?php echo site_url('superadmin/dashboard') ?>">
                                        <div class="row g-3">
                                             <div class="col-12 col-lg-10 d-flex">
                                                  <select class="single-select w-100" name="id_customer" id="id_customer">
                                                       <option value="">Select Customer</option>
                                                       <?php foreach ($customers as $customer) : ?>
                                                            <option value="<?php echo $customer->id_customer; ?>" <?php if ($this->input->post('id_customer') == $customer->id_customer) {
                                                                                                                        echo 'selected';
                                                                                                                   } ?>>
                                                                 <?php
                                                                 if ($customer->gender == "Male") {
                                                                      echo "Tn. ";
                                                                 } else {
                                                                      echo "Ny. ";
                                                                 }
                                                                 ?>
                                                                 <?php echo $customer->nama_customer; ?> - <?php echo $customer->no_ktp; ?>
                                                            </option>
                                                       <?php endforeach; ?>
                                                  </select>
                                             </div>
                                             <div class="col-12 col-lg">
                                                  <button type="submit" class="btn btn-primary" style="float: left;">Search</button>
                                             </div>
                                   </form>
                              </div><!--end row-->

                         </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3">
                         <div class="col">
                              <div class="card radius-10">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center">
                                             <div class="">
                                                  <p class="mb-1">Total Orders</p>
                                                  <h4 class="mb-0 text-primary"><?php echo $orders->orders; ?> Pesanan</h4>
                                             </div>
                                             <div class="ms-auto text-primary fs-2">
                                                  <ion-icon name="bag-handle-sharp"></ion-icon>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col">
                              <div class="card radius-10">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center">
                                             <div class="">
                                                  <p class="mb-1">Total Discount %</p>
                                                  <h4 class="mb-0 text-orange">Rp <?php echo number_format($orders->discount) ?></h4>
                                             </div>
                                             <div class="ms-auto widget-icon bg-light-orange text-orange">
                                                  <ion-icon name="newspaper-sharp"></ion-icon>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col">
                              <div class="card radius-10">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center">
                                             <div class="">
                                                  <p class="mb-1">Total Income</p>
                                                  <h4 class="mb-0 text-success">Rp <?php echo number_format($orders->amount) ?></h4>
                                             </div>
                                             <div class="ms-auto text-success fs-2">
                                                  <ion-icon name="wallet-sharp"></ion-icon>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                    </div>

                    <div class="col-12">
                         <div class="card">
                              <div class="card-body">
                                   <div class="row g-3">
                                        <div class="col-12 col-lg-12 d-flex">
                                             <canvas id="chart1"></canvas>
                                        </div>
                                   </div>
                              </div>
                         </div>

                    </div>
               </div>
          </div>