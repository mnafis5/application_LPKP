<div class="container-sm">
  <div class="card border-0">
      <?php foreach ($data['draft'] as $sa) : 
        $tgl = explode('-',$sa['tanggal']);
        ?>
        <div class="card m-1 draf">
          <div class="title border pt-1 ps-2 pe-2">
              <p>[DRAFT] <?= date($tgl[2] . '-' . $tgl[1] . '-' . $tgl[0]); ?> </p>
          </div>
          <div class="content-body">
            <p><?= $sa['instansi']; ?> || <?= $sa['num']; ?> || <?= $sa['isi']; ?></p>
            <a href="<?= BASEURL; ?>/keluar/draftUpdate/<?= $sa['id']; ?>" class=" float-right ml-1 tampilModalUpdate text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#tambahdata" data-id="<?= $sa['id']; ?>">Edit</a>
            <a href="<?= BASEURL; ?>/keluar/hapusDraft/<?= $sa['id']; ?>" onclick="return confirm('apakah yakin ingin dihapus?')"  class="text-decoration-none text-danger delete">Delete</a>
          </div>
        </div>
      <?php endforeach; ?>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdata" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judul">Tambah Surat Keluar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?= BASEURL; ?>/keluar/draftUpdate" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">tanggal&nomor kode Surat</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="num" name="num" value="" placeholder="" required autocomplete="off" autofocus="on">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Pengirim</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="instansi" name="instansi" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Tanggal penerimaan surat</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row">
            <label for="Jenis" class="col-sm-2 col-form-label">Lampiran</label>
            <div class="col-sm-10">
              <div class="input-group">
                <select class="form-select" id="lampiran" name="lampiran" placeholder="-" required autocomplete="off" >
                  <option selected>-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>  
            </div>  
          </div>
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Isi disposisi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="isi" name="isi" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row im">
          <label for="ket" class="col-sm-2 col-form-label">Surat</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" id="img" name="img" value="" placeholder="-" >
          </div>  
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary outcome">Tambah Surat</button>
        </div>
      </form>
    </div>
  </div>
</div>


