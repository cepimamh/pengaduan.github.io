<div class="card">
            <div class="card-header bg-navy">
              <h3 class="card-title"> Daftar Petugas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
               <div class="swal" data-swal="<?= session()->getFlashdata('success'); ?>"></div>
              <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
              <a href="<?=base_url('admin/add_petugas') ?>" class="btn btn-danger btn-sm mb-2">Tambah petugas</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Level</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($petugas as $value) {?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['telp'] ?></td>
                    <td><?= $value['name'] ?></td>
                    <td>
                      <a href="<?= base_url('admin/detail_petugas/'.$value['id']) ?>" class="btn  btn-success btn-sm" >Detail</a>

                       <a href="<?= base_url('admin/ubah_petugas/'.$value['id']) ?>" class="btn  btn-warning btn-sm" >Ubah</a>

                        <a href="<?= base_url('admin/delete_akun_petugas/'.$value['id']) ?>" class="btn  btn-danger btn-sm btn-hapus" >Hapus</a>                 
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          