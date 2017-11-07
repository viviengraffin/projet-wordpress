<div class="footer-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="footer">
                <div class="footer">
                    <?php
                    /* A sidebar in the footer? Yep. You can can customize
                     * your footer with four columns of widgets.
                     */
                    get_sidebar('footer');
                    ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="footer-line-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="footer-line">
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="bottom-footer-container">
    <div class="container_24">
        <div class="grid_24">
            <div class="bottom_footer_content">        
                <div class="grid_24 ">        
                    <div class="bottom-inner-footer"><div class="copyrightinfo">
                            <div class="copyrightinfo">
                                <?php if (traffica_get_option('traffica_footertext') != '') { ?>
                                    <p class="copyright"><?php echo traffica_get_option('traffica_footertext'); ?></p> 
                                <?php } else { ?>
                                    <p class="copyright"><a href="<?php echo esc_url('http://www.inkthemes.com'); ?>"><?php _e('Traffica By InkThemes','traffica');?></a> <?php _e('Powered By ','traffica');?><a href="<?php echo esc_url('http://www.wordpress.org'); ?>"><?php _e(' WordPress','traffica');?></a></p>                                     
                                <?php } ?>
                            </div>
                        </div> </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
