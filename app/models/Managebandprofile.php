<?php

class Managebandprofile extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public static function changepass($id,$inputpass){
		$error = array();
		$band = Band::find($id);
		$user_login = UserLogin::find($band->ref_user_id);
		if(Hash::check($inputpass['old_pass'], $user_login->user_password)){
			if($inputpass['new_pass'] != $inputpass['retype_new_pass']){
				$error['status'] = false;
				$error['massage'] = "New password is missmatch";
			}
			else{
				$error['status'] = true;
				$pass = Hash::make($inputpass['new_pass']);
				$login_update = array('user_password'=>$pass);
				$user_login->update($login_update);
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