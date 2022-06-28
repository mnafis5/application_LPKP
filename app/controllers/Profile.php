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
            $('.use').remove();
            $('.his').remove();
            </script>";
        }
    }
    
    public function setting()
    {
        $data['judul'] = 'setting';
        $data['log'] = $this->model('Profile_model')->getUserByName(); 
        $data['user'] = $this->model('Profile_model')->getUserByName(); 
        $data['valid'] = $this->model('Profile_model')->validextentions();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates3/header',$data);
        $this->view('partials/sidebar',$data);
        $this->view('profile/setting',$data);
        $this->view('templates3/footer'); 

        if ($_SESSION['nama'] != 'admin') {
            echo "<script>
                $('.akun').remove();
                $('.use').remove();
                $('.his').remove();
            </script>";
        }
    }

    public function hapus($id)
    {
       if($this->model('Profile_model')->hapusProfile($id) > 0) {
           Flasher::setFlash('berhasil','dihapus','success');
           header('Location: ' .BASEURL . '/profile/users');
           exit; 
       }else{
           Flasher::setFlash('gagal','dihapus','danger');
           header('Location: ' . BASEURL . '/profile/users');
           exit;
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

    public function history()
    {
        $data['judul'] = 'History page';
        $data['us_act'] = $this->model('Profile_model')->getUserAct();
        $data['us_log'] = $this->model('Profile_model')->getUserLog();
        $data['user'] = $this->model('Profile_model')->getUserByName();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates3/header',$data);
        $this->view('partials/sidebar',$data);
        $this->view('profile/history',$data);
        $this->view('templates3/footer');

        if ($_SESSION['nama'] != 'admin') {
            echo "<script>
                $('.akun').remove();
                $('.use').remove();
                $('.his').remove();
            </script>";
        }
    }

    public function users()
    {
        $data['judul'] = 'Kelola users page';
        $data['users'] = $this->model('Profile_model')->getAllUsers();
        $data['user'] = $this->model('Profile_model')->getUserByName();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates3/header',$data);
        $this->view('partials/sidebar',$data);
        $this->view('profile/users',$data);
        $this->view('templates3/footer');

        if ($_SESSION['nama'] != 'admin') {
            echo "<script>
                $('.akun').remove();
            </script>";
        }
    }

    public function profile()
    {
        $data['judul'] = 'Profile';
        $data['log'] = $this->model('Profile_model')->getUserByName(); 
        $data['user'] = $this->model('Profile_model')->getUserByName(); 
        $data['valid'] = $this->model('Profile_model')->validextentions();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates3/header',$data);
        $this->view('partials/sidebar',$data);
        $this->view('profile/profile',$data);
        $this->view('templates3/footer'); 

        if ($_SESSION['nama'] != 'admin') {
            echo "<script>
                $('.akun').remove();
                $('.use').remove();
                $('.his').remove();
            </script>";
        }
    }

    

    
}
