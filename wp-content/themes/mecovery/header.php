<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/assets/img/favicon.png">
        <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <?php wp_head(); ?>
        <script>
          // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          // ga('create', '####', 'auto');
          // ga('send', 'pageview');
        </script>
    </head>
    <body <?php body_class(); ?>>
    <div class="page-wrapper">

    <?php if ( !is_page_template( 'page-signup.php' ) ): ?>
        <button class="close-btn"><i class="fi-list"></i></button>
        <div class="mobile-nav-container">
            <nav class="mobile-nav">
                <?php wp_nav_menu( array('menu' => 'Main nav' ));?>
                <div class="mobile-nav-utility">
                    <?php wp_nav_menu( array('menu' => 'Mobile Utility Nav' ));?>
                </div>
                
            </nav>
        </div>
    <?php endif; ?>

        <header>
            <nav class="row main-nav" role="navigation">
                <div class="logo">
                    <a href="/"><img src="<?php bloginfo('template_url'); ?>/assets/img/mecovery_logo@2x.png" alt="Encepta Logo" width="150" height="22"></a>
                </div>
                <?php if ( !is_page_template( 'page-signup.php' ) ): ?>
                <div class="navigation" role="navigation">
                    <div class="nav-utility">
                        <?php wp_nav_menu( array('menu' => 'Utility Nav' ));?>
                    </div>
                    <div class="main-menu">
                        <?php wp_nav_menu( array('menu' => 'Main nav' ));?>
                    </div>
                </div>
                <?php else: ?>
                <div class="navigation" role="navigation">
                    <div class="nav-utility">
                        <span>Already Have an account?</span> 
                        <?php wp_nav_menu( array('menu' => 'Utility Nav' ));?>
                    </div>
                </div>
                <?php endif; ?>
            </nav>
        </header>