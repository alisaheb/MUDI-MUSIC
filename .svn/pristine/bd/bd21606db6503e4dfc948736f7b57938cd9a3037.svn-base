<?php

class PublisherAlbum extends \Eloquent {
	protected $table = "score_albums";
	protected $primaryKey = "album_id";

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'ref_publisher_id'=>'',
		'album_name'=>'',
		'album_note'=>'',
		'current_status'=>'',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'ref_publisher_id',
		'album_name',
		'album_note',
		'current_status',
	];

	public static function scoreRules($scoreData){
		$errorArray = array();

		foreach ($scoreData as $key => $value) {
			if($scoreData[$key]['score_title'] == "" || $scoreData[$key]['file_path'] == ""){
				$errorArray['state'] = false;
				$errorArray['message'] = "Score Title or file is empty";

				return $errorArray;			
			}
			
		}
		$errorArray['state'] = true;
		$errorArray['message'] = "All are ok";

		return $errorArray;

	}

}