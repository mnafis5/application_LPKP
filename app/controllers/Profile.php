<?php

class Profile extends Controller{
    public function index()
    {
        $data['judul'] = 'profile';
        $data['user'] = $this->model('Profile_model')->getUserByName();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates3/header',$data);
        $this->view('partials/sidebar',$data);
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
        $data['user'] = $this->model('Profile_model')->getUserByName(); 
        $data['log'] = $this->model('Profile_model')->getUserByName(); 
        $data['valid'] = $this->model('Profile_model')->validextentions();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $data['valid'] = $this->model('Profile_model')->validextentions(); 
        $this->view('templates3/header',$data);
        $this->view('partials/sidebar',$data);
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
    
    public function plan()
    {
        $data['judul'] = 'Rencana page';
        $data['user'] = $this->model('Profile_model')->getUserByName();
        $this->view('templates3/header',$data);
        $this->view('partials/sidebar',$data);
        $this->view('profile/plan',$data);
        $this->view('templates3/footer');
    }
}
