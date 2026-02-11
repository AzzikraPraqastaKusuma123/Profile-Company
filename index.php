<?php
require_once 'config/config.php';
require_once 'data/content.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_TITLE; ?></title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>style.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>discover-fix.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="logo">
                <img src="assets/img/logo.png" alt="<?php echo SITE_NAME; ?>" class="logo-img">
            </div>
            <nav class="nav-links">
                <?php foreach ($navigation_menu as $menu) { ?>
                    <a href="<?php echo $menu['href']; ?>"><?php echo $menu['text']; ?></a>
                <?php } ?>
            </nav>
        </div>
    </header>
    <main>
        <section class="hero section">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-content">
                        <h1><?php echo $slider_data['title']; ?></h1>
                        <p class="text-primary" style="font-size: 20px; margin-bottom: 30px; font-weight: 500;">
                            Excellence in every detail. Passion in every project.
                        </p>
                        <a href="#" class="btn btn-outline" style="background: var(--color-primary); color: #fff;">Explore More</a>
                    </div>
                    <div class="hero-image-wrapper">
                        <img src="<?php echo $slider_data['image']; ?>" alt="Hero Image">
                        <div class="scroll-indicator-circle">
                            <svg viewBox="0 0 100 100" width="140" height="140">
                                <g class="spinner-text">
                                    <defs>
                                        <path id="circle" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"/>
                                    </defs>
                                    <text font-size="10.5" font-weight="bold" letter-spacing="1.2" fill="#4A0E77">
                                        <textPath xlink:href="#circle">Scroll down • Scroll down • Scroll down • </textPath>
                                    </text>
                                </g>
                                <g transform="translate(38, 38) rotate(135, 12, 12)">
                                     <path d="M22 16V14L14 9V3.5C14 2.67 13.33 2 12.5 2C11.67 2 11 2.67 11 3.5V9L3 14V16L11 13.5V19L9 20.5V22L12.5 21L16 22V20.5L14 19V13.5L22 16Z" fill="#4A0E77"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="brands section bg-light">
            <div class="discover-divider"></div>
            <div class="container">
                <div class="discover-wrapper">
                    <div class="discover-label">WHO WE ARE</div>
                    <div class="discover-grid">
                        <div class="discover-left">
                            <h2 class="discover-title">Our brands</h2>
                        </div>
                        <div class="discover-right">
                            <p class="discover-text">
                                Magnetic Group operates in the <mark>aviation business</mark> and is the <mark>master brand</mark> under which a host of <mark>sub-brands</mark> live. Each brand shares the same values, but offers unique and complementary products and services. <mark>Magnetic Group</mark> is a holding company, and does not offer any products or services.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="brands-grid">
                    <?php 
                    $delay = 0;
                    foreach ($brands_data as $brand) { 
                        $delay += 0.15;
                    ?>
                        <div class="brand-card" style="--brand-color: <?php echo $brand['color']; ?>; --brand-bg: url('<?php echo $brand['image']; ?>'); animation-delay: <?php echo $delay; ?>s;">
                            <div class="brand-logo-area">
                                <h3 class="brand-title default-view">
                                    <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 40px; margin-right: 5px; vertical-align: bottom;">
                                    <span class="brand-suffix" style="color: <?php echo $brand['color']; ?>;"><?php echo $brand['suffix']; ?></span>
                                </h3>
                                <div class="hover-view-logo">
                                    <svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M50 95C25.1472 95 5 74.8528 5 50C5 25.1472 25.1472 5 50 5C74.8528 5 95 25.1472 95 50" stroke="white" stroke-width="8" stroke-linecap="round"/>
                                        <path d="M50 80C33.4315 80 20 66.5685 20 50C20 33.4315 33.4315 20 50 20C66.5685 20 80 33.4315 80 50" stroke="white" stroke-width="8" stroke-linecap="round" stroke-dasharray="10 10" opacity="0.8"/>
                                        <circle cx="50" cy="50" r="10" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="brand-split-line"></div>
                            <div class="brand-content">
                                <p><?php echo $brand['desc']; ?></p>
                                <a href="#" class="brand-btn-readmore">READ MORE <span class="arrow">&rarr;</span></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="split-section" id="mission-slider" style="position: relative; overflow: hidden; min-height: 600px;">
            <?php foreach ($mission_data as $index => $slide) { 
                $isActive = ($index === 0) ? 'active' : '';
                $display = ($index === 0) ? 'grid' : 'none';
            ?>
            <div class="split-slide <?php echo $isActive; ?>" data-index="<?php echo $index; ?>" style="display: <?php echo $display; ?>; width: 100%; height: 100%;">
                <div class="split-content bg-primary">
                    <div class="split-text-wrapper">
                        <p class="split-label"><?php echo $slide['label']; ?></p>
                        <h3 class="split-title"><?php echo $slide['title']; ?></h3>
                        <h2 class="split-desc"><?php echo $slide['desc']; ?></h2>
                        <div class="split-nav">
                            <button class="nav-arrow prev" aria-label="Previous">&larr;</button>
                            <button class="nav-arrow next" aria-label="Next">&rarr;</button>
                        </div>
                    </div>
                    <div class="slide-counter"><?php echo $index + 1; ?> <span style="font-size: 40px; opacity: 0.5;">/ <?php echo count($mission_data); ?></span></div>
                </div>
                <div class="split-image" style="background-image: url('<?php echo $slide['image']; ?>');"></div>
            </div>
            <?php } ?>
        </section>
        <section class="discover-section">
            <div class="discover-divider"></div>
            <div class="container">
                <div class="discover-wrapper">
                    <div class="discover-label">MAP</div>
                    <div class="discover-grid">
                        <div class="discover-left">
                            <h2 class="discover-title">Discover Magnetic Group</h2>
                        </div>
                        <div class="discover-right">
                            <p class="discover-text">
                                Fly through the map to see where we have offices, line stations and branches.
                            </p>
                            <p class="discover-text">
                                We believe that Magnetic Group's companies play an essential role in enabling aviation companies to better people's lives worldwide, so our aim is to become a truly global company.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="map-section">
            <div class="container">
                <div class="map-header">
                    <h2><?php echo $map_data['title']; ?></h2>
                    <p style="color: var(--color-text-light);"><?php echo $map_data['desc']; ?></p>
                </div>
                
                <div class="map-tabs">
                    <?php foreach ($map_categories as $key => $label) { 
                         $isActive = ($key === 'all') ? 'active' : '';
                    ?>
                        <button class="<?php echo $isActive; ?>" data-type="<?php echo $key; ?>">
                            <?php echo $label; ?>
                            <sup id="c-<?php echo $key; ?>">0</sup>
                        </button>
                    <?php } ?>
                </div>

                <div id="map" style="width: 100%; height: 600px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); z-index: 1;"></div>
            </div>
        </section>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map', {
                scrollWheelZoom: false 
            }).setView([20, 0], 2);

            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 19
            }).addTo(map);

            var markersLayer = L.layerGroup().addTo(map);

            function getMarkerStyle() {
                return {
                    radius: 6,
                    fillColor: "#ffffff",
                    color: "#6a1bb9", 
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 1 
                };
            }

            async function loadStats() {
                try {
                    const response = await fetch('api/stats.php');
                    const stats = await response.json();
                    
                    for (const [key, count] of Object.entries(stats)) {
                        const el = document.getElementById('c-' + key);
                        if (el) el.textContent = count;
                    }
                } catch (error) {
                    console.error('Error loading stats:', error);
                }
            }

            async function loadLocations(type) {
                try {
                    const response = await fetch('api/locations.php?type=' + type);
                    const data = await response.json();
                    
                    markersLayer.clearLayers();
                    var bounds = [];

                    data.items.forEach(function(item) {
                        var lat = parseFloat(item.lat);
                        var lng = parseFloat(item.lng);
                        
                        var marker = L.circleMarker([lat, lng], getMarkerStyle());
                        
                        var popupContent = `
                            <div style="font-family: 'Montserrat', sans-serif; min-width: 150px;">
                                <strong style="color: #4A0E77; display:block; margin-bottom:4px;">${item.name}</strong>
                                <span style="font-size: 12px; color: #555;">${item.city}, ${item.country}</span>
                            </div>
                        `;
                        
                        marker.bindPopup(popupContent, {
                            className: 'custom-popup'
                        });

                        marker.addTo(markersLayer);
                        bounds.push([lat, lng]);
                    });

                    if (bounds.length > 0) {
                        map.flyToBounds(bounds, {
                            padding: [50, 50],
                            duration: 1.5,
                            easeLinearity: 0.25
                        });
                    } else {
                        map.flyTo([20, 0], 2, { duration: 1.5 });
                    }

                } catch (error) {
                    console.error('Error loading locations:', error);
                }
            }

            const tabs = document.querySelectorAll('.map-tabs button');
            tabs.forEach(btn => {
                btn.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    const type = this.getAttribute('data-type');
                    loadLocations(type);
                });
            });

            loadStats();
            loadLocations('all');
        });
        </script>
        <section class="talks-section" style="position: relative; overflow: hidden; min-height: 600px; background: #fff;">
            <?php foreach ($talks_data as $index => $talk) { 
                $isActive = ($index === 0) ? 'active' : '';
                $talkDisplay = ($index === 0) ? 'grid' : 'none';
            ?>
            <div class="talks-slide <?php echo $isActive; ?>" data-index="<?php echo $index; ?>" style="display: <?php echo $talkDisplay; ?>; width: 100%; height: 100%; grid-template-columns: 50% 50%;">
                <div class="talks-image" style="background-image: url('<?php echo $talk['image']; ?>'); background-size: cover; background-position: top center; min-height: 600px;"></div>
                <div class="talks-content" style="padding: 60px 80px; position: relative; background: #fff;">
                    <div style="font-size: 10px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 40px; color: #888;">TALKS</div>
                    <div style="display: grid; grid-template-columns: 3fr 1fr; gap: 40px; align-items: start;">
                        <div>
                            <span style="font-size: 40px; color: var(--color-primary); line-height: 1; font-weight: 700; display: block; margin-bottom: 15px;">&ldquo;</span>
                            <p style="font-size: 16px; line-height: 1.6; font-weight: 500; font-style: italic; color: #1a1a1a;">
                                <?php echo $talk['quote']; ?>
                            </p>
                        </div>
                        <div>
                            <h5 style="font-size: 14px; font-weight: 700; color: #1a1a1a; margin-bottom: 4px;"><?php echo $talk['name']; ?></h5>
                            <p style="font-size: 11px; color: var(--color-primary); font-weight: 600; text-transform: uppercase; margin-bottom: 60px; line-height: 1.4;"><?php echo $talk['role']; ?></p>
                            <div style="font-size: 14px; font-weight: 600; color: #aaa;"><?php echo $index + 1; ?> / <?php echo count($talks_data); ?></div>
                        </div>
                    </div>
                    <div class="talks-nav" style="position: absolute; bottom: 60px; left: 80px; display: flex; gap: 30px;">
                        <button class="talks-arrow prev" style="background:none; border:none; font-size: 24px; cursor: pointer; color: #aaa;">&larr;</button>
                        <button class="talks-arrow next" style="background:none; border:none; font-size: 24px; cursor: pointer; color: #aaa;">&rarr;</button>
                    </div>
                </div>
            </div>
            <?php } ?>
        </section>
        <section class="join-team-section" style="padding: 100px 0; position: relative; overflow: hidden;">
            <div class="section-divider" style="width: 100%; height: 1px; background-color: var(--color-primary); margin-bottom: 60px;"></div>
            <div class="join-wrapper-fluid" style="display: flex; align-items: center; width: 100%;">
                <div class="join-image-block" style="width: 60%; position: relative; padding-left: 8%; z-index: 1;">
                    <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 1px; color: #333; padding-left: 5px;">ONE OF US</div>
                    <div class="join-image" style="height: 750px; background-image: url('https://images.unsplash.com/photo-1580674285054-bed31e145f59?auto=format&fit=crop&w=1200&q=80'); background-size: cover; background-position: center; border-left: 5px solid var(--color-primary); border-bottom: 5px solid var(--color-primary);"></div>
                </div>
                <div class="join-content" style="width: 40%; background: var(--color-primary); padding: 80px 60px 80px 80px; color: #fff; z-index: 2; display: flex; flex-direction: column; justify-content: center; min-height: 650px; margin-left: -5%;">
                    <h2 style="font-size: 72px; font-weight: 700; font-style: italic; line-height: 1; margin-bottom: 40px; font-family: 'Arial', sans-serif;">
                        Join<br>our team
                    </h2>
                    <p style="font-size: 18px; line-height: 1.6; margin-bottom: 20px; max-width: 500px;">
                        You want to feel valued and be part of something bigger.
                    </p>
                    <p style="font-size: 18px; line-height: 1.6; margin-bottom: 60px; max-width: 500px;">
                        For you, aviation is only one step away from travelling to space.
                    </p>
                    <div>
                        <a href="#" style="display: inline-flex; align-items: center; padding: 18px 35px; border: 1px solid rgba(255,255,255,0.5); color: #fff; text-decoration: none; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s;">
                            EXPLORE OPPORTUNITIES <span style="margin-left: 15px; font-size: 18px;">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="news-section" style="padding: 100px 0; background-color: #fff; overflow: hidden;">
            <div class="section-divider" style="width: 100%; height: 1px; background-color: var(--color-primary); margin-bottom: 60px;"></div>
            <div class="news-container" style="padding-left: 5%; padding-right: 5%;">
                <div class="news-header-row" style="display: flex; align-items: start; margin-bottom: 50px; flex-wrap: wrap; gap: 40px;">
                    <div style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; min-width: 80px; padding-top: 10px; color: #333;">NEWS</div>
                    <div class="news-filters-wrapper" style="overflow-x: auto; white-space: nowrap; flex: 1; padding-bottom: 15px; -ms-overflow-style: none; scrollbar-width: none;">
                        <div class="news-filters" style="display: inline-flex; gap: 10px;">
                            <?php foreach ($news_categories as $i => $cat) { 
                                $activeClass = ($i === 0) ? 'active' : '';
                                $activeStyle = ($i === 0) ? 'background-color: var(--color-primary); color: #fff; border-color: var(--color-primary);' : 'background-color: #fff; color: #333; border: 1px solid #ddd;';
                            ?>
                            <button class="filter-btn <?php echo $activeClass; ?>" data-category="<?php echo $cat; ?>" style="border-radius: 20px; padding: 8px 20px; font-size: 11px; font-weight: 600; cursor: pointer; transition: all 0.2s; <?php echo $activeStyle; ?>"><?php echo $cat; ?></button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="news-slider-container" style="position: relative; overflow: hidden;">
                    <button class="scroll-btn prev" id="news-prev" style="position: absolute; left: 0; top: 50%; transform: translateY(-50%); z-index: 10; background: rgba(255,255,255,0.8); border: none; font-size: 30px; cursor: pointer; padding: 10px; display: none;">&larr;</button>
                    <button class="scroll-btn next" id="news-next" style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); z-index: 10; background: rgba(255,255,255,0.8); border: none; font-size: 30px; cursor: pointer; padding: 10px; display: none;">&rarr;</button>
                    <div class="news-track" id="newsTrack" style="display: flex; gap: 30px; overflow-x: auto; scroll-behavior: smooth; padding-bottom: 20px; scrollbar-width: none; -ms-overflow-style: none;">
                        <?php foreach ($news_data as $news) { ?>
                        <div class="news-card-new" data-category="<?php echo $news['category']; ?>" style="flex: 0 0 380px; min-width: 380px; transition: opacity 0.3s ease;">
                            <div class="news-img" style="height: 240px; background-image: url('<?php echo $news['image']; ?>'); background-size: cover; background-position: center; margin-bottom: 25px;"></div>
                            <div class="news-meta" style="display: flex; justify-content: space-between; font-size: 11px; color: #888; margin-bottom: 20px; align-items: center;">
                                <span style="border: 1px solid #ddd; border-radius: 15px; padding: 5px 15px; white-space: nowrap;"><?php echo $news['category']; ?></span>
                                <span style="color: var(--color-primary); font-weight: 600;"><?php echo $news['date']; ?></span>
                            </div>
                            <h3 style="font-size: 20px; font-weight: 700; line-height: 1.4; margin-bottom: 40px; min-height: 56px; color: #000; padding-right: 10px;"><?php echo $news['title']; ?></h3>
                            <a href="#" style="font-size: 10px; font-weight: 700; text-transform: uppercase; color: var(--color-primary); text-decoration: none; letter-spacing: 1px; display: inline-flex; align-items: center;">
                                READ ARTICLE <span style="margin-left: 8px; font-size: 16px;">&rarr;</span>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="news-controls-bottom" style="display: flex; justify-content: space-between; align-items: center; margin-top: 50px;">
                     <div class="news-nav-arrows" style="display: flex; gap: 40px;">
                        <button id="news-scroll-left" style="border: none; background: none; font-size: 40px; cursor: pointer; color: #888; transition: color 0.3s;">&larr;</button>
                        <button id="news-scroll-right" style="border: none; background: none; font-size: 40px; cursor: pointer; color: #888; transition: color 0.3s;">&rarr;</button>
                     </div>
                     <a href="#" style="border: 2px solid var(--color-primary); color: var(--color-primary); padding: 15px 40px; font-size: 11px; font-weight: 700; text-transform: uppercase; text-decoration: none; border-radius: 4px; transition: all 0.3s;">See all news</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer" style="background-color: #4A0E77; color: #fff; padding: 60px 0 30px; font-family: 'Inter', sans-serif;">
        <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px;">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 40px;">
                <img src="assets/img/logo.png" alt="Magnetic Group" style="height: 30px; object-fit: contain; filter: brightness(0) invert(1);">
                <a href="#" style="color: #fff; text-decoration: none; font-size: 24px; opacity: 0.8;">&uarr;</a>
            </div>
            <div style="height: 1px; background-color: rgba(255,255,255,0.2); margin-bottom: 50px;"></div>
            <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 60px;">
                <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 50px 80px; flex: 1; max-width: 85%;">
                    <div>
                        <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 30px; display: block; filter: brightness(0) invert(1);">
                        <div style="font-size: 13px; font-weight: 300; margin-top: 5px;">Trading</div>
                    </div>
                    <div>
                        <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 30px; display: block; filter: brightness(0) invert(1);">
                        <div style="font-size: 13px; font-weight: 300; margin-top: 5px;">Leasing</div>
                    </div>
                     <div>
                        <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 30px; display: block; filter: brightness(0) invert(1);">
                        <div style="font-size: 13px; font-weight: 300; margin-top: 5px;">Enginestands</div>
                    </div>
                     <div>
                        <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 30px; display: block; filter: brightness(0) invert(1);">
                        <div style="font-size: 13px; font-weight: 300; margin-top: 5px;">MRO</div>
                    </div>
                    <div>
                        <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 30px; display: block; filter: brightness(0) invert(1);">
                        <div style="font-size: 13px; font-weight: 300; margin-top: 5px;">Line</div>
                    </div>
                    <div>
                        <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 30px; display: block; filter: brightness(0) invert(1);">
                        <div style="font-size: 13px; font-weight: 300; margin-top: 5px;">Engines</div>
                    </div>
                     <div>
                        <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 30px; display: block; filter: brightness(0) invert(1);">
                        <div style="font-size: 13px; font-weight: 300; margin-top: 5px;">Training</div>
                    </div>
                     <div>
                        <img src="assets/img/logo_Magetic.png" alt="Magnetic" style="height: 30px; display: block; filter: brightness(0) invert(1);">
                        <div style="font-size: 13px; font-weight: 300; margin-top: 5px;">Engineering</div>
                    </div>
                </div>
                <div style="min-width: 150px;">
                    <div style="font-size: 12px; margin-bottom: 20px; opacity: 0.7;">Social media:</div>
                    <div style="display: flex; gap: 15px; margin-bottom: 25px;">
                        <a href="#" style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; transition: background 0.3s;">
                            <i class="fab fa-linkedin-in" style="font-size: 12px;"></i>
                        </a>
                        <a href="#" style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; transition: background 0.3s;">
                            <i class="fab fa-instagram" style="font-size: 12px;"></i>
                        </a>
                        <a href="#" style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; transition: background 0.3s;">
                            <i class="fab fa-facebook-f" style="font-size: 12px;"></i>
                        </a>
                        <a href="#" style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; transition: background 0.3s;">
                            <i class="fab fa-youtube" style="font-size: 10px;"></i>
                        </a>
                    </div>
                    <div>
                         <a href="#" style="color: #fff; font-size: 11px; text-decoration: none; opacity: 0.7;">Email bodies</a>
                    </div>
                </div>
            </div>
            <div style="height: 1px; background-color: rgba(255,255,255,0.2); margin: 80px 0 30px;"></div>
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; font-size: 11px; opacity: 0.7;">
                <div style="display: flex; gap: 25px; flex-wrap: wrap;">
                    <a href="#" style="color: #fff; text-decoration: none;">Contact</a>
                    <a href="#" style="color: #fff; text-decoration: none;">Web usage terms</a>
                     <a href="#" style="color: #fff; text-decoration: none;">Sitemap</a>
                      <a href="#" style="color: #fff; text-decoration: none;">Privacy policy</a>
                       <a href="#" style="color: #fff; text-decoration: none;">Cookie policy</a>
                        <a href="#" style="color: #fff; text-decoration: none;">Customer Feedback</a>
                         <a href="#" style="color: #fff; text-decoration: none;">Terms and conditions</a>
                          <a href="#" style="color: #fff; text-decoration: none;">Whistleblowing</a>
                </div>
                <div style="text-align: right; line-height: 1.5;">
                    <div>&copy; 2026. Copyright. All rights reserved.</div>
                    <div>by Manuela Digital Marketing</div>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo JS_PATH; ?>script.js"></script>
</body>
</html>
