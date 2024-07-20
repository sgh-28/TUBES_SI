<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Hotel & Resort</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); 
            background-size: cover;
            background-position: center;
            color: white;
        }
        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-title .img {
            display: inline-block;
            margin-bottom: 10px;
        }
        .logo-svg {
            width: 50px;
            height: 50px;
            stroke: black; /* Changed logo color to black */
        }
        .logo-title h1 {
            margin: 0;
            color: black; /* Changed title color to black */
            font-size: 32px;
        }
        .content-box {
            background: #d4d4d4;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .frame {
            background: #b1acac;
            padding: 20px;
            border-radius: 10px;
        }
        .details {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .details li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 18px;
            color: black; 
        }
        .details li span {
            display: inline-block;
        }
        .back-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .back-btn:hover {
            background: #555;
        }
        .home-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 30px;
            height: 30px;
        }
        .home-icon img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<?php
    session_start();
    include 'conn.php';

    if (!isset($_SESSION['user_type'])) {
        header("Location: login.php");
        exit();
    }else{
        if($_SESSION['user_type'] != 'tamu'){
            header("Location: resepsionis.php");
        }
    }
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

    $result = mysqli_query($conn,"SELECT * FROM memesan, tipe_kamar WHERE Email_Tamu='$email' AND ID_tipe_kamar_Hotel = id_tipe_kamar ORDER BY Kode_Transaksi DESC LIMIT 1;");
    if ($row = mysqli_fetch_assoc($result)) {
        $codeTransaksi = $row['Kode_Transaksi'];
        $checkin = $row['Tanggal_Checkin'];
        $checkout = $row['Tanggal_Checkout'];
        $namaKamar = $row['nama_tipe_kamar'];
        $total = $row['harga_kamar'];
        $payment_method = $row['payment_method'];
    }else{
        $codeTransaksi = "Tidak Ada Transaksi";
        $checkin = "Tidak Ada Transaksi";
        $checkout = "Tidak Ada Transaksi";
        $namaKamar = "Tidak Ada Transaksi";
        $total = "Tidak Ada Transaksi";
        $payment_method = "Tidak Ada Transaksi";
    }

?>

<body>
    <div class="container">
        <div class="content-box">
            <div class="logo-title">
                <span class="img">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="logo-svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg> 
                </span>
                <h1>World Hotel & Resort</h1>
            </div>
            <div class="frame">
                <ul class="details">
                    <li><span>Order code</span> <span><?php echo $codeTransaksi ?></span></li>
                    <li><span>Date of check in</span> <span><?php echo $checkin ?></span></li>
                    <li><span>Date of check out</span> <span><?php echo $checkout ?></span></li>
                    <li><span>Room type</span> <span><?php echo $namaKamar ?></span></li>
                    <li><span>Total payment</span> <span>$<?php echo $total ?></span></li>
                    <li><span>Payment method</span> <span><?php echo $payment_method ?></span></li>
                </ul>
                <a href="Home Tamu.php" class="back-btn">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
