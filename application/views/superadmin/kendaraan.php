     <!-- start page content wrapper-->
     <div class="page-content-wrapper">
          <!-- start page content-->
          <div class="page-content">
               <h6 class="mb-0 text-uppercase text-primary">MANAGE LIST KENDARAAN <button type="button" class="btn btn-outline-primary px-5 radius-30" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-edit-alt"></i>Add Kendaraan</button></h6>
               <hr />
               <div class="card">
                    <div class="card-body">
                         <div class="table-responsive">
                              <table id="example2" class="table table-striped table-bordered">
                                   <thead>
                                        <tr>
                                             <th>Kendaraan ID</th>
                                             <th>Nama Driver</th>
                                             <th>Merk</th>
                                             <th>Jenis</th>
                                             <th>Tahun Kendaraan</th>
                                             <th>Nomor Polisi</th>
                                             <th>Status Driver</th>
                                             <th>Aksi</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach ($kendaraan as $value) : ?>
                                             <tr>
                                                  <td>KND<?php echo date('Y') ?>/<?php echo $value->id_kendaraan ?></td>
                                                  <td><?php echo $value->nama_driver ?></td>
                                                  <td><?php echo $value->merk ?></td>
                                                  <td><?php echo $value->jenis ?></td>
                                                  <td><?php echo $value->tahun ?></td>
                                                  <td><?php echo $value->no_pol ?></td>
                                                  <td>
                                                       <?php
                                                       if ($value->active == "0") {
                                                            echo "<span class='badge bg-primary'><i class='fadeIn animated bx bx-power-off'>Inactive</i> 
                                                       </span> ";
                                                       } else {
                                                            echo "<span class='badge bg-success'><i class='fadeIn animated bx bx-badge-check'>Active</i> 
                                                       </span> ";
                                                       }
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2<?= $value->id_kendaraan ?>"><i class="fadeIn animated bx bx-edit-alt"></i></button>
                                                       <a class="btn btn-sm btn-outline-danger" href="<?php echo base_url('superadmin/kendaraan/delete/' . $value->id_kendaraan) ?>"><i class="fadeIn animated bx bx-trash-alt"></i></a>
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
                         <form action="<?= base_url('superadmin/kendaraan/add_act') ?>" method="post" class="form-body row g-3 mt-2">
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
                                   <label for="inputEmail" class="form-label">Merk Kendaraan</label>
                                   <input type="text" name="merk" class="form-control" id="email">
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">Jenis Kendaraan</label>
                                   <br>
                                   <input type="radio" name="jenis" value="Mobil"> Mobil
                                   <input type="radio" name="jenis" value="Motor"> Motor
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">Tahun Keluaran</label>
                                   <input type="number" name="tahun" class="form-control" id="yearInput" min="1900" max="2022" placeholder="Masukkan tahun">
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">No Polisi</label>
                                   <input type="text" name="no_pol" class="form-control" id="email">
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
     <?php foreach ($kendaraan as $cs) : ?>
          <div class="modal fade" id="exampleModal2<?= $cs->id_kendaraan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title text-primary" id="exampleModalLabel">UBAH DATA KENDARAAN</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                              <form action="<?= base_url('superadmin/kendaraan/update_act') ?>" method="post" class="form-body row g-3 mt-2">
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Nama Lengkap Driver</label>
                                        <input type="hidden" name="id_kendaraan" value="<?= $cs->id_kendaraan ?>">
                                        <input type="hidden" name="level" value="4">
                                        <select name="id_driver" class="form-control" required="">
                                             <option value="<?php echo $cs->id_driver ?>" disabled><?php echo $tp->no_ktp ?> - <?php echo $cs->nama_driver ?></option>
                                             <?php foreach ($driver as $tp) : ?>
                                                  <option value="<?php echo $tp->id_driver ?>"><?php echo $tp->no_ktp ?> - <?php echo $tp->nama_driver ?></option>
                                             <?php endforeach; ?>
                                        </select>
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Merk Kendaraan</label>
                                        <input type="text" name="merk" class="form-control" id="email" value="<?= $cs->merk ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label"><b>Jenis Kendaraan :</b></label>
                                        <input type="radio" name="jenis" value="Motor" <?= $cs->jenis == "Motor" ? "checked" : "" ?>> Motor
                                        <input type="radio" name="jenis" value="Mobil" <?= $cs->jenis == "Mobil" ? "checked" : "" ?>> Mobil
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Tahun Keluaran</label>
                                        <input type="number" name="tahun" class="form-control" id="email" value="<?= $cs->tahun ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">No Polisi</label>
                                        <input type="text" name="no_pol" class="form-control" id="email" value="<?= $cs->no_pol ?>">
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