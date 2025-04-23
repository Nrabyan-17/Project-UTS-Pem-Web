# 📋 Project UTS - Pemrograman Web
Repository ini berisikan file" dari Project UTS mata kuliah Pemrograman Web - Pemrograman Web Kelompok 2 Parallel F


## 👥 Anggota Kelompok 2

Project ini dikerjakan oleh:

- Ishna Shetia Shahadatina (23082010204)
- Ilham Fajriansyah        (23082010224)
- Naufal Rizki Abyan       (23082010235)


## 🎯 Fitur wajib aplikasi:

#### 1. Homepage:
- Daftar data (List/tables)
- Filter Kategori (JavaScript)
- Responsif (Mobile/Desktop)

#### 2. Form Tambah/Edit (PHP + HTML Form):
- Validitas Client-side (JavaScript) dan Server-side (PHP)

#### 3. Detail data:
- Menampilkan data lengkap

#### 4. Hapus data:
- Konfirmasi penghapusan data menggunakan Pop up JavaScript modal/alert


## 🛠️ Tech Stack:

**Client:** HTML, CSS, JavaScript, Bootstrap

**Server:** PHP, MySQL


# Dark Mode Implementation

Fitur dark mode telah ditambahkan ke website. Berikut cara menerapkannya di halaman yang ada:

## Menggunakan Dark Mode di Halaman Baru

1. Tambahkan file `header.php` di dalam tag `<head>`:
```php
<?php include('header.php'); ?>
```

2. Tambahkan toggle dark mode di navbar:
```php
<?php include('dark-mode-toggle.php'); ?>
```

3. Tambahkan file `footer.php` sebelum tag `</body>`:
```php
<?php include('footer.php'); ?>
```

## Menggunakan Dark Mode Secara Manual

Jika tidak ingin menggunakan include, pastikan:

1. Tambahkan CSS yang diperlukan:
```html
<link rel="stylesheet" href="css/dashboard.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
```

2. Tambahkan toggle dark mode di navbar:
```html
<li class="nav-item mx-1">
    <div class="dark-mode">
        <span class="material-icons-sharp active">light_mode</span>
        <span class="material-icons-sharp">dark_mode</span>
    </div>
</li>
```

3. Tambahkan script dark mode:
```html
<script src="js/dark-mode.js"></script>
```

## Struktur File Dark Mode

- `css/dashboard.css` - Berisi variabel CSS untuk dark mode
- `js/dark-mode.js` - Berisi fungsi JavaScript untuk toggle dark mode
- `dark-mode-toggle.php` - Berisi komponen toggle untuk dark mode
- `header.php` - File include untuk bagian head
- `footer.php` - File include untuk script di bagian bawah

Dark mode menyimpan preferensi user di localStorage browser sehingga ketika user kembali ke website, preferensi mode gelap/terang akan diingat.










