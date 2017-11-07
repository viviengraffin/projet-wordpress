<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>
<div class="slider_container">  
    <span class="slidertop-shadow"></span>
    <div class="container_24">
        <div class="grid_24">		
            <div class="flexslider">
                <ul class="slides">			
                    <li>               
                        <div class="content">
                            <?php if (traffica_get_option('traffica_slider_heading1') != '') { ?>
                                <h1><a href="<?php echo esc_url(traffica_get_option('traffica_slider_link')); ?>"><?php echo stripslashes(traffica_get_option('traffica_slider_heading1')); ?></a></h1>
                            <?php } else { ?>
                                <h1><a href="#"><?php _e('Premium WordPress Themes with Single Click Installation', 'traffica'); ?></a></h1>
                            <?php } ?>
                            <div class="clear"></div>
                            <?php if (traffica_get_option('traffica_slider_des1') != '') { ?>
                                <p><?php echo stripslashes(traffica_get_option('traffica_slider_des1')); ?></p>
                            <?php } else { ?>
                                <p><?php _e('Lid est laborum dolo rumes fugats untras. Et harums ser quidem rerum facilis dolores nemis omnis fugiats vitaes nemo.','traffica');?></p>
                            <?php } ?>
                            <a class="btn-2" href="<?php
                            if (traffica_get_option('traffica_slider_btnlink1') != '') {
                                echo esc_url(traffica_get_option('traffica_slider_btnlink1'));
                            } else {
                                echo "#";
                            }
                            ?>"><?php
                                   if (traffica_get_option('traffica_slider_btnt1') != '') {
                                       echo traffica_get_option('traffica_slider_btnt1');
                                   } else {
                                      _e('Get Started !','traffica');
                                   }
                                   ?></a></div>
                        <?php
                        //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring1 = traffica_get_option('traffica_image1');
                        $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring1)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        ?>
                        <div class="imgmedia"> <?php if (traffica_get_option('traffica_image1') != '') { ?>
                                <?php if ($check_img_ofset == 0) { ?>
                                    <div class="video"><?php echo traffica_get_option('traffica_image1'); ?></div>
                                <?php } else { ?>
                                    <div class="images"><img src="<?php echo traffica_get_option('traffica_image1'); ?>"  alt="" /><span class="slider-shadow"></span></div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="images"><img src="<?php echo get_template_directory_uri(); ?>/images/slider-img1.jpg" alt="" /><span class="slider-shadow"></span></div>
                            <?php } ?></div>
                    </li>
                    <!--Start Slide2-->
                    <li>              
                        <div class="content">
                            <?php if (traffica_get_option('traffica_slider_heading2') != '') { ?>
                                <h1><a href="<?php echo esc_url(traffica_get_option('traffica_slider_link2')); ?>"><?php echo stripslashes(traffica_get_option('traffica_slider_heading2')); ?></a></h1>
                            <?php } else { ?>
                                <h1><a href="#"><?php _e('rerum facilis dolores nemis omnis fugiats vitaes nemo.','traffica');?></a></h1>
                            <?php } ?>
                            <div class="clear"></div>
                            <?php if (traffica_get_option('traffica_slider_des2') != '') { ?>
                                <p><?php echo stripslashes(traffica_get_option('traffica_slider_des2')); ?></p>
                            <?php } else { ?>	
                                <p><?php _e('Et harums ser quidem rerum facilis dolores nemis omnis fugiats vitaes nemo. Lid est laborum dolo rumes fugats untras.','traffica');?></p>
                            <?php } ?>
                            <a class="btn-2" href="<?php
                            if (traffica_get_option('traffica_slider_btnlink2') != '') {
                                echo esc_url(traffica_get_option('traffica_slider_btnlink2'));
                            } else {
                                echo "#";
                            }
                            ?>"><?php
                                   if (traffica_get_option('traffica_slider_btnt2') != '') {
                                       echo traffica_get_option('traffica_slider_btnt2');
                                   } else {
                                       _e('Get Started !','traffica');
                                   }
                                   ?></a>
                        </div>
                        <?php
//The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring2 = traffica_get_option('traffica_image2');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring2)) {
                                $check_img_ofset = 1;
                            }
                        }
// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
                        ?>
                        <div class="imgmedia"> <?php if (traffica_get_option('traffica_image2') != '') { ?>
                                <?php if ($check_img_ofset == 0) { ?>
                                    <div class="video"><?php echo traffica_get_option('traffica_image2'); ?></div>
                                <?php } else { ?>
                                    <div class="images"><img src="<?php echo traffica_get_option('traffica_image2'); ?>"  alt="" /><span class="slider-shadow"></span></div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="images"><img src="<?php echo get_template_directory_uri(); ?>/images/slider-img2.jpg" alt="" /><span class="slider-shadow"></span></div>
                            <?php } ?></div>
                    </li>
                    <!--End slide -->				  
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="home_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="home-content">
                <div class="page_content">
                    <div class="page_info">
                        <?php if (traffica_get_option('traffica_page_main_heading') != '') { ?>
                            <h1><?php echo stripslashes(traffica_get_option('traffica_page_main_heading')); ?></h1>
                        <?php } else { ?>
                            <h1><?php _e('5 Simple Ways To Make Your ','traffica');?><a href="#"><?php _e('WordPress','traffica');?></a><?php _e(' Site More SEO Friendly','traffica');?></h1>
                        <?php } ?>
                        <?php if (traffica_get_option('traffica_page_sub_heading') != '') { ?>
                            <p><?php echo stripslashes(traffica_get_option('traffica_page_sub_heading')); ?></p>
                        <?php } else { ?>
                            <p><?php _e('Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. ','traffica');?></p>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                    <div class="feature_box">
                        <div class="grid_6 alpha">
                            <div class="feature_inner_box first">
                                <?php if (traffica_get_option('traffica_fimg1') != '') { ?>
                                    <a href="<?php echo esc_url(traffica_get_option('traffica_feature_link1')); ?>"><img src="<?php echo traffica_get_option('traffica_fimg1'); ?>" alt="Feature image" /></a>                                <?php } else { ?>
                                    <a href="<?php echo esc_url(traffica_get_option('traffica_feature_link1')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/circleimg1.png" alt="Feature image" /></a>
                                <?php } ?>		
                                <?php if (traffica_get_option('traffica_firsthead') != '') { ?>
                                    <h6 class="feature_title"><a href="<?php
                                        if (traffica_get_option('traffica_feature_link1') != '') {
                                            echo esc_url(traffica_get_option('traffica_feature_link1'));
                                        }
                                        ?>"><?php echo stripslashes(traffica_get_option('traffica_firsthead')); ?></a></h6>
                                    <?php } else { ?>
                                    <h6><a href="#"><?php _e('Quickly With Plugins','traffica');?></a></h6>
                                <?php } ?>
                                <?php if (traffica_get_option('traffica_firstdesc') != '') { ?>
                                    <p><?php echo stripslashes(traffica_get_option('traffica_firstdesc')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('Site speed is one of the few ranking 
                                        that Google has officially confirmed.','traffica');?></p>
                                <?php } ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="grid_6">
                            <div class="feature_inner_box second">
                                <?php if (traffica_get_option('traffica_fimg2') != '') { ?>
                                    <div class="circle"><a href="<?php echo esc_url(traffica_get_option('traffica_feature_link2')); ?>"><img src="<?php echo traffica_get_option('traffica_fimg2'); ?>" alt="Feature image" /></a></div>
                                <?php } else { ?>
                                    <div class="circle">
                                        <a href="<?php echo traffica_get_option('traffica_feature_link2'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/circleimg2.png" alt="Feature image" /></a></div>
                                <?php } ?>		
                                <?php if (traffica_get_option('traffica_headline2') != '') { ?>
                                    <h6 class="feature_title"><a href="<?php
                                        if (traffica_get_option('traffica_feature_link2') != '') {
                                            echo esc_url(traffica_get_option('traffica_feature_link2'));
                                        }
                                        ?>"><?php echo stripslashes(traffica_get_option('traffica_headline2')); ?></a></h6>
                                    <?php } else { ?>
                                    <h6><a href="#"><?php _e('Quickly With Plugins','traffica');?></a></h6>
                                <?php } ?>
                                <?php if (traffica_get_option('traffica_seconddesc') != '') { ?>
                                    <p><?php echo stripslashes(traffica_get_option('traffica_seconddesc')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('Site speed is one of the few ranking 
                                        that Google has officially confirmed.','traffica');?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="grid_6">
                            <div class="feature_inner_box third">
                                <?php if (traffica_get_option('traffica_fimg3') != '') { ?>
                                    <div class="circle"><a href="<?php echo esc_url(traffica_get_option('traffica_feature_link3')); ?>"><img src="<?php echo traffica_get_option('traffica_fimg3'); ?>" alt="Feature image" /></a></div>
                                <?php } else { ?>
                                    <div class="circle">
                                        <a href="<?php echo esc_url(traffica_get_option('traffica_feature_link3')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/circleimg3.png" alt="Feature image" /></a></div>
                                <?php } ?>		
                                <?php if (traffica_get_option('traffica_headline3') != '') { ?>
                                    <h6 class="feature_title"><a href="<?php
                                        if (traffica_get_option('traffica_feature_link3') != '') {
                                            echo traffica_get_option('traffica_feature_link3');
                                        }
                                        ?>"><?php echo stripslashes(traffica_get_option('traffica_headline3')); ?></a></h6>
                                    <?php } else { ?>
                                    <h6><a href="#"><?php _e('Quickly With Plugins','traffica');?></a></h6>
                                <?php } ?>
                                <?php if (traffica_get_option('traffica_thirddesc') != '') { ?>
                                    <p><?php echo stripslashes(traffica_get_option('traffica_thirddesc')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('Site speed is one of the few ranking 
                                        that Google has officially confirmed.','traffica');?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="grid_6 omega">
                            <div class="feature_inner_box fourth">
                                <?php if (traffica_get_option('traffica_fimg4') != '') { ?>
                                    <a href="<?php echo esc_url(traffica_get_option('traffica_feature_link4')); ?>"><img src="<?php echo traffica_get_option('traffica_fimg4'); ?>" alt="Feature image" /></a>
                                <?php } else { ?>			
                                    <a href="<?php echo esc_url(traffica_get_option('traffica_feature_link4')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/circleimg4.png" alt="Feature image" /></a>
                                <?php } ?>		
                                <?php if (traffica_get_option('traffica_headline4') != '') { ?>
                                    <h6 class="feature_title"><a href="<?php
                                        if (traffica_get_option('traffica_feature_link4') != '') {
                                            echo esc_url(traffica_get_option('traffica_feature_link4'));
                                        }
                                        ?>"><?php echo stripslashes(traffica_get_option('traffica_headline4')); ?></a></h6>
                                    <?php } else { ?>
                                    <h6><a href="#"><?php _e('Quickly With Plugins','traffica');?></a></h6>
                                <?php } ?>
                                <?php if (traffica_get_option('traffica_fourthdesc') != '') { ?>
                                    <p><?php echo stripslashes(traffica_get_option('traffica_fourthdesc')); ?></p>
                                <?php } else { ?>
                                    <p><?php _e('Site speed is one of the few ranking 
                                        that Google has officially confirmed.','traffica');?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>                       
                    <!--carousel slider	-->
                    <div class="Portfolio">  
                        <!--carousel slider	-->          
                        <?php
                        query_posts('post_type=post');
                        while (have_posts()) : the_post();
                            ?>
                            <?php
                            $content1 = $post->post_content;
                            $searchimages1 = '~<img [^>]* />~';
                            preg_match_all($searchimages1, $content1, $pics1);
                            $iNumberOfPics1 = count($pics1[0]);
                            $car_img = 'off';
                            if ($iNumberOfPics1 > 0) {
                                $car_img = 'on';
                                break;
                            } else {
                                $car_img = 'off';
                            }
                        endwhile;
                        wp_reset_query();
                        ?>
                        <?php if ((have_posts()) && (($car_img == 'on') || (has_post_thumbnail()))) { ?>
                            <?php if (traffica_get_option('inkthemes_blog_heading') != '') { ?>
                                <h2><span><?php echo stripslashes(traffica_get_option('traffica_blog_heading')); ?></span></h2>
                            <?php } else { ?>
                                <h2><span><?php _e('Recent Post','traffica');?></span></h2>
                            <?php } ?> 
                            <div id="carousel-full">
                                <div class="carousel-posts">
                                    <ul>
                                        <?php
                                        $args = array(
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'order' => 'DESC'
                                        );
                                        $query = new WP_Query($args);
                                        ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <?php
                                            $content = $post->post_content;
                                            $searchimages = '~<img [^>]* />~';
                                            /* Run preg_match_all to grab all the images and save the results in $pics */
                                            preg_match_all($searchimages, $content, $pics);
                                            // Check to see if we have at least 1 image
                                            $iNumberOfPics = count($pics[0]);
                                            if (($iNumberOfPics > 0) || (has_post_thumbnail())) {
                                                ?>
                                                <li>
                                                    <div class="thumbnail"> 
                                                        <?php if (has_post_thumbnail()) { ?>
                                                            <a href="<?php esc_url(the_permalink()); ?>">
                                                                <?php the_post_thumbnail(); ?>
                                                            </a>
                                                            <?php
                                                        } else {
                                                            echo traffica_main_image();
                                                        }
                                                        ?>
                                                    </div>
                                                    <h4><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h4>
                                                </li>
                                                <?php
                                            }
                                        endwhile;
                                        // Reset Query
                                        wp_reset_query();
                                        ?>           
                                    </ul>
                                </div>
                                <div class="carousel-nav"> <a class="prev"  href="#"><span><?php _e('prev','traffica');?></span></a> <a class="next"  href="#"><span><?php _e('next','traffica');?></span></a> </div>
                            </div>
                            <?php
                        }
                        ?>  
                        <!-- /End Carousel -->    
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>