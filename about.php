<?php
require_once 'config/config.php';
require_once 'data/content.php';

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="page-header" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); padding: 100px 0 50px; text-align: center; color: white;">
    <div class="container">
        <h1>About Our Company</h1>
        <p>Kenalan lebih dekat dengan kami</p>
    </div>
</div>

<section class="about-section" id="about">
    <div class="container">
        <h2 class="section-title"><?php echo $about_data['title']; ?></h2>

        <div class="about-content">
            <div class="about-text">
                <h3><?php echo $about_data['subtitle']; ?></h3>
                <?php
                foreach ($about_data['paragraphs'] as $paragraph_text) {
                    echo '<p>' . $paragraph_text . '</p>';
                }
                ?>
                
                <div style="margin-top: 30px; background: #f8f9fa; padding: 20px; border-left: 4px solid #11998e;">
                    <h4>Visi & Misi</h4>
                    <p><strong>Visi:</strong> Menjadi perusahaan teknologi terdepan.</p>
                    <p><strong>Misi:</strong> Memberikan solusi terbaik bagi klien dengan sepenuh hati.</p>
                </div>
            </div>
            
            <div class="about-image">
                <div class="placeholder-image" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);"></div>
                <div class="image-overlay">
                    <h4><?php echo $about_data['product_title']; ?></h4>
                    <p><?php echo $about_data['product_description']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding: 80px 0; background: #f4f6f8;">
    <div class="container">
        <h2 class="section-title">Our Team</h2>
        <div style="display: flex; gap: 30px; justify-content: center; flex-wrap: wrap;">
            <div style="background: white; padding: 30px; border-radius: 10px; width: 300px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                <div style="width: 100px; height: 100px; background: #ddd; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; font-size: 40px;">👨‍💻</div>
                <h4>Junior Dev</h4>
                <p style="color: #666; font-size: 14px;">Full Stack Developer</p>
            </div>
            
            <div style="background: white; padding: 30px; border-radius: 10px; width: 300px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                 <div style="width: 100px; height: 100px; background: #ddd; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; font-size: 40px;">👩‍💼</div>
                <h4>Manager Cantik</h4>
                <p style="color: #666; font-size: 14px;">Project Manager</p>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
