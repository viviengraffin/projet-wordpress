<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
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
                    <h1><?php printf(SEARCH_RESULT, '' . get_search_query() . ''); ?></h1>
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
                            <!--Start Post-->
                            <?php get_template_part('loop', 'search'); ?>
                            <!--End Post-->
                        <?php else : ?>
                            <article id="post-0" class="post no-results not-found">
                                <header class="entry-header">
                                    <h1 class="entry-title">
                                        <?php echo NOTHING_FOUND; ?>
                                    </h1>
                                </header>
                                <!-- .entry-header -->
                                <div class="entry-content">
                                    <p>
                                        <?php echo NOTHING_MATCHED; ?>
                                    </p>
                                    <?php get_search_form(); ?>
                                </div>
                                <!-- .entry-content -->
                            </article>
                        <?php endif; ?>
                        <div class="clear"></div>
                        <nav id="nav-single"> 
                            <span class="nav-next">
                                <?php previous_posts_link(NEWER_POSTS); ?>
                            </span> 
                            <span class="nav-previous">
                                <?php next_posts_link(OLDER_POSTS); ?>
                            </span> 
                        </nav>
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