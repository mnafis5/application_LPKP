


<div class="container mt-5">
    <div class="card mb-5" style="width: 700px; margin: auto;">
        <div class="card-body">
            <div class="text-center">
            
                <img src="<?= BASEURL;?>/img/no_avatar.jpg" style="width: 150px;" alt="">

                <h4 class="card-title" style="margin-top: 15px;"><strong><?= $data['mhs']['nama'];?></strong></h4>
                <h6 class="card-subtitle"><?= $data['mhs']['num'];?></h6>
            </div>
            <br>
            <div class="paragraf" style="margin: 0 50px;">
                <table class="ml-3 table table-sm">
                    <tr>
                        <td class="">Alamat</td>
                        <td>:</td>
                        <td><?= $data['mhs']['addresss']?></td>
                    </tr>
                    <tr>
                        <td>Program</td>
                        <td>:</td>
                        <td><?= $data['mhs']['studies']?></td>
                    </tr>
                    <tr>
                        <td class="">Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= $data['mhs']['tempat']?>, <?= $data['mhs']['tanggal']?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kursus</td>
                        <td>:</td>
                        <td><?= $data['mhs']['Jenis']?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk</td>
                        <td>:</td>
                        <td><?= $data['mhs']['masuk']?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Keluar</td>
                        <td>:</td>
                        <td><?= $data['mhs']['keluar']?></td>
                    </tr>
                    <tr>
                        <td>No. Phone</td>
                        <td>:</td>
                        <td><?= $data['mhs']['phone']?></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?= $data['mhs']['ket']?></td>
                    </tr>
                </table>
                
            </div> 
            <div class="img" style="text-align: center; margin-top: 10px; border:1px solid; width:600px; margin: 40px auto;">
                <a href="<?= BASEURL; ?>/img/siswa/<?= $data['mhs']['img'] ?>.jpg"><img src="<?= BASEURL; ?>/img/<?= $data['mhs']['img']?>.jpg" style="" id="gambar"></a>
            </div>
            <div class="card-link">
                <a href="<?= BASEURL; ?>/daftar" class="btn btn-outline-primary float-end me-3 mb-3">Back</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>