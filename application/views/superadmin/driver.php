     <!-- start page content wrapper-->
     <div class="page-content-wrapper">
          <!-- start page content-->
          <div class="page-content">

               <h6 class="mb-0 text-uppercase text-primary">MANAGE LIST DRIVER <button type="button" class="btn btn-outline-primary px-5 radius-30" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-edit-alt"></i>Add Driver</button></h6>
               <hr />
               <div class="card">
                    <div class="card-body">
                         <div class="table-responsive">
                              <table id="example2" class="table table-striped table-bordered">
                                   <thead>
                                        <tr>
                                             <th>No Identitas Penduduk (KTP)</th>
                                             <th>Nama Lengkap</th>
                                             <th>Jenis Kelamin</th>
                                             <th>Email Address</th>
                                             <th>No Handphone</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach ($driver as $value) : ?>
                                             <tr>
                                                  <td><?php echo $value->no_ktp ?></td>
                                                  <td><?php echo $value->nama_driver ?></td>
                                                  <td>
                                                       <?php
                                                       if ($value->gender == "Male") {
                                                            echo "Laki-laki";
                                                       } else {
                                                            echo "Perempuan";
                                                       }
                                                       ?>
                                                  </td>
                                                  <td><?php echo $value->email ?></td>
                                                  <td><?php echo $value->no_hp ?></td>
                                                  <td>
                                                       <?php
                                                       if ($value->active == "0") {
                                                            echo "<span class='badge bg-primary'><i class='fadeIn animated bx bx-power-off'>Waiting</i> 
                                                       </span> ";
                                                       } else {
                                                            echo "<span class='badge bg-success'><i class='fadeIn animated bx bx-badge-check'>Active</i> 
                                                       </span> ";
                                                       }
                                                       ?>
                                                  </td>
                                                  <td>
                                                       <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2<?= $value->id_driver ?>"><i class="fadeIn animated bx bx-edit-alt"></i></button>
                                                       <a class="btn btn-sm btn-outline-danger" href="<?php echo base_url('superadmin/driver/delete/' . $value->id_driver) ?>"><i class="fadeIn animated bx bx-trash-alt"></i></a>
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

     <!-- Modal tambah data -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title text-primary" id="exampleModalLabel">TAMBAH DATA DRIVER</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <form action="<?= base_url('superadmin/driver/add_act') ?>" method="post" class="form-body row g-3 mt-2">
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">No Identitas Kependudukan (KTP)</label>
                                   <input type="hidden" name="level" value="2">
                                   <input type="text" name="no_ktp" class="form-control" id="email">
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">Nama Lengkap Driver</label>
                                   <input type="text" name="nama_driver" class="form-control" id="email">
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label"><b>Jenis Kelamin :</b></label>
                                   <input type="radio" name="gender" value="Male"> Laki-laki
                                   <input type="radio" name="gender" value="Female"> Perempuan
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">Email Address</label>
                                   <input type="email" name="email" class="form-control" id="email">
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">Password</label>
                                   <input type="password" name="password" class="form-control" id="email">
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">No Hp</label>
                                   <input type="number" name="no_hp" class="form-control" id="email">
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label"><b>Status Customer :</b></label>
                                   <input type="radio" name="active" value="0"> Inactive
                                   <input type="radio" name="active" value="1"> Active
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

     <!-- Modal tambah data -->
     <?php foreach ($driver as $cs) : ?>
          <div class="modal fade" id="exampleModal2<?= $cs->id_driver ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title text-primary" id="exampleModalLabel">UBAH DATA DRIVER</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                              <form action="<?= base_url('superadmin/driver/update_act') ?>" method="post" class="form-body row g-3 mt-2">
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">No Identitas Kependudukan (KTP)</label>
                                        <input type="hidden" name="id_driver" value="<?= $cs->id_driver ?>">
                                        <input type="hidden" name="level" value="4">
                                        <input type="text" name="no_ktp" class="form-control" id="email" value="<?= $cs->no_ktp ?>" readonly>
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Nama Lengkap Driver</label>
                                        <input type="text" name="nama_driver" class="form-control" id="email" value="<?= $cs->nama_driver ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label"><b>Jenis Kelamin :</b></label>
                                        <input type="radio" name="gender" value="Male" <?= $cs->gender == "Male" ? "checked" : "" ?>> Laki-laki
                                        <input type="radio" name="gender" value="Female" <?= $cs->gender == "Female" ? "checked" : "" ?>> Perempuan
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?= $cs->email ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="email" value="<?= $cs->password ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label">No Hp</label>
                                        <input type="number" name="no_hp" class="form-control" id="email" value="<?= $cs->no_hp ?>">
                                   </div>
                                   <div class="col-12">
                                        <label for="inputEmail" class="form-label"><b>Status Customer :</b></label>
                                        <input type="radio" name="active" value="0" <?= $cs->active == "0" ? "checked" : "" ?>> Inactive
                                        <input type="radio" name="active" value="1" <?= $cs->active == "1" ? "checked" : "" ?>> Active
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