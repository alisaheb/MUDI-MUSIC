<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUploadscoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('license_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('license_name');
			$table->integer('validity');
			$table->date('update_applicable_days');
			$table->integer('free_practice_total');
			$table->integer('devices_allowed_total');
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
		Schema::drop('license_type');
	}

}
