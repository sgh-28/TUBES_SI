<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Room - World Hotel & Resort</title>
    <link rel="stylesheet" href="detailKamar.css">    
</head>

<?php
    session_start();
    require 'conn.php';

    if (!isset($_SESSION['user_type'])) {
        header("Location: login.php"); // Redirect ke halaman login
        exit();
    } else {
        if ($_SESSION['user_type'] != 'tamu') {
            header("Location: resepsionis.php");
            exit();
        }
    }

    $emailSession = isset($_SESSION['email']) ? $_SESSION['email'] : '';

    $sql = "SELECT email, name, phone_number FROM tamu WHERE email = '$emailSession'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $phone = $row['phone_number'];
            $name = $row['name'];
        }
    }

    $idKamar = $namaKamar = $price = $availableRooms = "";

    if (isset($_GET['id_tipe_kamar'])) {
        $idKamar = $_GET['id_tipe_kamar'];
        $_SESSION['id_tipe_kamar'] = $idKamar;
    } elseif (isset($_SESSION['id_tipe_kamar'])) {
        $idKamar = $_SESSION['id_tipe_kamar'];
    } else {
        echo "ID tipe kamar tidak ditemukan.";
        exit();
    }

    if (isset($_GET['action']) && $_GET['action'] === 'clear_session') {
        unset($_SESSION['id_tipe_kamar']);
        session_write_close();
        exit();
    }

    $qry = $conn->query("SELECT * FROM tipe_kamar WHERE id_tipe_kamar = '$idKamar'");
    $result = $qry->fetch_assoc();
    if ($result) {
        $namaKamar = $result['nama_tipe_kamar'];
        $price = $result['harga_kamar'];
        $desk = $result['deskripsi'];
        $facil = $result['fasilitas'];
        $availableRooms = $result['kamar_kosong']; // Asumsi kolom ini ada di database
    }
?>

<body>
    <div class="container">
        <div class="header">
            <img src="logo.jpg" alt="World Hotel & Resort">
            <h1>World Hotel & Resort</h1>
            <h2>Detail Room</h2>
        </div>

        <?php
            if ($result) {
                $namaKamar = $result['nama_tipe_kamar'];
                $price = $result['harga_kamar'];
                $desk = $result['deskripsi'];
                $facil = $result['fasilitas'];
                $availableRooms = $result['kamar_kosong'];
            }

            echo '<div class="content">';
            echo '<img src="' . $namaKamar . '1.jpg">';
            echo '<div class="details">';
            echo '<h3>' . $namaKamar . '</h3>';
            echo '<p>' . $desk . '<p>';

            $facil = json_decode($result['fasilitas'], true); // Ganti $row dengan $result
            if ($facil) {
                echo '<ul class="facilities">';
                foreach ($facil as $fasilitasItem) {
                    echo '<li>' . $fasilitasItem . '</li>';
                }
                echo '</ul>';
            }

            echo '<div class="price"><strong>$' . $price . '</strong><span>Available Rooms: ' . $availableRooms . '</span></div>';
            echo '<div>';
            echo '<form action="booking room.php" method="post">';
            echo '<input type="text" name="id_kamar" id="id_kamar" value="' . $idKamar . '" hidden>';
            echo '<div class="buttons">';
            echo '<a href="kamar.php">';
            echo '<button type="button">Back</button></a>';
            echo '<button type="submit"' . ($availableRooms == 0 ? ' disabled' : '') . '>Booking</button>';
            echo '</div>';
            echo '</form>';
            echo '</div></div></div>';
        ?>
    </div>
</body>
</html>
