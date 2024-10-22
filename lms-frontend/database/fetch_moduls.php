<?php
require '../connection.php'; // pastikan connection.php sudah terhubung dengan benar

// Query untuk mendapatkan semua data modul
$sql = "SELECT * FROM moduls";
$result = $const->query($sql);

// Periksa apakah ada data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Untuk setiap baris data modul, buat card
        echo '<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
        echo '    <div class="course-item shadow">';
        echo '        <div class="position-relative overflow-hidden text-light image">';
        echo '            <img class="img-fluid" src="' . $row["img"] . '" alt="Modul Image">';
        echo '        </div>';
        echo '        <div class="p-2 pb-0">';
        echo '            <h5 class="mb-1"><a href="../single.html" class="text-dark">' . $row["judul"] . '</a></h5>';
        echo '        </div>';
        echo '        <div class="d-flex">';
        echo '            <small class="flex-fill text-left p-2 px-2"><p class="fa me-2" >created at ' . $row["created_at"] . '</p></small>';
        echo '            <small class="py-1 px-2 fw-bold fs-6 text-center">₹ 0</small>';
        echo '            <small class="text-primary py-1 px-2 fw-bold fs-6" style="float:right;"><a href="../single.html">Enroll Now </a><i class="fa fa-chevron-right me-2 fs-10"></i></small>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo "Tidak ada modul yang tersedia.";
}
