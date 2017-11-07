<div class="grid_6 alpha">
    <div class="footer_widget first">
        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?>
            <h4><?php _e('About Us','traffica');?></h4>
            <p><?php _e('We make simple and easy to WordPress themes that will make your website easily. You just need to install it and your website will be ready within a minute.','traffica');?></p>
        <?php endif; ?>
    </div>
</div>
<div class="grid_6">
    <div class="footer_widget">
        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>
        <?php else : ?> 
            <h4><?php _e('OUR PAGES','traffica');?></h4>
            <ul>
                <li><a href="#"><?php _e('Default template ','traffica');?></a></li>
                <li><a href="#"><?php _e('Full-width template ','traffica');?></a></li>
                <li><a href="#"><?php _e('Home template ','traffica');?></a></li>
            </ul>
        <?php endif; ?> 
    </div>
</div>
<div class="grid_6">
    <div class="footer_widget">
        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php else : ?>
            <h4><?php _e('Use of Widgets','traffica');?></h4>
            <p><?php _e('You can easily drag and drop the widgets here to display under the footer. You just need to go to your dashboard and there you can choose the appearance option and then widgets.','traffica');?></p>
        <?php endif; ?>
    </div>
</div>
<div class="grid_6 omega">
    <div class="footer_widget last">
        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php else : ?>
            <h4><?php _e('Search Anything','traffica'); ?></h4>
            <p><?php _e('Search Anything Which You Desire.','traffica'); ?></p>
            <?php get_search_form(); ?>         
        <?php endif; ?>
    </div>
</div>