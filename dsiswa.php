<?php
require_once 'core/init.php';

$siswa = new Siswa();
$age = new Age();
$id = $_GET['id'];
if(!is_numeric($id)){
	exit('Acess Forbiden');
}

$data = $siswa->readSiswa($id);

if(empty($data)){
	exit('not found');
}

?>

<table border='1'>
	<tr>
		<td>ID SISWA</td>
		<td>FULL NAME</td>
		<td>EMAIL</td>
		<td>TANGGAL</td>
		<td>NATIONALITY</td>
		<td>UMUR</td>
	</tr>
	<?php foreach($data as $value): ?>
	<tr>
		<td><?php echo $value['id_siswa'] ?></td>
		<td><?php echo $value['full_name'] ?></td>
		<td><?php echo $value['email'] ?></td>
		<td><?php
			if ($value['date_ob'] != NULL)
			{
				echo $value['date_ob'];
			}
			else
			{
				echo '0000-00-00';
			}?></td>
		</td>
		<td><?php echo $value['nationality']?></td>
		<td>
			<?php
			if ($value['date_ob'] != NULL)
			{
				$tanggal = $value['date_ob'];
				$exec = $age->hitungAge($tanggal);
				
				echo $exec->y."tahun ".$exec->m." Bulan ".$exec->d."hari";
			}
			else
			{
				echo 'umur tidak diketahui';
			}
			?>
	</tr>
	<?php endforeach ?>
</table>

<a href="siswa.php">back</a>