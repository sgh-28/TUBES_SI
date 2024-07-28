<?php
require 'conn.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $sql = "SELECT email FROM tamu WHERE email LIKE ? OR phone_number LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='user-item'>";
            echo "<div class='img'>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-6'>";
            echo "<path stroke-linecap='round' stroke-linejoin='round' d='M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z' />";
            echo "</svg>";
            echo "<span>" . htmlspecialchars($row['email']) . "</span>";
            echo "</div>";
            echo "<a href='hasilcariDatatamu.php?email=" . urlencode($row['email']) ."' class='hasilcariDatatamu'><button>Detail</button></a>";
            echo "</div>";
        }
    } else {
        echo "<div>No results found</div>";
    }
    $stmt->close();
    $conn->close();
}
?>
