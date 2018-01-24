<?php

class PublisherTestsController extends \BaseController {

	/**
	 * Display a listing of publishertests
	 *
	 * @return Response
	 */

	function __construct()
	{
		$this->beforeFilter('go_dashboard');
	}

	public function index()
	{
		$publishertests = Publishertest::all();

		return View::make('publishertests.index', compact('publishertests'));
	}

	/**
	 * Show the form for creating a new publishertest
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('publishertests.create');
	}

	/**
	 * Store a newly created publishertest in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Publishertest::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Publishertest::create($data);

		return Redirect::route('publishertests.index');
	}

	/**
	 * Display the specified publishertest.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$publishertest = Publishertest::findOrFail($id);

		return View::make('publishertests.show', compact('publishertest'));
	}

	/**
	 * Show the form for editing the specified publishertest.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$publishertest = Publishertest::find($id);

		return View::make('publishertests.edit', compact('publishertest'));
	}

	/**
	 * Update the specified publishertest in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$publishertest = Publishertest::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Publishertest::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$publishertest->update($data);

		return Redirect::route('publishertests.index');
	}

	/**
	 * Remove the specified publishertest from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Publishertest::destroy($id);

		return Redirect::route('publishertests.index');
	}

}
