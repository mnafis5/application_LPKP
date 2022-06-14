<?php

class Home extends Controller{
    public function index()
    {
        $data['style'] = 'css';
        $data['judul'] = 'Home';
        $data['user'] = $this->model('Profile_model')->getUserByName();
        $data['profile'] = $this->model('Profile_model')->getProfileimage();
        $this->view('templates/header',$data);
        $this->view('partials/navbar',$data);
        $this->view('home/index',$data);
        $this->view('templates/footer');
    }
}
