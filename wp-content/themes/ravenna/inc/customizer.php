<?php
/**
 * Ravenna Theme Customizer
 *
 * @package Ravenna
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ravenna_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'title_tagline' )->priority     = '9';
    $wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );

    //Titles
    class Ravenna_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:15px;border:1px solid;padding:5px;color:#111;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }


    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-templates/page_widgetized.php',
    ));

    //___Sections___//
    $wp_customize->add_panel( 'ravenna_sections_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Sections styling ', 'ravenna'),
    ) );

    $c = 0;
    foreach($pages as $page){

        $id = $page->post_id;
        $widget_count = ravenna_count_widgets($id);

        $wp_customize->add_section(
            'ravenna_sections_' . $c,
            array(
                'title' => __('Page - ', 'ravenna') . $page->post_title,
                'priority' => 9,
                'panel' => 'ravenna_sections_panel'
            )
        );
        for ($i = 1; $i <= $widget_count; $i++) {

            $wp_customize->add_setting('ravenna_options[info]', array(
                    'type'              => 'info_control',
                    'capability'        => 'edit_theme_options',
                    'sanitize_callback' => 'esc_attr',
                )
            );
            $wp_customize->add_control( new Ravenna_Info( $wp_customize, 'layout' . $c . $i, array(
                'label' => __('Section ', 'ravenna') . $i,
                'section' => 'ravenna_sections_' . $c,
                'settings' => 'ravenna_options[info]',
                'priority' => 10
                ) )
            );

            //Background color
            $wp_customize->add_setting(
                'section_bg_color_' . $id . '_' . $i,
                array(
                    'default'           => '#fff',
                    'sanitize_callback' => 'sanitize_hex_color',
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                        'section_bg_color_' . $id . '_' . $i,
                    array(
                        'label'         => __('Background color', 'ravenna'),
                        'section'       => 'ravenna_sections_' . $c,
                        'priority'      => 10
                    )
                )
            );
            //Color
            $wp_customize->add_setting(
                'section_color_' . $id . '_' . $i,
                array(
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_hex_color',
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                        'section_color_' . $id . '_' . $i,
                    array(
                        'label'         => __('Color', 'ravenna'),
                        'section'       => 'ravenna_sections_' . $c,
                        'priority'      => 10
                    )
                )
            );
            //Background image
            $wp_customize->add_setting(
                'section_image_' . $id . '_' . $i,
                array(
                    'default-image' => '',
                    'sanitize_callback' => 'esc_url_raw',
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                    $wp_customize,
                    'section_image_' . $id . '_' . $i,
                    array(
                       'label'    => __( 'Background image ', 'ravenna' ),
                       'type'     => 'image',
                       'section'  => 'ravenna_sections_' . $c,
                       'priority' => 10,
                    )
                )
            );

            //Top padding
            $wp_customize->add_setting(
                'section_tp_' . $id . '_' . $i,
                array(
                    'sanitize_callback' => 'absint',
                    'default'           => '100',
                )
            );
            $wp_customize->add_control( 'section_tp_' . $id . '_' . $i, array(
                'type'        => 'number',
                'priority'    => 10,
                'section'  => 'ravenna_sections_' . $c,
                'label'       => __('Top padding', 'ravenna'),
                'description' => __('Default 100px', 'ravenna'),
                'input_attrs' => array(
                    'min'   => 0,
                    'max'   => 300,
                    'step'  => 5,
                    'style' => 'margin-bottom: 15px; padding: 15px;',
                ),
            ) );
            //Bottom padding
            $wp_customize->add_setting(
                'section_bp_' . $id . '_' . $i,
                array(
                    'sanitize_callback' => 'absint',
                    'default'           => '100',
                )
            );
            $wp_customize->add_control( 'section_bp_' . $id . '_' . $i, array(
                'type'        => 'number',
                'priority'    => 10,
                'section'  => 'ravenna_sections_' . $c,
                'label'       => __('Bottom padding', 'ravenna'),
                'description' => __('Default 100px', 'ravenna'),
                'input_attrs' => array(
                    'min'   => 0,
                    'max'   => 300,
                    'step'  => 5,
                    'style' => 'margin-bottom: 15px; padding: 15px;',
                ),
            ) );
            //Max width
            $wp_customize->add_setting(
                'section_mw_' . $id . '_' . $i,
                array(
                    'sanitize_callback' => 'absint',
                    'default'           => '1170',
                )
            );
            $wp_customize->add_control( 'section_mw_' . $id . '_' . $i, array(
                'type'        => 'number',
                'priority'    => 10,
                'section'  => 'ravenna_sections_' . $c,
                'label'       => __('Max width', 'ravenna'),
                'description' => __('Max. width for the content. Default 1170px', 'ravenna'),
                'input_attrs' => array(
                    'min'   => 200,
                    'max'   => 1500,
                    'step'  => 5,
                    'style' => 'margin-bottom: 15px; padding: 15px;',
                ),
            ) );
            //Full width
            $wp_customize->add_setting(
                'section_fw_' . $id . '_' . $i,
                array(
                    'sanitize_callback' => 'ravenna_sanitize_checkbox',
                )
            );
            $wp_customize->add_control(
                'section_fw_' . $id . '_' . $i,
                array(
                    'type'      => 'checkbox',
                    'label'     => __('Full width section?', 'ravenna'),
                    'section'  => 'ravenna_sections_' . $c,
                    'description' => __('Section content gets stretched to the edges of the screen, if possible.', 'ravenna'),
                    'priority'  => 10,
                )
            );
            //Centered
            $wp_customize->add_setting(
                'section_center_' . $id . '_' . $i,
                array(
                    'sanitize_callback' => 'ravenna_sanitize_checkbox',
                )
            );
            $wp_customize->add_control(
                'section_center_' . $id . '_' . $i,
                array(
                    'type'      => 'checkbox',
                    'label'     => __('Center the content?', 'ravenna'),
                    'section'  => 'ravenna_sections_' . $c,
                    'description' => __('Depends on the content, may or may not work.', 'ravenna'),
                    'priority'  => 10,
                )
            );
        }
    $c++;
    }

    //___General___//
    $wp_customize->add_section(
        'ravenna_general',
        array(
            'title' => __('General', 'ravenna'),
            'priority' => 9,
        )
    );
    //___Preloader___//
    $wp_customize->add_setting(
        'preloader_text',
        array(
            'sanitize_callback' => 'ravenna_sanitize_text',
            'default' => __('Loading&hellip;','ravenna'),
        )
    );
    $wp_customize->add_control(
        'preloader_text',
        array(
            'label' => __( 'Preloader text', 'ravenna' ),
            'section' => 'ravenna_general',
            'type' => 'text',
            'priority' => 11
        )
    );
    //___Header area___//
    $wp_customize->add_panel( 'ravenna_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header area', 'ravenna'),
    ) );
    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',

        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'ravenna' ),
               'type'           => 'image',
               'section'        => 'title_tagline',
               'settings'       => 'site_logo',
               'priority'       => 11,
            )
        )
    );

    //___Header boxes___//
    $wp_customize->add_section(
        'ravenna_header_boxes',
        array(
            'title' => __('Header boxes', 'ravenna'),
            'panel'    => 'ravenna_header_panel',
            'priority' => 10,
        )
    );
    //Box 1
    $wp_customize->add_setting(
        'box_icon_1',
        array(
            'default' => 'fa-building-o',
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_icon_1',
        array(
            'label' => __( 'Box 1 icon', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'box_title_1',
        array(
            'default' => __( 'Solid construction', 'ravenna' ),
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_title_1',
        array(
            'label' => __( 'Box 1 title', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'box_text_1',
        array(
            'default' => __( 'Try it and see for yourself. You will be amazed.', 'ravenna' ),
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_text_1',
        array(
            'label' => __( 'Box 1 text', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    //Box 2
    $wp_customize->add_setting(
        'box_icon_2',
        array(
            'default' => 'fa-heart-o',
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_icon_2',
        array(
            'label' => __( 'Box 2 icon', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'box_title_2',
        array(
            'default' => __( 'Built with love', 'ravenna' ),
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_title_2',
        array(
            'label' => __( 'Box 2 title', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'box_text_2',
        array(
            'default' => __( 'Countless hours of work and passion went into this.', 'ravenna' ),
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_text_2',
        array(
            'label' => __( 'Box 2 text', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    //Box 3
    $wp_customize->add_setting(
        'box_icon_3',
        array(
            'default' => 'fa-tablet',
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_icon_3',
        array(
            'label' => __( 'Box 3 icon', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'box_title_3',
        array(
            'default' => __( 'Responsive design', 'ravenna' ),
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_title_3',
        array(
            'label' => __( 'Box 3 title', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'box_text_3',
        array(
            'default' => __( 'Looks great on any device, no matter the size.', 'ravenna' ),
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'box_text_3',
        array(
            'label' => __( 'Box 3 text', 'ravenna' ),
            'section' => 'ravenna_header_boxes',
            'type' => 'text',
            'priority' => 10
        )
    );
    //Top padding
    $wp_customize->add_setting(
        'header_top_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '240',
        )
    );
    $wp_customize->add_control( 'header_top_padding', array(
        'type'        => 'number',
        'priority'    => 10,
        'section' => 'ravenna_header_boxes',
        'label'       => __('Top padding', 'ravenna'),
        'description' => __('Top padding for the header boxes (you can also control the header image height with this if you have no boxes)', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 400,
            'step'  => 5,
            'style' => 'padding: 10px;',
        ),
    ) );
    //Bottom padding
    $wp_customize->add_setting(
        'header_bottom_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '170',
        )
    );
    $wp_customize->add_control( 'header_bottom_padding', array(
        'type'        => 'number',
        'priority'    => 10,
        'section' => 'ravenna_header_boxes',
        'label'       => __('Bottom padding', 'ravenna'),
        'description' => __('Bottom padding for the header boxes (you can also control the header image height with this if you have no boxes)', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 400,
            'step'  => 5,
            'style' => 'padding: 10px;',
        ),
    ) );
    //Show on mobiles
    $wp_customize->add_setting(
        'header_box_mobile',
        array(
            'sanitize_callback' => 'ravenna_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'header_box_mobile',
        array(
            'type'      => 'checkbox',
            'label'     => __('Mobile display', 'ravenna'),
            'description' => __('Enable the header boxes on screen widths < 991px?', 'ravenna'),
            'section'   => 'ravenna_header_boxes',
            'priority'  => 10,
        )
    );

    //___Blog options___//
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'ravenna'),
            'priority' => 13,
        )
    );
    // Blog layout
    $wp_customize->add_setting('ravenna_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new Ravenna_Info( $wp_customize, 'layout', array(
        'label' => __('Layout', 'ravenna'),
        'section' => 'blog_options',
        'settings' => 'ravenna_options[info]',
        'priority' => 10
        ) )
    );
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'ravenna_sanitize_blog',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Blog layout', 'ravenna'),
            'section'   => 'blog_options',
            'priority'  => 11,
            'choices'   => array(
                'classic'     => __( 'Classic', 'ravenna' ),
                'fullwidth'   => __( 'Full width (no sidebar)', 'ravenna' ),
            ),
        )
    );
    //Full width singles
    $wp_customize->add_setting(
        'fullwidth_single',
        array(
            'sanitize_callback' => 'ravenna_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'fullwidth_single',
        array(
            'type'      => 'checkbox',
            'label'     => __('Full width single posts?', 'ravenna'),
            'section'   => 'blog_options',
            'priority'  => 12,
        )
    );
    //Content/excerpt
    $wp_customize->add_setting('ravenna_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new Ravenna_Info( $wp_customize, 'content', array(
        'label' => __('Content/excerpt', 'ravenna'),
        'section' => 'blog_options',
        'settings' => 'ravenna_options[info]',
        'priority' => 13
        ) )
    );
    //Full content posts
    $wp_customize->add_setting(
      'full_content_home',
      array(
        'sanitize_callback' => 'ravenna_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
        'full_content_home',
        array(
            'type' => 'checkbox',
            'label' => __('Full posts content on the home page?', 'ravenna'),
            'section' => 'blog_options',
            'priority' => 14,
        )
    );
    $wp_customize->add_setting(
      'full_content_archives',
      array(
        'sanitize_callback' => 'ravenna_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
        'full_content_archives',
        array(
            'type' => 'checkbox',
            'label' => __('Full posts content on all archives?', 'ravenna'),
            'section' => 'blog_options',
            'priority' => 15,
        )
    );
    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        )
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 16,
        'section'     => 'blog_options',
        'label'       => __('Excerpt lenght', 'ravenna'),
        'description' => __('Excerpt length [default: 55 words]', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Meta
    $wp_customize->add_setting('ravenna_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new Ravenna_Info( $wp_customize, 'meta', array(
        'label' => __('Meta', 'ravenna'),
        'section' => 'blog_options',
        'settings' => 'ravenna_options[info]',
        'priority' => 17
        ) )
    );
    //Hide meta index
    $wp_customize->add_setting(
      'hide_meta_index',
      array(
        'sanitize_callback' => 'ravenna_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
      'hide_meta_index',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post meta on index, archives?', 'ravenna'),
        'section' => 'blog_options',
        'priority' => 18,
      )
    );
    //Hide meta single
    $wp_customize->add_setting(
      'hide_meta_single',
      array(
        'sanitize_callback' => 'ravenna_sanitize_checkbox',
        'default' => 0,
      )
    );
    $wp_customize->add_control(
      'hide_meta_single',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post meta on single posts?', 'ravenna'),
        'section' => 'blog_options',
        'priority' => 19,
      )
    );
    //Featured images
    $wp_customize->add_setting('ravenna_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new Ravenna_Info( $wp_customize, 'images', array(
        'label' => __('Featured images', 'ravenna'),
        'section' => 'blog_options',
        'settings' => 'ravenna_options[info]',
        'priority' => 21
        ) )
    );
    //Index images
    $wp_customize->add_setting(
        'index_feat_image',
        array(
            'sanitize_callback' => 'ravenna_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'index_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Hide featured images on index, archives?', 'ravenna'),
            'section' => 'blog_options',
            'priority' => 22,
        )
    );
    //Post images
    $wp_customize->add_setting(
        'post_feat_image',
        array(
            'sanitize_callback' => 'ravenna_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'post_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Hide featured images on single posts?', 'ravenna'),
            'section' => 'blog_options',
            'priority' => 23,
        )
    );

    //___Fonts___//
    $wp_customize->add_section(
        'ravenna_fonts',
        array(
            'title' => __('Fonts', 'ravenna'),
            'priority' => 15,
            'description' => __('You can use any Google Fonts you want for the heading and/or body. See the fonts here: google.com/fonts. See the documentation if you need help with this: flyfreemedia.com/documentation/ravenna', 'ravenna'),
        )
    );
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Lato:400,700,400italic,700italic',
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Body font name/style/sets', 'ravenna' ),
            'section' => 'ravenna_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Lato\', sans-serif',
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Body font family', 'ravenna' ),
            'section' => 'ravenna_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => 'Open+Sans+Condensed:300,300italic,700',
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_name',
        array(
            'label' => __( 'Headings font name/style/sets', 'ravenna' ),
            'section' => 'ravenna_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Headings fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '\'Open Sans Condensed\', sans-serif',
            'sanitize_callback' => 'ravenna_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Headings font family', 'ravenna' ),
            'section' => 'ravenna_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );
    // Site description
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '15',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'ravenna_fonts',
        'label'       => __('Site description', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'ravenna_fonts',
        'label'       => __('H1 font size', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'ravenna_fonts',
        'label'       => __('H2 font size', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'ravenna_fonts',
        'label'       => __('H3 font size', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'ravenna_fonts',
        'label'       => __('H4 font size', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'ravenna_fonts',
        'label'       => __('H5 font size', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'ravenna_fonts',
        'label'       => __('H6 font size', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'ravenna_fonts',
        'label'       => __('Body font size', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //Widget title
    $wp_customize->add_setting(
        'section_titles',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '40',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control( 'section_titles', array(
        'type'        => 'number',
        'priority'    => 24,
        'section'     => 'ravenna_fonts',
        'label'       => __('Section titles', 'ravenna'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //___Colors___//
    //Primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#3c5180',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary color', 'ravenna'),
                'section'       => 'colors',
                'settings'      => 'primary_color',
                'priority'      => 12
            )
        )
    );
    //Secondary color
    $wp_customize->add_setting(
        'secondary_color',
        array(
            'default'           => '#488FE4',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
                'label'         => __('Secondary color', 'ravenna'),
                'section'       => 'colors',
                'settings'      => 'secondary_color',
                'priority'      => 12
            )
        )
    );

    //Site title
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => '#f5f5f5',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label' => __('Site title', 'ravenna'),
                'section' => 'colors',
                'settings' => 'site_title_color',
                'priority' => 18
            )
        )
    );
    //Site desc
    $wp_customize->add_setting(
        'site_desc_color',
        array(
            'default'           => '#E1E9EF',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_desc_color',
            array(
                'label' => __('Site description', 'ravenna'),
                'section' => 'colors',
                'priority' => 19
            )
        )
    );
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#8C9DAB',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'ravenna'),
                'section' => 'colors',
                'settings' => 'body_text_color',
                'priority' => 22
            )
        )
    );

    //___Footer___//
    $wp_customize->add_section(
        'ravenna_footer',
        array(
            'title'         => __('Footer widgets', 'ravenna'),
            'priority'      => 18,
        )
    );
    $wp_customize->add_setting(
        'footer_widget_areas',
        array(
            'default'           => '3',
            'sanitize_callback' => 'ravenna_sanitize_fwidgets',
        )
    );
    $wp_customize->add_control(
        'footer_widget_areas',
        array(
            'type'        => 'radio',
            'label'       => __('Footer widget area', 'ravenna'),
            'section'     => 'ravenna_footer',
            'description' => __('Choose the number of widget areas in the footer, then go to Appearance > Widgets and add your widgets.', 'ravenna'),
            'choices' => array(
                '1'     => __('One', 'ravenna'),
                '2'     => __('Two', 'ravenna'),
                '3'     => __('Three', 'ravenna'),
            ),
        )
    );

}
add_action( 'customize_register', 'ravenna_customize_register' );

/**
* Sanitize
*/
//Text
function ravenna_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Checkboxes
function ravenna_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

//Footer widget areas
function ravenna_sanitize_fwidgets( $input ) {
    if ( in_array( $input, array( '1', '2', '3' ), true ) ) {
        return $input;
    }
}

//Blog layout
function ravenna_sanitize_blog( $input ) {
    if ( in_array( $input, array( 'classic', 'fullwidth' ), true ) ) {
        return $input;
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ravenna_customize_preview_js() {
	wp_enqueue_script( 'ravenna_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ravenna_customize_preview_js' );

function ravenna_registers() {
	wp_enqueue_script( 'ravenna_customizer_script', get_template_directory_uri() . '/js/ravenna_customizer.js', array("jquery"), '20120206', true  );

	wp_localize_script( 'ravenna_customizer_script', 'ravennaCustomizerObject', array(
		'github'				=> __('GitHub','ravenna'),
		'review'				=> __('Leave a Review', 'ravenna'),
		'documentation'	=> __('Documentation', 'ravenna')
		) );
}
add_action( 'customize_controls_enqueue_scripts', 'ravenna_registers' );
