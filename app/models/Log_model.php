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

     public function getUser($username,$password)
     {
        //  $allPass = $this->return_pass($username,$password);
         $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username AND password = :password' );
         $this->db->bind('username',$username);
         $this->db->bind('password',$password);
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
         $post = '';
        //  $length = ['cost' => 9 ];
        //  $hash = password_hash($pass,PASSWORD_DEFAULT,$length);

         $this->db->query("INSERT INTO users 
         VALUES
         ('', :nama, :username, :password, :role, :code, :email, :address, :phone, :about, :img)");
         $this->db->bind('nama',$_POST['nama']);
         $this->db->bind('username',$_POST['username']);
         $this->db->bind('password',$pass);
         $this->db->bind('role',$_POST['role']);
         $this->db->bind('code',$_POST['code']);
         $this->db->bind('email',$_POST['email']);
         $this->db->bind('address',$_POST['address']);
         $this->db->bind('phone',$_POST['phone']);
         $this->db->bind('about',$_POST['about']);
         $this->db->bind('img',$post);

         $this->db->execute();

         return $this->db->rowCount();
     }

     public function change_pass($data)
     {
        //check all variables
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $verifyPass = $_POST['verifyPass'];
        $basepass = $this->getUserByName();
    foreach($basepass as $hash){
        //if the old password is true, load the new password
        if($oldPass === $hash['password']) {
            // //filter the new password
            // $options = [
            //     'min_length' => 6,
            //     'max_length' => 12
            // ];
            // if($newPass < $options['min_length']) {
            //     echo 
            // "<script>
            // alert('Password terlalu pendek');
            //  </script>";
            //  header('Location: ' . BASEURL . '/login/ubah');
            // exit;
            // }elseif($newPass > $options['max_length']) {
            //     echo
            // "<script>
            // alert('Password terlalu panjang');
  
            //  </script>";
            // header('Location: ' . BASEURL . '/login/ubah');
            // exit;
            // }
        

             //having filled the new password, check the new password on the verifyPass
            if($newPass === $verifyPass){
                    $query = "UPDATE users SET 
                    password = :password
                    WHERE id = :id";

                // $length = ['cost' => 9 ];
                // $hash = password_hash($past,PASSWORD_DEFAULT,$length);
                $this->db->query($query);
                $this->db->bind('password',$newPass);
                $this->db->bind('id',$_POST['id']);
                
                //after passing all termsi, process the new password  
                $this->db->execute();

                return $this->db->rowCount();
            }
        }
    }

    }

    public function tracker_login($nama,$role)
    {
        $data['time'] = new DateTime();
        $data['time']->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $data['isi'] = 'telah login website LPKP';
        $query = "INSERT INTO history_user_login VALUES('', :nama, :role, :ket, :timestamp)";

        $this->db->query($query);
        $this->db->bind('nama',$nama);
        $this->db->bind('role',$role);
        $this->db->bind('ket',$data['isi']);
        $this->db->bind('timestamp',$data['time']->format('Y-m-d H:i:s'));

        $this->db->execute();
    }

    public function hapusActive($id)
    {
        $query = 'DELETE FROM history_user_login WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }




}
