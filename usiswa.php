<?php
require_once 'core/init.php';

$id = $_GET['id'];
$siswa = new Siswa();
$dsiswa = $siswa->readSiswa($id);


$error = "";
if(isset($_POST['submit'])){
	
	$id = $_POST['in_nis'];
	$data['in_name'] = $_POST['in_nama'];
	$data['in_email'] = $_POST['in_email'];
	$data['in_nationality'] = $_POST['in_nation'];

	//$data['foto'] = $_FILES['in_foto'];
	
	//if(copy($_FILES['in_foto']['tmp_name'], 'img/'.$_POST['in_nis'].'.png')){
	//	exit ('upload file error');
	//}
	if($siswa->updateSiswa($id, $data)){
		$error = "susses";
		header('Location: usiswa.php?id=$id');
	}else{
		$error = $db->error;
	}
}else{
	$error = "error";
}
$error = "";
?>

<form action="" method="post" enctype="multipart/form-data">
<?='Error : '.$error?></br>
<label>NISs:</br>
<input type="text" name="in_nis" value="<?=$dsiswa['0']['id_siswa']?>"></br></br> 
<label>Nama Lengkap :</br>
<input type="text" name="in_nama" value="<?=$dsiswa['0']['full_name']?>"></br></br>
<label>Email :</br>
<input type="text" name="in_email" value="<?=$dsiswa['0']['email']?>"></br></br>
<label>Kewarganegaraan :</br>
<input type="text" name="in_nation" value="<?=$dsiswa['0']['nationality']?>"></br></br>
<label>Foto :</br>
<input type="file" name="in_foto"></br></br></br>
<input type="submit" value="submit" name="submit">
