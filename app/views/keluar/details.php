<div class="container-sm">
    <div class="card p-5">
        <div class="d-flex justify-content-between">
            <h3><?= $data['surat']['instansi'];?></h3>
            <p><?= $data['surat']['tanggal'];?></p>
        </div>
        <hr>
        <div class="d-flex justify-content-between m-0 p-0">
            <p><?= $data['surat']['isi']; ?></p>
            <p><?= $data['surat']['num']; ?></p>
        </div>
        <embed
            src="<?= BASEURL; ?>/img/keluar/<?= $data['surat']['img']; ?>"
            type="application/pdf"
            frameBorder="0"
            scrolling="auto"
            height="1000px"
            width="100%"
            ></embed>
            <img src="<?= $data['surat']['img']; ?>" alt="">
        <div class="card-link">
                <a href="<?= BASEURL; ?>/keluar" class="btn btn-outline-light text-black me-3 mb-3">Back</a>
        </div>
    </div>
</div>