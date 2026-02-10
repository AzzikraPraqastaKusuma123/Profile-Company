<?php
require_once 'config/config.php';
require_once 'data/content.php';

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="contact-section" id="contact" style="padding: 100px 0; background: #f8f9fa;">
    <div class="container">
        <h2 class="section-title">Contact Us</h2>
        <p class="section-subtitle">Hubungi kami untuk informasi lebih lanjut</p>

        <div style="max-width: 600px; margin: 40px auto;">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama_pengirim = bersihkan_input($_POST['nama']);
                $email_pengirim = bersihkan_input($_POST['email']);
                $pesan_pengirim = bersihkan_input($_POST['pesan']);
                
                $error_messages = array();
                
                if (empty($nama_pengirim)) {
                    $error_messages[] = 'Nama harus diisi!';
                }
                
                if (empty($email_pengirim)) {
                    $error_messages[] = 'Email harus diisi!';
                } elseif (!filter_var($email_pengirim, FILTER_VALIDATE_EMAIL)) {
                    $error_messages[] = 'Format email tidak valid!';
                }
                
                if (empty($pesan_pengirim)) {
                    $error_messages[] = 'Pesan harus diisi!';
                }
                
                if (empty($error_messages)) {
                    echo '<div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">';
                    echo '<strong>Terima kasih!</strong> Pesan Anda sudah kami terima.';
                    echo '</div>';
                    
                    $nama_pengirim = '';
                    $email_pengirim = '';
                    $pesan_pengirim = '';
                } else {
                    echo '<div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">';
                    echo '<strong>Oops!</strong> Ada beberapa error:<br>';
                    foreach ($error_messages as $error_msg) {
                        echo '- ' . $error_msg . '<br>';
                    }
                    echo '</div>';
                }
            }
            ?>

            <form method="POST" action="" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 5px; color: #333; font-weight: 500;">Nama</label>
                    <input type="text" name="nama" value="<?php echo isset($nama_pengirim) ? $nama_pengirim : ''; ?>" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 5px; color: #333; font-weight: 500;">Email</label>
                    <input type="email" name="email" value="<?php echo isset($email_pengirim) ? $email_pengirim : ''; ?>" 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 5px; color: #333; font-weight: 500;">Pesan</label>
                    <textarea name="pesan" rows="5" 
                              style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; resize: vertical;"><?php echo isset($pesan_pengirim) ? $pesan_pengirim : ''; ?></textarea>
                </div>

                <button type="submit" 
                        style="background: linear-gradient(135deg, #4FACFE, #00F2FE); color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: 500; width: 100%;">
                    Kirim Pesan
                </button>
            </form>
        </div>

        <div style="display: flex; justify-content: center; gap: 40px; margin-top: 50px; flex-wrap: wrap;">
            <div style="text-align: center;">
                <h4 style="color: #0A192F; margin-bottom: 10px;">📧 Email</h4>
                <p style="color: #495670;"><?php echo SITE_EMAIL; ?></p>
            </div>
            <div style="text-align: center;">
                <h4 style="color: #0A192F; margin-bottom: 10px;">📱 Phone</h4>
                <p style="color: #495670;"><?php echo SITE_PHONE; ?></p>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
