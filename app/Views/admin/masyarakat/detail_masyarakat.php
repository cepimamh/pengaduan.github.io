<div class="card">
    <div class="card-header bg-navy">
        <h3 class="card-title"> Daftar Masyarakat</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
                      <table>
                        <tr>
                          <td width="100px" >NIK</td>
                          <td width="50px"> : </td>
                          <td><?=$detail['nik'] ?></td>
                        </tr>
                        <tr >
                          <td>Nama</td>
                          <td> : </td>
                          <td><?=$detail['nama'] ?></td>
                        </tr>
                        <tr>
                          <td>Telepon</td>
                          <td> : </td>
                          <td><?=$detail['telp'] ?></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td> : </td>
                          <td><?=$detail['email'] ?></td>
                        </tr>
                      </table>
                      <a href="<?=base_url('admin/delete_masyarakat/'.$detail['id']) ?>" class="btn btn-danger btn-sm btn-hapus float-right">Hapus Akun</a>
                      <a href="<?=base_url('admin/daftar_masyarakat') ?>" class="btn btn-warning btn-sm float-right mr-1">Kembali</a>
                    </div>

