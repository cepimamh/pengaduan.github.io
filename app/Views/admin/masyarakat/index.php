<div class="card">
    <div class="card-header bg-navy">
        <h3 class="card-title"> Daftar Masyarakat</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="swal" data-swal="<?= session()->getFlashdata('success'); ?>"></div>
        <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
        <a href="<?=base_url('admin/cetak_masyarakat') ?>" target="_blank" class="btn btn-warning btn-sm mb-3">Cetak Daftar Masyarakat</i></a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Email</th>
                    <th width="150px">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($data as $key => $value) {?>
                <tr>
                    
                    <td><?=$no++ ?></td>
                    <td><?=$value['nama'] ?></td>
                    <td><?=$value['nik'] ?></td>
                    <td><?=$value['email'] ?></td>
                    <td>
                        
                        <a href="<?= base_url('Admin/detail_masyarakat/'.$value['id']) ?>" class="btn btn-success btn-sm ">Detail</a>
                        <a href="<?=base_url('admin/delete_masyarakat/'.$value['id']) ?>" class="btn btn-danger btn-sm btn-hapus">Hapus</i></a>
                    </td>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
  