<?php

/**
 * This class have a restfull method which can accept any request.
 * Such as get post and return the authentication message.
 * @package
 * @subpackage
 * @category
 * @author Ali Saheb
 * @since 1.0.0
 * @see
 * @link
 */
class BandLicenseChecksController extends \BaseController {
	/**
	 * This function is for band login from mobile application.
	 * This function check this user is exist or not
	 * @author Ali Saheb
	 * @return Json of record set
	 * @since 1.0.0
	 * @see
	 */
	public function postCheckBand(){
		/**
		 * This variable hold the authentication message
		 * @bandCheckReturn array This is to hold the error message.
		 */
		$bandCheckReturn = array(
			'error'=>true,
			'message'=>"User mail or password is missing.",
		);

		if( Input::has('username') && Input::has('userpass')) {
			/**
			 * This variable get the username from post request from mobile application
			 * @userMail string This is to hold the username
			 */
			$userMail = Input::get('username');
			/**
			 * This variable get the password from post request from mobile application
			 * @userPass string This is to hold the password
			 */
			$userPass = Input::get('userpass');
			/**
			 * generating array for bandCheck() method parameter
			 * @userControl array This is to hold the username and password
			 */

			$userControl = array('usermail' => $userMail, 'userpass' => $userPass);

			$bandCheckReturn = BandLicenseCheck::bandCheck($userControl);
		}


		return $bandCheckReturn;
	}

}
