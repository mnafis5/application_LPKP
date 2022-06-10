<div class="container-sm">
    <div class="card p-5">
        <?php $tgl = explode('-',$data['surat']['tanggal']) ?>
        .
            <h3 class="mb-2"><?= $data['surat']['instansi'];?></h3>
        <table class="ml-3 table table-sm">
            <tr>
                <td class="">Nama Instansi</td>
                <td>:</td>
                <td><?= $data['surat']['instansi']?></td>
            </tr>
            <tr>
                <td>Surat Diterima</td>
                <td>:</td>
                <td><?=  date($tgl[2] . '-' . $tgl[1] . '-' . $tgl[0]);?></td>
            </tr>
            <tr>
                <td class="">Isi Disposisi</td>
                <td>:</td>
                <td><?= $data['surat']['isi']?></td>
            </tr>
            <tr>
                <td>Tanggal & Nomor Surat</td>
                <td>:</td>
                <td><?= $data['surat']['num']?></td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td><?= $data['surat']['lampiran']?></td>
            </tr>
        </table>        
            <embed
            src="<?= BASEURL; ?>/img/surat/<?= $data['surat']['img']; ?>"
            type="application/pdf"
            frameBorder="0"
            scrolling="auto"
            height="1000px"
            width="100%"
            ></embed>
        <div class="card-link">
                <a href="<?= BASEURL; ?>/surat" class="btn btn-outline-light text-black me-3 mb-3">Back</a>
        </div>
    </div>
</div>