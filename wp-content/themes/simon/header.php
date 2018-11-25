<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<!--<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/DF-Favicon.png" />-->

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/app.css" />
   
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="top-bar-container contain-to-grid">
    <nav  class="top-bar fullWidth" data-topbar>
        <ul class="title-area">
            <li class="name">
                
            </li>
            <li class="toggle-topbar menu-icon">
                <a href="#" class="orange"><span>Menu</span></a>
            </li>
        </ul>
        <section class="top-bar-section" id="navMenu" >
              <ul class="">
                  <li>
                      <a href="<?php echo get_page_link(20); ?>">Me</a>
                  </li>
                  <li>
                      <a href="<?php echo get_page_link(20); ?>">Skills</a>
                  </li>
                  <li>
                      <a href="<?php echo get_page_link(20); ?>">Contact</a>
                  </li>
                  <li>
                      <a href="<?php echo get_page_link(20); ?>">Work</a>
                  </li>
                  <li>
                      <a href="<?php echo get_page_link(20); ?>">Portfolio</a>
                  </li>
              </ul>
        </section>
    </nav>
    <div class="floatingPhoto">
        <?php
        $image = get_field('profile_picture');

        if( !empty($image) ): 
                // vars
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];
        endif;
        ?>
        <img src="<?php echo $url; ?>" class="profilePic">
    </div>
</div>