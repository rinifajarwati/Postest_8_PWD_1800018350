<?php

$error = [];
$nim = $nama = $email = $no_hp = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$nim = trim($_POST['nim']);
	$nama = trim($_POST['nama']);
	$email = trim($_POST['email']);
	$no_hp = trim($_POST['no_hp']);

	if (empty($nim)) {
		$error['nim'] = "NIM tidak boleh kosong";
	}
	else if (!ctype_digit($nim) && strlen($nim) <> 10) {
		$error['nim'] = "NIM harus angka dan panjang karakter harus 10";
	}

	if (empty($nama)) {
		$error['nama'] = "Nama tidak boleh kosong";
	}

	if (empty($email)) {
		$error['email'] = "Email tidak boleh kosong";
	} 
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error['email'] = "Format email salah";
	}

	if (empty($no_hp)) {
		$error['no_hp'] = "Nomor Handphone tidak boleh kosong";
	}
	else if (!ctype_digit($no_hp) && strlen($no_hp) < 9) {
		$error['no_hp'] = "Nomor Handphone harus angka dan panjang karakter minimal 9";
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Validasi Mahasiswa</title>
	<style>
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<form method="post">
		<div>
			<label>NIM</label>
			<input type="text" name="nim" value="<?php echo $nim; ?>">
			<?php echo isset($error['nim']) ? '<span class="error">' . $error['nim'] . '</span>' : ''; ?>
		</div>

		<div>
			<label>Nama</label>
			<input type="text" name="nama" value="<?php echo $nama; ?>">
			<?php echo isset($error['nama']) ? '<span class="error">' . $error['nama'] . '</span>' : ''; ?>
		</div>

		<div>
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
			<?php echo isset($error['email']) ? '<span class="error">' . $error['email'] . '</span>' : ''; ?>
		</div>

		<div>
			<label>Telp. (Mobile)</label>
			<input type="text" name="no_hp" value="<?php echo $no_hp; ?>">
			<?php echo isset($error['no_hp']) ? '<span class="error">' . $error['no_hp'] . '</span>' : ''; ?>
		</div>

		<div>
			<button>Submit</button>
		</div>

	</form>
</body>
</html>