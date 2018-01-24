<?php

class License extends \Eloquent {
	protected $table = 'licenses';
	protected $primaryKey = 'id';
	protected $fillable = [
		'ref_band_id',
		'band_key',
		'ref_band_key',
		'ref_license_type_id',
		'install_date',
		'expire_date',
		'updates_applicable_until',
		'free_practice_total',
		'devices_allowed_total',
	];
	public function licenseType(){
		return $this->belongsTo('Licensetype', 'ref_license_type_id', 'license_type_id');
	}

	public static function sendmailTotheband($user_ids){
		$login_info = Session::get('user_login');

		$get_user = UserLogin::find($login_info[0]->user_id);
		$licenseinfo = License::where('ref_band_id', $user_ids)->get();

		$band_mail = $login_info[0]->user_email;
		$mailSubject = "PurMusic License Information";
		$message = "Your Username: ".$get_user->user_name." Your License Key: ".$licenseinfo[0]->band_key;
		mail($band_mail,$mailSubject,$message);

	}
}