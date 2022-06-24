<div class="container">
    <?php 
    $url = $_GET['url'];
    $ur = explode('/',$url);
    
    ?>
    <form action="<?= BASEURL; ?>/daftar/uploadSiswa" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $ur[2]; ?>">
        <label for="img">Image:</label>
        <input type="file" id="newPicture" name="img" required> 
        <button type="submit" class="button">Tambah Data</button>
        
</form>