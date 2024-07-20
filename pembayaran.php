<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Payment</title>
    <link href="./output.css" rel="stylesheet">
</head>
<?php
    session_start();
    require 'conn.php';

    $idKamar = $_POST['id_kamar'];
    $checkIn = $_POST['checkin'];
    $checkOut = $_POST['checkout'];
    $_SESSION['id_kamar'] = $idKamar;

    $qry = $conn->query("SELECT * FROM tipe_kamar WHERE id_tipe_kamar = '$idKamar'");
    $result = $qry->fetch_assoc();
    if ($result) {
        $price = $result['harga_kamar'];
    } else {
        $price = 0; // Default price jika tidak ada hasil dari query
    }

    $date1 = new DateTime($checkIn);
    $date2 = new DateTime($checkOut);
    $interval = $date1->diff($date2);
    $days = $interval->days;

    $subTotal = $price * $days;
    $tax = $subTotal * 0.10;
    $totalPayment = $subTotal + $tax;
?>

<body style="font-family: Inter, sans-serif">
    <div class="h-screen w-full bg-slate-100">
        <nav class="flex text-slate-200 w-full justify-between items-center bg-slate-900 px-6 py-4">
            <div class="flex items-center gap-3">
                <span class="min-w-11 max-h-11">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg> 
                    </span>
                <p>World Hotel & Resort</p>
            </div>
            <p>Payment</p>
        </nav>
        <form class="w-full p-5 flex flex-col justify-center items-center" method="post" onsubmit="return validateForm()" action='pembayaran_submit.php'> 
            <div class="flex flex-col w-1/3 bg-white rounded-lg p-5">
                <div class="w-full flex flex-col items-center justify-center text-lg font-medium">
                    <p>Price Details</p>
                </div>
                <div class="py-2">
                    <hr style="border-style: dashed; border-color:dimgrey;">
                </div>
                    
                <div class="flex flex-col gap-3 w-full justify-between rounded-xl p-4">
                    <div class="flex justify-between">
                        <h2>Date of Checkin</h2>
                        <input type="datetime" readonly value="<?php echo $checkIn ?>" name='checkin' class="text-end bg-white">
                    </div>
                    <div class="flex justify-between">
                        <h2>Date of Checkout</h2>
                        <input type="datetime" readonly value="<?php echo $checkOut ?>" name='checkout' class="text-end bg-white">
                    </div>
                    <div class="flex justify-between">
                        <h2>Type Room</h2>
                        <input type="text" readonly value="<?php echo $result['nama_tipe_kamar']; ?>" class="text-end bg-white">
                    </div>
                    <div class="flex justify-between">
                        <h2>Price</h2>
                        <input type="text" id="price" name="price" value="$<?php echo $price; ?>" class="text-end bg-white">
                    </div>
                    <div class="flex justify-between">
                        <h2>Days</h2>
                        <input type="text" id="days" name="days" value="<?php echo $days; ?>" class="text-end bg-white">
                    </div>
                    <div class="flex justify-between">
                        <h2>Sub Total</h2>
                        <input type="text" id="subTotal" name="subTotal" value="$<?php echo $subTotal; ?>" class="text-end bg-white">
                    </div>
                    <div class="flex justify-between">
                        <h2>Taxes & Fees</h2>
                        <input type="text" id="tax" name="tax" value="$<?php echo $tax; ?>" class="text-end bg-white">
                    </div>
                </div>
                <div class="py-2">
                    <hr style="border-style: dashed; border-color:dimgrey;">
                </div>
                <div class="flex flex-col gap-3 w-full justify-between rounded-xl p-4">
                    <div class="flex justify-between">
                        <h2>Total Payment</h2>
                        <input type="text" id="totalPayment" name="totalPayment" value="$<?php echo $totalPayment; ?>" class="text-end bg-white">
                    </div>
                    <select id="paymentMethod" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Choose Payment Method</option>
                        <option value="bri">BRI</option>
                        <option value="bca">BCA</option>
                        <option value="mandiri">MANDIRI</option>
                        <option value="bni">BNI</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-center w-1/2 gap-4 py-3">
                <a href="booking_room.php">
                <button type="button" class="bg-slate-800 px-8 py-3 rounded-lg text-slate-50 hover:bg-slate-400 hover:text-slate-100 transition-all duration-300">Back</button></a>
                <button type="submit" class="bg-slate-800 px-8 py-3 rounded-lg text-slate-50 hover:bg-slate-400 hover:text-slate-100 transition-all duration-300">Pay</button>
            </div>
        </form>
    </div>
    <script>
         function validateForm() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            if (paymentMethod === "") {
                alert("Please select a payment method.");
                return false;
            }
            removeDollarSigns();
            return true;
        }

        function removeDollarSigns() {
            document.getElementById('price').value = document.getElementById('price').value.replace('$', '');
            document.getElementById('subTotal').value = document.getElementById('subTotal').value.replace('$', '');
            document.getElementById('tax').value = document.getElementById('tax').value.replace('$', '');
            document.getElementById('totalPayment').value = document.getElementById('totalPayment').value.replace('$', '');
        }
    </script>
</body>
</html>