<?php

class Daftar extends Controller{
    public function index()
    {
        $data['judul'] = 'Daftar';
        $data['mhs'] = $this->model('Siswa_model')->getLimitSiswa();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('daftar/index',$data);
        $this->view('templates/footer');
        //|| $_SESSION['role'] != 'pimpinan' || $_SESSION['role'] != 'sekretaris'
        
        if ($_SESSION['role'] != 'admin') {
            echo "<script>
                $('#delAll').remove();
            </script>";
        }
        
    }
    
    public function detail($id)
    {
        $data['judul'] = 'Detail siswa';
        $data['mhs'] = $this->model('Siswa_model')->getSiswaById($id);
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('daftar/detail',$data);
        $this->view('templates/footer');
        $this->model('Siswa_model')->tracker();
    }

    public function hapus($id)
    {
       if($this->model('Siswa_model')->hapusDataSiswa($id) > 0) {
           $this->model('Surat_model')->tracker_hapus();
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
        $data['judul'] = 'Cari';
        $data['img'] = 'no_avatar';
        $data['mhs'] = $this->model('Siswa_model')->cariDataSiswa();
        $this->model('Siswa_model')->tracker_cari();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('daftar/index',$data);
        $this->view('templates/footer');

        if ($_GET['url'] == "daftar/cari") {
            echo "<script>
            $('.trigger').hide();
            </script>";
        }
    }
    
    public function tambah()
    {
        if($this->model('Siswa_model')->tambahDataSiswa($_POST > 0) ){
            $this->model('Siswa_model')->tracker();
            Flasher::setFlash('berhasil','ditambah','success');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambah','danger');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }
    
    }

    public function tambahSer()
    {
        if($this->model('Siswa_model')->tambahDataSer($_POST > 0) ){
            $this->model('Siswa_model')->tracker_ser();
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
        $data['judul'] = 'Upload Sertifikat';
        $data['mhs'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('templates/header',$data);
        $this->view('daftar/addPictures',$data);
        $this->view('templates/footer');   
        
    }

    public function uploadImg()
    {
        if($this->model('Picture')->saveImg($_POST) > 0) {
            $this->model('Siswa_model')->tracker_img();
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' .BASEURL . '/daftar');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }
    }

    public function importData()
    {
        $data['judul'] = 'Import Data';
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('daftar/importData',$data);
        $this->view('templates/footer');
    }
   
    public function indexAll()
    {
        $data['judul'] = 'All_data_included';
        $data['img'] = 'no_avatar';
        $data['mhs'] = $this->model('Siswa_model')->getAllSiswa();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('daftar/index',$data);
        $this->view('templates/footer');

        if ($_GET['url'] == "daftar/indexAll") {
            echo "<script>
            $('.trigger').hide();
            </script>";
        }
    }

    public function tambahImg()
    {
        $data['judul'] = 'Upload Profile image';
        $this->view('templates/header',$data);
        $this->view('daftar/tambahImg',$data);
        $this->view('templates/footer');   
        
    }


    public function uploadSiswa()
    {
        if($this->model('Siswa_model')->saveProfile($_POST) > 0) {
            $this->model('Siswa_model')->tracker_img();
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' .BASEURL . '/daftar');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/daftar');
            exit;
        }
    }

    public function deleteAll()
    {
       if($this->model('Siswa_model')->delete() > 0) {
           Flasher::setFlash('berhasil','dihapus','success');
           header('Location: ' .BASEURL . '/daftar');
           exit; 
       }else{
           Flasher::setFlash('gagal','dihapus','danger');
           header('Location: ' . BASEURL . '/daftar');
           exit;
       }
    }

}
