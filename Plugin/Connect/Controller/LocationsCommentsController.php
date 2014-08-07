<?php
App::uses('ConnectAppController', 'Connect.Controller');
/**
 * LocationsComments Controller
 *
 */
class LocationsCommentsController extends ConnectAppController {


	public function index( $location_id = null ){
		if( empty( $location_id ) ){
			throw new NotFoundExption();
		}
		$comments = $this->LocationsComment->getComments( $location_id );
		$this->set( compact( 'comments' ) );
	}

	public function save(){
		$this->layout = 'ajax';

		if( $this->request->is('post') ){
			if( $comment = $this->LocationsComment->saveComment( $this->request->data ) ){
				$this->set('data',$comment);
			}
			else{
				$this->set( 'errors',array( 'LocationsComment' => $this->LocationsComment->validationErros ));	
			}	
		}
	}
}
