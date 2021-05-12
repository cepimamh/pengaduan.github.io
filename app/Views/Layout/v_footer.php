</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Cep Imam
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url() ?>/template/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>/template/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script>

<!-- ChartJS -->
<script src="<?= base_url() ?>/template/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?= base_url() ?>/template/dist/js/pages/dashboard2.js"></script>
<!-- SweetAllert2 -->
<script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            " autoWidth": false,
        });
    });
</script>

</script>
<!-- <script>
    $(function() {
        // Summernote
        $('.textarea').summernote()
    })
</script> -->
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
<script>
    const swal = $('.swal').data('swal');
    if (swal) {
        Swal.fire({
            title: 'Data Berhasil',
            text: swal,
            icon: 'success',
        })
    }
</script>

<script>
    $(document).on('click', '.btn-hapus', function(e) {
        e.preventDefault();
        const href = $(this).attr("href");
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data yang telah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })
</script>
<script>
    $(document).on('click', '.nav-keluar', function(e) {
        e.preventDefault();
        const href = $(this).attr("href");
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Anda harus masuk kembali untuk masuk layanan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Keluar!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })
</script>
<script type="text/javascript">
$(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
</script>


</body>

</html>

</body>

</html>