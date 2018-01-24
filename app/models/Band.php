<?php

class Band extends \Eloquent {
	protected $table = 'bands';
	protected $primaryKey = 'band_id';
	// Add your validation rules here
	public static function createRules(){ 
	 return [
		// 'title' => 'required'
		 'ref_user_id'=>'',
		 'band_name'=>'',
		 'band_lead_name'=>'',
	];
}


	public static function updateRules($id){
		return [
			'ref_user_id'=>'',
			'band_name'=>'',
			'band_lead_name'=>'',
	];

	}

	// Don't forget to fill this array
	protected $fillable = [
		'ref_user_id',
		'band_name',
		'band_lead_name',
		'band_logo',
	];



}