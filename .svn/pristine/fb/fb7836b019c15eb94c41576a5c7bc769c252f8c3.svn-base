<?php

class GetscoresController extends \BaseController {

	/**
	 * Display a listing of getscores
	 *
	 * @return Response
	 */

	function __construct()
	{
		$this->beforeFilter('band_auth');
	}

	public function index()
	{
		$albums = PublisherAlbum::orderBy('album_id', 'DESC');
		if(Input::has('album_name')){
			$albums = $albums->where('album_name','LIKE','%'.Input::get('album_name').'%');
		}
		$albums = $albums->paginate(15);

		$user = Session::get('user');
		$band_id = $user[0]->band_id;

		$band_purchase_album = PurchaseScore::where('ref_band_id',$band_id)->get()->toArray();
		//$aaa = $band_purchase_album->where('ref_band_id',13)->get();
		//echo "<pre>";print_r($band_purchase_album);exit();
		return View::make('getscores.index', compact('albums','band_purchase_album'));
	}

	/**
	 * Show the form for creating a new getscore
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('getscores.create');
	}

	/**
	 * Store a newly created getscore in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Getscore::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Getscore::create($data);

		return Redirect::route('getscores.index');
	}

	/**
	 * Display the specified getscore.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tracklists = PublisherAlbumScore::where('ref_album_id',$id)->get();

		return View::make('getscores.show', compact('tracklists'));
	}

	/**
	 * Show the form for editing the specified getscore.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$getscore = Getscore::find($id);

		return View::make('getscores.edit', compact('getscore'));
	}

	/**
	 * Update the specified getscore in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$getscore = Getscore::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Getscore::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$getscore->update($data);

		return Redirect::route('getscores.index');
	}

	/**
	 * Remove the specified getscore from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Getscore::destroy($id);

		return Redirect::route('getscores.index');
	}

	public function purchasedScores($id){
		$album_id = $id;
		$user = Session::get('user');
		$band_id = $user[0]->band_id;

		$albumInformation = array();
		$tracklists = PublisherAlbumScore::where('ref_album_id',$id)->get();

		foreach($tracklists as $tracks){
			$albumInformation['ref_band_id'] = $band_id;
			$albumInformation['ref_album_id'] = $album_id;
			$albumInformation['ref_score_id'] = $tracks->score_id;
			PurchaseScore::create($albumInformation);
		}



		return Redirect::route('getscores.index');
	}

}
