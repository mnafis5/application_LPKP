<?php

class Surat extends Controller{
    public function index()
    {
        $data['judul'] = 'Masuk';
        //set up time
        $data['timed'] = new DateTime();
        $data['timed']->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $data['surat'] = $this->model('Surat_model')->getAllSurat();
        $this->view('templates/header',$data);
        $this->view('surat/Masuk',$data);
        $this->view('templates/footer');

        if ($_SESSION['nama'] != 'admin') {
            echo "<script>
                $('.tombolTambah').remove();
                $('.act').remove();
                $('#aksi').remove();
            </script>";
        }
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah';
        $this->view('templates/header',$data);
        $this->view('surat/tambah',$data);
        $this->view('templates/footer');
    }
    public function tambahSurat()
    {
        if($this->model('Surat_model')->tambahSurat($_POST > 0) ){
            Flasher::setFlash('berhasil','ditambah','success');
            header('Location: ' . BASEURL . '/surat');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambah','danger');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }
    }
    public function hapus($id)
    {
       if($this->model('Surat_model')->hapusDataSurat($id) > 0) {
           Flasher::setFlash('berhasil','dihapus','success');
           header('Location: ' .BASEURL . '/surat/masuk');
           exit; 
       }else{
           Flasher::setFlash('gagal','dihapus','danger');
           header('Location: ' . BASEURL . '/surat/masuk');
           exit;
       }
    }

    public function details($id)
    {
        $data['judul'] = 'Detail Surat';
        $data['surat'] = $this->model('Surat_model')->getSuratById($id);
        $this->view('templates/header',$data);
        $this->view('surat/details',$data);
        $this->view('templates/footer');
    }
    public function update()
    {
        if ($this->model('Surat_model')->ubahDataSiswa($_POST) > 0 ) {
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' . BASEURL . '/surat');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/surat');
            exit;
        } 
    }
    public function getUbah()
    {
      echo json_encode( $this->model('Surat_model')->getSuratById($_POST['id']) );
    }

    public function draft()
    {
        if($this->model('Surat_model')->tambahDraft($_POST > 0) ){
            Flasher::setFlash('berhasil','disimpan ke draft','success');
            header('Location: ' . BASEURL . '/surat');
            exit;
        }else{
            Flasher::setFlash('gagal','disimpan ke draft','danger');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }
    }

    public function filter()
    {
        $data['judul'] = 'Masuk';
        $data['surat'] = $this->model('Surat_model')->getSuratOnlyByFilter();
        $this->view('templates/header',$data);
        $this->view('surat/Masuk',$data);
        $this->view('templates/footer');
        
    }
    public function cari()
    {
        $data['judul'] = 'Masuk';
        $data['surat'] = $this->model('Surat_model')->cariDataSurat();
        
        $this->view('templates/header',$data);
        $this->view('surat/masuk',$data);
        $this->view('templates/footer');
    }
}