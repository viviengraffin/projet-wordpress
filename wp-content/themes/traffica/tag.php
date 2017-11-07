<?php
/**
 * The template used to display Tag Archive pages
 * 
 */
?>
<?php get_header(); ?>  
<div class="page_heading_container">
    <span class="crumb_shadow"></span>
    <div class="container_24">
        <div class="grid_24">
            <div class="page_heading_content">
                <div class="grid_12 alpha">
                    <h1><?php printf(TAG_ARCHIVES, '' . single_cat_title('', false) . ''); ?></h1>
                </div>
                <div class="grid_12 omega">
                    <?php traffica_breadcrumbs(); ?>
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
                        <!--Start Post-->
                        <?php get_template_part('loop', 'index'); ?> 
                        <div class="clear"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php next_posts_link(NEWER_POSTS); ?>
                            </span> <span class="nav-next">
                                <?php previous_posts_link(OLDER_POSTS); ?>
                            </span> </nav>	
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