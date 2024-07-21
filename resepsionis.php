<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resepsionis.css">
    <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<?php
        session_start(); // Mulai session

        // Cek apakah user sudah login
        if (!isset($_SESSION['user_type'])) {
            header("Location: login.php"); // Redirect ke halaman login
            exit();
        }else{
            if($_SESSION['user_type'] != 'resepsionis'){
                header("Location: Home Tamu.php");
            }
        }

    ?>
<body>
    <div class="desktop-view">
        <div class="toolbar">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
            </div>
            <div class="company-name">World Hotel & Resort</div>
        </div>
    </div>
    <div class="container">
        <div class="image-container">
            <img src="pesanan.png" alt="Image 1">
            <div class="bars">
                <a href="page1.html" class="bar">Pesanan</a>
            </div>
        </div>
        <div class="image-container">
            <img src="kamar.png" alt="Image 2">
            <div class="bars">
                <a href="kamarResepsionis.php" class="bar">Kamar</a>
            </div>
        </div>
        <div class="image-container">
            <img src="daftar.png" alt="Image 3">
            <div class="bars">
                <a href="caridata.html" class="bar">Data Tamu</a>
            </div>
        </div>
        <div class="image-container">
            <img src="profile.png" alt="Image 3">
            <div class="bars">
                <a href="profil.php" class="bar">Profile</a>
                <a href="logout.php" class="bar">Log Out</a>
            </div>
        </div>
    </div>
</body>
</html>