<?php

class ManagepublisherprofilesController extends \BaseController {

	function __construct()
		{
		    $this->beforeFilter('publisher_auth');
		}

	/**
	 * Display a listing of managepublisherprofiles
	 *
	 * @return Response
	 */
	public function index()
	{
		//$managepublisherprofiles = Managepublisherprofile::all();
		$user = Session::get('user');
		$user_id = $user[0]->publisher_id;
		$publisher = Publisher::where('publisher_id',$user_id)->get();

		return View::make('managepublisherprofiles.index',compact('publisher'));
	}

	/**
	 * Show the form for creating a new managepublisherprofile
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('managepublisherprofiles.create');
	}

	/**
	 * Store a newly created managepublisherprofile in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Managepublisherprofile::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Managepublisherprofile::create($data);

		return Redirect::route('managepublisherprofiles.index');
	}

	/**
	 * Display the specified managepublisherprofile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$managepublisherprofile = Managepublisherprofile::findOrFail($id);

		return View::make('managepublisherprofiles.show', compact('managepublisherprofile'));
	}

	/**
	 * Show the form for editing the specified managepublisherprofile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$managepublisherprofile = Publisher::find($id);

		return View::make('managepublisherprofiles.edit', compact('managepublisherprofile'));
	}

	/**
	 * Update the specified managepublisherprofile in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$managepublisherprofile = Publisher::findOrFail($id);
		$data = Input::get('publisher_full_name');
		$datefile = Input::file('publisher_logo');
		$file_name = $this->getImgSrc($datefile);

		$upadateData = array('publisher_full_name'=>$data,'publisher_logo'=>$file_name);

		if($file_name == ""){
			$upadateData = array_except($upadateData, array('publisher_logo'));
		}


		$managepublisherprofile->update($upadateData);

		return Redirect::route('managepublisherprofiles.index');
	}

	/**
	 * Remove the specified managepublisherprofile from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Managepublisherprofile::destroy($id);

		return Redirect::route('managepublisherprofiles.index');
	}

	public function getChangePassword($id){
		$changepass = Publisher::find($id);
		
		return View::make('managepublisherprofiles.changepass',compact('changepass'));

	}

	public function putChangePassword($id){
		$input = Input::all();
		$result = PublisherTest::changepass($id,$input);
		
		if($result['status'] == false){
			//return $result; 
			return Redirect::back()->with('error',$result);
		}
		else{
			return Redirect::route('managepublisherprofiles.index');
		}
	}

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
