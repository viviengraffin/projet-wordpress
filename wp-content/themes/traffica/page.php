<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 */
?>
<?php get_header(); ?>  
<div class="page_heading_container">
    <span class="crumb_shadow"></span>
    <div class="container_24">
        <div class="grid_24">
            <div class="page_heading_content">
                <div class="grid_24">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="page-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page-content">
                <div class="grid_16 alpha">
                    <div class="content-bar">  	
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <?php if (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>	
                            <div class="clear"></div>
                            <!--Start Comment box-->
                            <?php comments_template(); ?>
                            <!--End Comment box-->
                            <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'traffica') . '</span>', 'after' => '</div>')); ?>
                        <?php endif; ?>	
                    </div>
                </div>
                <div class="grid_8 omega">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>