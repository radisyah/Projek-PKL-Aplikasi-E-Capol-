<?php namespace App\Controllers;
use App\Models\ModelBarang;
use App\Models\ModelUser;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;

class Barang extends BaseController{

  public function __construct()
  {
   helper('form');
   $this->ModelBarang = new ModelBarang();
   $this->ModelKategori = new ModelKategori();
   $this->ModelSatuan = new ModelSatuan();
   $this->ModelUser = new ModelUser();

  }

  public function index()
  {
    $data = array(
      'menu' => 'master',
      'sub_menu' => 'barang',
      'title' => 'Manajemen Barang',
      'judul' => 'Master Data',
      'sub_judul' => 'Manajemen Barang',
      'isi' => 'barang/v_barang',
      'barang' => $this->ModelBarang->all_data(),
      'kategori' => $this->ModelKategori->all_data(),
      'satuan' => $this->ModelSatuan->all_data(),
			'profil' => $this->ModelUser->all_data(),
    );
    return view('layout/v_wrapper', $data);
  }

  public function add()
  {
    $data = array(
      'menu' => 'master',
      'sub_menu' => 'barang',
      'title' => 'Manajemen Barang',
      'judul' => 'Master Data',
      'sub_judul' => 'Manajemen Barang',
      'kategori' => $this->ModelKategori->all_data(),
      'satuan' => $this->ModelSatuan->all_data(),
			'profil' => $this->ModelUser->all_data(),
			'isi' => 'barang/v_add',
			'errors' => \Config\Services::validation()
    );
    return view('layout/v_wrapper',$data);
  }

  public function save_insert()
  {
    if (!$this->validate([
      'nama_barang'=>[
        'label' => 'Nama Barang',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
      'id_kategori'=>[
        'label' => 'Kategori',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
      'id_satuan'=>[
        'label' => 'Satuan',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong'
          ]
        ],
      'stok'=>[
      'label' => 'Stok',
      'rules' => 'required',
      'errors' => [
        'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'foto' => [
				'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto, 2048]',
				'errors' => [
					'max_size' => 'Ukuran File Maksimal 2 MB',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png | Ukuran Maks 2mb',
					]
				]
    ])) {
      session()->setFlashdata('errors', $this->validator->listErrors());
			return redirect()->back()->withInput();
    }else {
      $dataBerkas = $this->request->getFile('foto');
      if ($dataBerkas=='') {
        $data = array(
          'kode_barang' => $this->request->getPost('kode_barang'),
          'nama_barang' => $this->request->getPost('nama_barang'),
          'id_kategori' => $this->request->getPost('id_kategori'),
          'id_satuan' => $this->request->getPost('id_satuan'),
          'stok' => $this->request->getPost('stok'),
        );
        $this->ModelBarang->add($data);
     }else{
        $fileName = $dataBerkas->getRandomName();
        $data = array(
          'kode_barang' => $this->request->getPost('kode_barang'),
          'nama_barang' => $this->request->getPost('nama_barang'),
          'id_kategori' => $this->request->getPost('id_kategori'),
          'id_satuan' => $this->request->getPost('id_satuan'),
          'stok' => $this->request->getPost('stok'),
					'foto' => $fileName,
        );
        $dataBerkas->move('img/', $fileName);
        $this->ModelBarang->add($data);
     }
      session()->setFlashdata('pesanSukses', 'Data Barang Berhasil Disimpan');
      return redirect()->to(base_url('barang')); 
    }
  }

  public function edit($id_barang)
	{
		$data = array(
		  'menu' => 'master',
      'sub_menu' => 'barang',
      'title' => 'Manajemen Barang',
      'judul' => 'Master Data',
      'sub_judul' => 'Manajemen Barang',
      'barang' => $this->ModelBarang->detail_data($id_barang),
      'kategori' => $this->ModelKategori->all_data(),
      'satuan' => $this->ModelSatuan->all_data(),
			'profil' => $this->ModelUser->all_data(),
			'isi' => 'barang/v_edit',
			'errors' => \Config\Services::validation()
			
		);
		return view('layout/v_wrapper', $data);
	}

  public function save_edit($id_barang)
  {
    if(!$this->validate([
      'foto' => [
        'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto, 2048]',
        'errors' => [
        'max_size' => 'Ukuran File Maksimal 2 MB',
        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png | Ukuran Maks 2mb',
        ]
      ]
    ])) {
      session()->setFlashdata('errors', $this->validator->listErrors());
			return redirect()->back()->withInput();
    }else{
      $dataBerkas = $this->request->getFile('foto');
      if ($dataBerkas=='') {
        $data = array(
					'id_barang' => $id_barang,
          'kode_barang' => $this->request->getPost('kode_barang'),
          'nama_barang' => $this->request->getPost('nama_barang'),
          'id_kategori' => $this->request->getPost('id_kategori'),
          'id_satuan' => $this->request->getPost('id_satuan'),
          'stok' => $this->request->getPost('stok'),
        );
        $this->ModelBarang->update_data($data);
     }else{
        $fileName = $dataBerkas->getRandomName();
        $data = array(
					'id_barang' => $id_barang,
          'kode_barang' => $this->request->getPost('kode_barang'),
          'nama_barang' => $this->request->getPost('nama_barang'),
          'id_kategori' => $this->request->getPost('id_kategori'),
          'id_satuan' => $this->request->getPost('id_satuan'),
          'stok' => $this->request->getPost('stok'),
					'foto' => $fileName,
        );
        $dataBerkas->move('img/', $fileName);
        $this->ModelBarang->update_data($data);
     }
      session()->setFlashdata('pesanSukses', 'Data Barang Berhasil Diubah');
      return redirect()->to(base_url('barang')); 
    }
  }

  public function delete($id_barang)
  {
    $data = array(
      'id_barang' => $id_barang,
    );
    $this->ModelBarang->delete_data($data);
    session()->setFlashdata('pesanSukses', 'Data Barang Berhasil Dihapus');
    return redirect()->to(base_url('barang'));
  }


}
  
