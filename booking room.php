<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Pemesanan</title>
    <link href="./output.css" rel="stylesheet">
</head>

<?php
    session_start();
    require 'conn.php';

    if (!isset($_SESSION['user_type'])) {
        header("Location: login.php"); // Redirect ke halaman login
        exit();
    } else {
        if ($_SESSION['user_type'] != 'tamu') {
            header("Location: resepsionis.php");
            exit();
        }
    }

    $emailSession = isset($_SESSION['email']) ? $_SESSION['email'] : '';

    $sql = "SELECT email, name, phone_number FROM tamu WHERE email = '$emailSession'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $phone = $row['phone_number'];
            $name = $row['name'];
        }
    }

    $idKamar = $namaKamar = $price = "";

    if (isset($_GET['id_tipe_kamar'])) {
        $idKamar = $_GET['id_tipe_kamar'];
        $_SESSION['id_tipe_kamar'] = $idKamar;
    } elseif (isset($_SESSION['id_tipe_kamar'])) {
        $idKamar = $_SESSION['id_tipe_kamar'];
    } else {
        echo "ID tipe kamar tidak ditemukan.";
        exit();
    }

    if (isset($_GET['action']) && $_GET['action'] === 'clear_session') {
        unset($_SESSION['id_tipe_kamar']);
        session_write_close();
        exit();
    }

    $qry = $conn->query("SELECT * FROM tipe_kamar WHERE id_tipe_kamar = '$idKamar'");
    $result = $qry->fetch_assoc();
    if ($result) {
        $namaKamar = $result['nama_tipe_kamar'];
        $price = $result['harga_kamar'];
    }
?>

<body style="font-family: Inter, sans-serif">
    <div class="h-screen w-full bg-slate-100">
        <nav class="flex text-slate-50 w-full justify-between items-center bg-slate-900 px-6 py-3">
            <div class="flex items-center gap-3">
                <span class="min-w-11 max-h-11">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg> 
                </span>
                <p style="font-family: kameron, serif;">World Hotel & Resort</p>
            </div>
            <p>Booking Room</p>
        </nav>
        <div class="flex w-full mt-3">
            <div class="w-[70%] flex flex-col justify-center items-center drop-shadow-lg">
                <h1 class="text-lg font-medium p-2"><?php echo $namaKamar ?></h1>
                <div class="flex flex-col w-fit p-5 gap-5 bg-white rounded-xl">
                    <img <?php echo 'src= "'. $namaKamar .'1.jpg"' ?> class="max-w-[300px] rounded-lg" alt="" srcset="">
                    <p class="text-center">Price $<?php echo $price ?>/night</p>
                </div>
            </div>
            <div class="w-full">
                <div class="flex flex-col w-[60%] py-5 gap-3">
                    <form action="pembayaran.php" method="post">
                        <input type="hidden" name="id_tipe_kamar" id="id_tipe_kamar" <?php echo 'value="'.$idKamar.'"'?>>
                        <div class="flex flex-col">
                            <label for="checkin">Date of Check In</label>
                            <input type="date" name="checkin" id="checkin" required class="px-6 py-3 rounded-lg drop-shadow-md hover:bg-slate-400 hover:text-slate-100 transition-all duration-300">
                        </div>
                        <div class="flex flex-col">
                            <label for="checkout">Date of Check Out</label>
                            <input type="date" name="checkout" id="checkout" required class="px-6 py-3 rounded-lg drop-shadow-md hover:bg-slate-400 hover:text-slate-100 transition-all duration-300">
                        </div>
                        <div class="flex flex-col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="<?php echo $name;?>" readonly placeholder="Full Name" class="px-6 py-3 rounded-lg drop-shadow-md hover:bg-slate-400 hover:placeholder-slate-100 hover:text-slate-100 transition-all duration-300">
                        </div>
                        <div class="flex flex-col">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" readonly placeholder="Phone Number" class="px-6 py-3 rounded-lg drop-shadow-md hover:bg-slate-400 hover:placeholder-slate-100 hover:text-slate-100 transition-all duration-300">
                        </div>
                        <div class="flex flex-col">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo $email; ?>" readonly placeholder="Email" class="px-6 py-3 rounded-lg drop-shadow-md hover:bg-slate-400 hover:placeholder-slate-100 hover:text-slate-100 transition-all duration-300">
                        </div>
                        <div class="flex justify-end w-full mt-2 gap-6">
                            <a href="kamar.php" >
                            <button type='button' class="bg-slate-800 px-12 py-3 text-slate-50 rounded-lg hover:bg-slate-400 hover:text-slate-100 transition-all duration-300" id='back_button'>Back</button></a>
                            <button type='submit' class="bg-slate-800 px-12 py-3 text-slate-50 rounded-lg hover:bg-slate-400 hover:text-slate-100 transition-all duration-300">Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set the minimum date for the date inputs to today
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('checkin').setAttribute('min', today);
            document.getElementById('checkout').setAttribute('min', today);

            document.querySelector('form').addEventListener('submit', function(event) {
                var checkin = document.getElementById('checkin').value;
                var checkout = document.getElementById('checkout').value;

                if (checkin >= checkout) {
                    event.preventDefault();
                    alert('Check-out date must be after the check-in date.');
                }
            });
        });

        document.getElementById('back_button').addEventListener('click', function(event) {
            // Prevent the default behavior of the button
            event.preventDefault();
            
            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();
            
            // Configure it: GET-request for the URL with action to clear session
            xhr.open('GET', 'booking room.php?action=clear_session', true);
            
            // Send the request over the network
            xhr.send();
            
            // When the request is complete, redirect to the previous page
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Redirect to the previous page after clearing the session
                    window.location.href = 'kamar.php';
                }
            };
        });
    </script>
</body>
</html>
