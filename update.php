<?php
include 'connection.php';

// Mendapatkan data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nomor_tlp = $_POST['nomor_tlp'];

$conn = get_connection(); // Memanggil fungsi get_connection untuk mendapatkan koneksi

// SQL untuk update data
$sql = "UPDATE kontak SET nama = ?, nomor_tlp = ? WHERE id = ?";

// Menyiapkan statement
$stmt = $conn->prepare($sql);

// Memeriksa apakah statement berhasil diprepare
if ($stmt) {
    // Mengikat parameter ke statement
    $stmt->bind_param("ssi", $nama, $nomor_tlp, $id);

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data updated successfully";
        header("Location: show_data.php"); // Redirect kembali ke halaman utama
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
