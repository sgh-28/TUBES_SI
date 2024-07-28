<?php
    session_start();
    require 'conn.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Cek jika form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Cek apakah email ada di tabel tamu
        $queryTamu = "SELECT * FROM tamu WHERE email = ?";
        $stmtTamu = $conn->prepare($queryTamu);
        $stmtTamu->bind_param("s", $email);
        $stmtTamu->execute();
        $resultTamu = $stmtTamu->get_result();
    
        if ($resultTamu->num_rows > 0) {
            // Jika email ada di tabel tamu
            $row = $resultTamu -> fetch_assoc();
            if($password === $row['password']){
                header("Location: Home Tamu.php");
                $_SESSION['user_type'] = 'tamu';
                $_SESSION['email'] = $email;
                exit();
            } else {
                // Password salah
                echo "<script>alert('Salah password atau email');</script>";
            }
        }
    
        // Cek apakah email ada di tabel resepsionis
        $queryResepsionis = "SELECT * FROM resepsionis WHERE email = ?";
        $stmtResepsionis = $conn->prepare($queryResepsionis);
        $stmtResepsionis->bind_param("s", $email);
        $stmtResepsionis->execute();
        $resultResepsionis = $stmtResepsionis->get_result();
    
        if ($resultResepsionis->num_rows > 0) {
            // Jika email ada di tabel resepsionis
            $rowResepsionis = $resultResepsionis -> fetch_assoc();
            if($password === $rowResepsionis['password']){
                header("Location: resepsionis.php");
                $_SESSION['user_type'] = 'resepsionis';
                $_SESSION['email'] = $email;
                exit();
            } else {
                // Password salah
                echo "<script>alert('Salah password atau email'); window.location.href='login.php';</script>";
            }
        } else {
            // Jika email tidak ditemukan di kedua tabel
            echo "<script>alert('Email tidak terdaftar!'); window.location.href='login.php';</script>";
        }
    }
    
    $stmtTamu->close();
    $stmtResepsionis->close();
    $conn->close();
    ?>