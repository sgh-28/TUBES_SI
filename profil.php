<html>
<head>
    <title>World Hotel & Resort</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .logo-svg {
            width: 50px; 
            height: 50px; 
        }
        form {
            display: inline-block;
            text-align: left;
            width: 50%;
            min-width: 300px; 
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            background-color: #333;
            border: none;
            color: white;
        }
        .button-group {
            display: flex;
            gap: 5px;
            justify-content: space-between;
        }
        .button-group input, a {
            width: 49.3%;
            padding: 10px 20px;
            border: none;
            background-color: #555;
            color: white;
            cursor: pointer;
            font-size: 14px;
            font-weight:500;
        }

        .button-group a{
            display: flex;
            justify-content: center;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }

        .button-group input:hover, a:hover{
            background-color: #777;
        }
        hr {
            border: none;
            border-top: 2px solid white;
            margin: 20px auto;
            width: 100%;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-row .form-group {
            flex: 1;
            margin-right: 10px;
        }
        .form-row .form-group:last-child {
            margin-right: 0;
        }
    </style>
    <?php
    session_start();
    require 'conn.php';

    $email = $name = $phone = $date = $gender = $table = '';

    if (!isset($_SESSION['user_type'])) {
        header("Location: login.php"); // Redirect ke halaman login
        exit();
    }else{
        if($_SESSION['user_type'] != 'tamu'){
            $table = 'resepsionis';
        }else{
            $table = 'tamu';
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form
        $email = $_POST['email'];
        $name = $_POST['nama'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
    
        // Update query
        $sql = "UPDATE resepsionis SET name=?, phone_number=?, date_of_birth=?, gender=? WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $phone, $date, $gender, $email);
    
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diupdate!');</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');</script>";
        }
    
        $stmt->close();
    }

    $emailSession = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    
    $sql = "SELECT email, name, phone_number, date_of_birth, gender FROM $table WHERE email = '$emailSession'";
    $result = $conn->query($sql);
    // echo "<script>console.log('Terjadi kesalahan: " . $table . $emailSession . $sql . "');</script>";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $phone = $row['phone_number'];
            $name = $row['name'];
            $date = $row['date_of_birth'];
            $gender = $row['gender'];
        }
    }
    
    $conn->close();
    ?>
</head>
<body>

<div class="container">
    <span class="img">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="logo-svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
        </svg> 
    </span>
    <h1>World Hotel & Resort</h1>
    <hr>
    <form action="" method="post"> 
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" id="nama" name="nama" value="<?php echo $name?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $phone ?>">
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="date">Date of Birth</label>
                <input type="date" id="date" name="date" value="<?php echo $date ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="male" <?php echo ($gender == 'MALE') ? 'selected' : ''?> >MALE</option>
                    <option value="female" <?php echo ($gender == 'FEMALE') ? 'selected' : ''?> >FEMALE</option>    
                </select>
            </div>
        </div>
        <div class="button-group">
            <input type="submit" value="Edit" width= "50%">
            <a href="Home Tamu.php">Back</a>
        </div>
    </form>
</div>

</body>
</html>