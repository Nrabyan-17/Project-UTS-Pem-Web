<?php
// Script untuk menghapus data excavator (dipanggil melalui AJAX)
include('session.php');

// Cek apakah ada data yang dikirim
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    // Ambil path gambar untuk dihapus nanti
    $query_image = "SELECT img_path FROM excavator_items WHERE id = $id";
    $result_image = mysqli_query($conn, $query_image);
    $row_image = mysqli_fetch_assoc($result_image);
    $image_path = $row_image['img_path'];
    
    // Hapus data dari database
    $query = "DELETE FROM excavator_items WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // Hapus file gambar jika ada dan bukan default
        if ($image_path && file_exists($image_path) && strpos($img_path, 'default') === false) {
            unlink($img_path);
        }
        
        echo json_encode(['success' => true, 'message' => 'Data berhasil dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus data: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Data id tidak ditemukan']);
}
?> 