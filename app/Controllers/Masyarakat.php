<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Masyarakat extends BaseController
{
    public function index()
    {
        return view('masyarakat/beranda');
    }
    public function login(){
        $validasiForm=[
            'username'=>'required',
            'password'=>'required'

        ];
        if($this->validate($validasiForm)){
           $user=$this->request->getPost('username');
           $pass=md5($this->request->getPost('password'));
           $whereLogin=[
            'username'=>$user,
            'password'=>$pass

           ];

          $cekLogin=$this->masyarakat->where($whereLogin)->findAll();

          if(count($cekLogin)==1){
            $dataSession=[
                'username'=>$cekLogin[0]['username'],
                'password'=>$cekLogin[0]['password'],
                'nama'=>$cekLogin[0]['nama'],
                'sudahkahLogin'=>true
            ];

            session()->set($dataSession);

            return redirect()->to('/dashboard-masyarakat');
          }else{
            return redirect()->to('/login')->with('pesan','<p class="text-danger">Gagal Login</p>');
          }
        }
      
        return view('masyarakat/form-login');

    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }
    public function registrasi(){
        $validasiForm=[
            'username'=>'required',
            'txtNIK'=>'required',
            'txtNama'=>'required',
            'txtNoTELP'=>'required',
            'password'=>'required',
           
        ];
        if($this->validate($validasiForm)){
           $dataMasyarakat=[
            'nik'=>$this->request->getPost('txtNIK'),
            'nama'=>$this->request->getPost('txtNama'),
            'username'=>$this->request->getPost('username'),
            'password'=>md5($this->request->getPost('password')),
            'telp'=>$this->request->getPost('txtNoTELP'),

           ];
           $this->masyarakat->insert($dataMasyarakat);
           return redirect()->to('/login')->with('pesan','<span class="text-success">resgistrasi berhasil</span>');
           
        }
      
        return view('masyarakat/form-registrasi');
    }

   public function dashboard(){
   

    return view('masyarakat/dashboard');
   }
}
