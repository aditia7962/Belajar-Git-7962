<?php
require_once 'core/init.php';

$siswa = new Siswa();
$age = new Age();
$data = $siswa->readAllSiswa();



?>

<table border='1'>
	<tr>
		<td>ID SISWA</td>
		<td>FULL NAME</td>
		<td>EMAIL</td>
		<td>TANGGAL</td>
		<td>NATIONALITY</td>
		<td>UMUR</td>
		<td>DETAIL</td>
		<td>DELETE</td>
		<td>UPDATE</td>
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
		<td><?php echo $value['nationality']?></td>

		</td>
		<td><a href="dsiswa.php?id=<?php echo $value['id_siswa'] ?>">Detail</a></td>
		<td><a href="siswa.php?id=<?php echo $value['id_siswa'] ?>">Delete</a></td>
		<td><a href="usiswa.php?id=<?php echo $value['id_siswa'] ?>">Update</a></td>
		
	</tr>
	<?php endforeach ?>
</table>