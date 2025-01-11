<?php
// Memulai session atau melanjutkan session yang sudah ada
session_start();

// Menyertakan code dari file koneksi
include "koneksi.php";

// Inisialisasi variabel untuk pesan
$pesan = "";

// Cek jika sudah ada user yang login, arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
    header("location:admin.php"); 
}

// Proses login jika method adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    
    // Menggunakan fungsi enkripsi md5 supaya sama dengan password yang tersimpan di database
    $password = md5($_POST['pass']);

    // Prepared statement
    $stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");

    // Parameter binding 
    $stmt->bind_param("ss", $username, $password); // username string dan password string
    
    // Eksekusi statement
    $stmt->execute();
    
    // Menampung hasil eksekusi
    $hasil = $stmt->get_result();
    
    // Mengambil baris dari hasil sebagai array asosiatif
    $row = $hasil->fetch_array(MYSQLI_ASSOC);

    // Cek apakah ada baris hasil data user yang cocok
    if (!empty($row)) {
        // Jika ada, simpan variable username pada session
        $_SESSION['username'] = $row['username'];

        // Pesan login berhasil
        $pesan = "<div class='alert alert-success'>Login berhasil! Mengarahkan ke halaman admin...</div>";

        // Mengalihkan ke halaman admin setelah 2 detik
        header("refresh:2;url=admin.php");
    } else {
        // Jika tidak ada (gagal), tampilkan pesan error
        $pesan = "<div class='alert alert-danger'>Username atau Password salah!</div>";
    }

    // Menutup koneksi database
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | Pesona Jawa Tengah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="icon" href="img/logo.png" />
</head>
<body class="bg-danger-subtle">
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card border-0 shadow rounded-5">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="bi bi-person-circle h1 display-4"></i>
                        <p>Pesona Jawa Tengah</p>
                        <hr />
                    </div>
                    <!-- Form login -->
                    <form action="" method="post">
                        <input type="text" name="user" class="form-control my-4 py-2 rounded-4" placeholder="Username" required />
                        <input type="password" name="pass" class="form-control my-4 py-2 rounded-4" placeholder="Password" required />
                        <div class="text-center my-3 d-grid">
                            <button class="btn btn-danger rounded-4" type="submit">Login</button>
                        </div>
                    </form>

                    <!-- Tampilkan pesan -->
                    <?php
                    if (!empty($pesan)) {
                        echo $pesan;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
