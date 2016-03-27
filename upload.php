<?php
include "controller/config.php";
$folder = "images";
$kodeT = $_POST['kodeT'];
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$path = $folder."/".$nama_file;

if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){
    if($ukuran_file <= 2000000){
        move_uploaded_file($tmp_file, $path);
        $sql = $conn->query("INSERT INTO db_gambar (nama_ga, kode_tempat_wisata) VALUE('$nama_file', '$kodeT')");
        if($sql){
			header("Location:lihatTempat.php");
        }else{
            echo "<script>alert('Upload Failed!');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('Upload Failed! The Size Must Be < 2Mb');history.go(-1);</script>";
    }
}else{
    echo "<script>alert('Upload Failed! File Format Must Be in png/jpg');history.go(-1);</script>";
}

?>