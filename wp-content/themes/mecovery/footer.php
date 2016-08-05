<?php if ( !is_page_template( 'page-signup.php' ) ): ?>
    <footer>
        <div class="row footer-utility">
            <div class="large-12 columns">
                <div class="branding">
                    <a href="#" class="footer-logo"><img src="<?php bloginfo('template_url'); ?>/assets/img/mecovery_logo@2x.png" alt="Encepta Logo" width="150" height="22"></a>   
                </div>
                <div class="socials">
                    <a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/linkedin_icon@2x.png" width="24" height="24" alt="Linkedin"></a>
                    <a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/twitter_icon@2x.png" width="28" height="24" alt="Twitter"></a>
                </div>
            </div>
        </div>
        <div class="row footer-nav">
        <?php
            if(is_active_sidebar('footer-nav-widget')){
                dynamic_sidebar('footer-nav-widget');
            }
        ?>
        </div>
        <div class="row" class="copyright">
            <div class="large-12 columns">
                <div>&copy; Copyright <?php echo date('Y'); ?> Mecovery. All Rights Reserved.</div>
                <div>Website created by <a href="http://www.visuallime.com" title="Visual Lime" target="_blank">Visual Lime</a></div>
            </div>
        </div>
    </footer>
<?php endif; ?>
    </div> <!-- page-wrapper ends -->
    <?php wp_footer(); ?>

    </body>
</html>