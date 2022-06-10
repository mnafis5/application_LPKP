<?php

class Daftar extends Controller{
    public function index()
    {
        $data['judul'] = 'Daftar';
        $data['img'] = 'no_avatar';  
        $data['mhs'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('templates/header',$data);
        $this->view('daftar/index',$data);
        $this->view('templates/footer');
    }
    
    public function detail($id)
    {
        $data['judul'] = 'Detail siswa';
        $data['mhs'] = $this->model('Siswa_model')->getSiswaById($id);
        $this->view('templates/header',$data);
        $this->view('daftar/detail',$data);
        $this->view('templates/footer');
    }

    public function hapus($id)
    {
       if($this->model('Siswa_model')->hapusDataSiswa($id) > 0) {
           Flasher::setFlash('berhasil','dihapus','success');
           header('Location: ' .BASEURL . '/daftar');
           exit; 
       }else{
           Flasher::setFlash('gagal','dihapus','danger');
           header('Location: ' . BASEURL . '/daftar');
           exit;
       }
    }

    public function add()
    {
        $data['judul'] = 'tambah';
        $this->view('templates/header',$data);
        $this->view('daftar/add',$data);
        $this->view('templates/footer');
    }
    
    public function cari()
    {
        $data['judul'] = 'tambah';
        $data['img'] = 'no_avatar';
        $data['mhs'] = $this->model('Siswa_model')->cariDataSiswa();
        $this->view('templates/header',$data);
        $this->view('daftar/index',$data);
        $this->view('templates/footer');
    }
    
    public function tambah()
    {
        if($this->model('Siswa_model')->tambahDataSiswa($_POST > 0) ){
            Flasher::setFlash('berhasil','ditambah','success');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambah','danger');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }
    
    }

    public function addPictures()
    {
        $data['judul'] = 'Upload Image';
        $this->view('templates/header',$data);
        $this->view('daftar/addPictures',$data);
        $this->view('templates/footer');   
        
    }

    public function uploadImg()
    {
        if($this->model('Picture')->saveImg($_POST) > 0) {
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' .BASEURL . '/daftar');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }
    }
   
}