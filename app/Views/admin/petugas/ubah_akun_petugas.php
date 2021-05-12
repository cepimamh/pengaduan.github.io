<section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header bg-navy">
              <h3 class="card-title "> Ubah Petugas</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <a href="<?= base_url('admin/daftar_petugas')  ?>" class="btn btn-danger btn-sm">Kembali</a>
              <?php echo form_open('admin/ubah_akun/'.$akun['id']); ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?=$akun['nama'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nik" placeholder="NIK"  value="<?=$akun['nik'] ?>">
                      <small class="badge badge-danger">nik harus sesuai dengan kartu identitas</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="telp" placeholder="Telepon"  value="<?=$akun['telp'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Username" name="username"  value="<?=$akun['username'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" placeholder="Email"  value="<?=$akun['email'] ?>">
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Repeat Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="pass_confrim" class="form-control" placeholder="Repeat Password">
                    </div>
                  </div> -->
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary float-right">
             <?php echo form_close() ?>
            </div>
          </div>
      
      