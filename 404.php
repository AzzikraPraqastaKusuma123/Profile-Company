<?php
require_once 'config/config.php';
include 'includes/header.php';
?>

<div style="height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; background: #0A192F; color: white; text-align: center;">
    
    <div style="font-size: 150px; font-weight: bold; color: #64FFDA; margin-bottom: 20px;">
        404
    </div>
    
    <h1 style="font-size: 32px; margin-bottom: 10px;">Oops! Halaman Tidak Ditemukan</h1>
    <p style="color: #8892B0; max-width: 500px; margin: 0 auto 30px;">
        Sepertinya kamu tersesat di dimensi lain. Halaman yang kamu cari mungkin sudah dipindah atau memang tidak pernah ada.
    </p>
    
    <a href="<?php echo BASE_URL; ?>" class="slider-btn" style="position: static; display: inline-block; transform: none; text-decoration: none;">
        🏠 Kembali ke Halaman Utama
    </a>
    
    <div style="margin-top: 50px; font-size: 60px;">
        🛸 🌍 🚀
    </div>
</div>

<script src="<?php echo JS_PATH; ?>script.js"></script>
</body>
</html>
