<?php
include 'connection.php';

$conn = get_connection();

$stmt = $conn->prepare("INSERT INTO kontak (nama) VALUES (?)");
$nama = "Nama Kontak";
$stmt->bind_param("s", $nama);

if ($stmt->execute()) {
    echo "Data baru berhasil ditambahkan";
} else {
    echo "error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>