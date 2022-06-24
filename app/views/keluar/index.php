<div class="row">
  <div class="col ms-5 me-5 mb-3 mt-4">
    <?php 
    //Set flash!
    Flasher::flash(); ?>
  </div>
</div>


<div class="container-sm" style="margin-bottom: 200px;">
  <div class="card border-0">
    <div class="card-title ps-3 pe-3 d-flex justify-content-between ">
      <h3>Surat Keluar</h3>
    </div>
    <div class=" end-0 ps-3">
      <div class="dropdown">
        <a class="btn btn-light" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <strong>FILTER</strong> &nbsp;<i class="fa-solid fa-filter" style="color:#000;"></i></a>
        <a href="<?= BASEURL;?>/keluar/draftPage" class="btn btn-primary align-middle" ><i class="fa-solid fa-file"></i>&nbsp; <strong>DRAFT</strong></a>
        
        <div class="dropdown-menu end-0 p-3 col" aria-labelledby="dropdownMenuLink" style="max-width:350px">
          <form action="<?= BASEURL; ?>/keluar/filter" method="post">
          <div class="d-flex justify-content-between flex-row flex-warp mb-3">
            <div class="col-sm-5">
              <label for="filtertanggal1" class=" col-form-label">Tanggal Awal</label>
              <div class="">
                <input type="date" class="form-control" id="tanggal" name="filtertanggal1" value="" placeholder="-" required autocomplete="off" >
              </div>
            </div>
            <div class="col-sm-5">
              <label for="filtertanggal2" class=" col-form-label">Tanggal Akhir</label>
              <div class="">
                <input type="date" class="form-control" id="tanggal" name="filtertanggal2" value="" placeholder="-" required autocomplete="off" >
              </div>
            </div>
          </div>
            <button type="submit" class="btn btn-primary mb-2">Filter</button>
          </form>
          </div>
        </div>
      </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-resp">
              <thead>
                <tr class="align-middle">
                  <th scope="col">No</th>
                  <th scope="col">Instansi Tujuan</th>
                  <th scope="col">Nomor Surat</th>
                  <th scope="col">Tanggal Surat</th>
                  <th scope="col">Lampiran</th>
                  <th scope="col">Isi disposisi</th>
                  <th scope="col">Isi Surat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i = 0;
                if(empty($data['surat'])){
                  $err = "<h5 class='align-middle text-center'>Surat Tidak Ditemukan</h5>";
                  $img = BASEURL . '/img/surat.webp';
                  echo"<td colspan='8' class='text-center align-middle text-muted'><img src='$img' style='max-width:180px; opacity:0.5;'>$err</td>";
                }else{
                foreach ($data['surat'] as $su) :
                $tgl = explode('-',$su['tanggal']); 
                $mnth = $this->model('Surat_model')->function_translate($tgl); 
                $i++?>
                  <tr>
                    <th scope="row"><p><?= $i ?></p></th>
                    <td><p><?= $su['instansi']; ?></p></td>
                    <td><p><?= $su['num']; ?></p></td>
                    <td><p><?= $tgl[2] . '-' . $mnth . '-' . $tgl[0]; ?></p></td>
                    <td><p><?= $su['lampiran']; ?></p></td>
                    <td><p style="max-width:180px;"><?= $su['isi']; ?></p></td>
                    <td><p><a href="<?= BASEURL; ?>/keluar/details/<?= $su['id']; ?>">Lihat isi</a></p></td>
                    <td>
                      <div class="d-flex justify-content-between">
                        <a href="<?= BASEURL; ?>/keluar/ubah/<?= $su['id']; ?>" class=" float-right me-2 tampilModalUbah text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#tambahdata" data-id="<?= $su['id']; ?>">Edit</a>
                        <a href="<?= BASEURL;?>/keluar/hapusKel/<?= $su['id'];?>" onclick="return confirm('apakah yakin ingin dihapus?')" class="text-decoration-none text-danger act">Delete</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; } ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="tombolTambah" data-bs-toggle="modal" data-bs-target="#tambahdata" style="position:absolute; bottom:80px; right:100px; display:fixed; border:none; outline:none;">
      <i class="fa-solid fa-plus shadow-sm" style="position:fixed; width: 60px; z-index:9999; height:60px; border-radius:50px; background-color:#DEDEDE; font-size: 30px; line-height:60px;"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdata" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Surat Keluar</h5>
        
      </div>
      <div class="modal-body">
      <form action="<?= BASEURL; ?>/keluar/tambahSuratKeluar" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <div class="mb-3 row">
          <label for="num" class="col-sm-2 col-form-label">Tanggal&Nomor Surat</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="num" name="num" value="" required autocomplete="off" autofocus="on">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="instansi" class="col-sm-2 col-form-label">Instansi tujuan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="instansi" name="instansi" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="tanggal" class="col-sm-2 col-form-label">Tanggal kirim</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="tgl" name="tanggal" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row">
            <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
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
          <label for="isi" class="col-sm-2 col-form-label">Isi disposisi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="isi" name="isi" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row im">
          <label for="img" class="col-sm-2 col-form-label">Surat</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="img" name="img" value="" placeholder="-">
          </div>  
        </div>
        <div class="mb-3 row ig">
          <label for="ket" class="col-sm-2 col-form-label">Surat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="disimg" value="" placeholder="-" disabled>
          </div>  
        </div>
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary draf" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-secondary draf2" data-bs-dismiss="modal">Batal</button>
          <!-- <button type="submit" class="btn btn-primary draf draft">Tambah draft</button> -->
          <button type="submit" class="btn btn-primary class">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>





