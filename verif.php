<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&display=swap" rel="stylesheet">
    <title>Forgot my password</title>
</head>
<?php
    session_start();
    require 'conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $query = $conn->query("SELECT * FROM tamu WHERE code = '$code'");
            $result = $query->fetch_assoc();
            if ($result) {
                $email = $result['email'];
                $_SESSION['emailCon'] = $email; // Simpan email dalam sesi
            } else {
                echo "<script>alert('Invalid code/ Code Expired'); window.location = 'login.php'</script>";
                exit();
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_SESSION['emailCon'])) {
            $emailCon = $_SESSION['emailCon'];
            $pass = $_POST['password'];
            $cpass = $_POST['conpassword'];

            echo "<script>console.log('email: " . $emailCon . "');</script>";

            if ($pass != $cpass) {
                echo "<script>alert('Password dan Confirm Password tidak sama');</script>";
            } else {
                $conn->query("UPDATE tamu SET password = '$pass', code = '' WHERE email = '$emailCon'");
                echo "<script>alert('Ganti Password Berhasil, silahkan login'); window.location = 'login.php'</script>";
                // Hapus email dari sesi setelah digunakan
                unset($_SESSION['emailCon']);
            }
        } else {
            echo "<script>alert('Session expired or invalid access'); window.location = 'login.php'</script>";
        }
    }
?>

<body bgcolor="black">
    <center>
        <span class="img">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
            </svg> 
        </span>
        <h1 class="hotel">
            World Hotel & Resort
        </h1>
        <hr>
        <h1 class="forgot">
            Reset your password
        </h1>
    </center>
    <form action=" " method='post'>
        <div class="form-container">
            <div class="form-group">
                <label for="password">
                    New Password
                </label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="conpassword">
                    Confirm Password
                </label>
                <input type="password" name="conpassword" id="conpassword" required>
            </div>
            <a href="login.html">
                <input type="submit" value='submit' class="but_in"/>
            </a>
            <a href="forgot.html">
                <button type="submit" class="but_back">
                    Back
                </button>
            </a>
        </div>
    </form>
</body>
</html>