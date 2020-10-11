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

	private $dbh;
	private $stmt;


	public  function __construct()
	{
		// data source name
		$dsn = 'mysql:host=localhost;dbname=phpmpc';

		try {
			$this->dbh = new PDO($dsn, 'root', 'root');
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

	public function getAllMahasiswa(){
		$this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
		$this->stmt->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}