<?php Flasher::flash(); ?>

<div class="container">
	<?php foreach($data['log'] as $su) : ?>
	<?php
		
		$eimg = explode('.',$su['img']);
		$eimg0 = $eimg[0];
		if(!isset($eimg[1])){
			$image = 'no_avatar.jpg'; 
		}else{
			$image = $eimg0 .'.'. $eimg[1];
		}

		// $valid = $data['valid'];
		// if($su['img'] > 0){
		// 	$image = $su['img'];	 
		// }else{
		// 	$defimg = 'no_avatar.jpg';
		// 	$image = $defimg;
		// }
	?>
    <div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings text-center">
			<div class="user-profile">
				<div class="user-avatar">
                    <label for="">
                        <!-- <a href="" class="text-decoration-none"> -->
                            <img src="<?= BASEURL; ?>/img/profil/<?= $image; ?>"  class="rounded-circle img" style="max-width:15vh; cursor:pointer;" onClick="triggerClick()" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah Foto Profile" id="profileDisplay">
                        <!-- </a> -->
                    </label>
				</div>
				<h5 class="user-name"><?= $su['username']; ?></h5>
				<h6 class="user-email"><?= $su['email']; ?></h6>
			</div>
			<div class="about">
				<h5>About</h5>
				<p><?= $su['about']; ?></p> 
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
			<form action="<?= BASEURL; ?>/profile/update" method="post" enctype="multipart/form-data">
            <div class="row gutters">
				<input type="file" class="form-control d-none" id="profileImage"  onChange="displayImage(this)" name="img" value="<?= $image?>">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Personal Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<input type="hidden" class="form-control" id="fullName" name="id" value="<?= $su['id']; ?>">
                    <div class="form-group">
                        <label for="fullName">Name</label>
                        <input type="text" class="form-control" id="fullName" name="nama" value="<?= $_SESSION['nama']; ?>" placeholder="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="website">Code</label>
                        <input type="text" class="form-control" id="website" name="code" value="<?= $su['code']; ?>">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" name="email" value="<?= $su['email']; ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" name="phone" value="<?= $su['phone']; ?>">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Personal Info</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="about">About</label>
					<input type="text" class="form-control" id="about" name="about" value="<?= $su['about']; ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">Alamat</label>
					<input type="text" class="form-control" id="ciTy" name="address" value="<?= $su['address']; ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">Jabatan di LPKP</label>
					<input type="text" class="form-control" id="sTate" name="role" value="<?= $su['role']; ?>">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="submit" id="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php endforeach; ?>
</div>
</form>

<script>
    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }
    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>