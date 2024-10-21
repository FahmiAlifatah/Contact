<?php
include 'connection.php';

$conn = get_connection();

$sql = "SELECT id, nama, nomor_tlp FROM kontak";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nama: " . $row["nama"] . " - Nomor Telepon: " . $row["nomor_tlp"] . "<br>";
    }
} else {
    echo "Tidak ada data";
}

$conn->close();
?>
