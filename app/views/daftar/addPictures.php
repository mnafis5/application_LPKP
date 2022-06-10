<div class="container">

    <form action="<?= BASEURL; ?>/daftar/uploadImg" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <label for="img">Image:</label>
        <input type="file" id="newPicture" name="img" required>
        <label for="ket">Keterangan:</label>
        <input type="text" id="newPicture" name="ket" required>
        <label for="ket">Keterangan:</label>
        <input type="text" id="newPicture" name="name" >
        <label for="ket">Keterangan:</label>
        <input type="text" id="newPicture" name="jk">
        
        <button type="submit" class="button">Tambah Data</button>
    </form>
</div>