     <!-- start page content wrapper-->
     <div class="page-content-wrapper">
          <!-- start page content-->
          <div class="page-content">
               <h6 class="mb-0 text-uppercase text-primary">MANAGE LIST TOP-UP SALDO <button type="button" class="btn btn-outline-primary px-5 radius-30" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-edit-alt"></i>Isi Ulang Saldo</button></h6>

               <hr />
               <div class="card">
                    <div class="card-body">
                         <div class="table-responsive">
                              <table id="example2" class="table table-striped table-bordered">
                                   <thead>
                                        <tr>
                                             <th>Saldo ID</th>
                                             <th>Customer</th>
                                             <th>Sisa Saldo</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach ($saldo as $value) : ?>
                                             <tr>
                                                  <td>SLD<?php echo date('Y') ?>/<?php echo $value->id_saldo ?></td>
                                                  <td><?php echo $value->nama_customer ?> <br>
                                                       <small>
                                                            <font color="purple">ID Customer:</font> CST-<?php echo $value->id_customer ?>
                                                       </small>
                                                  </td>
                                                  <td>Rp <?php echo number_format($value->jumlah) ?></td>
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
                         <form action="<?= base_url('superadmin/topup/add_act') ?>" method="post" class="form-body row g-3 mt-2">
                              <div class="col-12">
                                   <label class="form-label">Nama Customer</label>
                                   <select class="form-control" name="id_customer" required>
                                        <?php foreach ($customer as $value) : ?>
                                             <option value="<?php echo $value->id_customer ?>">
                                                  <?php echo $value->nama_customer ?></option>
                                        <?php endforeach; ?>
                                   </select>
                              </div>
                              <div class="col-12">
                                   <label for="inputEmail" class="form-label">Jumlah Saldo</label>
                                   <input type="number" name="jumlah" class="form-control" id="email">
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