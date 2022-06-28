<div class="container mt-5">
    <div class="dived d-flex justify-content-between">
        <div class="card border-0">
        <h3 class="mb-3">History Aktivitas users</h3>
       <?php foreach ($data['us_act'] as $sa) :  ?> 
        <div class="card m-1 draf">
          <div class="title border pt-1 ps-2 pe-2">
             <p><?= $sa['timestamp']; ?></p> 
          </div>
          <div class="content-body">
           <p>User <?= $sa['nama']; ?> selaku <?= $sa['role']; ?> <?= $sa['ket']; ?></p>
           <a href="<?= BASEURL; ?>/surat/hapusAct/<?= $sa['id']; ?>" onclick="return confirm('apakah yakin ingin dihapus?')"  class="text-decoration-none text-danger delete">Delete</a>
          </div>
        </div>
       <?php endforeach; ?> 
  </div>

  <div class="card border-0">
  <h3>History login users</h3>
       <?php foreach ($data['us_log'] as $ss) : ?> 
        <div class="card m-1">
          <div class="title border pt-1 ps-2 pe-2">
               <p><?= $ss['timestamp']; ?></p> 
          </div>
          <div class="content-body">
             <p>User <?= $ss['nama']; ?> selaku <?= $ss['role']; ?> <?= $ss['isi']; ?></p> 
            <a href="<?= BASEURL; ?>/login/hapusUserLog/<?= $ss['id']; ?>" onclick="return confirm('apakah yakin ingin dihapus?')"  class="text-decoration-none text-danger delete">Delete</a>
          </div>
        </div>
      <?php endforeach; ?> 
  </div>
  </div>
</div>
