<?php

class Keluar extends Controller{
    public function index() 
    {
        $data['judul'] = 'Keluar';
        $data['surat'] = $this->model('Surat_keluar')->getAllSurat();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates2/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('keluar/index',$data);
        $this->view('templates2/footer');

        if ($_SESSION['role'] == 'pimpinan') {
            echo "<script>
                $('.dele').remove();
            </script>";
        }
        if ($_SESSION['role'] == 'sekretaris') {
            echo "<script>
                $('.dele').remove();
            </script>";
        }
        if ($_SESSION['role'] == 'staff' || $_SESSION['role'] == 'siswa magang') {
            echo "<script>
                $('.act').remove();
            </script>";
        }
        if ($_SESSION['role'] == 'client') {
            echo "<script>
                $('.act').remove();
                $('.tombolTambah').remove(); 
                $('.drf').remove(); 
            </script>";
        }
    }
    public function tambahSuratKeluar()
    {
        if($this->model('Surat_keluar')->tambahSuratKel($_POST > 0) ){
            Flasher::setFlash('berhasil','ditambah','success');
            header('Location: ' . BASEURL . '/keluar');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambah','danger');
            header('Location: ' . BASEURL . '/keluar');
            exit;
        }
    }
    public function hapusKel($id)
    {
       if($this->model('Surat_keluar')->hapusDataSuratKel($id) > 0) {
           Flasher::setFlash('gagal','dihapus','success');
           header('Location: ' . BASEURL . '/keluar');
           exit; 
       }else{
           Flasher::setFlash('berhasil','dihapus','danger');
           header('Location: ' . BASEURL . '/keluar');
           exit;
       }
    }

    public function details($id)
    {
        $data['judul'] = 'Detail Surat';
        $data['surat'] = $this->model('Surat_keluar')->getSuratKeluarById($id);
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates2/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('keluar/details',$data);
        $this->view('templates2/footer');
    }

    public function ubah()
    {
        if ($this->model('Surat_keluar')->ubahDataSuratKeluar($_POST) > 0 ) {
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' . BASEURL . '/keluar');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/keluar');
            exit;
        } 
    }
    

    public function getUbah()
    {
      echo json_encode( $this->model('Surat_keluar')->getSuratKeluarById($_POST['id']) );
    }

    public function draftAdd()
    {
        if($this->model('Draft_model')->tambahDraft($_POST > 0) ){
            Flasher::setFlash('berhasil','disimpan ke draft','success');
            header('Location: ' . BASEURL . '/keluar');
            exit;
        }else{
            Flasher::setFlash('gagal','disimpan ke draft','danger');
            header('Location: ' . BASEURL . '/keluar');
            exit; 
        }
    }

    public function draftUpdate()
    {
        if($this->model('Draft_model')->ubahDraft($_POST > 0) ){
            Flasher::setFlash('berhasil','ditambahkan','success');
            header('Location: ' . BASEURL . '/keluar');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambahkan','danger');
            header('Location: ' . BASEURL . '/keluar');
            exit;
        }
    }

    public function getUpdate()
    {
      echo json_encode( $this->model('Draft_model')->getDraftById($_POST['id']) );
    }

    public function draftPage()
    {
        $data['judul'] = 'Draft';
        $data['draft'] = $this->model('Draft_model')->getAllDraft();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $data['surat'] = $this->model('Surat_keluar')->getAllSurat();
        $this->view('templates2/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('keluar/draftPage',$data);
        $this->view('templates2/footer');
    }
    
    public function hapusDraft($id)
    {
       if($this->model('Draft_model')->hapusDraft($id) > 0) {
           Flasher::setFlash('gagal','dihapus','success');
           header('Location: ' . BASEURL . '/keluar');
           exit; 
       }else{
           Flasher::setFlash('berhasil','dihapus','danger');
           header('Location: ' . BASEURL . '/keluar');
           exit;
       }
    }
    public function filter()
    {
        $data['judul'] = 'Keluar';
        $data['surat'] = $this->model('Surat_keluar')->getSuratOnlyByFilter();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('keluar/index',$data);
        $this->view('templates/footer');
        
    }
    public function cari()
    {
        $data['judul'] = 'Masuk';
        $data['surat'] = $this->model('Surat_model')->cariDataSurat();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('surat/masuk',$data);
        $this->view('templates/footer');
    }

}
