<div class="card ">
    <div class="card-body">

        <?php
        echo form_open_multipart('masyarakat/update/' . $pengaduan['id_pengaduan']) ?>
        <div class="row">
            <div class="col-md-12 my-2">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Pengaduan</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pengaduan['tgl_pengaduan'] ?>" readonly class="form-control" name="tgl_pengaduan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" readonly value="<?= $pengaduan['nik'] ?>" class="form-control" name="nik">
                         <input type="hidden" name="nik" value="<?= $pengaduan['nik'] ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <label class="col-sm-2 col-form-label">Subjek Pengaduan</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pengaduan['subjek_pengaduan'] ?>" class="form-control " name="subjek_pengaduan" placeholder="Subjek Pengaduan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Laporan Pengaduan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="8" name="isi_laporan" placeholder="Isi Pengaduan"><?= $pengaduan['isi_laporan'] ?></textarea>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bukti Dokumen </label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control " name="foto"> 
                        <!-- <p style="margin-bottom: 1px;">Bukti Dokumen (Bisa di kosongkan)</p> -->
                        <small style="margin-top: 1px;color:red;">Bukti dokumen berupa Foto, gambar JPG, PNG</small>
                    </div>
                    <div class="col-sm-6">
                        <label><?= $pengaduan['foto'] ?></label>
                        <img src="<?= base_url() ?>/img/<?= $pengaduan['foto'] ?>" alt="..." class="img-thumbnail float-right" width="300px" height="300px">
                    </div>
                </div>
            </div>
            <div class="col-md-12 my-2">
                <a class="btn btn-danger btn-sm float-right" href="<?= base_url('dashboard/index') ?>" role="button">Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm float-right " style="margin-right: 5px;"> Update
                </button>
            </div>
        </div>
        <?php
        echo form_close() ?>
    </div>