<div class="container-sm" style="padding-bottom: 50px;">
  <div class="card m-5 mt-5 mb-5" style="padding: 40px 70px; border-radius:15px;">
    <div class="card-title" style="margin: auto; margin-top:20px; margin-bottom:50px;"><h4>Tambah Siswa</h4></div>
    <form action="<?= BASEURL; ?>/daftar/tambah" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" id="id">
      <input type="hidden" name="img" id="img">
      <input type="datetime-local" name="datetime" id="datetime" style="display:none" enctype="multiple/form-data">
        <div class="mb-3 row">
          <label for="num" class="col-sm-2 col-form-label">NIS</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="num" name="num" required placeholder="-" autofocus autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" required placeholder="-" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tempat" class="col-sm-2 col-form-label">Tempat Lahir</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tempat" name="tempat" required placeholder="-" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal" name="tanggal" required placeholder="-" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <div class="input-group">
              <select class="form-select" id="jk" name="jk" required placeholder="-" autocomplete="off">
                <option selected>-</option>
                <option value="L">Laki Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>  
          </div>
        </div>
        <div class="mb-3 row">
          <label for="addresss" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="addresss" name="addresss" required placeholder="-" autocomplete="off">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="phone" class="col-sm-2 col-form-label">No Telepon</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="phone" name="phone" required placeholder="-" autocomplete="off">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="studies" class="col-sm-2 col-form-label">Program</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="studies" name="studies" required placeholder="-" autocomplete="off">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="Jenis" class="col-sm-2 col-form-label">Jenis Kursus</label>
          <div class="col-sm-10">
            <div class="input-group">
              <select class="form-select" id="Jenis" name="Jenis" placeholder="-">
                <option selected>-</option>
                <option value="Reguler">Reguler</option>
                <option value="Private">Private</option>
              </select>
            </div>  
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="masuk" name="masuk" value="" placeholder="-">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="keluar" name="keluar" value="" placeholder="-">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="ket" name="ket" value="" placeholder="-">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Gambar</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="ket" name="ket" value="" placeholder="-">
          </div>  
        </div>


        <div class="modal-footer d-flex flex-row justify-content-between">
            <a href="<?= BASEURL; ?>/daftar" class="btn btn-light text-black">Back</a>
            <button class="tombol btn btn-submit"type="submit">Tambah Data</button>
        </div>
    </form>
  </div>
</div>







