<?php
// Logout php
session_start();

// session_destroy() akan menghapus semua data session yang sedang aktif di sisi server dan mengeluarkan pengguna dari halaman utama.
if (session_destroy()) {
    header("Location: login.php");
}

?>