<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelDashboard;
use App\Models\ModelDaftarTransaksi;


class Dashboard extends BaseController
{
	public function __construct()
  {
    helper('form');
    $this->ModelUser = new ModelUser();
    $this->ModelDashboard = new ModelDashboard();
    $this->ModelDaftarTransaksi = new ModelDaftarTransaksi();

	}

	public function index()
	{

		$k_M = '3';
		$k_K = '1';
		$k_Kom = '2';

		$data = array(
			'menu' => 'dashboard',
			'sub_menu' => '',
			'title' => 'Dashboard',
			'sub_title' => 'Halaman Admin',
			'judul' => 'Master Data',
			'sub_judul' => '',
			'j_barang' => $this->ModelDashboard->JumlahBarang(),
			'j_kategori' => $this->ModelDashboard->JumlahKategori(),
			'j_transaksi' => $this->ModelDashboard->JumlahTransaksi(),
			'p_hari_ini' => $this->ModelDashboard->PeminjamanHariIni(),
			'p_bulan_ini' => $this->ModelDashboard->PeminjamanBulanIni(),
			'p_tahun_ini' => $this->ModelDashboard->PeminjamanTahunIni(),
			'grafikM' => $this->ModelDashboard->GrafikM($k_M),
			'stokM' => $this->ModelDashboard->AmbilStokM($k_M),
			'grafikK' => $this->ModelDashboard->GrafikK($k_K),
			'stokK' => $this->ModelDashboard->AmbilStokK($k_K),
			'grafikKom' => $this->ModelDashboard->GrafikKom($k_Kom),
			'stokKom' => $this->ModelDashboard->AmbilStokKom($k_Kom),
			'livePinjam' => $this->ModelDaftarTransaksi->LivePinjam(),
			'j_user' => $this->ModelDashboard->JumlahUser(),
			'profil' => $this->ModelUser->all_data(),
			'isi' => 'v_home'
		);
		return view('layout/v_wrapper', $data);

		
	}

	public function LivePinjam()
	{
	

		echo dd($this->ModelDaftarTransaksi->LivePinjam());
	}



	//--------------------------------------------------------------------

}
