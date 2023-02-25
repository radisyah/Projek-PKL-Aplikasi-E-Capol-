<?php namespace App\Controllers;
use App\Models\ModelAuth;

class Auth extends BaseController
{

	public function __construct()
  {
    helper('form');
    $this->ModelAuth = new ModelAuth();
	}

	public function index()
	{
		$data = array(
			'title' => 'Login',
			'isi' => 'v_login',
		);
		return view('layout_login/v_wrapper', $data);
	}

	public function cek_login()
  {
    if ($this->validate([
        'username'=>[
        'label' => 'Username',
        'rules' => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong!!'
          ]
        ],
        'password'=>[
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong!!'
          ]
        ],
    ])) {
        // jika tidak valids
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');
      $cek = $this->ModelAuth->login($username,$password);
      if ($cek) {
          session()->set('log',true);
          session()->set('id_user',$cek['id_user']);
          session()->set('username',$cek['username']);
          session()->set('password',$cek['password']);
          session()->set('level',$cek['level']);
          // Logins
          return redirect()->to(base_url('dashboard'));
      }else {
        // Jika datanya tidak cocok
        session()->setFlashdata('pesanGagal', 'Login Gagal');
        return redirect()->to(base_url('auth'));
      }
    }else {
       	session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
        return redirect()->to(base_url('auth'))->withInput('validation',\Config\Services::validation());
    }
  }

  public function logout(){
    session()->remove('log');
    session()->remove('username');
    session()->remove('level');
    session()->remove('foto');
    session()->setFlashdata('pesanSukses', 'Logout Sukses');
    return redirect()->to(base_url('auth'));
  }


	

	//--------------------------------------------------------------------

}
