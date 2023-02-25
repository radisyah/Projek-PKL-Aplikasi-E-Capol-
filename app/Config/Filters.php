<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'filteradmin' => \App\Filters\FilterAdmin::class,
		'filteruser' => \App\Filters\FilterUser::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'filteradmin' => ['except' => [
				'auth', 'auth/*'
				]],
				'filteruser' => ['except' => [
					'auth', 'auth/*',
					]],
			// 'csrf',
		],
		'after'  => [
			'filteradmin' => ['except' => [
				'dashboard', 'dashboard*',
				'barang', 'barang/*',
				'kategori', 'kategori/*',
				'user', 'user/*',
				'satuan', 'satuan/*',
				'peminjaman', 'peminjaman/*',
				'pengembalian', 'pengembalian/*',
				'profil', 'profil/*',
				'setting', 'setting/*',
				'laporan', 'laporan/*',
				'daftartransaksi', 'daftartransaksi/*',
				]],
				'filteruser' => ['except' => [
					'peminjaman', 'peminjaman/*',
					'pengembalian', 'pengembalian/*',
					]],
			'toolbar',
			'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
