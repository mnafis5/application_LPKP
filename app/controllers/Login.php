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
        $data['login'] = $this->model('Log_model')->getUser($datum['username'],$datum['code']);
        if($data['login'] == NULL)
        {
            header('Location: '.BASEURL.'/404');
            Flasher::flash('gagal','masuk','danger');
            
        }else{
            foreach($data['login'] as $row){
                if($datum['code'] == $row['code']) {
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['role'] = $row['role'];
                header('Location:'.BASEURL.'/home');
                }else {
                    header('Location: '.BASEURL.'/404');
                    Flasher::flash('gagal','masuk','danger');
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
        $this->view('templates/header',$data);
        $this->view('login/ubah',$data);
        $this->view('templates/footer');
        
    }

    public function change()
    {
        if ($this->model('Log_model')->change_pass($_POST) > 0 ) {
            Flasher::setFlash('berhasil','diubah','success');
            header('Location: ' . BASEURL . '/home');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah','danger');
        }
    }

    
}