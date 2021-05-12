<div class="card">
  <div class="card-header bg-navy">
    <h3 class="card-title "> Akun Saya</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="swal" data-swal="<?= session()->getFlashdata('success'); ?>"></div>
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
    </div>
    <div>
      <a href="<?= base_url('masyarakat/ubah_akun/' . $akun['id']); ?>" class="btn btn-success btn-sm float-right" style="border-radius: 100px;">Ubah Akun</a>
    </div>
  </div>