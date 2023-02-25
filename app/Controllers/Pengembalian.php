<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelTransaksi;


class Pengembalian extends BaseController
{

	public function __construct() {
		helper('form');
    $this->ModelUser = new ModelUser();
    $this->ModelTransaksi = new ModelTransaksi();
		

	}

	public function index()
	{
		$id_user = session('id_user');
		$cart = \Config\Services::cart();

		$data = array(
      'menu' => 'transaksi',
			'sub_menu' => 'pengembalian',
			'title' => 'Pengembalian Barang',
			'judul' => 'Transaksi',
			'sub_judul' => 'Pengembalian Barang',
			'profil' => $this->ModelUser->all_data(),
			'user' => $this->ModelTransaksi->cek(),
			'barangpinjam' => $this->ModelTransaksi->BarangPinjam($id_user),
			'isi' => 'pengembalian/v_pengembalian'
		);
		return view('layout/v_wrapper', $data);	
	}

	public function SimpanPengembalian($no_faktur)
	{
	
		$data = [
			'no_faktur' => $no_faktur,
			'tanggal_kembali' => date('Y-m-d, H:i:s'),
			'jam_kembali' => date('H:i:s'),
		];
		$this->ModelTransaksi->KembaliTransaksi($data);

		$data = [
			'no_faktur' => $no_faktur,
			'tanggal_kembali' => date('Y-m-d, H:i:s'),
			'jam_kembali' => date('H:i:s'),
		];
		$this->ModelTransaksi->KembaliRinci($data);
		

		session()->setFlashdata('pesanSukses','Transaksi Pengembalian Berhasil Disimpan');
		return redirect()->to(base_url('pengembalian'));
	}

	public function ViewDataBarang()
	{

		// $no_faktur = "IT-0003";
	
		$no_faktur = $this->request->getPost('no_faktur');

		$data = [
			'databarang' => $this->ModelTransaksi->LihatBarang($no_faktur),
		];

		$response = [
			'data' => view('v_tabel_cart_barang', $data)
		];

		echo json_encode($response);

	
		// echo dd($this->ModelTransaksi->LihatBarang($no_faktur));
	}

	

	





	


	//--------------------------------------------------------------------

}
