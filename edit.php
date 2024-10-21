<?php
include 'connection.php';
$id = $_GET['id'];

$conn = get_connection();

$sql = "SELECT * FROM `kontak` WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Pusatkan konten secara vertikal dan horizontal */
        }

        /* Container Styling */
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        /* Heading Style */
        .container h1 {
            text-align: center;
            color: #4CAF50; /* Warna hijau untuk judul */
            margin-bottom: 30px;
            font-size: 24px;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px; /* Mengurangi jarak di bawah label */
            font-size: 16px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4CAF50; /* Warna hijau saat fokus */
            outline: none; /* Hilangkan outline default */
        }

        /* Button Styling */
        input[type="submit"] {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50; /* Warna hijau untuk tombol */
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Warna lebih gelap saat hover */
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            input[type="submit"] {
                font-size: 14px;
                padding: 10px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Kontak</h1>
        <?php
        if ($result->num_rows > 0) {
            ?>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <p>
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required>
                </p>
                <p>
                    <label for="nomor_tlp">Nomor Telepon:</label>
                    <input type="number" name="nomor_tlp" id="nomor_tlp" value="<?php echo $row['nomor_tlp']; ?>" required>
                </p>
                <input type="submit" value="Update">
            </form>
            <?php
        } else {
            echo "No Results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
