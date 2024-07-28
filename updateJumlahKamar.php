<?php
// session_start();
require 'conn.php';

// if (!isset($_POST['id_tipe_kamar']) || !isset($_POST['action'])) {
//     echo "Data tidak lengkap.";
//     exit();
// }

$idKamar = $_SESSION['id_kamar'];

// $action = $_POST['action'];

$qry = $conn->query("SELECT * FROM tipe_kamar WHERE id_tipe_kamar = '$idKamar'");
$result = $qry->fetch_assoc();

if ($result) {
    $jumlahKamarTerisi = $result['kamar_terisi'];
    $jumlahKamar = $result['kamar_kosong'];
    $jumlahKamarKosong = $jumlahKamar - $jumlahKamarTerisi; // Hitung jumlah kamar kosong

    if ($jumlahKamarKosong > 0) {
        $jumlahKamarTerisi++;
        $jumlahKamarKosong--; // Kurangi jumlah kamar kosong
    } else {
        echo "Tidak ada kamar kosong.";
        exit();
    }

    $conn->query("UPDATE tipe_kamar SET kamar_terisi = '$jumlahKamarTerisi', 
    kamar_kosong = '$jumlahKamarKosong' WHERE id_tipe_kamar = '$idKamar'");

    // echo "Jumlah kamar berhasil diupdate.";
} else {
    echo "Tipe kamar tidak ditemukan.";
}
?>
