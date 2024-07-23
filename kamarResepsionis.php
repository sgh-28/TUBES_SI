<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Rooms</title>
    <link rel="stylesheet" href="kamar.css">
</head>

<?php
    session_start();
    require 'conn.php';

    $sql = "SELECT * FROM tipe_kamar";
    $result = $conn->query($sql);
?>

<body>
    <div class="headbar">
        <div class="logo-container">
            <span class="img">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
            </span> 
            <div class="logo-text">
                <h1 class="hotelname">World Hotel & Resort</h1>
            </div>
        </div>
        <div class="title">
            <h1>Our Most Popular Rooms</h1>
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
                    echo '<a href="jumlahKamarResepsionis.php?tipe_kamar=' . urlencode($row['nama_tipe_kamar']) . '">';
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
