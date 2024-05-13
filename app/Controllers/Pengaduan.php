<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengaduan extends BaseController
{
    public function index()
    {
        //
    }
    
    public function formPengaduan(){
        $data=[
            'judulHalaman'=>'Form Pengaduan',
            'introTeks'=>'Silahkan isi form pengaduan dibawah ini'
        ];
        return view('masyarakat/form-pengaduan',$data);
    }
    public function kirimPengaduan(){
        $validasiForm=[
            'fileNya'=>[
                'rules'=>'uploaded[fileNya]|mime_in[fileNya,image/jpg,image/jpeg,image/png]|max_size[fileNya,2048]',
                'errors'=>[
                    'uploaded'=>'file tidak boleh kosong',
                    'mime_in'=>'file ekstensi harus berupa gambar',
                    'max_size'=>'ukuran maksimal 2 Mb'
                ]
            ]
            ];
            if($this->validate($validasiForm)){
                $fileDiUpload =$this->request->getFile('fileNya');
                $fileName= $fileDiUpload->getRandomName();
                $fileDiUpload->move('uploads/berkas/',$fileName);

                $data=[
                    'tgl_pengaduan'=>date('d-m-Y H:i:s'),
                    'nik' => $this->request->getPost('txtNIK'),
                    'isi_laporan' => $this->request->getPost('txtIsiLaporan'),
                    'foto' => $fileName,
                    'status'=>0

                ];
                $this->pengaduan->save($data);
                return redirect()->to(site_url('ajukan-pengajuan'))->with('info','<div class="alert alert-success">data berhasil disimpan</div>');
            }else{
                return redirect()->to(site_url('ajukan-pengajuan'))->with('info','<div class="alert alert-warning">data gagal disimpan '.$this->validator->listErrors().'</div>');
            }
    }
}
