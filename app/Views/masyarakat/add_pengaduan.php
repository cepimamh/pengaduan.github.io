<div class="card ">
    <div class="card-body">
      


        <?php
        echo form_open_multipart('masyarakat/create_pengaduan') ?>
        <div class="row">
            <div class="col-md-12 my-2">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Pengaduan</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_pengaduan" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled="disabled">
                        <input type="hidden" name="tgl_pengaduan" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <?php foreach ($nik as $key => $value) {
                   
                ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik" value="<?= $value['nik'] ?>" readonly="readonly">
                            <input type="hidden" name="nik" value="<?= $value['nik'] ?>">
                        </div>
                    </div>
                <?php } ?>
                <div class=" form-group row">
                    <label class="col-sm-2 col-form-label">Subjek Pengaduan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " name="subjek_pengaduan" placeholder="Subjek Pengaduan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Laporan Pengaduan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="8" name="isi_laporan" placeholder="Isi Pengaduan"></textarea>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bukti Dokumen </label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="foto">
                        <!-- <p style="margin-bottom: 1px;">Bukti Dokumen (Bisa di kosongkan)</p> -->
                        <small style="margin-top: 1px;">Bukti dokumen berupa Foto, gambar JPG, PNG</small>
                    </div>
                </div>
            </div>
            <div class="col-md-12 my-2">
                <a class="btn btn-danger btn-sm float-right" href="<?= base_url('masyarakat/index') ?>" role="button">Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm float-right" style="margin-right: 5px;"> Kirim
                </button>
            </div>
        </div>
        <?php
        echo form_close() ?>
    </div>