<?php /*

**************************************************************************

Plugin Name:  SalesPageMakerPro Graphics Library
Plugin URI:   http://salespagemakerpro.com/graphicslibrary/
Description:  A premium collection of graphics and icons with tinymce based interface.
Version:      1.0
Author:       Thushar Baby
Author URI:   http://salespagemakerpro.com/graphicslibrary/

**************************************************************************

Copyright (C) 2010 salespagemakerpro.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
**************************************************************************/

class SalesPageMakerProGraphicsLibrary {
	var $version = '1.0';
	var $settings = array();
	var $defaultsettings = array();
	var $wpheadrun = FALSE;
	

	// Class initialization
	function SalesPageMakerProGraphicsLibrary() {
		global $wpmu_version, $shortcode_tags, $wp_scripts;
		add_action( 'wp_head', array(&$this, 'Head') );
		add_action( 'admin_head', array(&$this, 'Head') );
		
		if ( is_admin() ) {
	
			// Editor pages only
			if ( in_array( basename($_SERVER['PHP_SELF']), apply_filters( 'spmp_editor_pages', array('post-new.php', 'page-new.php', 'post.php', 'page.php') ) ) ) {
				add_action( 'admin_footer', array(&$this, 'SPMPGOutputjQueryDialogDiv') );

				//wp_enqueue_script( 'jquery-ui-dialog' );
				wp_enqueue_script("jquery");
				
				// Register editor button hooks
				add_filter( 'tiny_mce_version', array(&$this, 'tiny_mce_version') );
				add_filter( 'mce_external_plugins', array(&$this, 'mce_external_plugins') );
				add_filter( 'mce_buttons_3', array(&$this, 'mce_buttons') );
				//add_filter('tiny_mce_before_init', 'my_formatTinyMCE' );
			}
		}
		
	}



	// Break the browser cache of TinyMCE
	function tiny_mce_version( $version ) {
		return $version . '-spmp' . $this->version . 'line3';
		
	}


	// Load the custom TinyMCE plugin
	function mce_external_plugins( $plugins ) {
		$plugins['SalesPageMakerProGraphicsLibrary'] = plugins_url('/salespagemakerpro-graphics-library/editor_plugin.js');
		
		return $plugins;
	}
	

	// Add the custom TinyMCE buttons
	function mce_buttons( $buttons ) {
		array_push( $buttons, 'SalesPageMakerPro_GraphicsLibrary');
		return $buttons;
	}
	
	// Output the head stuff
	function Head() {
		$this->wpheadrun = TRUE;

		echo "<!-- SalesPageMakerProGraphicsLibrary V1" . $this->version . " | http://www.salespagemakerpro.com/ -->\n\n";
		
	}

	
}

// Start the plugin
add_action( 'init', 'SalesPageMakerProGraphicsLibrary' ); function SalesPageMakerProGraphicsLibrary() { global $SalesPageMakerProGraphicsLibrary; $SalesPageMakerProGraphicsLibrary = new SalesPageMakerProGraphicsLibrary(); }

?>