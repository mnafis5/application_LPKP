<div class="container">
	<?php foreach($data['log'] as $su) : ?>
	<?php
		$image = $data['profile'];
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
                            <img src="<?= BASEURL; ?>/img/profil/<?= $image; ?>"  class="rounded-circle img" style="max-width:15vh;" data-bs-toggle="tooltip" data-bs-placement="top"  id="profileDisplay" width="100" height="100">
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
<?php endforeach; ?>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">
				<!-- <img src="<?= BASEURL; ?>/img/profil/<? $image; ?>"> -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Personal Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="fullName">Name</label>
                        <input type="text" class="form-control" id="fullName" name="username" value="<?= $su['username']; ?>" placeholder="" disabled>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="website">Code</label>
                        <input type="text" class="form-control" id="website" name="code" value="<?= $su['code']; ?>" disabled>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" name="email" value="<?= $su['email']; ?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" name="phone" value="<?= $su['phone']; ?>" disabled>
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Personal Info</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">Alamat</label>
					<input type="text" class="form-control" id="ciTy" name="address" value="<?= $su['address']; ?>" disabled>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">Jabatan di LPKP</label>
					<input type="text" class="form-control" id="sTate" name="role" value="<?= $su['role']; ?>" disabled>
				</div>
			</div>
		</div>
		
	</div>
</div>
</div>
</div>