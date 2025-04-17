<?php
$type = $_GET['type'] ?? 'unknown';

$data = [
    'crawler' => [
        'title' => 'Crawler Excavator',
        'image' => 'photo/crawler.png',
        'desc' => 'Crawler excavator merupakan jenis excavator paling umum dan paling sering digunakan dalam berbagai proyek konstruksi berat, pertambangan, serta pekerjaan tanah berskala besar. Alat ini menggunakan track (rantai besi atau baja) sebagai sistem pergerakannya, bukan roda. Karena itu, excavator jenis ini memiliki daya cengkeram yang sangat baik terhadap tanah, sehingga sangat stabil dan tidak mudah tergelincir, terutama di medan berlumpur, berbatu, atau curam. Crawler excavator bekerja dengan sistem hidrolik yang menggerakkan lengan (boom), batang (arm), dan bucket. Sistem ini memungkinkan alat menggali, mengangkat, dan memindahkan material dalam jumlah besar secara efisien.

<br><br><strong>Spesifikasi:</strong><br>
• Berat operasional: 10–90 ton<br>
• Kapasitas bucket: 0.5–6 m³<br>
• Kecepatan: ± 5 km/jam<br>
• Daya mesin: 100–500 HP<br>

<br><strong>Keunggulan:</strong><br>
• Sangat stabil di medan berat<br>
• Cocok untuk penggalian dalam, pemindahan batu, dan proyek jangka panjang<br>
• Tidak memerlukan permukaan yang rata untuk beroperasi<br>
• Memiliki kekuatan dan kapasitas angkut yang besar',
    ],
    'wheeled' => [
        'title' => 'Wheeled Excavator',
        'image' => 'photo/wheeled.png',
        'desc' => 'Wheeled excavator menggunakan roda karet alih-alih rantai. Biasanya digunakan untuk proyek di area perkotaan atau lokasi konstruksi dengan permukaan keras dan rata, seperti aspal dan beton. Keunggulan utamanya adalah kecepatan mobilisasi yang lebih tinggi dibandingkan crawler excavator, serta biaya perawatan yang lebih rendah karena tidak ada sistem rantai yang kompleks. Karena lebih ringan dan fleksibel, excavator ini juga tidak merusak permukaan jalan sehingga ideal untuk pekerjaan perbaikan jalan, saluran air kota, atau proyek bawah tanah.

<br><br><strong>Spesifikasi:</strong><br>
• Berat operasional: 13–22 ton<br>
• Kapasitas bucket: 0.5–1.2 m³<br>
• Kecepatan: hingga 40 km/jam<br>
• Daya mesin: 120–200 HP<br>

<br><strong>Keunggulan:</strong><br>
• Mobilitas tinggi, mudah berpindah antar lokasi kerja<br>
• Cocok untuk area perkotaan atau pemukiman<br>
• Tidak merusak aspal atau permukaan beton<br>
• Waktu setup lebih singkat dibanding crawler',
    ],
    'mini' => [
        'title' => 'Mini Excavator',
        'image' => 'photo/mini.png',
        'desc' => 'Mini excavator adalah excavator berukuran kecil yang dirancang untuk pekerjaan di ruang terbatas atau area sempit, seperti taman kota, halaman rumah, pekerjaan saluran air, atau bahkan interior bangunan. Karena ukurannya yang kecil, alat ini bisa masuk ke tempat-tempat yang tidak bisa dijangkau excavator besar. Meskipun kecil, mini excavator tetap memiliki sistem kerja yang mirip dengan excavator standar (boom, arm, bucket, dan sistem hidrolik), hanya dalam skala lebih kecil.

<br><br><strong>Spesifikasi:</strong><br>
• Berat operasional: 1–8 ton<br>
• Kapasitas bucket: 0.025–0.35 m³<br>
• Daya mesin: 13–70 HP<br>

<br><strong>Keunggulan:</strong><br>
• Ukuran kompak dan fleksibel<br>
• Konsumsi bahan bakar lebih irit<br>
• Biaya pengoperasian dan perawatan rendah<br>
• Ideal untuk proyek perumahan atau pekerjaan detail',
    ],
    'longreach' => [
        'title' => 'Long Reach Excavator',
        'image' => 'photo/longreach.png',
        'desc' => 'Sesuai namanya, long reach excavator memiliki lengan (boom dan arm) yang jauh lebih panjang dari excavator standar. Jenis ini dirancang khusus untuk pekerjaan yang membutuhkan jangkauan ekstra, seperti pembersihan sungai, pengerukan kanal, pekerjaan reklamasi, hingga pembongkaran gedung tinggi dari jarak jauh. Walaupun jangkauannya jauh, jenis ini tidak cocok untuk mengangkat material berat secara vertikal, karena lengan panjangnya membuat titik tumpu menjadi kurang stabil.

<br><br><strong>Spesifikasi :</strong><br>
• Jangkauan maksimum: hingga 30 meter<br>
• Berat operasional: 20–90 ton<br>
• Kapasitas bucket: 0.4–1.5 m³<br>

<br><strong>Keunggulan :</strong><br>
• Mampu bekerja di area sulit dijangkau<br>
• Aman digunakan di dekat struktur atau tebing rapuh<br>
• Ideal untuk proyek air dan konservasi',
    ],
    'dragline' => [
        'title' => 'Dragline Excavator',
        'image' => 'photo/dragline.png',
        'desc' => 'Dragline excavator adalah salah satu excavator terbesar dan digunakan dalam proyek skala industri, seperti tambang terbuka (open-pit mining), pembangunan pelabuhan, atau bendungan besar. Menggunakan kabel dan sistem katrol, bucket digerakkan dengan cara diayun dan ditarik, bukan dengan lengan hidrolik biasa. Dragline membutuhkan ruang kerja yang luas dan tidak bisa bermanuver dengan cepat, namun sangat efektif untuk menggali volume besar dalam waktu singkat.

<br><br><strong>Spesifikasi:</strong><br>
• Berat: hingga 200 ton atau lebih<br>
• Jangkauan lengan: hingga 100 meter<br>
• Kapasitas bucket: 3–60 m³<br>

<br><strong>Keunggulan :</strong><br>
• Efisiensi tinggi dalam penggalian material besar<br>
• Cocok untuk pekerjaan dalam air atau rawa besar<br>
• Jangkauan dan kapasitas kerja sangat luas',
    ],
    'suction' => [
        'title' => 'Suction Excavator',
        'image' => 'photo/suction.png',
        'desc' => 'Suction excavator, juga dikenal sebagai vacuum excavator, adalah alat berat yang bekerja dengan menghisap tanah atau material melalui tekanan udara tinggi. Alat ini banyak digunakan untuk pekerjaan yang membutuhkan presisi tinggi, terutama di area yang memiliki utilitas bawah tanah seperti pipa gas, kabel listrik, atau saluran air. Karena tidak menggunakan bucket untuk menggali, risiko kerusakan terhadap fasilitas bawah tanah sangat kecil.

<br><br><strong>Spesifikasi :</strong><br>
• Kapasitas sedot: 3.000–10.000 m³/jam<br>
• Jangkauan selang: hingga 30 meter<br>
• Daya mesin: 200–400 HP<br>

<br><strong>Keunggulan :</strong><br>
• Sangat aman untuk utilitas bawah tanah<br>
• Minim risiko kerusakan pada struktur tersembunyi<br>
• Proses penggalian bersih dan cepat',
    ],
    'amphibious' => [
        'title' => 'Amphibious Excavator',
        'image' => 'photo/amphibious.png',
        'desc' => 'Excavator jenis ini dirancang khusus untuk bekerja di medan berair, rawa, atau tanah lunak. Dilengkapi dengan ponton (struktur mengapung) sebagai pengganti roda atau track, alat ini mampu mengapung dan bergerak di atas air dangkal sambil melakukan penggalian atau pengerukan. Excavator amfibi biasa digunakan untuk proyek reklamasi, normalisasi sungai, perbaikan tambak, dan pekerjaan pengairan.

<br><br><strong>Spesifikasi :</strong><br>
• Berat: 15–45 ton<br>
• Kapasitas bucket: 0.5–1.5 m³<br>
• Kedalaman kerja: hingga 10 meter<br>

<br><strong>Keunggulan :</strong><br>
• Dapat bekerja di air dan rawa tanpa tenggelam<br>
• Ideal untuk area sulit dijangkau excavator biasa<br>
• Efektif untuk pengerukan atau pekerjaan maritim',
    ],
];

$ex = $data[$type] ?? null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $ex ? $ex['title'] : 'Data tidak ditemukan' ?></title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
      color: #222;
      padding: 40px 5vw;
    }

    .container {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 40px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .text {
      flex: 1;
    }

    .text h1 {
      font-size: 38px;
      margin-bottom: 25px;
      font-weight: bold;
      color: #0077b6;
    }

    .text p {
      font-size: 17px;
      line-height: 1.7;
      text-align: justify;
    }

    .image {
      flex: 0 0 60%;
      max-width: 60%;
    }

    .image img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .back-link {
      display: inline-block;
      margin-top: 30px;
      color: #0077b6;
      font-size: 14px;
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .image {
        max-width: 100%;
      }

      .text h1 {
        font-size: 28px;
      }

      .text p {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <?php if ($ex): ?>
    <div class="container">
      <div class="text">
        <h1><?= $ex['title'] ?></h1>
        <p><?= $ex['desc'] ?></p>
        <a class="back-link" href="information.php">&larr; Kembali ke halaman sebelumnya</a>
      </div>
      <div class="image">
        <img src="<?= $ex['image'] ?>" alt="<?= $ex['title'] ?>">
      </div>
    </div>
  <?php else: ?>
    <div class="container">
      <div class="text">
        <h1>Data tidak ditemukan</h1>
        <p>Excavator yang Anda cari tidak tersedia atau link tidak valid.</p>
        <a class="back-link" href="information.php">&larr; Kembali ke halaman sebelumnya</a>
      </div>
    </div>
  <?php endif; ?>
</body>
</html>