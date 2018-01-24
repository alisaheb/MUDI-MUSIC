<?php

class GetlicensesController extends \BaseController {


		function __construct()
		{
		    $this->beforeFilter('band_auth');
		}
	/**
	 * Display a listing of getlicenses
	 *
	 * @return Response
	 */
	public function index()
	{
		$login_info = Session::get('user_login');
		$userData = Session::get('user');
		$user_id = $userData[0]->band_id;
		$getlicense = Band::find($user_id);
		$get_user = UserLogin::find($login_info[0]->user_id);
		$getLicenseKey = License::where('ref_band_id',$user_id)->get();
		//echo "<pre>";echo $getlicense->band_login_id;exit();

		return View::make('getlicenses.index', compact('get_user','getLicenseKey'));
	}

	/**
	 * Show the form for creating a new getlicense
	 *
	 * @return Response
	 */
	public function create()
	{
		$login_info = Session::get('user_login');
		$get_user = UserLogin::find($login_info[0]->user_id);
		$userData = Session::get('user');
		$user_id = $userData[0]->band_id;
		$getlicense = Band::find($user_id);
		$getLicenseKey = License::with('licenseType')->where('ref_band_id',$user_id)->get();

		$licensetypes = Licensetype::all();
		return View::make('getlicenses.create',compact('licensetypes','getlicense','getLicenseKey','get_user'));
	}

	/**
	 * Store a newly created getlicense in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$validator = Validator::make($data = Input::all(), Getlicense::$rules);


		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$band_login_id = $this->generateRandomString($length = 6);

		$login_info = Session::get('user_login');
		$userData = Session::get('user');
		$user_id = $userData[0]->band_id;
		$getlicense = Band::findOrFail($user_id);
		$get_user = UserLogin::findOrFail($login_info[0]->user_id);


		//geting data for license
		$data = array(
			'band_lead_name' =>Input::get('band_lead_name'),
			'band_name' =>Input::get('band_name'),
			);
		$user_login_data = array('user_name'=>$band_login_id);

		$getlicense->update($data);
		$get_user->update($user_login_data);

		$licenseInformation = Getlicense::licenseInformation(Input::get('license_type'),$data);
		//echo "<pre>"; print_r($licenseInformation);exit();

		 $updatelicense = License::where('ref_band_id', $user_id)->get();

		 $updatelicenseCase = $updatelicense->count();
		 if($updatelicenseCase == 1){
			$licenseupdate = License::findOrFail($updatelicense[0]->id);		
			$licenseupdate->update($licenseInformation);		 	
		 } 
		else{ 
			License::create($licenseInformation);
		}
		//getting license information
		//License::sendmailTotheband($user_id);


		
		return Redirect::route('getlicenses.index');
	}

	/**
	 * Display the specified getlicense.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$getlicense = Getlicense::findOrFail($id);

		return View::make('getlicenses.show', compact('getlicense'));
	}

	/**
	 * Show the form for editing the specified getlicense.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$getlicense = Getlicense::find($id);

		return View::make('getlicenses.edit', compact('getlicense'));
	}

	/**
	 * Update the specified getlicense in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$getlicense = Getlicense::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Getlicense::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$getlicense->update($data);

		return Redirect::route('getlicenses.index');
	}

	/**
	 * Remove the specified getlicense from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Getlicense::destroy($id);

		return Redirect::route('getlicenses.index');
	}

	public function generateRandomString($length = 10) {
		    $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
    	return $randomString;
	}

}
