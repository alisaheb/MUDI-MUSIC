<?php

class BandLicenseCheck extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];


	public static function bandCheck($bandArr){
		$band_data = array(
			'error'=>true,
			'message'=>"User mail or password is worng"
			);
		$user_data = array();
		$band_license  = array();

		 $valid = UserLogin::where('user_email',$bandArr['usermail'])->get();
		$count = $valid->count();
		if($count>=1) {
			if (Hash::check($bandArr['userpass'], $valid[0]->user_password)) {

				$find_band_data = Band::where('ref_user_id',$valid[0]->user_id)->get();

				$licenseArray = License::where('ref_band_id', $find_band_data[0]->band_id)->get();

				$band_data['error'] = false;
				$band_data['message'] = "success";

				//band user data
				$user_data['band_id'] = $find_band_data[0]->band_id;
				$user_data['band_name'] = $find_band_data[0]->band_name;
				$user_data['band_lead_name'] = $find_band_data[0]->band_lead_name;
				$user_data['band_email'] = $valid[0]->user_email;
				//$user_data['band_login_id'] = $valid[0]->user_name;

				//license data
				$hasLicense = $licenseArray->count();
				if($hasLicense < 1) {
					$band_license['band_key'] = "";
					$band_license['ref_license_type_id'] = "";
					$band_license['validity'] = "";
					$band_license['install_date'] = "";
					$band_license['expire_date'] = "";
					$band_license['free_practice_total'] = "";
					$band_license['devices_allowed_total'] = "";
				}
				else{
					$band_license['band_key'] = $licenseArray[0]->band_key;
					$band_license['ref_license_type_id'] = $licenseArray[0]->ref_license_type_id;
					$band_license['validity'] = 'TODO';
					$band_license['install_date'] = $licenseArray[0]->install_date;
					$band_license['expire_date'] = $licenseArray[0]->expire_date;
					$band_license['free_practice_total'] = $licenseArray[0]->free_practice_total;
					$band_license['devices_allowed_total'] = $licenseArray[0]->devices_allowed_total;
				}

				//band and license information
				$band_and_license_information = array('band_info' => $user_data, 'license_info' => $band_license);
				$band_data['online_id'] = $valid[0]->user_id;
				$band_data['user_name'] = $valid[0]->user_name;
				//$user_data['band_login_id'] = $valid[0]->user_name;
				$band_data['band_info'] = $user_data;
                $band_data['license_info'] = $band_license;


				return $band_data;
			}
		}

		return $band_data;
	}

}