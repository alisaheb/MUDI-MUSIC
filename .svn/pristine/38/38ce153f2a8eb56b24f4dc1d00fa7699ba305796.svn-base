<?php

class PublishersController extends \BaseController {

	/**
	 * Display a listing of publishers
	 *
	 * @return Response
	 */
	function __construct()
	{
		$this->beforeFilter('go_dashboard');
	}
	public function index()
	{
		$publishers = Publisher::all();

		return View::make('publishers.index', compact('publishers'));
	}

	/**
	 * Show the form for creating a new publisher
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('publishers.publisherresister');
	}

	/**
	 * Store a newly created publisher in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		//echo "<pre>";print_r($input);exit();
		$for_loginarray = array(
			'user_email' =>$input['publisher_email'] ,
			'user_password'=>$input['publisher_pass'],
			'user_password_confirmation'=> $input['publisher_pass_confirmation'],
			'role'=>3
			);

		$validator = Validator::make($data = $for_loginarray, UserLogin::createRules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$for_loginarray['user_password'] = Hash::make($for_loginarray['user_password']);

		//for publisher

		$user_info = UserLogin::create($for_loginarray);
		$ref_user_id = $user_info->user_id;
		$input['publisher_key'] = $this->generateRandomString(32);
		$input['ref_user_id'] = $ref_user_id;

		Publisher::create($input);

		$dataUser = array(
			'user_email' =>$input['publisher_email'] ,
			'password' =>$input['publisher_pass'],
		);
		 $gotoDashborad = $this->registerAndLogin($dataUser);


		if($gotoDashborad == true){
			return  Redirect::route('dashboards.index');
		}
		else{
			return Redirect::to('/login');
		}

	}

	/**
	 * Display the specified publisher.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$publisher = Publisher::findOrFail($id);

		return View::make('publishers.show', compact('publisher'));
	}

	/**
	 * Show the form for editing the specified publisher.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$publisher = Publisher::find($id);

		return View::make('publishers.edit', compact('publisher'));
	}

	/**
	 * Update the specified publisher in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$publisher = Publisher::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Publisher::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$publisher->update($data);

		return Redirect::route('publishers.index');
	}

	/**
	 * Remove the specified publisher from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Publisher::destroy($id);

		return Redirect::route('publishers.index');
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

	public function registerAndLogin($data){
		try{
			$gotodashboard = Users::checkUser($data);
			if($gotodashboard == 1){

					return true;//Redirect::route('dashboards.index');
			}
		}
		catch(Exception $e){
			Session::flash('error_msg', 'user name or password worng');
			return flase;
		}
	}
}
