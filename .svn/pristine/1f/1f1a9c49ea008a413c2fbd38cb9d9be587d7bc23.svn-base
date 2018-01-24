<?php

class PublisherAlbumScore extends \Eloquent {
	protected $table = 'scores';
	protected $primaryKey = 'score_id';
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'ref_publisher_id'=>'',
		'ref_album_id'=>'',
		'score_title'=>'',
		'score_note'=>'',
		'file_path'=>'',
		'current_status'=>'',
		'drive_file_id'=>'',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'ref_publisher_id',
		'ref_album_id',
		'score_title',
		'score_note',
		'file_path',
		'current_status',
		'drive_file_id',
	];

}