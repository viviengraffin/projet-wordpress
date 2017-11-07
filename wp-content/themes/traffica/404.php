<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */
?>
<?php get_header(); ?>  
<div class="page_heading_container">
    <span class="crumb_shadow"></span>
    <div class="container_24">
        <div class="grid_24">
            <div class="page_heading_content">
                <span class="bred-tip"></span>
                <?php echo THIS_IS_SOMEWHAT; ?>
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
                        <?php// the_content(); ?>	
                        <header class="entry-header">
                            <p>
                                <?php echo IT_SEEMS_WE; ?>
                            </p>
                            <?php get_search_form(); ?>
                            <?php the_widget('WP_Widget_Recent_Posts', array('number' => 10), array('widget_id' => '404')); ?>
                            <div class="widget">
                                <h2 class="widgettitle">
                                    <?php echo MOST_USED_CATEGORIES; ?>
                                </h2>
                                <ul>
                                    <?php wp_list_categories(array('orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10)); ?>
                                </ul>
                            </div>
                            <?php
                            /* translators: %1$s: smilie */
                            $archive_content = '<p>' . sprintf(MONTHLY_ARCHIVES, convert_smilies(':)')) . '</p>';
                            the_widget('WP_Widget_Archives', array('count' => 0, 'dropdown' => 1), array('after_title' => '</h2>' . $archive_content));
                            ?>
                            <?php the_widget('WP_Widget_Tag_Cloud'); ?>
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