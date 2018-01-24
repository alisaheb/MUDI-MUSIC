<?php

class PurchaseScore extends \Eloquent {
	protected $table = "score_to_band";
	//protected $primaryKey = "";
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'ref_band_id',
		'ref_album_id',
		'ref_score_id',
		'played',
		'last_played_at',
		'current_status',
	];

	public static function is_in_array($array, $key, $key_value){
		$within_array = 'no';
		foreach( $array as $k=>$v ){
			if( is_array($v) ){
				$within_array = self::is_in_array($v, $key, $key_value);
				if( $within_array == 'yes' ){
					break;
				}
			} else {
				if( $v == $key_value && $k == $key ){
					$within_array = 'yes';
					break;
				}
			}
		}
		return $within_array;
	}

}