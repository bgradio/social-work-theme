<?php

/* Formidable pro hooks */

//add_filter('frm_submit_button', 'change_my_submit_button_label', 10, 2);
function change_my_submit_button_label($label, $form){
	$prev_page = FrmAppHelper::get_param('frm_page_order_'. 15, false);
    if($prev_page > 2){
		$label = 'Submit'; //Change this text to the new Submit button label
	} else {
		$label = 'Save';
	}
  return $label;
}

//add_action('frm_submit_button_action', 'formidable_save_quit');
function formidable_save_quit($form){
  if($form->id == 15){
	 if($prev_page > 3){
		$lastname = FrmProEntriesController::get_field_value_shortcode(array('field_id' => 88, 'user_id' => 'current'));
		if( $lastname == '' ){
			break;
		}
	 }
    //echo ' onclick="do something"';
	//var_dump($form);
  }
}

function storing_important_codelines(){
	/* Access form field values */
	//echo 'Last name: ' . FrmProEntriesController::get_field_value_shortcode(array('field_id' => 88, 'user_id' => 'current'));
}

?>