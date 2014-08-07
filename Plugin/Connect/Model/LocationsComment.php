<?php
App::uses('ConnectAppModel', 'Connect.Model');
/**
 * LocationsComment Model
 *
 * @property FacebookLocation $FacebookLocation
 * @property FacebookUser $FacebookUser
 */
class LocationsComment extends ConnectAppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'facebook_location_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please write some thing !!',
			),
		),
	);

	/*
		@param : String $location_id -> facebook location id 
		@desc : get list of comments made to a facebook location
	*/
	public function getComments( $location_id  ){

		//setup query options
		$options = array( 
			'recursive' => -1,
			'conditions' => array(
				'LocationsComment.facebook_location_id' => $location_id	
			)
		);

		//find and return the result
		$comments = $this->find('all', $options);
		return $comments;
	}

	/*
		@param : Integer $comment_id -> database comment id 
		@desc : get a comment by its id
	*/
	public function getCommentById( $comment_id ){

		//setup query options
		$options = array( 
			'recursive' => -1,
			'conditions' => array(
				'LocationsComment.id' => $comment_id	
			)
		);

		//find and return the result
		$comment = $this->find('first', $options);
		return $comment;
	}

	/*
		@param : Array $data -> comment form data
		@desc : prepare data to be validated and save
		@return : Array $data -> comment form data after some mofifications
	*/
	public function prepareComment( $data  ){
		return $data;
	}

	/*
		@param : Array $data -> comment form data
		@desc : validate if the data are correct
		@return : boolean -> whether data is valid or not
	*/
	public function validateComment( $data  ){
		$this->create($data);
		return $this->validates();
	}

	/*
		@param : Array $data -> comment form data
		@desc : validate if the data are correct
		@return : boolean -> whether data is valid or not / Array $comment -> saved comment record from database
	*/
	public function saveComment( $data  ){

		//prepare data
		$data = $this->prepareComment( $data );

		//validate 
		if( $this->validateComment( $data ) ){
			//save data to db 	
			if( $this->save( $data, false ) ){
				//returned saved recored
				return $this->getCommentById( $this->id );
			}
		}
		return false;
	}
}
