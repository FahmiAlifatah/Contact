<?php
include 'connection.php'; // Memanggil koneksi database

$conn = get_connection(); // Mendapatkan koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nomor_tlp = $_POST['nomor_tlp'];

    // Mempersiapkan pernyataan SQL untuk menambahkan data ke tabel 'kontak'
    $stmt = $conn->prepare("INSERT INTO kontak (id, nama, nomor_tlp) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id, $nama, $nomor_tlp); // 'i' untuk integer, 's' untuk string

    // Eksekusi dan cek hasilnya
    if ($stmt->execute()) {
        echo "<p>Data baru berhasil ditambahkan</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Menutup statement
}
$conn->close(); // Menutup koneksi
?>

<!-- Tombol My Contact -->
<div style="text-align: center; margin-top: 20px;">
    <a href="show_data.php">
        <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            My Contact
        </button>
    </a>
</div>
