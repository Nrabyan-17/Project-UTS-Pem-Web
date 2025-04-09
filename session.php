<?php
include("config.php");
session_start();

// Pengkondisian dibawah digunakan untuk mengecek apakah si user sudah login atau belum
// Jika belum login, maka user akan diarahkan ke halaman login.php
if (!isset($_SESSION['email'])) { 
    header("Location: login.php");
    exit();
}

// variabel $sess_email digunakan untuk menyimpan data email dari session yang sudah disimpan sebelumnya pada saat login
$sess_email = $_SESSION["email"];
$query = "SELECT * FROM tbl_user WHERE email = '$sess_email'";
$result = mysqli_query($conn, $query);

// kondisi dibawah untuk mengecek apakah data dari user sudah ada di database atau tidak
// Jika ada, maka data pengguna yang dari variabel $result akan diambil dan disimpan dalam variabel $row
if ( $result->num_rows > 0 ) {

    while ($row = $result->fetch_assoc()) {
        $userid = $row['id_pengguna'];
        $nama_awal = $row['nama_awal'];
        $nama_akhir = $row['nama_akhir'];
        $email = $row['email'];
        $username = $row['nama_awal']." ".$row['nama_akhir'];
        $user_profile = "photo/" . $row['profile_path'];
    }

} else {
    $userid = "yzKg04fk32";
    $email = "Johndoe123@gmail.com";
    $username = "John Doe";
    $user_profile = "photo/default_profile.png";
}

?>