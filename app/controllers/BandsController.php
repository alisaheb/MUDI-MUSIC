<?php

class BandsController extends \BaseController {

	/**
	 * Display a listing of bands
	 *
	 * @return Response
	 */
	function __construct()
	{
		$this->beforeFilter('go_dashboard');
	}


	/**
	 * @desc this a description
	 * @author Ali Shaheb
	 * @param int $main
	 * @param int $sub
	 * @return Array of recordset
	 * @since
	 * @see
	 */
	public function index()
	{
		$bands = Band::all();

		return View::make('bands.index', compact('bands'));
	}

	/**
	 * Show the form for creating a new band
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bands.bandresister');
	}

	/**
	 * Store a newly created band in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		//for marge login
		$input = Input::all();

		$for_loginarray = array(
			'user_email' =>$input['band_email'] ,
			'user_password'=>$input['band_pass'],
			'user_password_confirmation'=> $input['band_pass_confirmation'],
			'role'=>2
			);


		$validator = Validator::make($data = $for_loginarray, UserLogin::createRules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$for_loginarray['user_password'] = Hash::make($for_loginarray['user_password']);

		//$input['band_pass'] = Hash::make($input['band_pass']);
		$input['current_status'] = 1;

		//creating user
		$find_user_id = UserLogin::create($for_loginarray);

		$user_id = $find_user_id->user_id;
		$input['ref_user_id'] = $user_id;
		//creating band
		Band::create($input);

			$dataUser = array(
				'user_email' =>$input['band_email'] ,
				'password' =>$input['band_pass'],
			);

			$checlLoginVar = $this->registerAndLogin($dataUser);

			if($checlLoginVar == true){

				return Redirect::route('getlicenses.create');
			}
		else{
			return Redirect::to('/login');
		}
	}

	/**
	 * Display the specified band.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$band = Band::findOrFail($id);

		return View::make('bands.show', compact('band'));
	}

	/**
	 * Show the form for editing the specified band.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$band = Band::find($id);

		return View::make('bands.edit', compact('band'));
	}

	/**
	 * Update the specified band in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$band = Band::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Band::updateRules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$band->update($data);

		return Redirect::route('bands.index');
	}

	/**
	 * Remove the specified band from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Band::destroy($id);

		return Redirect::route('bands.index');
	}

	public function registerAndLogin($data){
		try{
			$gotodashboard = Users::checkUser($data);
			if($gotodashboard == 1){
				if(Session::has('role') && Session::get('role') == 2) {
					return true;
				}
			}
		}
		catch(Exception $e){
			Session::flash('error_msg', 'user name or password worng');
			return false;
		}
	}

}
