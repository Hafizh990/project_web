     <!-- start page content wrapper-->
     <div class="page-content-wrapper">
          <!-- start page content-->
          <div class="page-content">
               <h6 class="mb-0 text-uppercase text-primary">MANAGE LIST PAKET PRICE <button type="button" class="btn btn-outline-primary px-5 radius-30" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-edit-alt"></i>Add Paket Harga</button></h6>

               <hr />
               <div class="card">
                    <div class="card-body">
                         <div class="table-responsive">
                              <table id="example2" class="table table-striped table-bordered">
                                   <thead>
                                        <tr>
                                             <th>Paket ID</th>
                                             <th>Driver</th>
                                             <th>Merk Kendaraan</th>
                                             <th>Paket Deskripsi</th>
                                             <th>Diskon</th>
                                             <th>Harga</th>
                                             <th>Total</th>
                                             <th>Aksi</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach ($paket as $value) : ?>
                                             <tr>
                                                  <td>PKT<?php echo date('Y') ?>/<?php echo $value->id_paket ?></td>
                                                  <td><?php echo $value->nama_driver ?> <br>
                                                       <small>
                                                            <font color="purple">ID Driver:</font> DRV<?php echo date('Y') ?>/<?php echo $value->id_driver ?>
                                                       </small>
                                                  </td>
                                                  <td><?php echo $value->merk ?> <br>
                                                       <small>
                                                            <font color="purple">ID Kendaraan:</font> KND<?php echo date('Y') ?>/<?php echo $value->id_driver ?>
                                                       </small>
                                                  </td>
                                                  <td><?php echo $value->title ?> <br>
                                                       <small>
                                                            <font color="purple">Deskripsi:</font> <?php echo $value->keterangan ?>
                                                       </small>
                                                  </td>
                                                  <td>Rp <?php echo number_format($value->discount) ?></td>
                                                  <td>Rp <?php echo number_format($value->harga) ?></td>
                                                  <td>Rp <?php echo number_format($value->harga - $value->discount) ?></td>
                                                  <td>
                                                       <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2<?= $value->id_paket ?>"><i class="fadeIn animated bx bx-edit-alt"></i></button>
                                                       <a class="btn btn-sm btn-outline-danger" href="<?php echo base_url('superadmin/paket/delete/' . $value->id_paket) ?>"><i class="fadeIn animated bx bx-trash-alt"></i></a>
                                                  </td>
                                             </tr>
                                        <?php endforeach; ?>
                                   </tbody>
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

     <!-- Modal ubah data -->
     <?php foreach ($paket as $cs) : ?>
          <div class="modal fade" id="exampleModal2<?= $cs->id_paket ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title text-primary" id="exampleModalLabel">UBAH DATA KENDARAAN</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                              <form action="<?= base_url('superadmin/paket/update_act') ?>" method="post" class="form-body row g-3 mt-2">
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Nama Lengkap Driver</label>
                                        <input type="hidden" name="id_paket" value="<?= $cs->id_paket ?>">
                                        <select name="id_driver" class="form-control" required="">
                                             <option value="<?php echo $cs->id_driver ?>" disabled><?php echo $cs->nama_driver ?></option>
                                             <?php foreach ($driver as $tp) : ?>
                                                  <option value="<?php echo $tp->id_driver ?>"><?php echo $tp->no_ktp ?> - <?php echo $tp->nama_driver ?></option>
                                             <?php endforeach; ?>
                                        </select>
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Kendaraan</label>
                                        <select name="id_kendaraan" class="form-control" required="">
                                             <option value="<?php echo $cs->id_kendaraan ?>" disabled><?php echo $cs->jenis ?></option>
                                             <?php foreach ($kendaraan as $value) : ?>
                                                  <option value="<?php echo $value->id_kendaraan ?>">
                                                       <?php echo $value->jenis ?> - <?php echo $value->nama_driver ?>
                                                  </option>
                                             <?php endforeach; ?>
                                        </select>
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Title Paket</label>
                                        <input type="text" name="title" class="form-control" id="email" value="<?= $cs->title ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Deskripsi</label>
                                        <input type="text" name="keterangan" class="form-control" id="email" value="<?= $cs->keterangan ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Discount %</label>
                                        <input type="number" name="discount" class="form-control" id="email" value="<?= $cs->discount ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Harga</label>
                                        <input type="number" name="harga" class="form-control" id="email" value="<?= $cs->harga ?>">
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
     <?php endforeach; ?>