<?php
require 'conn.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $sql = "SELECT Kode_Transaksi, Email_Tamu, ID_tipe_kamar_Hotel, Tanggal_Checkin, Tanggal_Checkout, Total_Transaksi, Status FROM memesan WHERE Email_Tamu LIKE ? OR Kode_Transaksi = ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param('ss', $searchTerm, $query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-white'>" . $row["Kode_Transaksi"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Email_Tamu"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["ID_tipe_kamar_Hotel"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Tanggal_Checkin"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Tanggal_Checkout"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Total_Transaksi"] . "</td>";
            echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-white'>" . $row["Status"] . "</td>";

            // Add checkout button if status is ongoing
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
        echo "<tr><td colspan='7' class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>Tidak ada data</td><td></tr>";
    }
    $stmt->close();
    $conn->close();
}
?>
