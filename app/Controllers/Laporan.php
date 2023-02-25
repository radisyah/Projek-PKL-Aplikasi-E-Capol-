<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelBarang;
use App\Models\ModelLaporan;


class Laporan extends BaseController
{

	public function __construct() {
		helper('form');
		$this->ModelUser = new ModelUser();
		$this->ModelBarang = new ModelBarang();
		$this->ModelLaporan = new ModelLaporan();
	
	}

	public function PrintProduk()
	{
		$data = array(
			'title' => 'Laporan Data Barang',
			'barang' => $this->ModelBarang->all_data(),
			'page' => 'laporan/v_print_laporan'
		);
		return view('laporan/v_template_print_laporan', $data);
	}

	public function LaporanHarian()
	{
		$data = array(
			'menu' => 'laporan',
			'sub_menu' => 'l_harian',
			'title' => 'Halaman Laporan Harian',
			'sub_judul' => 'Halaman Laporan',
			'profil' => $this->ModelUser->all_data(),
			'judul' => 'Laporan Harian',
			'sub_judul' => 'Halaman Laporan Harian',
			'isi' => 'laporan/v_laporanHarian'
		);
		return view('layout/v_wrapper', $data);
	}

	public function ViewLaporanHarian()
	{
		
		$tgl = $this->request->getPost('tgl');
		$data = [
			'dataharian' => $this->ModelLaporan->DataHarian($tgl),
		];

		$response = [
			'data' => view('v_tabel_laporan_harian', $data)
		];

		echo json_encode($response);
		// echo dd($this->ModelLaporan->DataHarian($tgl));
	}

	public function PrintLaporanHarian($tgl)
	{
		$data = array(
			'title' => 'Laporan Harian Peminjaman',
			'dataharian' => $this->ModelLaporan->DataHarian($tgl),
			'page' => 'laporan/v_print_laporan_harian'
		);
		return view('laporan/v_template_print_laporan', $data);
	}

	public function LaporanBulanan()
	{
		$data = array(
			'menu' => 'laporan',
			'sub_menu' => 'l_bulanan',
			'title' => 'Halaman Laporan Bulanan',
			'sub_judul' => 'Halaman Laporan',
			'profil' => $this->ModelUser->all_data(),
			'judul' => 'Laporan Bulanan',
			'sub_judul' => 'Halaman Laporan Bulanan',
			'isi' => 'laporan/v_laporanBulanan'
		);
		return view('layout/v_wrapper', $data);
	}

	public function ViewLaporanBulanan()
	{
	
		// $bulan ='2';
		// $tahun ='2023';
		$bulan = $this->request->getPost('bulan');
		$tahun = $this->request->getPost('tahun');
		$data = [
			'databulan' => $this->ModelLaporan->DataBulanan($bulan,$tahun),
		];

		$response = [
			'data' => view('v_tabel_laporan_bulan', $data)
		];

		echo json_encode($response);
		// echo dd($this->ModelLaporan->DataBulanan($bulan,$tahun));
	}

	public function PrintLaporanBulanan($bulan, $tahun)
	{
		$data = array(
			'title' => 'Laporan Bulanan Peminjaman',
			'databulan' => $this->ModelLaporan->DataBulanan($bulan,$tahun),
			'page' => 'laporan/v_print_laporan_bulanan'
		);
		return view('laporan/v_template_print_laporan', $data);
	}

	public function LaporanTahunan()
	{
		$data = array(
			'menu' => 'laporan',
			'sub_menu' => 'l_tahunan',
			'title' => 'Halaman Laporan Tahunan',
			'sub_judul' => 'Halaman Laporan',
			'profil' => $this->ModelUser->all_data(),
			'judul' => 'Laporan Tahunan',
			'sub_judul' => 'Halaman Laporan Tahunan',
			'isi' => 'laporan/v_laporanTahunan'
		);
		return view('layout/v_wrapper', $data);
	}

	public function ViewLaporanTahunan()
	{
	
		$tahun = $this->request->getPost('tahun');
		$data = [
			'datatahunan' => $this->ModelLaporan->DataTahunan($tahun),
		];

		$response = [
			'data' => view('v_tabel_laporan_tahun', $data)
		];

		echo json_encode($response);
		// echo dd($this->ModelLaporan->DataTahunan(2023));
	}

	public function PrintLaporanTahunan($tahun)
	{
		$data = array(
			'title' => 'Laporan Tahunan Peminjaman',
			'datatahunan' => $this->ModelLaporan->DataTahunan($tahun),
			'page' => 'laporan/v_print_laporan_tahunan'
		);
		return view('laporan/v_template_print_laporan', $data);
	}


	//--------------------------------------------------------------------

}
