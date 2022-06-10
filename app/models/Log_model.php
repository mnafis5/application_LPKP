<?php

class Log_model{
     private $db;
     private $table = 'users';

     public function __construct()
     {
         $this->db = new Database;
     }
     public function getAllUser($username)
     {
         $this->db->query('SELECT * FROM ' . $this->table . 'WHERE username = :username');
         $this->db->bind('username',$username);
         return $this->db->result();
     }

     public function getUser($username,$code)
     {
        //  $allPass = $this->return_pass($username,$password);
         $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username AND code = :code' );
         $this->db->bind('username',$username);
         $this->db->bind('code',$code);
         return $this->db->resultSet();
     }
     public function getUserByName()
     {
         $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama = :nama');
         $this->db->bind('nama',$_SESSION['nama']);
         return $this->db->resultSet();
     }
     public function securePass($password)
     {
         $hash = password_hash($password,PASSWORD_BCRYPT,array("cost" => 9));
         return $hash;
     }
     public function return_pass($username,$password)
     {
         $getUser = $this->getAllUser($username);
         foreach($getUser as $pass) {
                password_verify($password,$pass['password']);
                //  $this->db->query('SELECT password FROM ' . $this->table . ' WHERE password = :password');
                 $this->db->bind('password',$pa);
                 return $this->db->result();
            }
     }
     public function replace_last_character($string, $jum_digit_terakhir=1) {
        $arr_split = str_split($string);
        $jum_str = strlen($string);//bisa juga dengan count($arr_split)
        
        $replace_with = '*';
        $replace_start = $jum_str - $jum_digit_terakhir;
        
        if ($replace_start < 0) {
            return $string;
        }
        
        $str_fmt = '';
        for ($i=0;$i<$jum_str;$i++) {
            if ($i < $replace_start) {
                $str_fmt .= $arr_split[$i];
            } else {
                $str_fmt .= $replace_with;
            }
        }
        
        return $str_fmt;
    }
     public function addUser($data)
     {
         $pass = $_POST['password'];
         $length = ['cost' => 9 ];
         $hash = password_hash($pass,PASSWORD_DEFAULT,$length);

         $this->db->query("INSERT INTO users 
         VALUES
         ('', :username, :nama, :password, :role)");
         $this->db->bind('username',$_POST['username']);
         $this->db->bind('nama',$_POST['nama']);
         $this->db->bind('password',$hash);
         $this->db->bind('role',$_POST['role']);

         $this->db->execute();

         return $this->db->rowCount();
     }

     public function change_pass()
     {
        //check all variables
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $verifyPass = $_POST['verifyPass'];
        $hashed_pass = $this->getUserByName();
    foreach($hashed_pass as $hash){
        //if the old password is true, load the new password
        if(password_verify($oldPass,$hash['password'])) {
            //filter the new password
            $options = [
                'min_length' => 6,
                'max_length' => 12
            ];
            if($newPass < $options['min_length']) {
                echo 
            "<script>
            alert('Password terlalu pendek');
             </script>";
             header('Location: ' . BASEURL . '/login/ubah');
            exit;
            }elseif($newPass > $options['max_length']) {
                echo 
            "<script>
            alert('Password terlalu panjang');
  
             </script>";
            header('Location: ' . BASEURL . '/login/ubah');
            exit;
            }elseif (!preg_match("/^[a-zA-Z0-9]*$/",$newPass)) {
                echo 
            "<script>
            alert('Password tidak kuat');
  
             </script>";}
             //having filled the new password, check the new password on the verifyPass
             if($newPass == $verifyPass){
                $query = "UPDATE users SET 
                password = :password
              WHERE nama = :nama";
            $past = $_POST['newPass'];
            $length = ['cost' => 9 ];
            $hash = password_hash($past,PASSWORD_DEFAULT,$length);
            $this->db->query($query);
            $this->db->bind('password',$hash);
            $this->db->bind('nama', $_SESSION['nama']);
            
            //after passing all terms, process the new password  
            $this->db->execute();

            return $this->db->rowCount();}
        
    }
    else{ //else then forbid
        Flasher::setFlash('gagal','diubah','danger');
    }

    }  
    }
}