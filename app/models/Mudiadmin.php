<?php

class Mudiadmin extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public static function getAllUser(){
		$totol_user = UserLogin::count();
		$totl_band = Band::count();
		$total_publisher = Publisher::count();
		$total_album = PublisherAlbum::count();
		$all_type_user = array(
			'all_user' => $totol_user,
			'band'=>$totl_band,
			'publisher'=>$total_publisher,
			'total_album'=>$total_album
		);

		return $all_type_user;

	}

	public static function getPublisherBand(){
		$bandName = Band::take(8)->get();
		$publisherName = Publisher::take(8)->get();
		$publisherBand =array(
			'band'=>$bandName,
			'publisher'=>$publisherName
		);

		return $publisherBand;

	}
	public static function getLatestAlbum(){
		$albumName = PublisherAlbum::take(4)->get();
		return $albumName;
	}
	public static function getPurchasedAlbum(){
		$sql = "select distinct(a.ref_album_id) as album_id,b.album_name,a.ref_band_id,c.band_name,date(a.created_at) as purchased_date   from score_to_band a, score_albums b,bands c
					 where a.ref_album_id = b.album_id
					 and a.ref_band_id = c.band_id
					 ORDER BY a.created_at DESC LIMIT 10";
		$purchasedAlbum = DB::select($sql);
		return $purchasedAlbum;
	}

}