<?php 

class Mahasiswa_model {
	// private $mh = [
	// 	[
	// 		"nama" => "Asep Moh Aripin";
	// 		"nrp" = > "183040118";
	// 		"email" = > "aripin.183040118.@unpas.ac.id";
	// 		"jurusan" => "Teknik Informatika";
	// 	]
	// 	[
	// 		"nama" => "Deni";
	// 		"nrp" = > "183040119";
	// 		"email" = > "deni.183040119.@unpas.ac.id";
	// 		"jurusan" => "Teknik Informatika";
	// 	]
	// 	[
	// 		"nama" => "Aswinn";
	// 		"nrp" = > "183040120";
	// 		"email" = > "aswin.183040120.@unpas.ac.id";
	// 		"jurusan" => "Teknik Informatika";
	// 	]

	// ];


	private $table = 'mahasiswa';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMahasiswa()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getMahasiswaById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataMahasiswa($data)
	{
		$query = "INSERT INTO mahasiswa
					VALUES 
					('', :nama, :nrp, :email, :jurusan)";

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nrp', $data['nrp']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jurusan', $data['jurusan']);

		$this->db->ececute();

		return $this->db->rowCount();
	}
}
