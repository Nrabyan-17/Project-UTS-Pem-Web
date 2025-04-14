<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Caterpillar Excavator</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom right, #2f2f4f, #1c1c2b);
      color: white;
      min-height: 100vh;
    }

    header {
      background-color: #000;
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .company-name {
      font-weight: bold;
      color: white;
      font-size: 1.1rem;
    }

    nav a {
      color: white;
      margin-left: 2rem;
      text-decoration: none;
      font-weight: 300;
    }

    .content {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      padding: 3rem 4rem;
      align-items: center;
      gap: 2rem;
    }

    .text-section {
      max-width: 60%;
    }

    .text-section h1 {
      font-size: 2.8rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }

    .text-section p {
      line-height: 1.7;
      color: #b0c4de;
      margin-bottom: 1rem;
    }

    .image-section img {
      width: 350px;
      transform: rotate(-5deg);
      transition: transform 0.3s ease;
    }

    .image-section img:hover {
      transform: rotate(0deg) scale(1.05);
    }

    @media (max-width: 768px) {
      .content {
        flex-direction: column;
        text-align: center;
      }

      .text-section, .image-section {
        max-width: 100%;
      }

      .image-section img {
        width: 250px;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="company-name">PT. Ferrytrans Prima Perkasa</div>
    <nav>
      <a href="#">About</a>
      <a href="#">Spesifik</a>
      <a href="#">Keunggulan</a>
    </nav>
  </header>

  <section class="content">
    <div class="text-section">
      <h1>Caterpillar<br>Excavator</h1>
      <p>
        Caterpillar atau yang lebih dikenal dengan CAT merupakan salah satu produsen alat berat terkemuka asal Amerika Serikat. 
        Excavator CAT terkenal dengan performa tangguh dan daya tahan yang luar biasa.
      </p>
      <p>
        Caterpillar, atau sering disingkat Cat, dikenal sebagai produsen alat berat terkemuka yang memiliki berbagai produk, 
        termasuk excavator terbesar. Di antara beberapa model excavator yang terkenal adalah Cat 6090 FS, yang memiliki berat 
        lebih dari 100 ton dan dirancang untuk pekerjaan di tambang terbuka. Keunggulan merek ini adalah daya tahan, performa tinggi, 
        dan dukungan purna jual yang luar biasa. Banyak perusahaan besar yang memilih untuk menggunakan excavator Caterpillar karena 
        kehandalannya dalam menghadapi medan berat.
      </p>
    </div>
    <div class="image-section">
      <img src="image.png" alt="Caterpillar Excavator" />
    </div>
  </section>

</body>
</html>
