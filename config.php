<?php

$conn = mysqli_connect("localhost", "root", "", "data_project");

if (mysqli_connect_errno()) { // ---> mysqli_connect_errno() digunakan untuk mengecek apakah koneksi ke database berhasil terhubung atau tidak.
    echo "Gagal terhubung ke Database " . mysqli_connect_error();
    die();
}