<?php
/**
 * The Template for displaying all single posts.
 *
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
    <span class="crumb_shadow"></span>
    <div class="container_24">
        <div class="grid_24">
            <div class="page_heading_content single">
                <?php traffica_breadcrumbs(); ?>
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
                        <!-- Start the Loop. -->
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <!--Start post-->
                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="post_heading_wrapper">
                                        <h1 class="post_title"><?php the_title(); ?></h1>
                                        <div class="post_date">
                                            <ul class="date">
                                                <li class="day"><?php echo get_the_time('d') ?></li>
                                                <li class="month"><?php echo get_the_time('M') ?></li>
                                                <li class="year"><?php echo get_the_time('Y') ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <ul class="post_meta">
                      <li class="posted_by"><span>Posted By</span><?php the_author_posts_link(); ?></li>
                      <li class="post_category"><span>In</span><?php the_category(', '); ?></li>
                      <li class="post_comment"><span></span><?php comments_popup_link(__('No Comments.', 'traffica'), __('1 Comment.', 'traffica'), __('% Comments.', 'traffica')); ?></li>
                                    </ul>
                                    <div class="post_content"><?php the_content(); ?></div>
                                    <div class="clear"></div>
                                </div>
                                <!--End post-->
                            <?php endwhile;
                        else:
                            ?>
                            <div class="post">
                                <p>
    <?php echo SORRY_NO_POST_MATCHED; ?>
                                </p>
                            </div>
                        <?php
                        endif;
                        wp_reset_query();
                        ?>
                        <div class="clear"></div>
                        <!--End post-->
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php previous_post_link('%link', '<span class="meta-nav">&larr;</span>' . PREV_POST); ?>
                            </span> <span class="nav-next">
                        <?php next_post_link('%link', NEXT_POST . ' <span class="meta-nav">&rarr;</span>'); ?>
                            </span> </nav>
                        <div class="clear"></div>
                        <?php wp_link_pages(array('before' => '<div class="clear"></div><div class="page-link"><span>' . PAGES_COLON . '</span>', 'after' => '</div>')); ?>
                        <!--Start Comment box-->
<?php comments_template(); ?>
                        <!--End Comment box-->
                        <div class="clear"></div>
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