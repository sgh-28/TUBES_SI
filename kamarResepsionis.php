<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Rooms</title>
    <link rel="stylesheet" href="kamar1.css">
</head>

<?php
    session_start();
    require 'conn.php';

    $sql = "SELECT * FROM tipe_kamar";
    $result = $conn->query($sql);
?>


<body bgcolor="black">
<div class="header">
        <div class="logo">
            <img src="logo.jpg" alt="World Hotel & Resort">
            <h1>World Hotel & Resort</h1>
        </div>
    </div>
</div>
    <div class="container">
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="room-card">';
                    echo '<h2 class="room-name">' . $row['nama_tipe_kamar'] . '</h2>';
                    echo '<div class="card">';
                    echo '<div class="card-room"><img src="' . $row['foto'] . '" alt="Room Image"></div>';
                    echo '<p class="price">$' . $row['harga_kamar'] . '</p>';
                    echo '<a href="jumlahKamarResepsionis.php?tipe_kamar=' . urlencode($row['id_tipe_kamar']) . '">';
                    echo '<button>Jumlah Kamar</button></a>';
                    echo '</div></div>';
                }
            }
        ?>
        <a href="Home Tamu.php">
            <button>BACK</button>
        </a>
    </div>
</body>
</html>
