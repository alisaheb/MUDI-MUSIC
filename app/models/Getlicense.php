<?php

class Getlicense extends \Eloquent {
	protected $tabel = 'getlicenses';
	protected $primaryKey = 'licence_id';
	// Add your validation rules here

	public static $rules = [		
		'band_lead_name'=>'required',
		'band_name'=>'required',
		'license_type'=>'required',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'band_name',
		'lead_name',
	];

	public static function licenseInformation($license_id,$user_data){

		$userData = Session::get('user');
		$ref_user_id = $userData[0]->band_id;
		$install_date = date('Y-m-d');

		$getting_license_type = Licensetype::find($license_id);
		$expire_date = date('Y-m-d', strtotime($install_date. ' + '.$getting_license_type->validity.' days'));

		$free_practice_total = $getting_license_type->free_practice_total;
		$devices_allowed_total = $getting_license_type->devices_allowed_total;
		$band_key = self::generateRandomString($license_id,$user_data,$install_date,$expire_date);
		$licenseInfo = array(
			'ref_band_id' => $ref_user_id,
			'ref_license_type_id' => $license_id, 
			'band_key' => $band_key['band_key'],
			'ref_band_key'=>$band_key['ref_band_key'],
			'install_date' => $install_date, 
			'expire_date' => $expire_date, 
			'free_practice_total' => $free_practice_total, 
			'devices_allowed_total' => $devices_allowed_total, 			
			);

		return $licenseInfo;

	}

	public static function generateRandomString($license_id,$user_data,$install_date,$expire_date) {
		    /*$characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }*/
		$band_key = array();
		$randomString = $user_data['band_lead_name']."_".$user_data['band_name']."_".$license_id."_".$install_date."_".$expire_date;
		$randomString = Crypt::encrypt($randomString);
		$string = str_random(32);
		$band_key['ref_band_key'] = $string;
		$band_key['band_key'] = $randomString;

    	return $band_key;
	}

}