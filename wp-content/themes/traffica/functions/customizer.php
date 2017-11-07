<?php
class Traffica_Customizer {
    public static function Traffica_Register($wp_customize) {
        self::Traffica_Sections($wp_customize);
        self::Traffica_Controls($wp_customize);
    }
    public static function Traffica_Sections($wp_customize) {
        /**
         * General Section
         */
        $wp_customize->add_section('general_setting', array(
            'title' => __('General Settings', 'traffica'),
            'description' => __('Allows you to customize header logo, favicon etc settings for Traffica Theme.', 'traffica'), //Descriptive tooltip
            'panel' => '',
            'priority' => '10',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page Top Section
         */
        $wp_customize->add_section('home_top_section', array(
            'title' => __('Top Heading Section', 'traffica'),
            'description' => __('Allows you to setup Top heading section for Traffica Theme.', 'traffica'), //Descriptive tooltip
            'panel' => '',
            'priority' => '11',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Add panel for home page Slider area
         */
        $wp_customize->add_panel('home_page_slider_panel', array(
            'title' => __('Home Page Slider', 'traffica'),
            'description' => __('Allows you to setup home page slider area section for Traffica Theme.', 'traffica'),
            'priority' => '13',
            'capability' => 'edit_theme_options'
        ));
        /**
         * Home Page Slider area 1
         */
        $wp_customize->add_section('home_slider_1', array(
            'title' => __('First Slider Setting', 'traffica'),
            'description' => __('Allows you to setup first slider for Traffica Theme.', 'traffica'),
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page Slider area 1
         */
        $wp_customize->add_section('home_slider_2', array(
            'title' => __('Second Slider Setting', 'traffica'),
            'description' => __('Allows you to setup second slider for Traffica Theme.', 'traffica'),
            'panel' => 'home_page_slider_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('home_feature_area_panel', array(
            'title' => __('Home Page Feature Area', 'traffica'),
            'description' => __('Allows you to setup home page feature area section for Traffica Theme.', 'traffica'),
            'priority' => '14',
            'capability' => 'edit_theme_options'
        ));
        /**
         * Home Page Headings
         */
        $wp_customize->add_section('home_page_headings', array(
            'title' => __('Home Page Feature Area Headings', 'traffica'),
            'description' => __('Allows you to setup headings for home page feature area section for Traffica Theme.', 'traffica'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 1
         */
        $wp_customize->add_section('home_feature_area_1', array(
            'title' => __('First Feature Area', 'traffica'),
            'description' => __('Allows you to setup first feature area section for Traffica Theme.', 'traffica'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 2
         */
        $wp_customize->add_section('home_feature_area_2', array(
            'title' => __('Second Feature Area', 'traffica'),
            'description' => __('Allows you to setup second feature area section for Traffica Theme.', 'traffica'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 3
         */
        $wp_customize->add_section('home_feature_area_3', array(
            'title' => __('Third Feature Area', 'traffica'),
            'description' => __('Allows you to setup third feature area section for Traffica Theme.', 'traffica'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 4
         */
        $wp_customize->add_section('home_feature_area_4', array(
            'title' => __('Fourth Feature Area', 'traffica'),
            'description' => __('Allows you to setup Fourth feature area section for Traffica Theme.', 'traffica'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Blog Headings
         */
        $wp_customize->add_section('home_page_blog_heading_section', array(
            'title' => __('Home Page Feature Area Headings', 'traffica'),
            'description' => __('Allows you to setup headings for home page Blog section for Traffica Theme.', 'traffica'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Style Setting', 'traffica'),
            'description' => __('Allows you to change style using custom css for Traffica Theme.', 'traffica'),
            'panel' => '',
            'priority' => '15',
            'capability' => 'edit_theme_options'
                )
        );
    }
    public static function Traffica_Section_Content() {
        $section_content = array(
            'general_setting' => array(
                'traffica_logo',
                'traffica_favicon',
                'traffica_contact_number',
                'traffica_nav'
            ),
            'home_slider_1' => array(
                'traffica_image1',
                'traffica_slider_heading1',
                'traffica_slider_des1',
                'traffica_slider_btnt1',
                'traffica_slider_btnlink1'
            ),
            'home_slider_2' => array(
                'traffica_image2',
                'traffica_slider_heading2',
                'traffica_slider_des2',
                'traffica_slider_btnt2',
                'traffica_slider_btnlink2'
            ),
            'home_page_headings' => array(
                'traffica_page_main_heading',
                'traffica_page_sub_heading'
             ),
            'home_feature_area_1' => array(
                'traffica_fimg1',
                'traffica_firsthead',
                'traffica_firstdesc',
                'traffica_feature_link1'
            ),
            'home_feature_area_2' => array(
                'traffica_fimg2',
                'traffica_headline2',
                'traffica_seconddesc',
                'traffica_feature_link2'
            ),
            'home_feature_area_3' => array(
                'traffica_fimg3',
                'traffica_headline3',
                'traffica_thirddesc',
                'traffica_feature_link3'
            ),
            'home_feature_area_4' => array(
                'traffica_fimg4',
                'traffica_headline4',
                'traffica_fourthdesc',
                'traffica_feature_link4'
            ),
            'home_page_blog_heading_section' => array(
                'traffica_blog_heading'
            ),
            'style_section' => array(
                'traffica_customcss'
            )
        );
        return $section_content;
    }
    public static function Traffica_Settings() {
        $traffica_settings = array(
            'traffica_logo' => array(
                'id' => 'traffica_options[traffica_logo]',
                'label' => __('Custom Logo', 'traffica'),
                'description' => __('Choose your own logo. Optimal Size: 300px Wide by 90px Height.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/logo.png'
            ),
            'traffica_favicon' => array(
                'id' => 'traffica_options[traffica_favicon]',
                'label' => __('Custom Favicon', 'traffica'),
                'description' => __('Specify a 16px x 16px image that will represent your website&#039;s favicon.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'traffica_contact_number' => array(
                'id' => 'traffica_options[traffica_contact_number]',
                'label' => __('Contact Number For Tap To Call Feature', 'traffica'),
                'description' => __('Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => __('1800-525-6545', 'traffica')
            ),    
            'traffica_nav' => array(
                'id' => 'traffica_options[traffica_nav]',
                'label' => __('Mobile Navigation Menu', 'traffica'),
                'description' => __('Enter your mobile navigation menu text', 'traffica'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => __('Menu', 'traffica')
            ), 
            'traffica_image1' => array(
                'id' => 'traffica_options[traffica_image1]',
                'label' => __('First Slider Image', 'traffica'),
                'description' => __('Choose your image or video. Optimal size is 442px wide and height 235px', 'traffica'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/slider-img1.jpg'
            ),
            'traffica_slider_heading1' => array(
                'id' => 'traffica_options[traffica_slider_heading1]',
                'label' => __('First Slider Heading', 'traffica'),
                'description' => __('Enter your text heading for first slider.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Premium WordPress Themes with Single Click Installation', 'traffica')
            ),
            'traffica_slider_des1' => array(
                'id' => 'traffica_options[traffica_slider_des1]',
                'label' => __('First Slider Description', 'traffica'),
                'description' => __('Enter your text description for first slider.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Lid est laborum dolo rumes fugats untras. Et harums ser quidem rerum facilis dolores nemis omnis fugiats vitaes nemo.', 'traffica')
            ),
            'traffica_slider_btnt1' => array(
                'id' => 'traffica_options[traffica_slider_btnt1]',
                'label' => __('First Slider Button Text', 'traffica'),
                'description' => __('Enter your text label for slider button.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'Read More'
            ),
            'traffica_slider_btnlink1' => array(
                'id' => 'traffica_options[traffica_slider_btnlink1]',
                'label' => __('First Slide Link', 'traffica'),
                'description' => __('Enter your link url for first slide', 'traffica'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'traffica_image2' => array(
                'id' => 'traffica_options[traffica_image2]',
                'label' => __('Second Slider Image', 'traffica'),
                'description' => __('Choose your image or video. Optimal size is 442px wide and height 235px', 'traffica'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/slider-img2.jpg'
            ),
            'traffica_slider_heading2' => array(
                'id' => 'traffica_options[traffica_slider_heading2]',
                'label' => __('Second Slider Heading', 'traffica'),
                'description' => __('Enter your text heading for Second slider.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Rerum facilis dolores nemis omnis fugiats', 'traffica')
            ),
            'traffica_slider_des2' => array(
                'id' => 'traffica_options[traffica_slider_des2]',
                'label' => __('Second Slider Description', 'traffica'),
                'description' => __('Enter your text description for Second slider.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Et harums ser quidem rerum facilis dolores nemis omnis fugiats vitaes nemo. Lid est laborum dolo rumes fugats untras.', 'traffica')
            ),
            'traffica_slider_btnt2' => array(
                'id' => 'traffica_options[traffica_slider_btnt2]',
                'label' => __('Second Slider Button Text', 'traffica'),
                'description' => __('Enter your text label for Second slider button.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'Read More'
            ),
            'traffica_slider_btnlink2' => array(
                'id' => 'traffica_options[traffica_slider_btnlink2]',
                'label' => __('Second Slide Link', 'traffica'),
                'description' => __('Enter your link url for Second slide', 'traffica'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'traffica_page_main_heading' => array(
                'id' => 'traffica_options[traffica_page_main_heading]',
                'label' => __('Home Page Main Heading', 'traffica'),
                'description' => __('Mention the punch line for your business here.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('5 Simple Ways To Make Your <a href="#">WordPress</a> Site More SEO Friendly', 'traffica')
            ),
            'traffica_page_sub_heading' => array(
                'id' => 'traffica_options[traffica_page_sub_heading]',
                'label' => __('Home Page Sub Heading', 'traffica'),
                'description' => __('Mention the tagline for your business here that will complement the punch line.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'traffica')
            ),
            'traffica_fimg1' => array(
                'id' => 'traffica_options[traffica_fimg1]',
                'label' => __('First Feature Image', 'traffica'),
                'description' => __('Choose your image for first feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg1.png'
            ),
            'traffica_firsthead' => array(
                'id' => 'traffica_options[traffica_firsthead]',
                'label' => __('First Feature Heading', 'traffica'),
                'description' => __('Enter your text for first feature area heading.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Power of Easiness', 'traffica')
            ),
            'traffica_firstdesc' => array(
                'id' => 'traffica_options[traffica_firstdesc]',
                'label' => __('First Feature Description', 'traffica'),
                'description' => __('Enter your text for first feature area description.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('This Traffica Wordpress Theme gives you the easiness of building your site without any coding skills required.', 'traffica')
            ),
            'traffica_feature_link1' => array(
                'id' => 'traffica_options[traffica_feature_link1]',
                'label' => __('First feature Link', 'traffica'),
                'description' => __('Enter your link url for first feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'traffica_fimg2' => array(
                'id' => 'traffica_options[traffica_fimg2]',
                'label' => __('Quickly With Plugins', 'traffica'),
                'description' => __('Choose your image for second feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg2.png'
            ),
            'traffica_headline2' => array(
                'id' => 'traffica_options[traffica_headline2]',
                'label' => __('Second Feature Heading', 'traffica'),
                'description' => __('Enter your text for second feature area heading.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Power of Speed', 'traffica')
            ),
            'traffica_seconddesc' => array(
                'id' => 'traffica_options[traffica_seconddesc]',
                'label' => __('Second Feature Description', 'traffica'),
                'description' => __('Write short description for your second feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('The Traffica Wordpress Theme is highly optimized for Speed. So that your website opens faster than any similar themes.', 'traffica')
            ),
            'traffica_feature_link2' => array(
                'id' => 'traffica_options[traffica_feature_link2]',
                'label' => __('Second Feature Link', 'traffica'),
                'description' => __('Enter your link url for second feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'traffica_fimg3' => array(
                'id' => 'traffica_options[traffica_fimg3]',
                'label' => __('Third Feature Image', 'traffica'),
                'description' => __('Choose your image for Third feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg3.png'
            ),
            'traffica_headline3' => array(
                'id' => 'traffica_options[traffica_headline3]',
                'label' => __('Third Feature Heading', 'traffica'),
                'description' => __('Enter your text for Third feature area heading.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Power of SEO', 'traffica')
            ),
            'traffica_thirddesc' => array(
                'id' => 'traffica_options[traffica_thirddesc]',
                'label' => __('Third Feature Description', 'traffica'),
                'description' => __('Enter your text for Third feature area description.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Visitors to the Website are very highly desirable. With the SEO Optimized Themes, You get more traffic from Google.', 'traffica')
            ),
            'traffica_feature_link3' => array(
                'id' => 'traffica_options[traffica_feature_link3]',
                'label' => __('Third feature Link', 'traffica'),
                'description' => __('Enter your link url for third feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'traffica_fimg4' => array(
                'id' => 'traffica_options[traffica_fimg4]',
                'label' => __('Fourth Feature Image', 'traffica'),
                'description' => __('Choose your image for Fourth feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg4.png'
            ),
            'traffica_headline4' => array(
                'id' => 'traffica_options[traffica_headline4]',
                'label' => __('Fourth Feature Heading', 'traffica'),
                'description' => __('Enter your text for Fourth feature area heading.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Ready Contact Form', 'traffica')
            ),
            'traffica_fourthdesc' => array(
                'id' => 'traffica_options[traffica_fourthdesc]',
                'label' => __('Fourth Feature Description', 'traffica'),
                'description' => __('Enter your text for Fourth feature area description.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Let your visitors easily contact you. The builtin readymade contact form makes it easier for clients to contact.', 'traffica')
            ),
            'traffica_feature_link4' => array(
                'id' => 'traffica_options[traffica_feature_link4]',
                'label' => __('Fourth feature Link', 'traffica'),
                'description' => __('Enter your link url for Fourth feature area.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'traffica_blog_heading' => array(
                'id' => 'traffica_options[traffica_blog_heading]',
                'label' => __('Home Page Blog Heading Text', 'traffica'),
                'description' => __('Here you can mention a suitable blog text that will display the recent blog posts with images.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => 'Recent Posts'
            ),
            'traffica_customcss' => array(
                'id' => 'traffica_options[traffica_customcss]',
                'label' => __('Custom CSS', 'traffica'),
                'description' => __('Quickly add your custom CSS code to your theme by writing the code in this block.', 'traffica'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            )
        );
        return $traffica_settings;
    }
    public static function Traffica_Controls($wp_customize) {
        $sections = self::Traffica_Section_Content();
        $settings = self::Traffica_Settings();
        foreach ($sections as $section_id => $section_content) {
            foreach ($section_content as $section_content_id) {
                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'traffica_sanitize_url');
                        $wp_customize->add_control(new WP_Customize_Image_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id']
                                )
                        ));
                        break;
                    case 'text':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'traffica_sanitize_text');
                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;
                    case 'textarea':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'traffica_sanitize_textarea');
                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'textarea'
                                )
                        ));
                        break;
                    case 'link':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'traffica_sanitize_url');
                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;
                    default:
                        break;
                }
            }
        }
    }
    public static function add_setting($wp_customize, $setting_id, $default, $type, $sanitize_callback) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $default,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array('Traffica_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }
    /**
     * adds sanitization callback funtion : textarea
     * @package Traffica
     */
    public static function traffica_sanitize_textarea($value) {
        $value = esc_html($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : url
     * @package Traffica
     */
    public static function traffica_sanitize_url($value) {
        $value = esc_url($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : text
     * @package Traffica
     */
    public static function traffica_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : email
     * @package Traffica
     */
    public static function traffica_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : number
     * @package Traffica
     */
    public static function traffica_sanitize_number($value) {
        $value = preg_replace("/[^0-9+ ]/", "", $value);
        return $value;
    }
}
// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('Traffica_Customizer', 'Traffica_Register'));
function inkthemes_registers() {
          wp_register_script( 'inkthemes_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true  );
	wp_register_script( 'inkthemes_customizer_script', get_template_directory_uri() . '/js/inkthemes_customizer.js', array("jquery","inkthemes_jquery_ui"), true  );
	wp_enqueue_script( 'inkthemes_customizer_script' );
	wp_localize_script( 'inkthemes_customizer_script', 'ink_advert', array(
		'pro' => __('View PRO version','traffica'),
		'url' => esc_url('https://www.inkthemes.com/market/yoga-studio-wordpress-theme/'),
		'support_text' => __('Need Help!','traffica'),
		'support_url' => esc_url('http://www.inkthemes.com/lets-connect/')
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'inkthemes_registers' );