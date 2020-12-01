<?php

namespace DOM_COLUMN\Editing;

/**
 * Editing class. Adds editing functionality to the column.
 */
class Called extends \ACP\Editing\Model {

	/**
	 * Editing view settings
	 * @return array Editable settings
	 */
	public function get_view_settings() {

		// available types: text, textarea, media, float, togglable, select, select2_dropdown and select2_tags
		$settings = [
			'type' => 'select2_dropdown',
		];

		// (Optional) Only applies to type: togglable, select, select2_dropdown and select2_tags
		$settings['options'] = array( 
			'NULL'=> 'NULL',
			'Called'=> 'Called', 
			'Call back'=>'Call Back', 
		);

		// (Optional) If a selector is provided, editable will be delegated to the specified targets
		// $settings['js']['selector'] = 'a.my-class';

		// (Optional) Only applies to the type 'select2_dropdown'. Populates the available select2 dropdown values through ajax.
		// Ajax callback used is 'get_editable_ajax_options()'.
		// $settings['ajax_populate'] = true;

		return $settings;
	}

	/**
	 * Saves the value after using inline-edit
	 *
	 * @param int   $id    Object ID
	 * @param mixed $value Value to be saved
	 */
	public function save( $id, $value ) {

		// Store the value that has been entered with inline-edit
		// For example: update_post_meta( $id, '_my_custom_field_example', $value );
		update_post_meta( $id, '_called', $value );

	}

}