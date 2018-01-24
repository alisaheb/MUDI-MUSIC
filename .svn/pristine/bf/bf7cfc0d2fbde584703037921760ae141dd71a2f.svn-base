<?php

class UpladscoredetailsController extends \BaseController {

	/**
	 * Display a listing of upladscoredetails
	 *
	 * @return Response
	 */
	public function index()
	{
		$upladscoredetails = Upladscoredetail::all();

		return View::make('upladscoredetails.index', compact('upladscoredetails'));
	}

	/**
	 * Show the form for creating a new upladscoredetail
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('upladscoredetails.create');
	}

	/**
	 * Store a newly created upladscoredetail in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Upladscoredetail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Upladscoredetail::create($data);

		return Redirect::route('upladscoredetails.index');
	}

	/**
	 * Display the specified upladscoredetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$upladscoredetail = Upladscoredetail::findOrFail($id);

		return View::make('upladscoredetails.show', compact('upladscoredetail'));
	}

	/**
	 * Show the form for editing the specified upladscoredetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$upladscoredetail = Upladscoredetail::find($id);

		return View::make('upladscoredetails.edit', compact('upladscoredetail'));
	}

	/**
	 * Update the specified upladscoredetail in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$upladscoredetail = Upladscoredetail::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Upladscoredetail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$upladscoredetail->update($data);

		return Redirect::route('upladscoredetails.index');
	}

	/**
	 * Remove the specified upladscoredetail from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		PublisherAlbumScore::destroy($id);

		//return Redirect::route('upladscoredetails.index');
	}


	protected function getImgSrc($fileName){
		//if file not uploaded then return empty
		if(!Input::hasFile($fileName)){
			return "";
		}

		$allFiles = Input::file($fileName);

		foreach ($allFiles as $file){
		
			$fileName = time().mt_rand(1,100).mt_rand(2,100).'.'.$file->getClientOriginalExtension();
		}

		$uploadPath = public_path().'/upload';
		$fileSrc = "upload/$fileName";

		$file->move($uploadPath, $fileName);

		return $fileSrc;
	}

}
