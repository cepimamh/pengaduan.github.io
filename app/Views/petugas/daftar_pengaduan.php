<div class="card">
    <div class="card-header bg-navy">
        <h3 class="card-title">Pesan Pengaduan Baru</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Subjek Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Pengirim</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;


                foreach ($pesan as $key => $value) {?>
                    <tr> 
                        <td><?= $no++ ?></td>
                        <td><?= $value['subjek_pengaduan']; ?></td>
                        <td><?= $value['tgl_pengaduan']; ?></td>
                        <td><?= $value['nama']; ?></td>
                        <td>
                            <?php if ($value['statuss'] =="selesai"){ ?>
                                 <small class="badge badge-success">Data Sudah Ditanggapi</small>
                            <?php  }else{ ?>
                            <a href="<?= base_url('petugas/balas_pengaduan/' . $value['id_pengaduan']) ?>" class="btn btn-primary btn-sm" >Tanggapi</a>
<?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>