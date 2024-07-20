<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgot.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&display=swap" rel="stylesheet">
    <title>Forgot my password</title>
</head>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    // session_start();

    require 'conn.php';
    require 'vendor/autoload.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        // echo "<script>console.log('email: '".$nama ."')</script>";
        
        // Simpan OTP dalam session
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        if(!$email){
            echo "<script>alert('Silahkan Isi Email Terlebih Dahulu');</script>";
        }else{
            $query = $conn -> query("SELECT name FROM tamu WHERE email = '$email'");
            $result = $query -> fetch_assoc();
            $nama = $result['name'];

            if(!$nama){
                echo "<script>alert('Email Tidak Terdaftar');</script>";
            }
            $otp = rand(100000, 999999); // Generate 6-digit OTP
            $code = md5($email.date('Y-m-d H:i:s'));

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'singgihprasetyo2803@gmail.com';                     //SMTP username
                $mail->Password   = 'aeqtcbsqtxqdpmhj';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('singgit@gmail.com', 'World Hotel Mail');
                $mail->addAddress($email, $nama);     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('hotelWorld@gmail.com', 'World Hotel Mail');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Forgot Password';
                $mail->Body    = 'Hi '.$nama.' This link for forgot password <br> <a href="http://localhost/tubes/verif.php?code='.$code.'">Forgot Password</a>';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if ($mail->send()){
                    $conn->query("UPDATE tamu SET code = '$code' WHERE email='$email'");

                    echo "<script>alert('Silahkan Cek Email Anda'); window.location= 'login.php';</script>";
                }

                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
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
        <h1 class="forgot">Forgot your password?</h1>
    </center>
    <form action=" " method="post">
        <div class="form-container">
            <div class="form-group">
                <label for="email">
                    Email Address
                </label>
                <input type="email" name="email" id="email" required>
            </div>
            <!-- <a href="otp.html"> -->
            <input type="submit" value='CONFIRM' class="but_in">
            <!-- </a> -->
            <a href="login.php" class="but_back">
                Back
            </a>
        </div>
    </form>
</body>
</html>