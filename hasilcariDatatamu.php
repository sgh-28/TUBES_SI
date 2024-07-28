<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Hotel & Resort - Profile</title>
    <link rel="stylesheet" href="detailTamu.css">
</head>
<body>
    <?php
        require 'conn.php';

        $email = $name = $phone = $dob = $gender = '';

        if(isset($_GET['email'])){
            $email = $_GET['email'];
        

            $sql = 'SELECT email, name, phone_number, date_of_birth, gender
            FROM tamu 
            WHERE tamu.email = ?';

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $email = $row['email'];
                $name = $row['name'];
                $phone = $row['phone_number'];
                $dob = $row['date_of_birth'];
                $gender = $row['gender'];
            }
        }
    ?>
    <div class="logo">
        <img src="logo.jpg" alt="World Hotel & Resort">
        <h1>World Hotel & Resort</h1>
    </div>
    <div class="container">
        <div class="profile">
           <h2>Profile</h2>
            <div class="form-container">
                <div class="form-group">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email);?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">
                        Name
                    </label>
                    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name);?>" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">
                        Phone Number
                    </label>
                    <input type="text" name="phone" id="phone" value="<?php echo $phone?>" readonly>
                </div>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="dob">
                            Date of Birth
                        </label>
                        <input type="date" name="dob" id="dob" value="<?php echo $dob?>" readonly>
                    </div>
                    <div class="form-group">
                    <label for="gender">
                        Gender
                    </label>
                    <input type="text" name="gender" id="gender" value="<?php echo $gender?>" readonly>
                </div>
                </div>
            </div>
        </div>
        <div class="history">
            <h2>History</h2>
            <div class="form-container">
                <?php
                    require 'conn.php';

                    $date = $room = '';

                    if (isset($_GET['email'])) {
                        $email = $_GET['email'];

                        $sql = 'SELECT memesan.Tanggal_Checkin, tipe_kamar.nama_tipe_kamar 
                        FROM memesan 
                        JOIN tamu ON memesan.Email_Tamu = tamu.email 
                        JOIN tipe_kamar ON memesan.ID_tipe_kamar_Hotel = tipe_kamar.id_tipe_kamar 
                        WHERE memesan.Email_Tamu = ?';

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                $date = $row['Tanggal_Checkin'];
                                $room = $row['nama_tipe_kamar'];

                                echo "<div class='form-inline'>";
                                echo "<div class='form-group'>";
                                echo "<label for='date'>";
                                echo "Date";
                                echo "</label>";
                                echo "<input type='text' name='date' id='date' value='" . $date . "'readonly>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='room'>";
                                echo "Room Type";
                                echo "</label>";
                                echo "<input type='text' name='room' id='room' value='" . $room . "'readonly>";
                                echo "</div>";
                                echo "</div>";
                                echo "<hr>";
                            }
                        }else{
                            echo "<center>Empty Booking</center>";
                        }
                    }
                ?>        
            </div> 
        </div>
    </div>

    </div>
    <div class="footer">
        <a href="caridata.php" class="back-button">Back</a>
    </div>
</body>
</html>
