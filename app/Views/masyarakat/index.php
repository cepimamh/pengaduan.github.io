<div class="card">
    <div class="card-header bg-navy">
        <h3 class="card-title"> Daftar Pengaduan </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="swal" data-swal="<?= session()->getFlashdata('success'); ?>"></div>
        <a href="<?= base_url('masyarakat/print_daftar'); ?>" target="_blank" class="btn btn-warning btn-sm  mb-2 ">Cetak
        Pengaduan</a>
        <a href="<?= base_url('masyarakat/add_pengaduan'); ?>" class="btn btn-primary btn-sm  mb-2 ">Tambah
        Pengaduan</a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Judul Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Balasan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($masyarakat as $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['subjek_pengaduan']; ?></td>
                    <td><?= $value['tgl_pengaduan']; ?></td>
                    <td align="center"><span class="badge badge-success"><?= $value['statuss']; ?></span></td>
                    <td align="center">
                        <?php if ($value['statuss'] =="selesai"){ ?>
                        <a href="<?= base_url('masyarakat/lihat_tanggapan/' . $value['id_pengaduan']); ?>" class="btn btn-success btn-sm " >Lihat Tanggapan</a>
                        <a href="<?= base_url('masyarakat/cetak_tanggapan/'. $value['id_pengaduan']); ?>"target="_blank" class="btn btn-warning btn-sm "  >Cetak</a>
                        <a href="<?= base_url('masyarakat/delete/' . $value['id_pengaduan']); ?>" class="btn btn-danger btn-sm btn-hapus" >Hapus</i></a>
                        <?php  }else{ ?>
                        <a href="<?= base_url('masyarakat/ubah/' . $value['id_pengaduan']); ?>" class="btn btn-success btn-sm " >Ubah</a>
                        <a href="<?= base_url('masyarakat/cetak_pengaduan/'. $value['id_pengaduan']); ?>"target="_blank" class="btn btn-warning btn-sm " >Cetak</a>
                        <a href="<?= base_url('masyarakat/delete/' . $value['id_pengaduan']); ?>" class="btn btn-danger btn-sm btn-hapus" >Hapus</i></a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>