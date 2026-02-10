<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <?php
            foreach ($footer_data['sections'] as $footer_section) {
                echo '<div class="footer-section">';
                echo '<h4>' . $footer_section['title'] . '</h4>';
                
                foreach ($footer_section['content'] as $content_item) {
                    echo '<p>' . $content_item . '</p>';
                }
                
                echo '</div>';
            }
            ?>
        </div>
        <div class="footer-bottom">
            <p><?php echo $footer_data['copyright']; ?></p>
        </div>
    </div>
</footer>

<script src="<?php echo JS_PATH; ?>script.js?v=<?php echo time(); ?>"></script>

</body>
</html>
