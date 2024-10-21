<?php
include 'connection.php';

// Mendapatkan ID dari query string
$id = $_GET['id'];

$conn = get_connection();

// SQL untuk menghapus data
$sql = "DELETE FROM kontak WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "Record deleted successfully";
    header("Location: show_data.php"); // Redirect kembali ke halaman utama
} else {
    echo "Error deleting record: " . $conn->error;
}

$stmt->close();
$conn->close();