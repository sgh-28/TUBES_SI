<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&display=swap" rel="stylesheet">
    <title>Create your account</title>
</head>
<?php
    require 'conn.php';

    $email = $name = $phone = $date = $gender = $password = $cpassword = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if($password != $cpassword){
            echo "<script>alert('Password and Confirm Password is not similar!!');</script>";
        }else{
    
        // Update query
        $sql = "INSERT INTO `tamu`(`email`, `name`, `phone_number`, `date_of_birth`, `gender`, `password`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $email, $name, $phone, $date, $gender, $password);
    
        if ($stmt->execute()) {
            echo "<script>alert('Berhasil Signup!');</script>";
            header("Location: login.php");
        } else {
            echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');</script>";
        }
    
        $stmt->close();
        }
    }
?>
<body>
    <span class="img">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
        </svg> 
    </span>
    <div class="header">
        <h1>World Hotel & Resort</h1>
    </div>
    <hr>
    <h1 class="welcome">
        Join Our Member!
    </h1>
    <p class="welcome">
        Create your account for free and get special price.
    </p>

    <form action="" method="post">
    <div class="form-container">
        <div class="form-group">
            <label for="email">
                Email Address
            </label>
            <input type="email" name="email" id="" required>
        </div>
        <div class="form-group">
            <label for="name">
                Name
            </label>
            <input type="text" name="name" id="" required>
            </div> 
        <div class="form-group">
            <label for="phone">
                Phone Number
            </label>
            <input type="text" name="phone" id="" required>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label for="dob">
                    Date Of Birth
                </label>
                <input type="date" name="date" id="" required>
            </div>
            <div class="form-group">
                <label for="gender">
                    Gender
                </label>
                <select name="gender" id="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="password">
                Password
            </label>
            <input type="password" name="password" id="" required>
        </div>
        <div class="form-group">
            <label for="confpass">
                Confirm Password
            </label>
            <input type="password" name="cpassword" id="" required>
        </div>
        <div class="form-check">
            <input type="checkbox" name="" id="" required>
            <label for="agreement">I agree to the terms and conditions</label>
        </div>
        <button type="submit" class="butt_in" name="register">CONFIRM</button>
    </div>
</form>
</body>
</html>