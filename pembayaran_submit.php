<?php
session_start();
require 'conn.php'; // include your database connection file
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Fetch values from the form
    $price = $_POST['price'];
    $days = $_POST['days'];
    $subTotal = $_POST['subTotal'];
    $tax = $_POST['tax'];
    $totalPayment = $_POST['totalPayment'];
    $paymentMethod = $_POST['payment_method'];
    $email = $_SESSION['email']; // assume email is stored in session
    $idKamar = $_SESSION['id_kamar'];
    $checkIn = $_POST['checkin'];
    $checkOut = $_POST['checkout'];

    // Generate transaction code
    $result = mysqli_query($conn, "SELECT Kode_Transaksi FROM memesan ORDER BY Kode_Transaksi DESC LIMIT 1");
    if ($row = mysqli_fetch_assoc($result)) {
        $lastTransactionCode = $row['Kode_Transaksi'];
        $transactionNumber = (int)substr($lastTransactionCode, 2) + 1;
    } else {
        $transactionNumber = 1;
    }
    $kodeTransaksi = 'TR' . str_pad($transactionNumber, 8, '0', STR_PAD_LEFT);

    // Insert into database
    $query = "INSERT INTO memesan(Email_Tamu, ID_tipe_kamar_Hotel, Tanggal_Checkin, Tanggal_Checkout, Total_Transaksi, Kode_Transaksi, payment_method) VALUES ('$email', '$idKamar', '$checkIn', '$checkOut', '$totalPayment', '$kodeTransaksi', '$paymentMethod')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Payment successful!'); window.location.href='mybooking.php';</script>";
        unset($_SESSION['id_kamar']);
        session_write_close();
        exit();
    } else {
        echo "<script>alert('Payment failed!');</script>";
    }
// }
?>