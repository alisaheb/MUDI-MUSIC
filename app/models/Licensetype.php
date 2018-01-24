<?php

class Licensetype extends \Eloquent {
	protected $table = 'license_type';
	protected $primaryKey = 'license_type_id';

	protected $fillable = [
		'license_name',
		'validity',
		'update_applicable_days',
		'free_practice_total',
		'devices_allowed_total',
		'current_status',
	];
}