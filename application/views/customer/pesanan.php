    <div class="page-content-wrapper">
         <div class="page-content">
              <h6 class="mb-0 text-uppercase">
                   <font color="#9932CC">MANAGE LIST PESANAN ANDA</font> <a href="<?= base_url('customer/dashboard') ?>" class="btn btn-outline-danger px-5 radius-30" style="float: right;"><i class="fadeIn animated bx bx-share"></i>Kembali</a>
              </h6>
              <hr />
              <?php foreach ($detail as $dt) : ?>
                   <form method="POST" action="<?php echo base_url('customer/pesanan/add_act') ?>">
                        <div class="card">
                             <div class="card-body">
                                  <input type="hidden" name="id_paket" value="<?php echo $dt->id_paket ?>">
                                  <input type="hidden" name="id_driver" class="form-control driver_id" value="<?php echo $dt->id_driver ?>">
                                  <input type="hidden" name="id_kendaraan" class="form-control kendaraan_id" value="<?php echo $dt->id_kendaraan ?>">
                                  <input type="hidden" name="no_pesanan" id="input_no_pesanan" value="">
                                  <input type="hidden" name="discount" class="form-control" value="<?php echo $dt->discount ?>">
                                  <input type="hidden" name="harga" class="form-control" value="<?php echo $dt->harga ?>">
                                  <label style="padding-right:2px;">ID Pesanan &nbsp;: </label>
                                  <p id="id_pesanan" style="display: inline-block;"><b>TRSC<?php echo date('Y') . sprintf('%04d', $this->Mdl_gotrash->get_count_paket() + 1) ?></b></p>
                                  <p>Driver &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<b><?php echo $dt->nama_driver ?></b></p>
                                  <p>Kendaraan &nbsp;&nbsp;: &nbsp;<b><?php echo $dt->merk ?> (<?php echo $dt->no_pol ?>)</b></p>
                                  <p>Discount % &nbsp;&nbsp;: &nbsp;<b>Rp <?php echo number_format($dt->discount) ?></b></p>
                                  <p>Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<b>Rp <?php echo number_format($dt->harga) ?></b></p>
                                  <hr>
                                  <p>Total Bayar &nbsp;&nbsp;: &nbsp;<b>Rp <?php echo number_format($dt->harga - $dt->discount) ?></b></p>

                             </div>
                        </div>
                        <div class="card">
                             <div class="card-body">
                                  <div class="row">
                                       <div class="col-6">
                                            <label for="inputEmail" class="form-label">Lokasi Jemput</label>
                                            <input type="text" name="lokasi_jemput" class="form-control" autocomplete="off" placeholder="Masukan lokasi penjemputan pelanggan" required>
                                       </div>
                                       <div class="col-6">
                                            <label for="inputEmail" class="form-label">Lokasi Tujuan</label>
                                            <input type="text" name="lokasi_antar" class="form-control" autocomplete="off" placeholder="Masukan lokasi tujuan pelanggan" required>
                                       </div>
                                  </div>
                                  <br>
                                  <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
                             </div>
                        </div>
                   </form>
              <?php endforeach; ?>
         </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function() {
              var no_pesanan = $("#id_pesanan").text();
              $("#input_no_pesanan").val(no_pesanan);
         });
    </script>
    <script>
         $(document).ready(function() {
              $(".driver_name").click(function() {
                   var id_driver = $(this).next('.driver_id').val();
                   $(this).next('.driver_id').val(id_driver);
              });
         });
    </script>
    <script>
         $(document).ready(function() {
              $(".kendaraan_name").click(function() {
                   var id_kendaraan = $(this).next('.merk').val();
                   $(this).next('.merk').val(id_kendaraan);
              });
         });
    </script>