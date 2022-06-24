<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$servername = "localhost";
$username = "root";
$password = "";
$db = "project_magang";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);


// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');

//input data
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
            // $img = '';
            // $ser = '';     
            //$address-$num-$tempat-$tanggal-$jk-$studies
            
            $sql = "INSERT INTO student(id,nama,addresss,num,tempat,tanggal,jk,studies,phone,Jenis,masuk,keluar,nik,img,ser) VALUES ('','$nama','$addresss','$num','$tempat','$tanggal','$jk','$studies','$phone','$Jenis','$masuk','$keluar','$nik','','')";

            mysqli_query($conn,$sql);

            $jumlahData++;
        }

    if ($jumlahData > 0) {
        echo "<p>$jumlahData Berhasil ditambahkahan</p>
        <br>
        <a href='http://localhost:8080/project_LPK/public/daftar' class='btn btn-secondary'>Back</a>";
    }