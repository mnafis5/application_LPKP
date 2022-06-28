<div class="container">
    <?php 
    $url = $_GET['url'];
    $ur = explode('/',$url);
    
    ?>
    <form action="<?= BASEURL; ?>/daftar/tambahSer" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $ur[2]; ?>">
        <label for="img">Image:</label>
        <input type="file" id="newPicture" name="ser" required> 
        <button type="submit" class="button">Tambah Data</button>
</form>

<a href="<?= BASEURL; ?>/daftar/tambahImg">Upload gambar profile</a>
</div>
