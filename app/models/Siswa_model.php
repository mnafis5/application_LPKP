<?php

class Siswa_model{
    private $table = 'student';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table .' ORDER BY num ASC');
        return $this->db->resultSet();
    }

    public function getSiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table .' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->result();
    }

    
    public function tambahDataSiswa($data){
        
        
        $query = "INSERT INTO student 
                  VALUES 
                  ('', :nama, :addresss, :num, :tempat, :tanggal, :jk, :studies, :phone, :Jenis, :masuk, :keluar, :ket)";

        $this->db->query($query);
        $this->db->bind('nama',$_POST['name']);
        $this->db->bind('addresss',$_POST['addresss']);
        $this->db->bind('num',$_POST['num']);
        $this->db->bind('tempat',$_POST['tempat']);
        $this->db->bind('tanggal',$_POST['tanggal']);
        $this->db->bind('jk',$_POST['jk']);
        $this->db->bind('studies',$_POST['studies']);
        $this->db->bind('phone',$_POST['phone']);
        $this->db->bind('Jenis',$_POST['Jenis']);
        $this->db->bind('masuk',$_POST['masuk']);
        $this->db->bind('keluar',$_POST['keluar']);
        $this->db->bind('ket',$_POST['ket']);
        
        $this->db->execute();
        
        return $this->db->rowCount();
        
    }

    public function hapusDataSiswa($id)
    {
        $query = 'DELETE FROM student WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataSiswa()
    {
        $keyword = $_POST["keyword"];

        $query = "SELECT * FROM student WHERE nama LIKE :keyword OR num LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }

}