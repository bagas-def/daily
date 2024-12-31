<?php
include "koneksi.php"; 
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web Sederhana - Home, Artikel, Galeri</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <style>
    body.dark-mode {
      background-color: #121212;
      color: white;
    }

    #home {
      background-image: url(image/foto1.jpg);
      background-size: cover;
      background-position: center;
      color: white;
    }

    body.dark-mode #artikel {
      background-color: #130231;
      color: white;
    }

    body.dark-mode #galeri {
      background-color: #2c0b01;
      color: white;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Pesona Jawa Tengah</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#artikel">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#galeri">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Schedule">Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php" target="_blank">Login</a>
          </li>
        </ul>
        <button id="dark-mode" class="btn btn-outline-light ms-2">
          <i class="fas fa-moon"></i> Dark
        </button>
        <button id="light-mode" class="btn btn-outline-light ms-2">
          <i class="fas fa-sun"></i> Light
        </button>
      </div>
    </div>
  </nav>


 <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

      
    
       

  <section id="galeri" class="container my-5">
    <h2 class="text-center mb-4"><b>Gallery</b></h2>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/foto2.jpg" class="d-block w-100" alt="Gambar 1" />
        </div>
        <div class="carousel-item">
          <img src="image/foto3.jpg" class="d-block w-100" alt="Gambar 2" />
        </div>
        <div class="carousel-item">
          <img src="image/foto4.jpg" class="d-block w-100" alt="Gambar 3" />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>


  <section id="schedule" class="text-center p-5 bg-body-light">
    <div class="container-shedulee table-responsive">
      <div class="container-h2">
        <h2 class="fw-bold">Schedule</h2>

        <div>
        <div class="d-flex justify-content-center pt-3 gap-5">
          <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              <div class="card text-bg-danger mb-3" style="text-align: center;"> SENIN</li>
                <li class="list-group-item">Dasar Pemrograman 08.30-10.20 | H.4.7</li>
                <li class="list-group-item">Kriptografi 12.00-14.20 | H.5.8</li>
            </ul>
          </div>
    
          <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              <div class="card text-bg-danger mb-3" style="max-width: 18rem; text-align: center;"> SELASA</li>
                <li class="list-group-item">Sistem Operasi 10.20-12.00 | H.4.8</li>
                <li class="list-group-item">Basis Data 07.00-09.30 | D.2.J</li>
            </ul>
          </div>
    
          <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              <div class="card text-bg-danger mb-3" style="max-width: 18rem; text-align: center;"> RABU</li>
                <li class="list-group-item">Logika Informatika 07.00-09.30 | H.4.8</li>
                <li class="list-group-item">Kalkulus 11.00-13.30</li>
            </ul>
          </div>
    
          <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              <div class="card text-bg-danger mb-3" style="max-width: 18rem; text-align: center;"> KAMIS</li>
                <li class="list-group-item">Pendidikan Pancasila 08.30-10.20 | H.7.1</li>
                <li class="list-group-item"> Basis Data 13.20-15.30 | D.2.J</li>
            </ul>
          </div>
        </div>
    <div>
      <div class="d-flex justify-content-end pt-3 gap-5">          <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              <div class="card text-bg-danger mb-3" style="max-width: 18rem; text-align: center;"> JUMAT</li>
                <li class="list-group-item">Rekayasa Perangkat Lunak 07.20-09.30 | H.5.3</li>
                <li class="list-group-item">Fisika 09.30-11.30 | H.5.6</li>
            </ul>
          </div>
          <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              <div class="card text-bg-danger mb-3" style="max-width: 18rem; text-align: center;"> SABTU</li>
                <li class="list-group-item">Dasar Komputasi 09.30-11.20 | D.3.M</li>
                <li class="list-group-item">Keamanan Data 12.30-15.20 | D.3.M</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="About" class="bg-light py-5">
    <div class="container text-center" style="background-image: url(image/foto1.jpg);">
      <h2>About Me</h2>
    
      <p class="lead">
        A11.2023.15015
        Bagas Syifa Pratama
        Program Studi Teknik Informatika 
        UNiversitas Dian Nuswantoro
      </p>
    </div>
  </section>


    
    
  <footer class="bg-primary text-white text-center py-3">
    <div class="d-flex justify-content-center mb-2">
      <a href="https://instagram.com" class="h2 p-2 text-dark">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://twitter.com" class="h2 p-2 text-dark">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://whatsapp.com" class="h2 p-2 text-dark">
        <i class="fab fa-whatsapp"></i>
      </a>
    </div>
    <div>
      <p>&copy; Bagassyifa. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script>
    const darkModeButton = document.getElementById("dark-mode");
    const lightModeButton = document.getElementById("light-mode");

    darkModeButton.addEventListener("click", () => {
      document.body.classList.add("dark-mode");
    });

    lightModeButton.addEventListener("click", () => {
      document.body.classList.remove("dark-mode");
    });
  </script>
</body>

</html>