<?php
function get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kontak";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal; " . $conn->connect_error);
    }else{
       //echo "koneksi berhasil";
    }
    return $conn;
}
get_connection();