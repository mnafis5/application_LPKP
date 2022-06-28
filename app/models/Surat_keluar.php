<?php

class Surat_keluar{
    private $table = 'keluar';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSurat()
    {
        $this->db->query('SELECT * FROM ' . $this->table .' ORDER BY tanggal DESC');
        return $this->db->resultSet();
    }

    public function getSuratKeluarById($id)
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
    public function ubahDataSuratKeluar($data)
    {
        $img = $this->create();
        $query = "UPDATE keluar SET 
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

    
    public function tambahSuratKel($data){
        $img = $this->create();

        $query = "INSERT INTO keluar
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
    public function hapusDataSuratKel($id)
    {
        $query = 'DELETE FROM keluar WHERE id = :id';
        $this->db->query($query);
        $this->db->bind('id',$id);
        $imag = $this->db->result();
        unlink(BASEURL . 'img/keluar/' . $imag[$id]);

        $this->db->execute();

        return $this->db->rowCount();
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
        $query = "SELECT * FROM keluar WHERE tanggal BETWEEN '$tahun-$bulan-$hari 00:00:00'  AND '$tahun1-$bulan1-$hari1 00:00:00' ";
        $this->db->query($query);
        
        return $this->db->resultSet();
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

    public function tracker_isi()
    {
        $data['name'] = $_SESSION['nama'];
        $data['time'] = new DateTime();
        $data['time']->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $data['role'] = $_SESSION['role'];
        $data['isi'] = 'telah melihat isi dari salah satu surat pada surat keluar';
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
        $data['isi'] = 'telah menambah satu surat pada surat keluar';
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
        $data['isi'] = 'telah mengedit satu surat pada surat keluar';
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
        $data['isi'] = 'telah mencari salah satu atau beberapa surat pada surat keluar';
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
        $data['isi'] = 'telah menghapus salah satu atau beberapa surat pada surat keluar';
        $query = "INSERT INTO history_user_click VALUES('', :nama, :role, :ket, :timestamp)";

        $this->db->query($query);
        $this->db->bind('nama',$data['name']);
        $this->db->bind('role',$data['role']);
        $this->db->bind('ket',$data['isi']);
        $this->db->bind('timestamp',$data['time']->format('Y-m-d H:i:s'));

        $this->db->execute();

    }

}
