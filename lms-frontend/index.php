<?php 
require 'connection.php';

$sql = "SELECT * FROM mataPelajaran";
$all_product = $const->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
    </meta>

    <title>LMS SMK Negeri 1 Buahdua</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon.jpg" rel="icon">

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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
   
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

 <?php require 'components/navbar.php' ?>
    
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-4">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/background3.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class=" text-uppercase mb-3 animated slideInDown" style="color: #fb873f;">Selamat Datang di SMK Negeri 1 Buahdua</h5>
                                <h1 class="display-3 text-white animated slideInDown">Belajar Lebih Interaktif dan Menyenangkan</h1>
                                <p class=" text-white mb-4 pb-2">Akses materi pembelajaran, kuis, dan proyek interaktif yang memotivasi dan menginspirasi. Tingkatkan pengetahuan dan keterampilan Anda bersama kami.</p>
                                
                                <a href="signup.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Gabung Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/background2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class=" text-uppercase mb-3 animated slideInDown" style="color: #fb873f;">Platform E-Learning Terbaik untuk Membantu Pembelajaran</h5>
                                <h1 class="display-3 text-white animated slideInDown">Tingkatkan Kemampuan Praktek dengan Materi yang Ada.
                                </h1>
                                <p class=" text-white mb-4 pb-2">Temukan beragam kursus untuk mengembangkan keahlian di bidang teknologi, bisnis, seni, dan lainnya. Raih sertifikat dan siap berkompetisi di dunia kerja.</p>
                                
                                <a href="courses.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Mulai Belajar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <?php require 'components/jurusan.php' ?>


   <!-- Pelajaran Start -->
    <?php while($row = mysqli_fetch_assoc($all_product)){
     ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3">Mata Pelajaran</h6>
                <h1 class="mb-5" style="color: #fb873f;">Cari mata pelajaran anda disini</h1>
            </div>
            <div class="row g-4 py-2">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item shadow">
                        <div class="position-relative overflow-hidden text-light image">
                            <img class="img-fluid" src="<?php echo $row["img"]; ?>" alt="">
                            <div style="position:absolute;top: 15px;left: 16px; font-size:12px; border-radius:3px; background-color:#fb873f;"
                                class="px-2 py-1 fw-bold text-uppercase">FREE</div>

                        </div>
                        <div class="p-2 pb-0">

                            <h5 class="mb-1"><a href="single.html" class="text-dark"><?php echo $row["nama"] ?> </a></h5>
                        </div>
                        
                        <div class="d-flex">
                            <small class="flex-fill text-left p-2 px-2"><i class="fa fa-clock me-2"></i>2.0
                                Hrs</small>
                            <small class="py-1 px-2 fw-bold fs-6 text-center">₹ 0</small>
                            <small class=" text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="#">Enroll
                                    Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php  } ?>
    <div class="container text-center">
        <a class="btn text-light py-3 px-5 mt-2 mb-5" href="courses.html">All Courses</a>
    </div>
    <!-- Pelajaran End -->


    <!-- Banner-2 Start -->
    <section class="pb-1">
        <div class="container-xxl mt-5 mb-0" >
            <div class="container" >
                <div class="row g-3">
                    <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 200px;">
                        <div class="owl-carousel header-carousel position-relative">
    
                            <img  class="img-fluid" src="img/banner-2.png" alt=""
                                style="max-width: 100%; height: auto; object-fit: cover;">
                            <img class="img-fluid" src="img/banner-2.jpg" alt=""
                                style="max-width: 100%; height: auto; object-fit: cover;">
                    </div>
                    </div>
                    <div class="col-lg-6 p-2 wow fadeInUp" data-wow-delay="0.3s">
                        <h1 class="mb-2" style="color: #fb873f;">Lecturer of Courses</h1>
                        <p class="mb-2 text-indigo">Your fun learning partner.</p>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner-2 End -->

    <!-- FAQ Start  -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Role Akses User E-Learning</h1>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Admin
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Admin bertanggung jawab dalam mengelola akun pengguna, termasuk membuat dan memperbarui profil guru dan siswa. Admin juga mengawasi fungsi sistem, memastikan konten terklasifikasi dengan tepat, serta melakukan tugas pemeliharaan sistem.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Guru
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Guru memiliki kemampuan untuk mengunggah materi pembelajaran, membuat kuis, dan memantau kemajuan siswa. Mereka dapat berinteraksi dengan siswa melalui diskusi serta memberikan umpan balik terkait tugas dan kuis.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Murid
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Siswa dapat mengakses materi pembelajaran yang disediakan oleh guru, mengikuti kuis dan tugas, serta memantau kemajuan mereka melalui laporan performa. Mereka juga dapat bergabung dalam diskusi dan mengajukan pertanyaan terkait konten pembelajaran.
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End  -->

   <?php require 'components/footer.php' ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>