<?php

class Returnallscore extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];
	// Don't forget to fill this array
	protected $fillable = [];

	public static function getallScore($band_id){
		$allScore = array(
			'error'=>true,
			'message'=>'Wornning! unfortunately this band is not exist',
		);
		//sql find the band information
		$sql ="select ref_band_id,band_key,date(install_date) install_date,
		date(expire_date) expire_date from licenses WHERE ref_band_id=?";

		$bandInformation = DB::select($sql,[$band_id]);
		if(!empty($bandInformation)) {
			$getpublisherinformation = self::getAllPublisher($band_id);

			$allScore = array(
				'error'=>false,
				'ref_band_id' => $bandInformation[0]->ref_band_id,
				'band_key' => $bandInformation[0]->band_key,
				'install_date' => $bandInformation[0]->install_date,
				'expire_date' => $bandInformation[0]->expire_date,
				'publishers' => $getpublisherinformation,
			);
		}


		//echo "<pre>";print_r($allScore);exit();


		return $allScore;
	}



	public static function getAllPublisher($band_id){

		//band purchase album
		$band_album_sql = "select distinct(ref_album_id) album_id from score_to_band where ref_band_id = ?";

		$band_album = DB::select($band_album_sql,[$band_id]);


		$publishePush = array();
		$albumPush = array();
		$i = 0;
		foreach($band_album as $albums){
			$publiser = array();
			$publiserdata = self::bandAlbums($albums->album_id);
			$publiser['ref_publisher_id']= $publiserdata[0]->ref_publisher_id;
			$publiser['publisher_key']= $publiserdata[0]->publisher_key;


				if(empty($publishePush)) {
					$publishePush[$i] = $publiser;
					$i++;
				}
				else{
					$checkPublisherId = PurchaseScore::is_in_array($publishePush,'ref_publisher_id',$publiserdata[0]->ref_publisher_id);
				if($checkPublisherId == 'no'){
					$publishePush[$i] = $publiser;
					$i++;
				}
				}


		}

		$purchaseAlbum = self::publisherPurchaseAlbum($publishePush,$band_album);

		return $purchaseAlbum;
	}

	public static function bandAlbums($album_id){
		$sql = "select a.ref_publisher_id,p.publisher_key from score_albums a,publishers p where a.album_id = ? and a.ref_publisher_id = p.publisher_id";
		return DB::select($sql,[$album_id]);
	}

	public static function publisherPurchaseAlbum($publishePush,$band_album){
		$albumPush = array();
		$i=0;
		foreach($publishePush as $publisher){
			$album = self::albumArr($publisher['ref_publisher_id'],$band_album);
			$albumPush[$i] = $album;
			$i++;
		}
		$getAlbum = self::generateAlbum($publishePush,$albumPush);
		$getscore = self::getAlbumScore($getAlbum);
		return $getscore;

	}

	public static function generateAlbum($publishePush,$albumPush){
		foreach($publishePush as $key=>$val){
			if($publishePush[$key]['ref_publisher_id'] == $albumPush[$key]['ref_publisher_id']){
				$publishePush[$key]['albums'] = $albumPush[$key]['albums'];
			}
		}
		return $publishePush;
	}

	public static function  albumArr($publisher_id,$albums){
		$publisherAlbum = array('ref_publisher_id'=>$publisher_id);
		$albumIdPush = array();
		$i = 0;
		foreach($albums as $album){
			$purchaseAlbum = array();
			$sql = "select album_id from score_albums where  ref_publisher_id = ? and album_id = ?";
			$checkAlbum =DB::select($sql,[$publisher_id,$album->album_id]);
			if(!empty($checkAlbum)){
				$purchaseAlbum['album_id'] = $album->album_id;
				$albumIdPush[$i] = $purchaseAlbum;
				$i++;
			}

		}
		$publisherAlbum['albums'] = $albumIdPush;

		return $publisherAlbum;
	}

	public static function getAlbumScore($getAlbum){
		foreach($getAlbum as $key=>$albums) {
			$purchasealbums = $albums['albums'];
			foreach($purchasealbums as $keys=>$scores) {
				$scoreArr = array();
				$scorePush = array();
				$k = 0;

				$sql = "select * from scores where ref_album_id = ?";
				$score = DB::select($sql, [$scores['album_id']]);

				foreach ($score as $scoreDetail) {
					$scoreArr['score_id'] = $scoreDetail->score_id;
					$scoreArr['drive_file_id'] = $scoreDetail->drive_file_id;
					$scoreArr['score_title'] = $scoreDetail->score_title;
					$scoreArr['score_note'] = $scoreDetail->score_note;
					$scoreArr['current_status'] = $scoreDetail->current_status;
					$scoreArr['created_at'] = $scoreDetail->created_at;
					$scoreArr['updated_at'] = $scoreDetail->updated_at;
					$scorePush[$k] = $scoreArr;
					$k++;
				}
				$getAlbum[$key]['albums'][$keys]['scores']=$scorePush;

			}
		}
		//echo"<pre>";print_r($getAlbum);exit();
		return $getAlbum;
	}


}