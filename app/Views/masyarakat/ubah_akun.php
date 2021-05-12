<div class="card">
  <div class="card-header bg-navy">
    <h3 class="card-title "> Akun Saya</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <?php
    echo form_open('masyarakat/update_akun/' . $akun['id']) ?>
    <div class="card-body">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">NIK</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nik" value="<?= $akun['nik'] ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?= $akun['nama'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Telepon</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="telp" value="<?= $akun['telp'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="username" value="<?= $akun['username'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" value="<?= $akun['email'] ?>">
        </div>
      </div>
    </div>

    <div>
      <button type="submit" class="btn btn-success btn-sm float-right" style="border-radius: 100px;">Update</button>

    </div>
  </div>
  <?php
  echo form_close() ?>