<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

require "../assets/lib/PhpSpreadsheet/vendor/autoload.php";

if (isset($_POST['simpanimport'])) {
    $err        = "";
    $ekstensi   = "";
    $success    = "";

    $file_name  = $_FILES['import']['name'];
    $file_data  = $_FILES['import']['tmp_name'];
    
    if (empty($file_name)){
        $err .= "<li>Silahkan masukkan file </li>";
    }else{
        $ekstensi   = pathinfo($file_name)['extension'];
    }

    $ekstensi_allowed = array("xls","xlsx");
    if(!in_array($ekstensi,$ekstensi_allowed)){
        $err .header('location:unit.php?msg=cancelimport');
    }else {
        //header('location:unit.php?msg=added');
    }

    if(empty($err)){
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = 0;
        for ($i=1; $i<count($sheetData);$i++){
            $unit = $sheetData[$i]['0'];
            if ($unit !="") {
                $sqlimport = "INSERT INTO tbl_unit (nama) VALUES ('$unit')";
                mysqli_query($koneksi,$sqlimport);
                $jumlahData++;
            }
            // echo "$unit <br/>";

        }
        if($jumlahData > 0){
            $success = "$jumlahData berhasil dimasukkan ke MySQL";
        }
        
        }
    


}
?>