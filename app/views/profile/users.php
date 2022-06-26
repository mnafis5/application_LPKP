<?php Flasher::flash(); ?>

<div class="container">
    <div class="row">
        <h3>Daftar Users di website LPKP</h3>
        <br><br>
        <table class="table table-striped table-hover table-resp">
            <thead>
                <tr class="align-middle">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Jabatan di LPKP</th>
                    <th>Code</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                    $i = 0;
                    foreach($data['users'] as $us) : 
                    $i++
                    ?>
                    <tr>
                        <th scope="row"><p><?= $i ?></p></th>
                        <td><p><?= $us['nama']; ?></p></td>
                        <td><p><?= $us['username']; ?></p></td>
                        <td><p><?= $us['role']; ?></p></td>
                        <td><p><?= $us['code']; ?></p></td>
                        <td><a href="<?= BASEURL;?>/profile/hapus/<?= $us['id'];?>" onclick="return confirm('apakah yakin ingin dihapus?')" class="text-decoration-none text-danger">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</div>