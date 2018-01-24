<?php

class forgotPasswordController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		return View::make('forgotpassword.forgotpassword');
	}
	/**
	 * This is a sample description
	 *
	 * @author
	 * @param int $main
	 * @param int $sub
	 * @return Array of recordset
	 * @since
	 * @see
	 */
	public function getYourAccount(){
		$userData = array('user_login'=>"",'user_data'=>"");
		if(Input::has('email')) {
			$userEmail = Input::get('email');
			$checkUser = UserLogin::where('user_email', $userEmail)->get();
			$count = $checkUser->count();
			if ($count == 1) {
				$this->sendMail($userEmail);
				if($checkUser[0]->role == 1){
					$bandinformation = "";
				}
				elseif($checkUser[0]->role == 2){
					$bandinformation = Band::where('ref_user_id',$checkUser[0]->user_id)->get();
				}
				else{
					$bandinformation = Publisher::where('ref_user_id',$checkUser[0]->user_id)->get();
				}
				$userData = array('user_login'=>$checkUser,'user_data'=>$bandinformation);

			}

			$userDatas = $userData;
			return View::make("forgotpassword.userdata",compact('userDatas'));
		}
		else{
			$error = array('error'=>'true','message'=>'The mail Address Is Require');
			return Redirect::back()->with('error',$error);
		}
	}

	public function sendMail($mailAddress){
			$key = $this->generateRandomString(32);
			$urlset = url('forgotpass')."?active_key=".$key;
			UserLogin::where('user_email', $mailAddress)->update(array('forgot_code' => $key));
		//mail();
	}

	public function resetPassWord(){
		if(Input::has('active_key')){
			$key = Input::get('active_key');
			$gettingUser = UserLogin::where('forgot_code', $key)->get();
			if($gettingUser->count() == 1){
				return View::make('forgotpassword.changepass',compact('key'));
			}
			else{
				return View::make('forgotpassword.forgotpassword');
			}

		}
	}

	public function setnewpassword(){
		$setnewpassword = Input::all();
		$state = $this->errorMeassage($setnewpassword);
		if($state['error'] == true ){
			return Redirect::back()->with('error',$state);
		}

			$setnewpassword['new_password']= Hash::make($setnewpassword['new_password']);
			//update password
		  $updatedatetime = new DateTime();
			UserLogin::where('forgot_code',$setnewpassword['key'])->update(
				array('forgot_code' =>'',
					'user_password'=>$setnewpassword['new_password'],
					'password_last_set'=>$updatedatetime,));
			return Redirect::to('login')->with('message',$state);
	}
 //for validation of new password
	public function errorMeassage($password){
		$error = array('error'=>true,'message'=>'Password does not match');

		if($password['new_password'] == $password['retype_password']){
			$error = array('error'=>false,'message'=>'Password changed successfully');
		}

		return $error;
	}
	/**
	 * This is a sample description
	 *
	 * @author
	 * @param int $length
	 * @return string
	 * @since
	 * @see
	 */
	public  function generateRandomString($length = 10) {
		$characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}


}
