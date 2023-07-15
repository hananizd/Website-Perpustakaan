<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_managment";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memproses form jika tombol submit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $type = "student"; // Ganti dengan "teacher" jika ingin mengizinkan pendaftaran guru juga

    // Menyimpan data ke tabel userdata
    $sql = "INSERT INTO userdata (name, email, pass, type) VALUES ('$name', '$email', '$password', '$type')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Registrasi berhasil</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Registrasi gagal</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="halamanUtama.css">

    <script>
    function validateEmail() {
      var emailInput = document.getElementById("email");
      var email = emailInput.value;
      var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      
      if (!emailPattern.test(email)) {
        emailInput.setCustomValidity("Format email tidak valid");
      } else {
        emailInput.setCustomValidity("");
      }
    }
  </script>

  <script>
    function validatePassword() {
      var passwordInput = document.getElementById("password");
      var password = passwordInput.value;
      var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
      
      if (!passwordPattern.test(password)) {
        passwordInput.setCustomValidity("Password harus memiliki 8 karakter dengan kombinasi huruf besar, huruf kecil, dan angka");
      } else {
        passwordInput.setCustomValidity("");
      }
    }
  </script>
  
</head>
<body>
    <style>
        body {
            background-image: url('images/gambar.jpg');
        }
    </style>
    <div class="container">
        <h1 align="center">SIGN UP</h1>
        <h2 align="center">Perpustakaan Kita</h2><br>
        <form method="POST" action="registrasi.php">
            <div class="form-group">
                <label for="nama">Nama Lengkap <br></label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="jenisKelamin">Jenis Kelamin <br></label>
                <select id="jenisKelamin" name="jenisKelamin" required>
                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat <br></label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="email">Email <br></label>
                <small>Format: example@example.com</small><br>
                <input type="text" id="email" name="email" required oninput="validateEmail()"><br>
            </div>
            <div class="form-group">
                <label for="noTelp">No.Telp <br></label>
                <input type="text" id="noTelp" name="noTelp" required>
            </div>
            <div class="form-group">
                <label for="status">Status <br></label>
                <select id="status" name="status" required>
                    <option value="">Pilih</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Guru">Guru</option>
                    <option value="Dosen">Dosen</option>
                    <option value="Umum">Umum</option>
                </select>
            </div>
            <div class="form-group">
                <label for="instansi">Instansi <br></label>
                <input type="text" id="instansi" name="instansi" required>
            </div>
            <!-- Tambahkan elemen input lainnya di sini -->
            <div class="form-group">
                <label for="password">Password <br></label>
                <small>Password harus terdiri dari 8 karakter dengan setidaknya satu huruf besar, satu huruf kecil, dan satu angka.</small><br><br>
                <input type="text" id="password" name="password" required oninput="validatePassword()"><br>
            </div>
            <div class="form-group" align="center">
                <br>
                <input type="submit" name="Submit" value="Daftar">
                <input type="reset" name="Submit2" value="Batal"><br><br>
                <p>Sudah punya akun? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>

</body>
</html>
