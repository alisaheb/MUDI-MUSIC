<?php

require 'ali/quickstart.php';

class GoogledrivesController extends \BaseController {

	/**
	 * Display a listing of googledrives
	 *
	 * @return Response
	 */
	public function index()
	{
		// $upload = new uploadfile();

		// $vars = $upload->uploadfunction();

		// echo "<pre>";print_r($vars);
		// exit();

		// return View::make('googledrives.index', compact('arrayName'));
	}

	/**
	 * Show the form for creating a new googledrive
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('googledrive');
	}

	/**
	 * Store a newly created googledrive in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		 $data = Input::file('score');
		 $path = $data->getPathName();
		 //$fileName = time().mt_rand(1,100).mt_rand(2,100).'.'.$data->getClientOriginalExtension();

		 $upload = new uploadfile();

		$vars = $upload->uploadfunction($path);
		
		 echo "<pre>";print_r($vars);exit();




		$validator = Validator::make($data = Input::all(), Googledrive::$rules);



		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Googledrive::create($data);

		return Redirect::route('googledrives.index');
	}

	/**
	 * Display the specified googledrive.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$googledrive = Googledrive::findOrFail($id);

		return View::make('googledrives.show', compact('googledrive'));
	}

	/**
	 * Show the form for editing the specified googledrive.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$googledrive = Googledrive::find($id);

		return View::make('googledrives.edit', compact('googledrive'));
	}

	/**
	 * Update the specified googledrive in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$googledrive = Googledrive::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Googledrive::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$googledrive->update($data);

		return Redirect::route('googledrives.index');
	}

	/**
	 * Remove the specified googledrive from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Googledrive::destroy($id);

		return Redirect::route('googledrives.index');
	}

}
