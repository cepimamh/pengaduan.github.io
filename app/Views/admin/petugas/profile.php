<div class="card">
    <div class="card-header  bg-navy">
        <h3 class="card-title"> Profile Saya</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">NIK</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nik" readonly value="<?= $akun['nik'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" readonly value="<?= $akun['nama'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Telepon</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="telp" readonly value="<?= $akun['telp'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="username" readonly value="<?= $akun['username'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" readonly value="<?= $akun['email'] ?>">
          </div>
        </div>
        <a href="<?=base_url('admin/ubah_petugas/'.$akun['id']) ?>"class="btn btn-sm btn-success float-right">Ubah Akun</a>
        
    </div>
    <!-- /.card-body -->
