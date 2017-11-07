<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="header_wrapper">
            <div class="container_24">
                <div class="grid_24">
                    <div class="header">
                        <div class="grid_6 alpha">
                            <div class="logo">
                                <?php if (traffica_get_option('traffica_logo') != '') { ?>
                                    <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(traffica_get_option('traffica_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
                                <?php } else { ?>
                                    <hgroup>
                                        <h1 id="site-title"><span><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></span></h1>
                                        <h2 id="site-description"><?php bloginfo('description'); ?></h2>
                                    </hgroup>
                                <?php } ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="grid_18 omega">
                            <div class="clear"></div>
                            <div class="call-us">
                                <?php if (traffica_get_option('traffica_contact_number') != '') { ?>
                                    <a class="btn" href="tel:<?php echo stripslashes(traffica_get_option('traffica_contact_number')); ?>">
                                    </a>
                                <?php } else {
                                    ?>
                                <?php } ?>
                            </div>
                            <div class="clear"></div>
                            <div id="MainNav">                                  
                                <?php if (traffica_get_option('traffica_nav') != '') { ?><a href="#" class="mobile_nav closed"><?php echo stripslashes(traffica_get_option('traffica_nav')); ?><span></span></a><?php } else { ?> <a href="#" class="mobile_nav closed"><?php _e('Pages Navigation Menu','traffica');?><span></span></a>
                                <?php } ?>
                                <?php traffica_nav(); ?> 
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>