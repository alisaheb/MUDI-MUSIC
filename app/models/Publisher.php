<?php

class Publisher extends \Eloquent {
	protected $table = 'publishers';
	protected $primaryKey = 'publisher_id';
	// Add your validation rules here
	public static function createRules() {
		return [
				'publisher_user_id'=>'',
				'publisher_full_name'=>'',
				'publisher_pass'=>'required|min:3|confirmed',
				'publisher_email'=>'required|unique:publishers',
				'publisher_key'=>'',
				'current_status'=>'',
				'publisher_pass_confirmation'=>'required|min:3',
			 ];
		}

	public static function updateRules($id){
		return [
				'publisher_user_id'=>'',
				'publisher_full_name'=>'',
				'publisher_pass'=>'required|min:3|confirmed',
				'publisher_email'=>'required|unique:publishers,publisher_email,'.$id.",publisher_id",
				'publisher_key'=>'',
				'current_status'=>'',
				'publisher_pass_confirmation'=>'required|min:3',
			 ];

	}	

	// Don't forget to fill this array
	protected $fillable = [
		'ref_user_id',
		'publisher_full_name',
		'publisher_key',
		'publisher_logo',
		'publisher_address',
		'publisher_link',
		'publisher_contact_person',
	];
	
	

}