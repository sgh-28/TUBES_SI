<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Hotel & Resort</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid white;
        }
        .header-left, .header-right {
            display: flex;
            align-items: center;
        }
        .header img {
            width: 50px;
            height: 50px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .header h1 img {
            margin-right: 10px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            font-size: 24px;
        }
        .room {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .room img {
            width: 200px;
            height: auto;
            border-radius: 10px;
        }
        .room-info {
            margin-left: 20px;
        }
        .room-info div {
            margin-bottom: 20px;
        }
        .room-info input {
            width: 200px;
            padding: 10px;
            border: 1px solid white;
            border-radius: 5px;
            background-color: black;
            color: white;
            text-align: center;
        }
        .button-back {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid white;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>

<?php
    session_start();
    require 'conn.php';

    if (!isset($_GET['id_tipe_kamar'])) {
        echo "ID tipe kamar tidak ditemukan.";
        exit();
    }

    $idKamar = $_GET['id_tipe_kamar'];

    $qry = $conn->query("SELECT * FROM tipe_kamar WHERE id_tipe_kamar = '$idKamar'");
    $result = $qry->fetch_assoc();
?>

<body>
    <div class="header">
        <div class="header-left">
            <h1>
                <img src="logo.jpg" alt="Logo"> World Hotel & Resort
            </h1>
        </div>
        <h1>Detail Ketersediaan Kamar</h1>
        <div class="header-right">
            <!-- SVG Icons here -->
        </div>
    </div>
    <div class="content">
    <?php

        if ($result) {
            $namaKamar = $result['nama_tipe_kamar'];
            $foto = $result['foto'];
            $price = $result['harga_kamar'];
            $jumlahKamar = $result['kamar_kosong'];
            $jumlahKamarTerisi = $result['kamar_terisi'];
;

            echo "<h2>" . $namaKamar . "</h2>";
            echo "<div class='room'>";
            echo "<img src='" . $foto . "' alt='Room Image'>";
            echo "<div class='room-info'>";
            echo "<div>";
            echo "<h3>Jumlah Kamar Kosong</h3>";
            echo "<input type='text' value='" . $jumlahKamar . "' readonly>";
            echo "</div>";
            echo "<div>";
            echo "<h3>Jumlah Kamar Terisi</h3>";
            echo "<input type='text' value='" . $jumlahKamarTerisi . "' readonly>";
            echo "</div></div></div>";

        }
    ?>
       
        <a href="kamarResepsionis.php" class="button-back">Back</a>
    </div>
</body>
</html>
