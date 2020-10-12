<?php 

class Mahasiswa extends Controller {
	public function index ()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index',  $data);
		$this->view('templates/footer');
	}

	public function detail ($id)
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswaById();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/detail',  $data);
		$this->view('templates/footer');
	}

	public function tambah() 
	{
		if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
			Flasher::setFlash('berhasil', 'ditambahkan', 'success');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function hapus($id) 
	{
		if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
			Flasher::setFlash('berhasil', 'dihapus', 'success');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}
}
