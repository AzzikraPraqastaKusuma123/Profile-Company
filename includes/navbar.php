<nav class="navbar">
    <div class="container">
        <div class="logo">
            <div class="logo-text"><?php echo SITE_NAME; ?></div>
        </div>
        <ul class="nav-menu">
            <?php
            $menu_counter = 0;
            foreach ($navigation_menu as $menu_item) {
                $active_class = ($menu_counter == 0) ? 'active' : '';
                echo '<li><a href="' . $menu_item['href'] . '" class="' . $active_class . '">' . $menu_item['text'] . '</a></li>';
                $menu_counter++;
            }
            ?>
        </ul>
    </div>
</nav>
