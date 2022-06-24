<?php

require_once '../app/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\Calculation\Database;


class Siswa_model{
    private $table = 'student';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLimitSiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table .' ORDER BY num ASC LIMIT 15');
        return $this->db->resultSet();
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

    public function create(){
        //take data from $_FILES[namefile,sizefile,error,tmp_name]
        $nameFile = $_FILES['img']['name'];
        $sizeFile = $_FILES['img']['size'];
        $error = $_FILES['img']['error'];
        $tmpName = $_FILES['img']['tmp_name'];
        //check if the data is image file 
        $imageExtentionsValid = ['jpg','png','pdf', 'webp'];
        $imageExtention;
        $imageExtention = explode('.',$nameFile);
        $imageExtention = strtolower(end($imageExtention));
        if (!in_array($imageExtention,$imageExtentionsValid)) {
            echo 
            "<script>
            alert('Yang anda upload bukan gambar');
  
        </script>";

        echo 'Back to daftar page';
        }
        //check if the size of data is not bigger than the maximum
        if ($sizeFile > 20000000) {
            echo "<script>
            alert('Yang anda upload bukan gambar');
  
        </script>";

        echo 'Back to daftar page';
        }
        //combine the name of file + . + extention file using uniqid()
        $newPictureName;
        $newPictureName = uniqid(); 
        $newPictureName .= '.';
        $newPictureName .= $imageExtention;
        //having been combined, move them into a new folder using move_uploaded_file(tmp_name,folder_destination . $newPictureName)
        move_uploaded_file($tmpName, 'img/siswa/' . $newPictureName);
        //return output $newNameOfFile
        return $newPictureName;
        //then go to insert of file
        
        
    }
    public function create2(){
        //take data from $_FILES[namefile,sizefile,error,tmp_name]
        $nameFile = $_FILES['ser']['name'];
        $sizeFile = $_FILES['ser']['size'];
        $error = $_FILES['ser']['error'];
        $tmpName = $_FILES['ser']['tmp_name'];
        //check if the data is image file 
        $imageExtentionsValid = ['jpg','png','pdf','webp'];
        $imageExtention;
        $imageExtention = explode('.',$nameFile);
        $imageExtention = strtolower(end($imageExtention));
        if (!in_array($imageExtention,$imageExtentionsValid)) {
            echo 
            "<script>
            alert('Yang anda upload bukan gambar');
  
        </script>";

        echo 'Back to daftar page';
        }
        //check if the size of data is not bigger than the maximum
        if ($sizeFile > 20000000) {
            echo "<script>
            alert('Yang anda upload bukan gambar');
  
        </script>";

        echo 'Back to daftar page';
        }
        //combine the name of file + . + extention file using uniqid()
        $newPictureName;
        $newPictureName = uniqid(); 
        $newPictureName .= '.';
        $newPictureName .= $imageExtention;
        //having been combined, move them into a new folder using move_uploaded_file(tmp_name,folder_destination . $newPictureName)
        move_uploaded_file($tmpName, 'img/sertificate/' . $newPictureName);

        unlink($nameFile);
        //return output $newNameOfFile
        return $newPictureName;
        //then go to insert of file
        
        
    }
    public function tambahDataSiswa($data){
        $img = $this->create();
        $ser = $this->create2();
        
        $query = "INSERT INTO student 
                  VALUES 
                  ('', :nama, :addresss, :num, :tempat, :tanggal, :jk, :studies, :phone, :Jenis, :masuk, :keluar, :nik, :img, :ser)";

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
        $this->db->bind('nik',$_POST['nik']);
        $this->db->bind('img',$img);
        $this->db->bind('ser',$ser);
        
        $this->db->execute();
        
        return $this->db->rowCount();
        
    }

    public function return_file_excel()
    {
      require_once '../app/vendor/autoload.php';
    }

    public function tambahDataSer($data)
    {
        $ser = $this->create2();
        
        $query = "UPDATE student 
                  SET 
                  ser = :ser WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('ser',$ser);
        $this->db->bind('id',$_POST['id']);
        
        $this->db->execute();
        
        return $this->db->rowCount();
        
    }

    public function saveProfile($data)
    {
        $img = $this->create();
        
        $query = "UPDATE student 
                  SET 
                  img = :img WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('img',$img);
        $this->db->bind('id',$_POST['id']);
        
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

    public function uploadEx()
    {
        $name = $_FILES['siswa']['name'];
        $tmp = $_FILES['siswa']['tmp_name'];
        //permission for the file gets read
        $reader = PhpOffice\PhpSpreadsheet\IOfactory::createReaderForFile($tmp);
        //pulling the xls file
        $spreadsheet = $reader->load($tmp);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        //count the number of lines
        $jumlahData = 0;
        for($i=4;$i<count($sheetData);$i++)
        { 
            $nama = $sheetData[$i][1];
            $addresss = $sheetData[$i][2];
            $num = $sheetData[$i][3];
            $tempat = $sheetData[$i][4];
            $tanggal = $sheetData[$i][5];
            $jk = $sheetData[$i][6];
            $studies = $sheetData[$i][7];
            $phone = $sheetData[$i][8];
            $Jenis = $sheetData[$i][9];
            $masuk = $sheetData[$i][10];
            $keluar = $sheetData[$i][11];
            $nik = $sheetData[$i][12];
            // $img = $sheetData[$i][14];
            // $ser = $sheetData[$i][15];     
            //$address-$num-$tempat-$tanggal-$jk-$studies
            
            $query = "INSERT INTO student VALUES
            ('',:nama, :addresss, :num, :tempat, :tanggal, :jk, :studies, :phone, :Jenis, :masuk, :keluar, :nik, :img, :ser)";
            
            $this->db->query($query);
            $this->db->bind('nama',$nama);
            $this->db->bind('addresss',$addresss);
            $this->db->bind('num',$num);
            $this->db->bind('tempat',$tempat);
            $this->db->bind('tanggal',$tanggal);
            $this->db->bind('jk',$jk);
            $this->db->bind('studies',$studies);
            $this->db->bind('phone',$phone);
            $this->db->bind('Jenis',$Jenis);
            $this->db->bind('masuk',$masuk);
            $this->db->bind('keluar',$keluar);
            $this->db->bind('nik',$nik);
            $this->db->bind('img','');
            $this->db->bind('ser','');
            
            $this->db->execute();
            
            return $this->db->rowCount();
            
            $jumlahData++;
        
        }

        
    }

    public function delete() 
    {
        $query = "DELETE FROM student";

        $this->db->query($query);

        $this->db->execute();

        return $this->db->rowCount();
    }





}
