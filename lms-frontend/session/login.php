<?php
// Mulai session
session_start();

// Cek jika user sudah login, redirect ke halaman lain jika sudah
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: ../index.php");
    exit;
}

// Include file koneksi
require '../connection.php';

// Inisialisasi variabel
$email = $password = "";
$email_err = $password_err = "";

// Proses form saat form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validasi email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Masukkan email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validasi password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Masukkan password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Jika tidak ada error, lakukan login
    if (empty($email_err) && empty($password_err)) {
        // Siapkan statement SQL
        $sql = "SELECT id, email, password FROM accountsiswa WHERE email = ?";

        if ($stmt = mysqli_prepare($const, $sql)) {
            // Bind variabel ke statement
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameter
            $param_email = $email;

            // Coba eksekusi statement
            if (mysqli_stmt_execute($stmt)) {
                // Simpan hasil
                mysqli_stmt_store_result($stmt);

                // Cek jika email ada, lalu verifikasi password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind hasil ke variabel
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);

                    if (mysqli_stmt_fetch($stmt)) {
                        if ($password === $hashed_password) {
                            // Password benar, mulai session baru
                            session_start();
                        
                            // Simpan data ke session
                            $_SESSION['loggedin'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['email'] = $email;
                        
                            // Redirect ke halaman utama
                            header("location: ../index.php");
                        } else {
                            // Password salah
                            $password_err = "Password yang Anda masukkan salah.";
                        }
                    }
                } else {
                    // Email tidak ditemukan
                    $email_err = "Akun dengan email ini tidak ditemukan.";
                }
            } else {
                echo "Terjadi kesalahan. Coba lagi nanti.";
            }

            // Tutup statement
            mysqli_stmt_close($stmt);
        }
    }

    // Tutup koneksi
    mysqli_close($const);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LMS SMK Negeri 1 Buahdua : Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/icon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <?php require '../components/navbar.php' ?>

        <!-- Header Start -->
        <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Login</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="../index.php">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    


    <!-- Login Start -->
    <div class="container-xxl py-2 mt-4">
        <div class="container">
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.5s ">
                <center>
                    <form class="shadow p-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="max-width: 550px;">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h1 class="mb-5 bg-white text-center px-3">Login</h1>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>">
                                    <label for="email">Email Address</label>
                                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                                    <label for="password">Password</label>
                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <p><a href="#">Forgot password?</a></p>
                            </div>

                            <div class="col-12">
                                <button class="btn text-light w-100 py-3" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
    <!-- Login End -->


    <?php require '../components/footer.php' ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>