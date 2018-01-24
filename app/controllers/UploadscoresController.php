<?php

require 'ali/quickstart.php';

class UploadscoresController extends \BaseController {

	function __construct()
		{
		    $this->beforeFilter('publisher_auth');
		}
	/**
	 * Display a listing of uploadscores
	 *
	 * @return Response
	 */
	public function index()
	{
		$language = LanguageController::testLangeusge();
		$language = json_decode($language,true);
		$userData = Session::get('user');
		$publishe_id = $userData[0]->publisher_id;
		$uploadscores = PublisherAlbum::where('ref_publisher_id',$publishe_id)->orderBy('album_id', 'DESC');
		if(Input::has('album_name')){
			$uploadscores = $uploadscores->where('album_name','LIKE','%'.Input::get('album_name').'%');
		}

		$uploadscores = $uploadscores->paginate(15);

		return View::make('uploadscores.index', compact('uploadscores','language'));
	}

	/**
	 * Show the form for creating a new uploadscore
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('uploadscores.create');
	}

	/**
	 * Store a newly created uploadscore in storage.
	 *
	 * @return Response
	 */
	public function store()
	{



		//start of album data
		$validator = Validator::make($data = Input::all(), PublisherAlbum::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$userData = Session::get('user');
		$publishe_id = $userData[0]->publisher_id;
		
		$data['ref_publisher_id'] = $publishe_id;

		$score = PublisherAlbum::create($data);

		//end of album data

		//start of score data
		$score_id = $score->album_id;

		$datafile = Input::file('currentItem', []);

		foreach($datafile as $key=>$val){
			$google_file_location =$this->googleDriveId($val['file_path']);
			$datafile[$key]['drive_file_id'] = $google_file_location['id'];	
			$datafile[$key]['file_path'] = $google_file_location['download_path'];
		}

		$data = Input::get('currentItem', []);

		foreach($data as $key=>$val){
			$data[$key]['drive_file_id'] = $datafile[$key]['drive_file_id'];

			$data[$key]['file_path'] = $datafile[$key]['file_path'];	
		}

			
				
		$data = array_map(function($d) use ($score_id){
				$d['ref_album_id'] = $score_id;
				return $d;
			}, $data);

		$data = array_map(function($d) use ($publishe_id){
				$d['ref_publisher_id'] = $publishe_id;
				return $d;
			}, $data);

		//echo "<pre>";print_r($data);exit();

		foreach($data as $d):
				PublisherAlbumScore::create($d);
		endforeach; 


		return Redirect::route('uploadscores.index');
	}

	/**
	 * Display the specified uploadscore.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$uploadscore = PublisherAlbum::findOrFail($id);

		return View::make('uploadscores.show', compact('uploadscore'));
	}

	/**
	 * Show the form for editing the specified uploadscore.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$uploadscore = PublisherAlbum::find($id);
		$scores = PublisherAlbumScore::where('ref_album_id',$id)->get();

		return View::make('uploadscores.edit', compact('uploadscore','scores'));
	}

	/**
	 * Update the specified uploadscore in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$uploadscore = PublisherAlbum::findOrFail($id);

		$validator = Validator::make($data = Input::all(), PublisherAlbum::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$uploadscore->update($data);
		$userData = Session::get('user');
		$publishe_id = $userData[0]->publisher_id;

		$updatefile = Input::file('updateItem', []);
		$updatedata = Input::get('updateItem', []);
		$this->processUpdateScore($updatefile,$updatedata,$id,$publishe_id);

		$currentfile = Input::file('currentItem', []);
		$currentdata = Input::get('currentItem', []);

		$this->pocessCurrentScore($currentfile,$currentdata,$id,$publishe_id);



		return Redirect::route('uploadscores.index');
	}

	/**
	 * Remove the specified uploadscore from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		PublisherAlbum::destroy($id);

		PublisherAlbumScore::where('ref_album_id',$id)->delete();

		return Redirect::route('uploadscores.index');
	}



//after uploading get google drive file id
	public function googleDriveId($fileNames){

		$userData = Session::get('user');
		$arg = array('id' => "",'download_path'=>"" );
		if($fileNames != ""){
			/*$path = $fileNames->getPathName();
            $fileName = $fileNames->getClientOriginalName();*/
			//create zip

			$fileName = time().mt_rand(1,100).mt_rand(2,100).'.'.$fileNames->getClientOriginalExtension();
			$uploadPath = public_path().'/upload';
			$fileNames->move($uploadPath, $fileName);
			$deletePath = $uploadPath."/".$fileName;

			$zipPath = public_path()."/zippingMxl"."/".uniqid().".zip";
			$excstr = "7z a ".$zipPath." -p".$userData[0]->publisher_key." ".$deletePath;
			exec($excstr);

			unlink($deletePath);


			$upload = new uploadfile();
			$vars = $upload->uploadfunction($zipPath,$fileName);
			unlink($zipPath);

			$arg = array('id' => $vars['id'],'download_path'=>$vars['downloadUrl'] );
		}

		return $arg;
	}


	public function processUpdateScore($updatefile,$updatedata,$id,$publishe_id){

		foreach($updatefile as $key=>$val){
			// $vars = $this->getImgSrc($val['file_path']);
			// $datafile[$key]['file_path'] = ;

			$google_file_location =$this->googleDriveId($val['file_path']);
			$datafile[$key]['drive_file_id'] = $google_file_location['id'];	
			$datafile[$key]['file_path'] = $google_file_location['download_path'];	
		}

		foreach($updatedata as $key=>$val){
			// $data[$key]['drive_file_id'] = $datafile[$key]['drive_file_id'];

			// $data[$key]['file_path'] = $datafile[$key]['file_path'];

			$updatedata[$key]['drive_file_id'] = $datafile[$key]['drive_file_id'];
			$updatedata[$key]['file_path'] = $datafile[$key]['file_path'];		
		}

		$data = array_map(function($d) use ($id){
				$d['ref_album_id'] = $id;
				return $d;
			}, $updatedata);

		$data = array_map(function($d) use ($publishe_id){
				$d['ref_publisher_id'] = $publishe_id;
				return $d;
			}, $data);
		
		$data = array_map(function($d){
				if($d['file_path'] == ""){
				unset($d['file_path']);
				unset($d['drive_file_id']);
				}
				return $d;
			}, $data);
			
		//echo "<pre>";print_r($data);exit();
		foreach($data as $d):
				$updatescore = PublisherAlbumScore::findOrFail($d['score_id']);
				$updatescore->update($d);
		endforeach;


	}

	public function pocessCurrentScore($currentfile,$currentdata,$id,$publishe_id){

		foreach($currentfile as $key=>$val){
			//$datafile[$key]['file_path'] = $this->getImgSrc($val['file_path']);	

			$google_file_location =$this->googleDriveId($val['file_path']);
			$datafile[$key]['drive_file_id'] = $google_file_location['id'];	
			$datafile[$key]['file_path'] = $google_file_location['download_path'];
		}

		

		foreach($currentdata as $key=>$val){
			//$currentdata[$key]['file_path'] = $datafile[$key]['file_path'];	

			$currentdata[$key]['drive_file_id'] = $datafile[$key]['drive_file_id'];
			$currentdata[$key]['file_path'] = $datafile[$key]['file_path'];
		}

			
				
		$data = array_map(function($d) use ($id){
				$d['ref_album_id'] = $id;
				return $d;
			}, $currentdata);

		$data = array_map(function($d) use ($publishe_id){
				$d['ref_publisher_id'] = $publishe_id;
				return $d;
			}, $data);

		foreach($data as $d):
				PublisherAlbumScore::create($d);
		endforeach; 

	}

}


//google drive file upload and zipping with 7 zip

