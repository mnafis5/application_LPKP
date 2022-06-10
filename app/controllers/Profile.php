<?php

class Profile extends Controller{
    public function index()
    {
        $data['judul'] = 'profile';
        $this->view('templates3/header',$data);
        $this->view('profile/index',$data);
        $this->view('templates3/footer');
        
        if ($_SESSION['nama'] != 'admin') {
            echo "<script>
            $('.akun').remove();
            </script>";
        }
    }
    
    public function setting()
    {
        $data['judul'] = 'setting';
        $data['log'] = $this->model('Profile_model')->getUserByName(); 
        $data['valid'] = $this->model('Profile_model')->validextentions(); 
        $this->view('templates3/header',$data);
        $this->view('profile/setting',$data);
        $this->view('templates3/footer');

        if ($_SESSION['nama'] != 'admin') {
            echo "<script>
                $('.akun').remove();
            </script>";
        }
    }

    public function getUbah()
    {
    //   echo json_encode( $this->model('Profile_model')->getUserById($_POST['id']) );
        echo $_POST['id'];
    }

    public function update()
    {
        if ($this->model('Profile_model')->ubahDataUser($_POST) > 0 ) {
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' . BASEURL . '/profile/setting');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/profile/setting');
            exit;
        } 
    }
}