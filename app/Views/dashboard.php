 <!-- Admin -->
 <?php if (in_groups('admin')) : ?>
     <div class="card ">
         <div class="card-header  bg-navy ">
             Informasi Pengguna Pengaduan admin
         </div>

         <div class="card-body">
             <div class="row">
                 <div class="col-12 col-sm-6 col-md-4">
                     <div class="info-box">
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
                         <?php foreach ($pesan as $key => $value) { ?>
                             <div class="info-box-content">
                                 <span class="info-box-text">Pesan Baru</span>
                                 <span class="info-box-number">
                                     <?= $value['belum_dibaca']; ?>
                                     <small>Pesan</small>
                                     <small>Belum dibaca</small>
                                 </span>
                             </div>
                         <?php } ?>
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-12 col-sm-6 col-md-4">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope"></i></span>
                         <?php foreach ($pengaduan as $key => $value) { ?>
                             <div class="info-box-content">
                                 <span class="info-box-text">Total Pengaduan</span>
                                 <span class="info-box-number"> <?= $value['pengaduan']; ?>
                                     <small>Pesan</small>
                                 </span>
                             </div>
                         <?php } ?>
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->

                 <!-- fix for small devices only -->
                 <div class="clearfix hidden-md-up"></div>

                 <div class="col-12 col-sm-6 col-md-4">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                         <?php foreach ($masyarakat as $key => $value) { ?>
                             <div class="info-box-content">
                                 <span class="info-box-text">Jumlah User</span>
                                 <span class="info-box-number"> <?= $value['masyarakat']; ?>
                                     <small>User</small>
                                 </span>
                             </div>
                         <?php } ?>
                     </div>
                     <!-- /.info-box -->
                 </div>
             </div>

             <!-- /.row -->
         </div>
     <?php endif; ?>
     <!-- Petugas -->
     <?php if (in_groups('petugas')) : ?>
         <div class="card ">
             <div class="card-header  bg-navy ">
                 Informasi Pengguna Pengaduan
             </div>

             <div class="card-body">
             <div class="row">
                 <div class="col-12 col-sm-6 col-md-4">
                     <div class="info-box">
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
                         <?php foreach ($pesan as $key => $value) { ?>
                             <div class="info-box-content">
                                 <span class="info-box-text">Pesan Baru</span>
                                 <span class="info-box-number">
                                     <?= $value['belum_dibaca']; ?>
                                     <small>Pesan</small>
                                     <small>Belum dibaca</small>
                                 </span>
                             </div>
                         <?php } ?>
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-12 col-sm-6 col-md-4">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope"></i></span>
                         <?php foreach ($pengaduan as $key => $value) { ?>
                             <div class="info-box-content">
                                 <span class="info-box-text">Total Pengaduan</span>
                                 <span class="info-box-number"> <?= $value['pengaduan']; ?>
                                     <small>Pesan</small>
                                 </span>
                             </div>
                         <?php } ?>
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->

                 <!-- fix for small devices only -->
                 <div class="clearfix hidden-md-up"></div>

                 <div class="col-12 col-sm-6 col-md-4">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                         <?php foreach ($masyarakat as $key => $value) { ?>
                             <div class="info-box-content">
                                 <span class="info-box-text">Jumlah User</span>
                                 <span class="info-box-number"> <?= $value['masyarakat']; ?>
                                     <small>User</small>
                                 </span>
                             </div>
                         <?php } ?>
                     </div>
                     <!-- /.info-box -->
                 </div>
             </div>

                 <!-- /.row -->
             </div>
         <?php endif; ?>
         <?php if (in_groups('user')) : ?>
             <div class="alert alert-default-success alert-dismissible fade show" role="alert">
                 <strong>Selamat Datang</strong> <?= user()->username ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="card ">


                 <div class="card-header  bg-navy ">
                     Informasi Pengguna Pengaduan
                 </div>

                 <div class="card-body">
                     <div class="row">

                         <!-- /.col -->
                         <div class="col-12 col-sm-6 col-md-12">
                             <div class="info-box mb-3">
                                 <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope"></i></span>
                                 <?php foreach ($totalpengaduan as $key => $value) { ?>
                                     <div class="info-box-content">
                                         <span class="info-box-text">Total Pengaduan</span>
                                         <span class="info-box-number"> <?= $value['totalpengaduan']; ?>
                                             <small>Pesan</small>
                                         </span>
                                     </div>
                                 <?php } ?>
                             </div>
                             <!-- /.info-box -->
                         </div>
                     </div>
                 </div>

             <?php endif; ?>