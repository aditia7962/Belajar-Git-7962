<?php
class Siswa{
	
	private $db;
	
	public function siswa(){
		$this->db = new DBClass;
	}
	
	public function readAllSiswa(){
		$query = "SELECT * FROM siswa s JOIN nationality n ON s.id_nationality = n.id_nationality";
		return $this->db->getRows($query);
	}
	
	public function readSiswa($id){
		$query = "SELECT * FROM siswa s JOIN nationality n ON s.id_nationality = n.id_nationality WHERE id_siswa='$id'";
		return $this->db->getRows($query);
	}
	
	public function createSiswa($id_nationality, $nis, $full_name, $email, $ff){
		$query = "INSERT INTO siswa (id_nationality, nis, full_name, email, foto) values('$id_nationality', '$nis', '$full_name', '$email', '$ff')";
		$this->db->putRows($query);
	}
	
	public function updateSiswa($id, $data){
		$name = $data['in_name'];
		$email = $data['in_email'];
		$nation = $data['in_nationality'];
		//$foto = $data['foto'];
		
		$query = "UPDATE siswa SET full_name='$name', email='$email'";
		if($nation>0) $query.=", id_nationality = '$nation' ";
		$query = "where id_siswa =$id";
		$this->db->putRows($query);
	}
	
	public function deleteSiswa($id){
		$query = "DELETE FROM siswa WHERE id_siswa='$id'";
		$this->db->putRows($query);
	}
	
	
}

?>