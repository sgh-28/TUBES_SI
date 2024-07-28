<?php
require 'conn.php';

if (isset($_POST['kodeTransaksi'])) {
    $kodeTransaksi = $_POST['kodeTransaksi'];

    // Mulai transaksi
    $conn->begin_transaction();

    try {
        // Ambil ID_tipe_kamar_Hotel dari transaksi
        $sql = "SELECT ID_tipe_kamar_Hotel FROM memesan WHERE Kode_Transaksi=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $kodeTransaksi);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $idTipeKamar = $row['ID_tipe_kamar_Hotel'];
        $stmt->close();

        // Perbarui status transaksi menjadi checked_out
        $sql = "UPDATE memesan SET Status='checked_out' WHERE Kode_Transaksi=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $kodeTransaksi);
        $stmt->execute();
        $stmt->close();

        // Perbarui jumlah kamar tersedia dan kamar terisi
        $sql = "UPDATE tipe_kamar SET kamar_kosong = kamar_kosong + 1, kamar_terisi = kamar_terisi - 1 WHERE id_tipe_kamar=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $idTipeKamar);
        $stmt->execute();
        $stmt->close();

        // Komit transaksi
        $conn->commit();

        echo "Checkout successful";
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        $conn->rollback();
        echo "Checkout failed";
    }

    $conn->close();
}
?>
