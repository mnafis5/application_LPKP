<?php

class Login extends Controller{
    public function index()
    {
        $data['judul'] = 'Login page';

        $this->view('login/index',$data); 
    }

    public function login()
    {
        $datum = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'code' => $_POST['code']
        ];
        // $this->model('Log_model'->replace_last_character($datum['code']));
        $data['login'] = $this->model('Log_model')->getUser($datum['username'],$datum['password']);
        if($data['login'] == NULL)
        {
            // header('Location: '.BASEURL.'/login');
            // exit;
            // Flasher::flash('gagal','masuk','danger');
            echo 'Password atau code atau username anda salah <br>
            <a href=' . BASEURL . '/login>back</a>';
            
        }else{
            foreach($data['login'] as $row){
                if($datum['password'] == $row['password'] && $datum['code'] == $row['code']) {
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['role'] = $row['role'];
                header('Location:'.BASEURL.'/home');
                }else {
                    // header('Location: '.BASEURL.'/login');
                    // Flasher::flash('gagal','masuk','danger');
                    echo "Password atau code atau username anda salah";
                }
        }
    }
    
    }

    public function logout()
    {
        $_SESSION['nama'] = '';
        session_destroy();
        header('Location:'.BASEURL.'/login');
    }

    public function admin()
    {
        $data['judul'] = $_SESSION['nama'];
        $this->view('login/admin',$data);

        if($_SESSION['nama'] != 'admin')
        {
            header('Location:'.BASEURL.'/home');
        }
    }

    public function addUser()
    {
        if($this->model('Log_model')->addUser($_POST > 0) ){
            Flasher::setFlash('berhasil','ditambah','success');
            header('Location: ' . BASEURL . '/login/admin');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambah','danger');
            header('Location: ' . BASEURL . '/login/admin');
            exit;
        }


    }

    public function ubah()
    {
        $data['judul'] = 'Ubah';
        $data['log'] = $this->model('Profile_model')->getUserByName(); 
        $data['user'] = $this->model('Profile_model')->getUserByName(); 
        $data['valid'] = $this->model('Profile_model')->validextentions();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates3/header',$data);
        $this->view('partials/sidebar',$data);
        $this->view('login/ubah',$data);
        $this->view('templates3/footer');
        if ($_SESSION['nama'] != 'admin') {
            echo "<script>
            $('.akun').remove();
            $('.use').remove();
            </script>";
        }
        
    }

    public function change()
    {
        if ($this->model('Log_model')->change_pass($_POST) > 0 ) {
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' . BASEURL . '/login/ubah');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
            header('Location: ' . BASEURL . '/login/ubah');
            exit;
        }
    }

    
}
