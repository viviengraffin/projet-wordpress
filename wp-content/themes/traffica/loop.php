<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!--Start post-->
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post_heading_wrapper">
                <h1 class="post_title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark" title="<?php echo sprintf(__("Permanent link to %s", 'traffica'), get_the_title(get_the_ID())); ?>"><?php the_title(); ?></a></h1>
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
                <li class="posted_by"><span><?php echo POSTED_BY; ?></span><?php the_author_posts_link(); ?></li>
                <li class="post_category"><span><?php _e('in', 'traffica') ?></span><?php the_category(', '); ?></li>
                <li class="post_comment"><span></span><?php comments_popup_link(__('No Comments.', 'traffica'), __('1 Comment.', 'traffica'), __('% Comments.', 'traffica')); ?></li>
            </ul>
            <div class="post_content"><?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <a href="<?php esc_url(the_permalink()); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <?php
                } else {
                    echo traffica_main_image();
                }
                ?>
                <?php the_excerpt(); ?>
                <a class="read_more" href="<?php esc_url(the_permalink()) ?>"><?php echo CONTINUE_READING_DOTS; ?></a></div>
            <div class="clear"></div>
        </div>
        <!--End post-->        
    <?php endwhile; ?>
   
    <?php
else:
    ?>
    <div class="post">
        <p>
    <?php echo SORRY_NO_POST_MATCHED; ?>
        </p>
    </div>
<?php endif;
?>
<div class="clear"></div>
<!--End post-->