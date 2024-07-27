<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<title>Scrollable Table</title>
</head>
<body>

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
            <p>Pesanan</p>
        </nav>

    <div class="flex flex-col items-center w-full h-full p-4">
        <div class="content-table overflow-y-auto max-h-[400px] w-full bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="sticky bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Transaksi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Checkin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Checkout</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Transaksi</th>    
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                        session_start();
                        require 'conn.php'; 
                        $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

                        $sql = "SELECT Kode_Transaksi, ID_tipe_kamar_Hotel, Tanggal_Checkin, Tanggal_Checkout, Total_Transaksi FROM memesan";
                        $result = $conn->query($sql);

                        if ($result-> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>" . $row["Kode_Transaksi"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["ID_tipe_kamar_Hotel"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["Tanggal_Checkin"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["Tanggal_Checkout"] . "</td>";
                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>" . $row["Total_Transaksi"] . "</td>";
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
            <a href='./resepsionis.php' class="bg-slate-800 text-slate-50 px-12 py-2 rounded-lg transition-all duration-300 hover:bg-slate-500">Back</a>
        </div>
    </div>
</div>
</body>
</html>
