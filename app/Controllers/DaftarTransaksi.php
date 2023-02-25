<?php namespace App\Controllers;
use App\Models\ModelDaftarTransaksi;


class DaftarTransaksi extends BaseController
{
	public function __construct()
  {
    helper('form');
    $this->ModelDaftarTransaksi = new ModelDaftarTransaksi();

	}

	public function index()
	{
		$data = array(
			'menu' => 'daftartransaksi',
			'sub_menu' => '',
			'title' => 'Daftar Transaksi',
			'sub_title' => 'Halaman Daftar Transaksi',
			'judul' => 'Daftar Transaksi',
			'sub_judul' => '',
			'daftartransaksi' => $this->ModelDaftarTransaksi->DaftarTransaksi(),
			'isi' => 'v_daftartransaksi'
		);
		return view('layout/v_wrapper', $data);

		
	}

	public function PrintDaftarTransaksi()
	{
		$data = array(
			'title' => 'Laporan Daftar Transaksi',
			'daftartransaksi' => $this->ModelDaftarTransaksi->DaftarTransaksi(),
			'page' => 'laporan/v_print_daftar_transaksi'
		);
		return view('laporan/v_template_print_laporan', $data);
	}

	public function Excel()
	{
		$data = array(
			'daftartransaksi' => $this->ModelDaftarTransaksi->DaftarTransaksi(),
		);
		echo view('laporan/v_excel_daftar_transaksi', $data);
	}

	// public function ViewDaftarTransaksi()
	// {
	
	
	// 	echo dd($this->ModelDaftarTransaksi->DaftarTransaksi());
	// }
	//--------------------------------------------------------------------

}
