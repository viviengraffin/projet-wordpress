<?php
/**
 * The template for displaying Category pages.
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
                    <h1><?php printf(CATEGORY_ARCHIVES, '' . single_cat_title('', false) . ''); ?></h1>
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
                        <?php if (have_posts()) : ?>
                            <?php
                            $category_description = category_description();
                            if (!empty($category_description))
                                echo '' . $category_description . '';
                            /* Run the loop for the category page to output the posts.
                             * If you want to overload this in a child theme then include a file
                             * called loop-category.php and that will be used instead.
                             */
                            ?>
                            <?php get_template_part('loop', 'category'); ?>
                            <div class="clear"></div>
                            <nav id="nav-single"> 
                                <span class="nav-next">
                                    <?php previous_posts_link(NEWER_POSTS); ?>
                                </span> 
                                <span class="nav-previous">
                                    <?php next_posts_link(OLDER_POSTS); ?>
                                </span> 
                            </nav>
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