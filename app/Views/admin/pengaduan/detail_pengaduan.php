<div class="card">
    <div class="card-header bg-navy">
        <h3 class="card-title"> Detail Pengaduan</h3>
    </div>
    <div class="card-body">
        <a href="<?=base_url('Admin/cetak_bukti_tanggapan/'.$detail['id_pengaduan']) ?>" class="btn btn-warning btn-sm " style="border-radius: 100px; width: 60px;" target="_blank">Cetak</a>
        <a href=" <?= base_url('Admin/hapus_pengaduan/' . $detail['id_tanggapan']) ?>" class="btn btn-danger btn-sm btn-hapus" style="border-radius: 100px; width: 60px;">Hapus</i></a>
        <a href="<?=base_url('Admin/daftar_pengaduan')?>" class="btn btn-danger btn-sm " style="border-radius: 100px; width: 80px;">Kembali</a>
        <div class="row my-3">
            <div class="col-md-12">
                <table>
                    <tr>
                        <td width="200px"><label >Pengirim</label ></td>
                        <td width="50px"> : </td>
                        <td><?=$detail['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><label >Tanggal Pengaduan</label ></td>
                        <td> : </td>
                        <td><?=$detail['tgl_pengaduan'] ?></label ></td>
                    </tr>
                    <tr>
                        <td><label >Subject Pengaduan</td>
                        <td> : </td>
                        <td><?=$detail['subjek_pengaduan'] ?></label ></td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <label class="card-title mb-2">Pengaduan</label>
            <div class="col-md-12">
            <label >Isi Pengaduan</label >
            <textarea class="form-control form-control-lg" rows="3" readonly><?=$detail['isi_laporan'] ?></textarea>
        </div>
    </div>
    <div class="row my-3">
        <label class="card-title mb-2">Balasan</label> <br>
        <div class="col-md-12">
            <table>
                <tr>
                    <td><label >Tanggal Balasan</td>
                    <td> : </td>
                    <td><?=$detail['tgl_tanggapan'] ?></td>
                </tr>
                <tr>
                    <td width="200px"><label >Petugas</label></td>
                    <td width="50px"> : </td>
                    <td><?=$detail['pengirim'] ?></td>
                </tr>
                <tr>
                    <td><label >Status</label></td>
                    <td> : </td>
                    <td><?=$detail['statuss'] ?></td>
                </tr>
            </table>
            <hr>
            <label >
                Tanggapan
            </label>
            <textarea class="form-control form-control-lg" rows="3" readonly><?=$detail['tanggapan'] ?></textarea>
            <div class="rows">
                <div class="col-sm-6">
                    <label>Bukti Foto : <?= $detail['foto'] ?></label>
                    <img src="<?= base_url() ?>/img/<?= $detail['foto'] ?>" alt="..." class="img-thumbnail float-right" width="500px" height="500px">
                </div>
            </div>
        </div>
    </div>