<div class="card">
    <div class="card-header bg-navy">
        <h3 class="card-title"> Balas Pengaduan</h3>
    </div>
    <div class="card-body">
        <div class="invoice p-3 mb-3">
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <?php
                    echo form_open('petugas/simpan_balasan') ?>
                    <table>

                        <tr>
                            <td width="200px">ID Pengaduan</td>
                            <td width="50px"> : </td>
                            <td width="200px"><?= $data['id_pengaduan']; ?>
                                <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="200px">Pengirim</td>
                            <td width="50px"> : </td>
                            <td width="200px"><?= $data['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengaduan</td>
                            <td> : </td>
                            <td><?= $data['tgl_pengaduan']; ?></td>
                        </tr>
                        <tr>
                            <td>Subject Pengaduan</td>
                            <td> : </td>
                            <td><?= $data['subjek_pengaduan']; ?></td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="row">
                <label class="card-title mb-2 col-md-12">Pengaduan</label>
                <div class="col-md-12">
                    <textarea class="form-control form-control-lg" rows="3" readonly><?= $data['isi_laporan']; ?></textarea>
                    <!-- <label style="margin-bottom: 0px;">Bukti Dokumen : </label><a href=""> Download Bukti .jpg</a><br> -->
                    <small style="margin-top: 1px;"> Apabila Masyarakat mengirimkan foto ,maka foto tersebut bisa di
                        download </small>
                </div>
            </div>
            <div class="row">
                <label class="card-title mb-2 col-md-12">Balasan</label>
                <label class="col-md-12 col-form-label">Tanggal balasan</label>
                <div class="col-md-12">
                    <input type="date" name="tgl_tanggapan" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled="disabled">
                    <input type="hidden" name="tgl_tanggapan" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <label class="my-2 col-md-12">Isi Tanggapan</label>
                <div class="col-md-12">
                    <textarea class="form-control form-control-lg" rows="3" name="tanggapan"></textarea>
                </div>
                <div class="col-12 my-2">
                    <a class="btn btn-danger float-right btn-sm" href="<?= base_url('pengguna/daftar_pengaduan') ?>" role="button" style="border-radius: 100px;width: 100px;">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm float-right" style="margin-right: 5px; border-radius: 100px;width: 60px;"> Kirim
                    </button>
                </div>
                <?php
                echo form_close() ?>
            </div>
        </div>
    </div>