<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Information Excavator</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      color: #333;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      height: 100vh;
      background: #e0e0e0;
      padding: 20px;
      box-shadow: 2px 0 8px rgba(0,0,0,0.1);
    }

    .sidebar h2 {
      color: #333;
      font-size: 20px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      padding: 10px 0;
      color: #555;
      cursor: pointer;
    }

    .sidebar ul li strong {
      color: #000;
    }

    .main {
      margin-left: 240px;
      padding: 30px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header h1 {
      font-size: 24px;
      color: #222;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }

    .card {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      transition: 0.3s;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      border: 1px solid #ddd;
    }

    .card:hover {
      border: 1px solid #0099cc;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .card img {
      max-width: 100%;
      height: 100px;
      object-fit: contain;
    }

    .card h3 {
      font-size: 16px;
      margin: 10px 0 5px;
      color: #111;
    }

    .card p {
      font-size: 12px;
      color: #555;
    }

    .card a {
      display: block;
      margin-top: 10px;
      font-size: 12px;
      color: #0077aa;
      text-decoration: none;
    }

    .card a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Welcome Susi!</h2>
    <ul>
      <li>Dashboard</li>
      <li>Product</li>
      <li><strong>Excavator</strong></li>
      <li>Spare part</li>
      <li>Information</li>
    </ul>
  </div>

  <div class="main">
    <div class="header">
      <h1>Information Excavator</h1>
      <div>@susiYAY.com</div>
    </div>

    <div class="grid">
      <!-- Card Excavator -->
      <div class="card" onclick="location.href='detail_information.php?type=crawler'">
        <img src="photo/crawler.png" alt="Crawler Excavator">
        <h3>Crawler Excavator</h3>
        <p>Crawler excavator merupakan jenis excavator paling umum dan paling sering digunakan dalam berbagai proyek konstruksi berat, pertambangan, serta </p>
        <a href="detail_information.php?type=crawler">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='detail_information.php?type=wheeled'">
        <img src="photo/wheeled.png" alt="Wheeled Excavator">
        <h3>Wheeled Excavator</h3>
        <p>Wheeled excavator menggunakan roda karet alih-alih rantai. Biasanya digunakan untuk proyek di area perkotaan atau lokasi konstruksi dengan</p>
        <a href="detail_information.php?type=wheeled">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='detail_information.php?type=mini'">
        <img src="photo/mini.png" alt="Mini Excavator">
        <h3>Mini Excavator</h3>
        <p>Mini excavator adalah excavator berukuran kecil yang dirancang untuk pekerjaan di ruang terbatas atau area sempit, seperti </p>
        <a href="detail_information.php?type=mini">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='detail_information.php?type=longreach'">
        <img src="photo/longreach.png" alt="Long Reach Excavator">
        <h3>Long Reach Excavator</h3>
        <p>Sesuai namanya, long reach excavator memiliki lengan (boom dan arm) yang jauh lebih panjang dari excavator standar. Jenis ini dirancang </p>
        <a href="detail_information.php?type=longreach">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='detail_information.php?type=dragline'">
        <img src="photo/dragline.png" alt="Dragline Excavator">
        <h3>Dragline Excavator</h3>
        <p>Dragline excavator adalah salah satu excavator terbesar dan digunakan dalam proyek skala industri, seperti tambang terbuka (open-pit mining), pembangunan pelabuhan, </p>
        <a href="detail_information.php?type=dragline">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='detail_information.php?type=suction'">
        <img src="photo/suction.png" alt="Suction Excavator">
        <h3>Suction Excavator</h3>
        <p>Suction excavator, juga dikenal sebagai vacuum excavator, adalah alat berat yang bekerja dengan menghisap tanah atau material melalui tekanan udara tinggi. Alat ini </p>
        <a href="detail_information.php?type=suction">&rarr; Selengkapnya</a>
      </div>

      <div class="card" onclick="location.href='detail_information.php?type=amphibious'">
        <img src="photo/amphibious.png" alt="Amphibious Excavator">
        <h3>Amphibious Excavator</h3>
        <p>Excavator jenis ini dirancang khusus untuk bekerja di medan berair, rawa, atau tanah lunak. Dilengkapi dengan ponton (struktur mengapung) sebagai </p>
        <a href="detail_information.php?type=amphibious">&rarr; Selengkapnya</a>
      </div>
    </div>
  </div>
</body>
</html>
