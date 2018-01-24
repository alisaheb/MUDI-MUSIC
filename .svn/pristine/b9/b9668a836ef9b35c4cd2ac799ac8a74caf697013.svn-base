<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUpladscoredetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('licenses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ref_band_id');
			$table->string('band_key');
			$table->date('install_date');
			$table->date('expire_date');
			$table->date('updates_applicable_until');
			$table->integer('free_practice_total');
			$table->integer('devices_allowed_total');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('licenses');
	}

}
