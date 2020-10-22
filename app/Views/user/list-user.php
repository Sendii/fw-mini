<!DOCTYPE html>
<html>
<head>
	<title>Home MVC</title>
	<link rel="stylesheet" href="<?= $GLOBALS['path'] ?>/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<div class="container my-5">
		<div class="shadow card">
			<div class="col-md-6 mt-4">
				<a href="add" class="btn btn-outline-primary btn-sm">Tambah Data</a>
			</div>
			<div class="shadow card-body">
				<h3>Daftar User</h3>
				<?php if (isset($_SESSION["message"])): ?>
					<div class="alert alert-info my-3" id="alert-message" style="text-align: center;">
						<b>
							<?php echo $_SESSION["message"]; ; ?>
						</b>
					</div>
				<?php endif ?>
				<table class="table table-bordered table-hover">
					<thead>
						<tr align="center">
							<th scope="col">No</th>
							<th scope="col">Nama</th>
							<th scope="col">Jenis Kelamin</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0; ?>
						<?php if (count($data['users']) > 0): ?>
							<?php foreach ($data['users'] as $user): ?>
								<?php $i++; ?>
								<tr>
									<th><?php echo $i; ?></th>
									<td><?php echo $user['nama']; ?></td>
									<td><?php echo ($user['jenkel'] == "L" ? 'Laki-laki' : 'Perempuan'); ?></td>
									<td align="center">
										<a class="btn btn-outline-primary btn-sm" href="detail/<?php echo $user['id']; ?>">
											Detail
										</a>
										<a class="btn btn-outline-warning btn-sm" href="edit/<?php echo $user['id']; ?>">
											Edit
										</a>
										<a class="btn btn-outline-danger btn-sm" href="delete/<?php echo $user['id']; ?>">
											Delete
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<tr align="center">
								<td colspan="4">Tidak ada data</td>
							</tr>
						<?php endif ?>						
					</table>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="<?= $GLOBALS['path'] ?>/js/custom.js"> </script>
	</body>
	</html>