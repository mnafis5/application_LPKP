<?php

class Profile_model{
    private $table = 'users';
    private $db;

    public function __construct()
     {
         $this->db = new Database;
     }

    public function getUserById($id)
     {
         $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
         $this->db->bind('id',$id);
         return $this->db->resultSet();
     }

     public function getUserByName()
     {
         $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama = :nama');
         $this->db->bind('nama',$_SESSION['nama']);
         return $this->db->resultSet();
     }
     public function validextentions(){
        $imageExtentionsValid = ['jpg','png','jpeg','pdf','docx','webp'];
        return $imageExtentionsValid;
     }
     public function create(){
        //take data from $_FILES[namefile,sizefile,error,tmp_name]
        $nameFile = $_FILES['img']['name'];
        $sizeFile = $_FILES['img']['size'];
        $error = $_FILES['img']['error'];
        $tmpName = $_FILES['img']['tmp_name'];
        //check if the data is image file 
        $imageExtentionsValid = $this->validextentions();
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
        move_uploaded_file($tmpName, 'img/profil/' . $newPictureName);
        //return output $newNameOfFile
        return $newPictureName;
        //then go to insert of file
        
        
    }

     public function ubahDataUser($data)
    {
        $img = $this->create();
        $query = "UPDATE users SET 
                    nama = :nama,
                    username = :username,
                    role = :role,
                    email = :email,
                    address = :address,
                    phone = :phone,
                    about = :about,
                    img = :img
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $_SESSION['nama']);
        $this->db->bind('username', $_POST['username']);
        $this->db->bind('role', $_POST['role']);
        $this->db->bind('email', $_POST['email']);
        $this->db->bind('address', $_POST['address']);
        $this->db->bind('phone', $_POST['phone']);
        $this->db->bind('about', $_POST['about']);
        $this->db->bind('img', $img);
        $this->db->bind('id', $_POST['id']);

        $this->db->execute();

        return $this->db->rowCount();
      }
    
    public function getProfileimage()
    {
        $data = $this->getUserByName();
        foreach($data as $su){
            $eimg = explode('.',$su['img']);
            $namimg = $eimg[0];
            $extend = end($eimg);
            if($extend == NULL){
                $namimg = 'no_avatar';
                $extend = 'jpg';
            }
        }
        $image = $namimg .'.'. $extend;

        return $image;
    }

}
