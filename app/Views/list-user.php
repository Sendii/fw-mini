<!DOCTYPE html>
<html>
<head>
	<title>Home MVC</title>
	<link rel="stylesheet" href="<?= $GLOBALS['path'] ?>/css/style.css">
</head>
<body>
	<h3>Daftar User</h3>
	<?php foreach ($data['users'] as $user): ?>
		<p> <?php echo $user['nama']; ?> </p>
	<?php endforeach; ?>
</body>
</html>