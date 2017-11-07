<?php

class Ravenna_Services extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'ravenna_service', 'description' => __( 'Display your services.', 'ravenna'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('ravenna_service_widget', __( 'Ravenna: Services', 'ravenna'), $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {
		$title 	= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 	= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		for ($i=1; $i<=3; $i++) {
			$instance['service_name_' . $i]   = isset( $instance['service_name_' . $i] ) ? esc_html($instance['service_name_' . $i]) : '';
			$instance['service_icon_' . $i]   = isset( $instance['service_icon_' . $i] ) ? esc_html($instance['service_icon_' . $i]) : '';
			$instance['service_url_' . $i]    = isset( $instance['service_url_' . $i] ) ? esc_url($instance['service_url_' . $i]) : '';
			$instance['service_button_' . $i] = isset( $instance['service_button_' . $i] ) ? esc_html($instance['service_button_' . $i]) : '';
			$instance['text_' . $i] 		  = empty( $instance['text_' . $i] ) ? '' : $instance['text_' . $i];
		}

		extract($args);

		echo $args['before_widget'];
		?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>

		<div class="services-row">
			<?php for ($i=1; $i<=3; $i++) { ?>
			<div class="service">
				<?php if ($instance['service_icon_' . $i]) : ?>
				<div class="service-icon"><?php echo '<i class="fa ' . $instance['service_icon_' . $i] . '"></i>'; ?></div>
				<?php endif; ?>						
				<h3 class="service-title"><?php echo $instance['service_name_' . $i]; ?></h3>
				<?php if ($instance['text_' . $i]) : ?>
					<div class="service-desc"><?php echo wpautop($instance['text_' . $i]); ?></div>
				<?php endif; ?>
				<?php if ($instance['service_url_' . $i]) : ?>
					<a href="<?php echo $instance['service_url_' . $i]; ?>" class="service-link"><?php echo $instance['service_button_' . $i]; ?></a>
				<?php endif; ?>
			</div>
			<?php } ?>
		</div>
	<?php
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 	= strip_tags($new_instance['title']);
		for ($i=1; $i<=3; $i++) {
			$instance['service_name_' . $i] 	= empty($new_instance['service_name_' . $i]) ? '' : strip_tags($new_instance['service_name_' . $i]);
			$instance['service_icon_' . $i] 	= empty($new_instance['service_icon_' . $i]) ? '' : strip_tags($new_instance['service_icon_' . $i]);
			$instance['service_url_' . $i] 		= empty($new_instance['service_url_' . $i]) ? '' : esc_url_raw($new_instance['service_url_' . $i]);	
			$instance['service_button_' . $i] 	= empty($new_instance['service_button_' . $i]) ? '' : strip_tags($new_instance['service_button_' . $i]);		
			if ( current_user_can('unfiltered_html') )
				$instance['text_' . $i] =  $new_instance['text_' . $i];
			else
				$instance['text_' . $i] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text_' . $i]) ) );
		}
		return $instance;
	}

	public function form( $instance ) {
	$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : ''; ?>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ravenna'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<?php
	for ($i=1; $i<=3; $i++) {
		$instance 			= wp_parse_args( (array) $instance, array( 'text_' . $i => '', 'service_icon_' . $i => '', 'service_name_' . $i => '', 'service_url_' . $i => '', 'service_button_' . $i => '') );
		$instance['service_name_' . $i] 	= esc_html($instance['service_name_' . $i]);
		$instance['service_icon_' . $i]		= esc_html($instance['service_icon_' . $i]);		
		$instance['text_' . $i] 			= esc_textarea($instance['text_' . $i]);
		$instance['service_url_' . $i]  	= esc_url($instance['service_url_' . $i]);
		$instance['service_button_' . $i] 	= esc_html($instance['service_button_' . $i]);
?>
		<h4><?php echo __('Service number ', 'ravenna') . $i; ?></h4>

		<p><label for="<?php echo $this->get_field_id('service_name_' . $i); ?>"><?php echo __('Service name', 'ravenna'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('item_' . $i); ?>" name="<?php echo $this->get_field_name('service_name_' . $i); ?>" type="text" value="<?php echo $instance['service_name_' . $i]; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('service_icon_' . $i); ?>"><?php _e('Service icon. Simply add the icon like this: <em>fa-android</em>. See the full list of icons ', 'ravenna'); ?><a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/"><?php _e('here.', 'ravenna'); ?></a></label>
		<input class="widefat" id="<?php echo $this->get_field_id('service_icon_' . $i); ?>" name="<?php echo $this->get_field_name('service_icon_' . $i); ?>" type="text" value="<?php echo $instance['service_icon_' . $i]; ?>" /></p>

		<p><textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text_' . $i); ?>" name="<?php echo $this->get_field_name('text_' . $i); ?>"><?php echo $instance['text_' . $i]; ?></textarea></p>

		<p><label for="<?php echo $this->get_field_id('service_url_' . $i); ?>"><?php _e('Add an URL if you want to display a button below the service', 'ravenna'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('service_url_' . $i); ?>" name="<?php echo $this->get_field_name('service_url_' . $i); ?>" type="text" value="<?php echo $instance['service_url_' . $i]; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('service_button_' . $i); ?>"><?php _e('Add a name for the button', 'ravenna'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('service_button_' . $i); ?>" name="<?php echo $this->get_field_name('service_button_' . $i); ?>" type="text" value="<?php echo $instance['service_button_' . $i]; ?>" /></p>
<?php
	}
	}
}