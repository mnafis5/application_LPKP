<?php

class Draft_model{
    private $table = 'drafts';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDraft()
    {
        $this->db->query('SELECT * FROM ' . $this->table .' ORDER BY tanggal ASC');
        return $this->db->resultSet();
    }

    public function getDraftById($id)
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
        $imageExtentionsValid = ['jpg','png','pdf'];
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
        move_uploaded_file($tmpName, 'img/keluar/' . $newPictureName);
        //return output $newNameOfFile
        return $newPictureName;
        //then go to insert of file
        
        
    }

    public function tambahDraft()
    {
        $img = $this->create();
        $query = "INSERT INTO drafts
                  VALUES 
                  ('', :num, :instansi, :tanggal, :lampiran, :isi, :img)";

        $this->db->query($query);
        $this->db->bind('num',$_POST['num']);
        $this->db->bind('instansi',$_POST['instansi']);
        $this->db->bind('tanggal',$_POST['tanggal']);
        $this->db->bind('lampiran',$_POST['lampiran']);
        $this->db->bind('isi',$_POST['isi']);
        $this->db->bind('img',$img);
        
    
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function hapusDraft($id)
    {
        $query = 'DELETE FROM drafts WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id',$id);
        $imag = $this->db->result();
        unlink(BASEURL . 'img/keluar/' . $imag[$id]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDraft($data)
    {
        $img = $this->create();
        $query = "INSERT INTO  keluar VALUES 
                    ('', :num, :instansi, :tanggal, :lampiran, :isi, :img)";

        $this->db->query($query);
        $this->db->bind('num', $_POST['num']);
        $this->db->bind('instansi', $_POST['instansi']);
        $this->db->bind('tanggal', $_POST['tanggal']);
        $this->db->bind('lampiran', $_POST['lampiran']);
        $this->db->bind('isi', $_POST['isi']);
        $this->db->bind('img', $img);

        $this->db->execute();

        return $this->db->rowCount();
      }


}