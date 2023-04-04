<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelTransaksi;
use App\Models\ModelBarang;



class Peminjaman extends BaseController
{

	public function __construct() {
		helper('form');
    $this->ModelUser = new ModelUser();
    $this->ModelTransaksi = new ModelTransaksi();
    $this->ModelBarang = new ModelBarang();
	}

	public function index()
	{
		$cart = \Config\Services::cart();

		$data = array(
      'menu' => 'transaksi',
			'sub_menu' => 'peminjaman',
			'title' => 'Peminjaman Barang',
			'judul' => 'Transaksi',
			'sub_judul' => 'Peminjaman Barang',
			'cart' => $cart->contents(),
			'profil' => $this->ModelUser->all_data(),
      'barang' => $this->ModelTransaksi->all_data(),
			'no_faktur' => $this->ModelTransaksi->noFaktur(),
			'isi' => 'peminjaman/v_peminjaman'
		);
		return view('layout/v_wrapper', $data);	
	}

	public function CekBarang()
	{
		$kode_barang = $this->request->getPost('kode_barang');
		$barang = $this->ModelTransaksi->CekBarang($kode_barang);
		if ($barang == null) {
			$data = array(
				'id_barang' => '',
				'nama_barang' => '',
				'stok' => '',
				'foto' => '',
				'nama_kategori' => '',
				'nama_satuan' => '',
			);
		}else {
			$data = array(
				'id_barang' => $barang['id_barang'],
				'nama_barang' => $barang['nama_barang'],
				'stok' => $barang['stok'],
				'foto' => $barang['foto'],
				'nama_kategori' => $barang['nama_kategori'],
				'nama_satuan' => $barang['nama_satuan'],
			
			);
		}
		echo json_encode($data);
	}

	public function AddCart()
	{
		$kode_barang = $this->request->getPost('kode_barang');
		$qty = $this->request->getPost('qty');

		$ambilDataBarang =$this->ModelTransaksi->CekBarang($kode_barang);
		$stokBarang = $ambilDataBarang['stok'];

		if ($qty > intval($stokBarang)) {
			session()->setFlashdata('pesanGagal','Stok Tidak Mencukupi');
			return redirect()->to(base_url('peminjaman'));
		}else {
			$cart = \Config\Services::cart();
			$cart->insert(array(
				'id'      =>  $this->request->getPost('kode_barang'),
				'qty'     =>  $this->request->getPost('qty'),
				'name'    => $this->request->getPost('nama_barang'),
				'options' => array(
					'nama_kategori' => $this->request->getPost('nama_kategori'),
					'nama_satuan' => $this->request->getPost('nama_satuan'),
				)
		 ));
		 return redirect()->to(base_url('peminjaman'));
		}

	
	}

	public function ViewCart()
	{
		$stok = 100;
		echo dd($this->ModelTransaksi->AmbilStok($stok));
	}

	public function ResetCart()
	{
		$cart = \Config\Services::cart();
		$cart->destroy();

		return redirect()->to(base_url('peminjaman'));
	}

	public function RemoveItem($rowid)
	{
		$cart = \Config\Services::cart();
		$cart->remove($rowid);
		return redirect()->to(base_url('peminjaman'));
	}

	public function SimpanTransaksi()
	{
		$ket = $this->request->getPost('ket');


		$cart = \Config\Services::cart();
		$barang = $cart->contents();
		$no_faktur = $this->ModelTransaksi->noFaktur();

		if ($barang == null) {
			session()->setFlashdata('pesanGagal','Transaksi Peminjaman Barang Belum Berhasil');
			return redirect()->to(base_url('peminjaman'));
		}else {
			foreach ($barang as $key => $value) {
				$data = [
					'no_faktur' => $no_faktur,
					'kode_barang' => $value['id'],
					'tanggal_pinjam' => date('Y-m-d'),
					'jam_pinjam' => date('H:i:s'),
					'qty' => $value['qty'],
				];
				$this->ModelTransaksi->InsertRinciPinjam($data);
			}
	
	
			$data = [
				'no_faktur' => $no_faktur,
				'tanggal_pinjam' => date('Y-m-d'),
				'jam_pinjam' => date('H:i:s'),
				'ket' => $this->request->getPost('ket'),
				'id_user' => session()->get('id_user'),
				'username' => session()->get('username')
			];
			$this->ModelTransaksi->InsertPinjam($data);
			$cart->destroy();
	
			session()->setFlashdata('pesanSukses','Transaksi Peminjaman Berhasil Disimpan');
			return redirect()->to(base_url('peminjaman'));
		}

		
	
	}

	//--------------------------------------------------------------------

}
