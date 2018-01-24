<?php

/**
 * This class for showing login page for all kinds roles user.
 * And this class also authenticate the user as well.
 * @package
 * @subpackage
 * @category
 * @author Ali Saheb
 * @since 1.0.0
 * @see
 * @link
 */
class Usercontroller extends \BaseController {
	/**
	 * This is resource controller method store.
	 * It is a post method get username and password from post request from the login page.
	 * @author Ali Saheb
	 * @return Array of record set Which refer error or success message.
	 * @since 1.0.0
	 * @see
	 */
	public function store()
	{
		/**
		 * This variable for getting email address
		 * @email string This is to hold the email
		 */
		$email = Input::get('user_email');
		/**
		 * This variable for getting the password
		 * @password string This is to hold the Password
		 */
		$password = Input::get('password');
		$usertype = Input::get('checkuser');	
		$data = array(
			'user_email' =>$email ,
			'password' =>$password,
			);


		$validator = Validator::make($data, Users::validInput());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		//attemping to login
		
			try{
			$gotodashboard = Users::checkUser($data);
			if($gotodashboard == 1){
				if(Session::has('role') && Session::get('role') == 2) {
					return Redirect::route('getlicenses.create');
				}
				elseif(Session::has('role') && Session::get('role') == 1){
					return Redirect::route('mudiadmins.index');
				}
				else{
					return Redirect::route('dashboards.index');

				}
			}
			}
			catch(Exception $e){
				return Redirect::to('/login')->withInput()->with('error_msg','user name or password worng');
			}
		
	}


	/**
	 * This function create application login view.
	 *
	 * @author Ali Saheb
	 * @return html view
	 * @since 1.0.0
	 * @see
	 */

	public function showLogin(){
		
		return View::make('login.loginform');
	}



}