<?php

class MudiadminsController extends \BaseController {

	/**
	 * Display a listing of mudiadmins
	 *
	 * @return Response
	 */

	function __construct()
	{
		$this->beforeFilter('admin_auth');
	}

	public function index()
	{
		$user_count = Mudiadmin::getAllUser();
		$band_publisher = Mudiadmin::getPublisherBand();
		$album_name = Mudiadmin::getLatestAlbum();
		$purchased_album = Mudiadmin::getPurchasedAlbum();

		return View::make('mudiadmins.index',compact('user_count','band_publisher','album_name','purchased_album'));
	}

	/**
	 * Show the form for creating a new mudiadmin
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('mudiadmins.create');
	}

	/**
	 * Store a newly created mudiadmin in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Mudiadmin::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Mudiadmin::create($data);

		return Redirect::route('mudiadmins.index');
	}

	/**
	 * Display the specified mudiadmin.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$mudiadmin = Mudiadmin::findOrFail($id);

		return View::make('mudiadmins.show', compact('mudiadmin'));
	}

	/**
	 * Show the form for editing the specified mudiadmin.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mudiadmin = Mudiadmin::find($id);

		return View::make('mudiadmins.edit', compact('mudiadmin'));
	}

	/**
	 * Update the specified mudiadmin in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$mudiadmin = Mudiadmin::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Mudiadmin::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$mudiadmin->update($data);

		return Redirect::route('mudiadmins.index');
	}

	/**
	 * Remove the specified mudiadmin from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Mudiadmin::destroy($id);

		return Redirect::route('mudiadmins.index');
	}

}
