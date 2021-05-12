<div class="card">
    <div class="card-header bg-navy">
        <h3 class="card-title"> Daftar Semua Pengaduan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="swal" data-swal="<?= session()->getFlashdata('success'); ?>"></div>
        <a href="<?=base_url('admin/cetak_pengaduan') ?>" target="_blank" class="btn btn-warning btn-sm mb-3" >Cetak Daftar Pengaduan</i></a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Subjek Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Pengirim</th>
                    <th>Tanggal Balas</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($data as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['subjek_pengaduan'] ?></td>
                        <td><?= $value['tgl_pengaduan'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['tgl_tanggapan'] ?></td>
                        <td ><p class="badge badge-success"><?= $value['statuss'] ?></p></td>
                        <td align="center">
                            <a href="<?= base_url('Admin/detail_pengaduan/' . $value['id_pengaduan']) ?>" class=" btn btn-success btn-sm ">Detail</i></a>
                            <a href=" <?= base_url('Admin/hapus_pengaduan/' . $value['id_tanggapan']) ?>" class="btn btn-danger btn-sm btn-hapus" >Hapus</i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>