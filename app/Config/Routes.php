<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Masyarakat::index');
$routes->get('/login', 'Masyarakat::login');
$routes->post('/login', 'Masyarakat::login');
$routes->get('/daftar', 'Masyarakat::registrasi');
$routes->post('/daftar', 'Masyarakat::registrasi');
$routes->get('/logout', 'Masyarakat::logout');
$routes->get('/dashboard-masyarakat', 'Masyarakat::dashboard',['filter'=>'otentifikasi']);
$routes->get('/ajukan-pengajuan', 'Pengaduan::formPengaduan',['filter'=>'otentifikasi']);
$routes->post('/kirim-pengaduan', 'Pengaduan::kirimPengaduan',['filter'=>'otentifikasi']);

