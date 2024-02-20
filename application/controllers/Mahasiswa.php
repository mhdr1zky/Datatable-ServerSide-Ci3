<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('mahasiswa_model'=>'mhs_mod'));
	}

	public function index()
	{
		$this->load->view('mahasiswa');
	}

	public function data_ajax()
	{
		
		$list = $this->mhs_mod->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $record) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $record->nama_lengkap;
			
			$tgl_lahir = date('d F Y',strtotime($record->tanggal_lahir));
			$row[] = $record->tempat_lahir.', '.$tgl_lahir;

			$row[] = $record->jenis_kelamin;
			$row[] = $record->agama;
			$row[] = $record->alamat;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->mhs_mod->count_all(),
			"recordsFiltered" => $this->mhs_mod->count_filtered(),
			"data" => $data,
		);

		echo json_encode($output);
	}
}
