<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kontak</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f7;
        }

        /* Header Styles */
        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }

        /* Contact List Styles */
        .contact-list {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50; /* Green background for header */
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1; /* Light gray background on hover */
        }

        /* Action Buttons Styles */
        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .edit-button, .delete-button {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .edit-button {
            background-color: #4CAF50; /* Green */
        }

        .delete-button {
            background-color: #f44336; /* Red */
        }

        .edit-button:hover {
            background-color: #45a049; /* Darker green */
        }

        .delete-button:hover {
            background-color: #e53935; /* Darker red */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px; /* Adjust heading size for mobile */
            }

            .contact-list {
                padding: 10px; /* Adjust padding for mobile */
            }

            th, td {
                font-size: 14px; /* Smaller font size for mobile */
            }
        }
    </style>
</head>
<body>
    <div class="contact-list">
        <h1>Daftar Kontak</h1>
        <?php
        include 'connection.php';
        
        $conn = get_connection();

        $sql = "SELECT id, nama, nomor_tlp FROM kontak";
        $result = $conn->query($sql);

        echo "<table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Action</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nama']}</td>
            <td>{$row['nomor_tlp']}</td>
            <td class='action-buttons'>
                <a href='edit.php?id={$row['id']}' class='edit-button'>Edit</a>
                <a href='delete.php?id={$row['id']}' class='delete-button' onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
            </td>
        </tr>";
        }
        echo "</table>";

        $conn->close();
        ?>
    </div>
    <div>
        <a href="index.html"><button>Back</button></a>
    </div>
</body>
</html>
