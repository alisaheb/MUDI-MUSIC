<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAli extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bands', function(Blueprint $table)
		{
			$table->increments('band_id');
			$table->string('band_name');
			$table->string('band_lead_name');
			$table->string('band_login_id');
			$table->string('band_pass');
			$table->string('band_email');
			$table->tinyInteger('current_status');
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
		Schema::drop('bands');
	}

}
