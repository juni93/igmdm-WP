<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title() ?></title>
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>> 
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div id="main-logo"class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <a  href="<?php echo site_url(''); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/new-logo.png" class="logo" alt="IGMDM">
                    </a>
                </div>
                <div id="main-menu-header" class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 align-self-center">
                    <?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
                </div>
                <!-- <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 align-self-center">
                    <?php wp_nav_menu( array( 'theme_location' => 'social-menu' ) ); ?>
                </div> -->
                
            </div>
        </div>
    </header>
    <div class="container">
        <div id="social-media-follow" class="row">
            <?php if ( function_exists('cn_social_icon') ) echo cn_social_icon(); ?>
        </div>
    </div>
    <div id="top-margin-header"></div>

