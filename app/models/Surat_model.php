<?php

class Surat_model {
    private $table = 'surat';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->date = new DateTime;
    }

    public function getAllSurat()
    {
        $this->db->query('SELECT * FROM ' . $this->table .' ORDER BY tanggal DESC');
        return $this->db->resultSet();
    }

    public function getSuratById($id)
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
        $imageExtentionsValid = ['jpg','png','jpeg','pdf','docx'];
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
        move_uploaded_file($tmpName, 'img/surat/' . $newPictureName);
        //return output $newNameOfFile
        return $newPictureName;
        //then go to insert of file
        
        
    }
    public function ubahDataSiswa($data)
    {
        $img = $this->create();
        $query = "UPDATE surat SET 
                    num = :num,
                    instansi = :instansi,
                    tanggal = :tanggal,
                    lampiran = :lampiran,
                    isi = :isi,
                    img = :img
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('num', $_POST['num']);
        $this->db->bind('instansi', $_POST['instansi']);
        $this->db->bind('tanggal', $_POST['tanggal']);
        $this->db->bind('lampiran', $_POST['lampiran']);
        $this->db->bind('isi', $_POST['isi']);
        $this->db->bind('img', $img);
        $this->db->bind('id', $_POST['id']);

        $this->db->execute();

        return $this->db->rowCount();
      }
    
    public function tambahSurat($data){
        $img = $this->create();

        $query = "INSERT INTO surat
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
    public function hapusDataSurat($id)
    {
        $query = 'DELETE FROM surat WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMonth()
    {
        $this->db->query('SELECT tanggal FROM surat');
        return $this->db->result();
    }

    public function getSuratOnlyByFilter()
    {
        // //keyword
        $fil1 = $_POST["filtertanggal1"];
        $fil2 = $_POST["filtertanggal2"];

        $filter1 = explode('-',$fil1);
        $filter2 = explode('-',$fil2);

        $hari = $filter1[2];
        $bulan = $filter1[1];
        $tahun = $filter1[0];

        $hari1 = $filter2[2];
        $bulan1 = $filter2[1];
        $tahun1 = $filter2[0];
        //initial query
        $query = "SELECT * FROM surat WHERE tanggal BETWEEN '$tahun-$bulan-$hari 00:00:00'  AND '$tahun1-$bulan1-$hari1 00:00:00' ORDER BY tanggal DESC";
        $this->db->query($query);
        
        return $this->db->resultSet();
    }

    public function getTime()
    {
        $this->db->query('SELECT time FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function ReturnDifferenceTime($time)
    {
        switch ($time) {
            case $time->y > 0:
                return 'ditambahkan ' . $time->y . ' tahun yang lalu';
                break;
            case $time->m > 0:
                return 'ditambahkan ' . $time->m . ' bulan yang lalu';
                break;
            case $time->d > 0:
                return 'ditambahkan ' . $time->d . ' hari yang lalu';
                break;
            // case $time->h > 0:
            //     return 'ditambahkan ' . $time->h . ' jam yang lalu';
            //     break;
            // case $time->i > 0:
            //     return 'ditambahkan ' . $time->i . ' menit yang lalu';
            //     break;
            // case $time->s > 0:
            //     return 'ditambahkan ' . $time->s . ' detik yang lalu';
            //     break;
            
            default:
                # code...
                break;
        }
    }

    public function function_translate($tgl)
    {
        if($tgl[1] == '01') return 'Januari';
        if($tgl[1] == '02') return 'Februari';
        if($tgl[1] == '03') return 'Maret';
        if($tgl[1] == '04') return 'April';
        if($tgl[1] == '05') return 'Mei';
        if($tgl[1] == '06') return 'Juni';
        if($tgl[1] == '07') return 'Juli';
        if($tgl[1] == '08') return 'Agustus';
        if($tgl[1] == '09') return 'September';
        if($tgl[1] == '10') return 'Oktober';
        if($tgl[1] == '11') return 'November';
        if($tgl[1] == '12') return 'Desember';
    }

    public function cariDataSurat()
    {
        $keyword = $_POST["keyword"];

        $query = "SELECT * FROM surat WHERE instansi LIKE :keyword OR num LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }

    public function tracker()
    {
        $data['name'] = $_SESSION['nama'];
        $data['time'] = new DateTime();
        $data['time']->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $data['role'] = $_SESSION['role'];
        $data['isi'] = 'telah melihat isi dari salah satu surat pada surat masuk';
        $query = "INSERT INTO history_user_click VALUES('', :nama, :role, :ket, :timestamp)";

        $this->db->query($query);
        $this->db->bind('nama',$data['name']);
        $this->db->bind('role',$data['role']);
        $this->db->bind('ket',$data['isi']);
        $this->db->bind('timestamp',$data['time']->format('Y-m-d H:i:s'));

        $this->db->execute();

    }

    public function tracker_add()
    {
        $data['name'] = $_SESSION['nama'];
        $data['time'] = new DateTime();
        $data['time']->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $data['role'] = $_SESSION['role'];
        $data['isi'] = 'telah menambah satu surat pada surat masuk';
        $query = "INSERT INTO history_user_click VALUES('', :nama, :role, :ket, :timestamp)";

        $this->db->query($query);
        $this->db->bind('nama',$data['name']);
        $this->db->bind('role',$data['role']);
        $this->db->bind('ket',$data['isi']);
        $this->db->bind('timestamp',$data['time']->format('Y-m-d H:i:s'));

        $this->db->execute();

    }
    public function tracker_edit()
    {
        $data['name'] = $_SESSION['nama'];
        $data['time'] = new DateTime();
        $data['time']->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $data['role'] = $_SESSION['role'];
        $data['isi'] = 'telah mengedit satu surat pada surat masuk';
        $query = "INSERT INTO history_user_click VALUES('', :nama, :role, :ket, :timestamp)";

        $this->db->query($query);
        $this->db->bind('nama',$data['name']);
        $this->db->bind('role',$data['role']);
        $this->db->bind('ket',$data['isi']);
        $this->db->bind('timestamp',$data['time']->format('Y-m-d H:i:s'));

        $this->db->execute();

    }

    public function tracker_cari()
    {
        $data['name'] = $_SESSION['nama'];
        $data['time'] = new DateTime();
        $data['time']->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $data['role'] = $_SESSION['role'];
        $data['isi'] = 'telah mencari salah satu atau beberapa surat pada surat masuk';
        $query = "INSERT INTO history_user_click VALUES('', :nama, :role, :ket, :timestamp)";

        $this->db->query($query);
        $this->db->bind('nama',$data['name']);
        $this->db->bind('role',$data['role']);
        $this->db->bind('ket',$data['isi']);
        $this->db->bind('timestamp',$data['time']->format('Y-m-d H:i:s'));

        $this->db->execute();

    }

    public function tracker_hapus()
    {
        $data['name'] = $_SESSION['nama'];
        $data['time'] = new DateTime();
        $data['time']->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $data['role'] = $_SESSION['role'];
        $data['isi'] = 'telah menghapus salah satu atau beberapa surat pada surat masuk';
        $query = "INSERT INTO history_user_click VALUES('', :nama, :role, :ket, :timestamp)";

        $this->db->query($query);
        $this->db->bind('nama',$data['name']);
        $this->db->bind('role',$data['role']);
        $this->db->bind('ket',$data['isi']);
        $this->db->bind('timestamp',$data['time']->format('Y-m-d H:i:s'));

        $this->db->execute();

    }

    public function hapusActive($id)
    {
        $query = 'DELETE FROM history_user_click WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }


}
