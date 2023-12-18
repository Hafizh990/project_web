     <!-- start page content wrapper-->
     <div class="page-content-wrapper">
         <!-- start page content-->
         <div class="page-content">
             <h6 class="mb-0 text-uppercase text-primary">MANAGE LIST TRANSAKSI PESANAN</h6>

             <hr />
             <div class="card">
                 <div class="card-body">
                     <div class="table-responsive">
                         <table id="example2" class="table table-striped table-bordered">
                             <thead>
                                 <tr>
                                     <th>Pesanan ID</th>
                                     <th>Customer</th>
                                     <th>Driver</th>
                                     <th>Kendaraan</th>
                                     <th>Jenis Paket</th>
                                     <th>Lokasi Jemput</th>
                                     <th>Lokasi Tujuan</th>
                                     <th>Diskon</th>
                                     <th>Harga</th>
                                     <th>Total</th>
                                     <th>Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php foreach ($pesanan as $value) : ?>
                                     <tr>
                                         <td><?php echo $value->no_pesanan ?></td>
                                         <td><?php echo $value->nama_customer ?> <br>
                                             <small>
                                                 <font color="purple">ID Customer:</font> CST-<?php echo $value->id_customer ?>
                                             </small>
                                         </td>
                                         <td><?php echo $value->nama_driver ?> <br>
                                             <small>
                                                 <font color="purple">ID Driver:</font> DRV-<?php echo $value->id_driver ?>
                                             </small>
                                         </td>
                                         <td><?php echo $value->merk ?> <br>
                                             <small>
                                                 <font color="purple">ID Kendaraan:</font> KND-<?php echo $value->id_driver ?>
                                             </small>
                                         </td>
                                         <td><?php echo $value->title ?> <br>
                                             <small>
                                                 <font color="purple">ID Paket:</font> PKT-<?php echo $value->id_paket ?>
                                             </small>
                                         </td>
                                         <td><?php echo $value->lokasi_jemput ?></td>
                                         <td><?php echo $value->lokasi_antar ?></td>
                                         <td>Rp <?php echo number_format($value->discount) ?></td>
                                         <td>Rp <?php echo number_format($value->harga) ?></td>
                                         <td>Rp <?php echo number_format($value->harga - $value->discount) ?></td>
                                         <td>
                                             <?php
                                                if ($value->status == 1) {
                                                    echo "<span class='btn btn-success btn-sm'>Pesanan Berhasil</span>";
                                                } else {
                                                    echo "<span class='btn btn-primary btn-sm'>Menunggu Driver</span>";
                                                }
                                                ?>
                                         </td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <!-- <tfoot>
                                        <tr>
                                             <th>Customer ID</th>
                                             <th>Gender</th>
                                             <th>Email Address</th>
                                             <th>No Handphone</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                   </tfoot> -->
                         </table>
                     </div>
                 </div>
             </div>


         </div>
         <!-- end page content-->
     </div>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title text-primary" id="exampleModalLabel">TAMBAH DATA KENDARAAN</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="<?= base_url('superadmin/paket/add_act') ?>" method="post" class="form-body row g-3 mt-2">
                         <div class="col-12">
                             <label class="form-label">Nama Pengemudi</label>
                             <select class="form-control" name="id_driver" required>
                                 <?php foreach ($driver as $value) : ?>
                                     <option value="<?php echo $value->id_driver ?>">
                                         <?php echo $value->nama_driver ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="col-12">
                             <label class="form-label">Kendaraan</label>
                             <select class="form-control" name="id_kendaraan" required>
                                 <?php foreach ($kendaraan as $value) : ?>
                                     <option value="<?php echo $value->id_kendaraan ?>">
                                         <?php echo $value->jenis ?> (Driver: <?php echo $value->nama_driver ?>)
                                     </option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="col-12">
                             <label for="inputEmail" class="form-label">Judul Paket</label>
                             <input type="text" name="title" class="form-control" id="email">
                         </div>
                         <div class="col-12">
                             <label for="inputEmail" class="form-label">Deskripsi Paket</label>
                             <input type="text" name="keterangan" class="form-control" id="email">
                         </div>
                         <div class="col-12">
                             <label for="inputEmail" class="form-label">Diskon %</label>
                             <input type="number" name="discount" class="form-control" id="email">
                         </div>
                         <div class="col-12">
                             <label for="inputEmail" class="form-label">Harga</label>
                             <input type="number" name="harga" class="form-control" id="email">
                         </div>
                         <div class="col-12">
                             <label for="inputEmail" class="form-label">Waktu Penjemputan</label>
                             <input type="time" name="pickup_time" class="form-control" id="email">
                         </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>
     </div>