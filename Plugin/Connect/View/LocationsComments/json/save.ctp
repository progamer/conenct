<?php 
	$resp = array();
	if( !empty( $data ) ){
		$resp['success'] = true;
		$resp['data'] = $data;
		$resp['message'] = __d( 'connect' ,'Comment saved successfully.');
	}
	else{
		$resp['success'] = false;
		$resp['errors'] = $errors;
		$resp['message'] = __d( 'connect' ,'Saving comment has failed, please try again.');	
	}
	echo json_encode($resp);
?>