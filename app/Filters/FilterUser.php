<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterUser implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (session()->get('level')=="") {
      session()->setFlashdata('pesanGagal', 'Anda Belum Login');
      return redirect()->to(base_url('auth'));
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    if (session()->get('level')==2) {
      return redirect()->to(base_url('peminjaman'));
    }
  }
}