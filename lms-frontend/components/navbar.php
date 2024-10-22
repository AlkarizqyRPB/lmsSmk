<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
   <nav
   class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0"
   >
   <a
     href="index.php"
     class="navbar-brand d-flex align-items-center px-4 px-lg-5"
   >
     <p class="m-0 fw-bold" style="font-size: 25px">
       <img src="../img/icon.png" alt="" height="50px" />SMK Negeri
       <span style="color: #0d8ff9">1 Buahdua</span>
     </p>
   </a>
   <button
     type="button"
     class="navbar-toggler me-4"
     data-bs-toggle="collapse"
     data-bs-target="#navbarCollapse"
   >
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarCollapse">
     <div class="navbar-nav ms-auto p-4 p-lg-0">
       <a href="../index.php" class="nav-item nav-link active">Home</a>
       <a href="../courses.php" class="nav-item nav-link">All Courses</a>
   
       <a href="../contact.php" class="nav-item nav-link">Contact</a>
       <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-user"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <!-- Jika sudah login, tampilkan Logout -->
        <a href="session/logout.php" class="dropdown-item">Logout</a>
    <?php else: ?>
        <!-- Jika belum login, tampilkan Login -->
        <a href="session/login.php" class="dropdown-item">Login</a>
    <?php endif; ?>
</div>
</li>

       <a href="#" class="nav-item nav-link">
         <div id="google_translate_element"></div>
       </a>
     </div>
   </div>
   </nav>