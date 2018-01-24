<?php

/*class Returnallscore extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];

    public static function getallScore($band_id){
        $sql ="select ref_band_id,band_key,date(install_date) install_date,
		date(expire_date) expire_date from licenses WHERE ref_band_id=?";

        $bandInformation = DB::select($sql,[$band_id]);
        //publisher array
        $publisherArr = array();
        $publisherPush = array();

        $publisher = self::getAllPublisher($band_id);
        $i = 0;

        foreach ($publisher as $publisherID) {
            $publisherArr['ref_publisher_id'] = $publisherID->publisher_id;

            $publisherArr['publisher_key'] = $publisherID->publisher_key;
            //find album
            $album = self::getPublisherAlbum($publisherID->publisher_id);

            $publisherArr['albums'] = $album;
            $publisherPush[$i] =$publisherArr;
            $i++;
        }

        $allScore = array(
            'ref_band_id' =>$bandInformation[0]->ref_band_id ,
            'band_key' =>$bandInformation[0]->band_key ,
            'install_date' =>$bandInformation[0]->install_date ,
            'expire_date' =>$bandInformation[0]->expire_date ,
            'publishers'=>$publisherPush,
        );

        return $allScore;
    }



    public static function getAllPublisher($band_id){
        //band purchase album
        $band_album_sql = "select distinct(ref_album_id) album_id from score_to_band where ref_band_id = ?";

        $band_album = DB::scelect($band_album_sql,[$band_id]);

        $sql ="select publisher_id,publisher_key from publishers";
        $allPublisher = DB::select($sql);
        return $allPublisher;

    }

    public static function getPublisherAlbum($id){
        $albumArr = array();
        $albumPush = array();

        $sql="select album_id from score_albums where ref_publisher_id = ?";
        $album =  DB::select($sql,[$id]);
        $j = 0;
        foreach ($album as $albumScore) {


            $albumArr['album_id'] =  $albumScore->album_id;

            $score = self::getAlbumScore($albumScore->album_id);


            //echo "<pre>";print_r($score);exit();
            $albumArr['scores'] =  $score;

            $albumPush[$j] = $albumArr;
            $j++;
        }
        return $albumPush;
    }

    public static function getAlbumScore($id){

        $scoreArr = array();
        $scorePush = array();
        $k = 0;

        $sql="select * from scores where ref_album_id = ?";
        $score = DB::select($sql,[$id]);

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
        return $scorePush;
    }

}*/

