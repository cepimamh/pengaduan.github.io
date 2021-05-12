
<div class="card">
    <div class="card-header bg-navy">
        <h3 class="card-title"> Tanggapan Pengaduan <?=$tanggapan['subjek_pengaduan'] ?></h3>
    </div>
    <div class="card-body">
        
        <div class="row my-3">
            <div class="col-md-12">
                <table>
                    <tr>
                        <td width="200px"><label >Pengirim</label ></td>
                        <td width="50px"> : </td>
                        <td><?=$tanggapan['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><label >Tanggal Pengaduan</label ></td>
                        <td> : </td>
                        <td><?=$tanggapan['tgl_pengaduan'] ?></label ></td>
                    </tr>
                    <tr>
                        <td><label >Subject Pengaduan</td>
                        <td> : </td>
                        <td><?=$tanggapan['subjek_pengaduan'] ?></label ></td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <label class="card-title mb-2">Pengaduan</label>
            <div class="col-md-12">
            <label >Isi Pengaduan</label >
            <textarea class="form-control form-control-lg" rows="3" readonly><?=$tanggapan['isi_laporan'] ?></textarea>
        </div>
    </div>
   
    <div class="row my-3">
        <label class="card-title mb-2">Balasan</label> <br>
        <div class="col-md-12">
            <table>
                <tr>
                    <td><label >Tanggal Balasan</td>
                    <td> : </td>
                    <td><?=$tanggapan['tgl_tanggapan'] ?></td>
                </tr>
                <tr>
                    <td width="200px"><label >Petugas</label></td>
                    <td width="50px"> : </td>
                    <td><?=$tanggapan['pengirim'] ?></td>
                </tr>
                <tr>
                    <td><label >Status</label></td>
                    <td> : </td>
                    <td><?=$tanggapan['statuss'] ?></td>
                </tr>
            </table>
            <hr>
            <label >
                Tanggapan
            </label>
            <textarea class="form-control form-control-lg" rows="3" readonly><?=$tanggapan['tanggapan'] ?></textarea>
            <div class="rows">
                <div class="col-sm-6">
                    <label>Bukti Foto : <?= $tanggapan['foto'] ?></label>
                    <img src="<?= base_url() ?>/img/<?= $tanggapan['foto'] ?>" alt="..." class="img-thumbnail float-right" width="500px" height="500px">
                </div>
            </div>
        </div>
    </div>
</div>