<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<title>Room Order</title>
</head>
<body>

<div class="h-screen w-full bg-black">
    <nav class="flex text-slate-200 w-full justify-between items-center bg-black px-6 py-4">
        <div class="flex items-center gap-3">
            <span class="min-w-11 max-h-11">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg> 
                   </span>
            <p>World Hotel & Resort</p>
        </div>
        <p>Booking</p>
    </nav>
    <hr>
    <div class="flex flex-col items-center w-full p-4">
        <div class="search-container flex items-center justify-center p-[20px]">
            <input type="text" id="searchInput" placeholder="Search Email/Phone number" class="w-[300px] p-[10px] rounded-lg">
            <button class="ml-[10px] p-[10px] bg-white text-black cursor-pointer rounded-lg">🔍</button>
        
        </div>
        <div class="content-table overflow-y-auto max-h-[400px] w-full bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Transaction Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Guest Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Room Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Checkin Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Checkout Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Transaction Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Action</th>    
                    </tr>
                </thead>
                <tbody class="bg-black divide-y divide-gray-500" id="tableBody">
                    <?php
                        session_start();
                        require 'conn.php'; 
                        $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
                        $sql = "SELECT Kode_Transaksi, Email_Tamu, ID_tipe_kamar_Hotel, Tanggal_Checkin, Tanggal_Checkout, Total_Transaksi, Status FROM memesan";
                        $result = $conn->query($sql);

                        if ($result-> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-white'>" . $row["Kode_Transaksi"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Email_Tamu"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["ID_tipe_kamar_Hotel"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Tanggal_Checkin"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Tanggal_Checkout"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Total_Transaksi"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Status"] . "</td>";
                                if ($row["Status"] == "ongoing") {
                                    echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>
                                            <button class='checkout-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded' data-id='" . $row["Kode_Transaksi"] . "'>Checkout</button>
                                          </td>";
                                } else {
                                    echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>Checked Out</td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>Tidak ada data</td></tr>";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="flex w-full justify-center p-2">
            <a href='./resepsionis.php' class="bg-gray-200 text-black px-12 py-2 rounded-lg transition-all duration-300 hover:bg-slate-500">Back</a>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchInput').addEventListener('input', function() {
        const query = this.value;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'searchBooking.php?query=' + encodeURIComponent(query), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const tableBody = document.getElementById('tableBody');
                if (tableBody) {
                    tableBody.innerHTML = xhr.responseText;
                    attachCheckoutEvent();
                }
            }
        };
        xhr.send();
    });

    function attachCheckoutEvent() {
        const checkoutButtons = document.querySelectorAll('.checkout-button');
        checkoutButtons.forEach(button => {
            button.addEventListener('click', function() {
                const kodeTransaksi = this.getAttribute('data-id');
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'checkout.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert('Checkout successful!');
                        location.reload();
                    } else {
                        alert('Checkout failed!');
                    }
                };
                xhr.send('kodeTransaksi=' + encodeURIComponent(kodeTransaksi));
            });
        });
    }

    attachCheckoutEvent();
});
</script>
</body>
</html>
