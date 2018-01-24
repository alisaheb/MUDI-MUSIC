<?php

class PublisherTest extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];
	
	public static function changepass($id,$inputpass){
		$error = array();
		$publisher = Publisher::find($id);
		$user_data = UserLogin::find($publisher->ref_user_id);
		if(Hash::check($inputpass['old_pass'], $user_data->user_password)){
			if($inputpass['new_pass'] != $inputpass['retype_new_pass']){
				$error['status'] = false;
				$error['massage'] = "New password is missmatch";
			}
			else{

				$error['status'] = true;
				$pass = Hash::make($inputpass['new_pass']);
				$login_update = array('user_password'=>$pass);
				$user_data->update($login_update);
			}
			
			return $error;
		}
		else{
			
			$error['status'] = false;
			$error['massage'] = "Current password is not correct";
			return $error;
		}
		
		
		
	}

}