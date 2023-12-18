<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
<!--End Back To Top Button-->

<!--start overlay-->
<div class="overlay"></div>
<!--end overlay-->

</div>
<!--end wrapper-->


<!-- JS Files-->
<script src="<?= base_url('assets/admin') ?>/js/jquery.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<!--plugins-->
<script src="<?= base_url('assets/admin') ?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/chartjs/chart.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/index2.js"></script>

<!--notification js -->
<script src="<?= base_url('assets/admin') ?>/plugins/notifications/js/lobibox.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/notifications/js/notifications.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/notifications/js/notification-custom-script.js"></script>

<!--plugins-->
<script src="<?= base_url('assets/admin') ?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/product-details.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/chartjs/chart.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/chartjs/custom-script.js"></script>

<!-- Main JS-->
<script src="<?= base_url('assets/admin') ?>/js/main.js"></script>

<script src="<?= base_url('assets/admin') ?>/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/table-datatable.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/js/form-select2.js"></script>


<script>
     $(window).on('load', function() {
          let pesan = "<?= $this->session->flashdata('sukses'); ?>";
          if (pesan) {
               Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    size: 'mini',
                    rounded: true,
                    icon: 'bx bx-check-circle',
                    delayIndicator: false,
                    continueDelayOnInactiveTab: false,
                    position: 'top center',
                    msg: pesan,
                    delay: 2000
               });
          }
     });
</script>

<script>
     $(window).on('load', function() {
          let pesan = "<?= $this->session->flashdata('gagal'); ?>";
          if (pesan) {
               Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    size: 'mini',
                    rounded: true,
                    icon: 'bx bx-x-circle',
                    delayIndicator: false,
                    continueDelayOnInactiveTab: false,
                    position: 'top center',
                    msg: pesan,
                    delay: 2000
               });
          }
     });
</script>

<script>
     ctx = document.getElementById('chart1').getContext('2d');
     var myChart = new Chart(ctx, {
          type: 'line',
          data: {
               labels: ['Total Orders', 'Total Discount', 'Total Amount'],
               datasets: [{
                    label: 'Customer Order Statistics',
                    backgroundColor: '#9932CC',
                    borderColor: '#9932CC',
                    data: [<?= $orders->orders ?>, <?= $orders->discount ?>, <?= $orders->amount ?>]
               }]
          },
          options: {}
     });
</script>

<script>
     $(document).ready(function() {
          $("#id_customer").select2({
               placeholder: "Select a customer",
               theme: "bootstrap4"
          });
     });
</script>


</body>

</html>