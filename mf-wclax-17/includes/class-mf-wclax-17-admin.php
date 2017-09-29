<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Mf_Wclax_17
 * @subpackage Mf_Wclax_17/admin
 */

class Mf_Wclax_17_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version           The version of this plugin.
	 */
	public function __construct( $plugin_name, $version )
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}


	/**
	 * Register the text metabox
	 * Action Hook : add_meta_boxes
	 *
	 * @param string $post_type
	 * @param object $post
	 *
	 * @return Null Function echos its output
	 */
	public function add_metabox( $post_type, $post )
	{
		if ( $post_type !== 'post' ) {
			return false;
		}
		// add_meta_box with anonymous function
		add_meta_box( 'custom-metabox', 'Custom Meta', array( $this, 'handle_metabox_output' ), 'post', 'normal', 'low' );
		return;
	}

	public function handle_metabox_output( $post ) {
		$post_id = $post->ID;
		// Noncename needed to verify where the data originated
		echo '<input type="hidden" name="metabox_noncename" id="metabox_noncename" value="'.
		wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
		// Get the location data if its already been entered
		$meta_value= get_post_meta($post_id, 'custom_meta', True);
		// Echo out the field
		echo '<input type="text" name="custom_meta" value="'.$meta_value.'" class="" />';
	}

	/**
	 * Save the text metabox input
	 * to the database
	 * Action Hook : save_post
	 *
	 * @param  int $post_id
	 * @param  object $post
	 *
	 * @return bool | int True on success or false on failure, Meta ID if key did not exist
	 */
	public function save_metabox( $post_id, $post ) {
		if ( ! isset( $_POST['metabox_noncename'] ) ) {
			return false;
		}
		if ( ! wp_verify_nonce( $_POST['metabox_noncename'], plugin_basename(__FILE__) ) ) {
			return false;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return false;
		}
		$custom_meta = sanitize_text_field( $_POST['custom_meta'] );
		return update_post_meta( $post_id, 'custom_meta', $custom_meta );
	}

} // end of class definition
