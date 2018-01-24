<?php

class ManagebandprofilesController extends \BaseController {

	function __construct()
		{
		    $this->beforeFilter('band_auth');
		}
	/**
	 * Display a listing of managebandprofiles
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_login_info = Session::get('login_data');
		$bandInfo = Session::get('user');
		$band_id = $bandInfo[0]->band_id;
		$managebandprofiles = Band::where('band_id',$band_id)->get();

		return View::make('managebandprofiles.index', compact('managebandprofiles'));
	}

	/**
	 * Show the form for creating a new managebandprofile
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('managebandprofiles.create');
	}

	/**
	 * Store a newly created managebandprofile in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Managebandprofile::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Managebandprofile::create($data);

		return Redirect::route('managebandprofiles.index');
	}

	/**
	 * Display the specified managebandprofile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$managebandprofile = Managebandprofile::findOrFail($id);

		return View::make('managebandprofiles.show', compact('managebandprofile'));
	}

	/**
	 * Show the form for editing the specified managebandprofile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$managebandprofile = Managebandprofile::find($id);

		return View::make('managebandprofiles.edit', compact('managebandprofile'));
	}

	/**
	 * Update the specified managebandprofile in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$managebandprofile = Managebandprofile::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Managebandprofile::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$managebandprofile->update($data);

		return Redirect::route('managebandprofiles.index');
	}

	/**
	 * Remove the specified managebandprofile from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Managebandprofile::destroy($id);

		return Redirect::route('managebandprofiles.index');
	}

	public function changeBandPass($id){

		$changepass = Band::find($id);
		
		return View::make('managebandprofiles.changepass',compact('changepass'));

	}

	public function performChangeBandPass($id){
		$input = Input::all();
		$result = Managebandprofile::changepass($id,$input);
		
		if($result['status'] == false){
			//return $result; 
			return Redirect::back()->with('error',$result);
		}
		else{
			return Redirect::route('managebandprofiles.index');
		}
	}


	public function changeBandLogoView($id){
		$changepass = Band::find($id);
		return View::make('managebandprofiles.changeBandLogo',compact('changepass'));
	}
	public function actionChangeImage($id){
		$band = Band::find($id);
		$band_logo = Input::file('band_logo');
		$logo_path = $this->getImgSrc($band_logo);
		if($logo_path != ""){

			$logo_path = array('band_logo'=>$logo_path);
			$band->update($logo_path);
		}
		return Redirect::route('managebandprofiles.index');
	}

	 //getting image path
 	public function getImgSrc($fileNames){
 		$fileSrc = "";
 		if($fileNames != ""){
 			$fileName = time().mt_rand(1,100).mt_rand(2,100).'.'.$fileNames->getClientOriginalExtension();
 			$uploadPath = public_path().'/upload';
 			$fileSrc = "upload/$fileName";

 			$fileNames->move($uploadPath, $fileName);
			$ali =public_path($fileSrc);
			$img = Image::make($ali)->resize(160, 160);
			$img->save($ali);
 		}

 		return $fileSrc;
 	}

}
