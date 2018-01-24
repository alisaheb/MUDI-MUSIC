<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublisherTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publisher_albums', function(Blueprint $table)
		{
			$table->increments('album_id');
			$table->integer('ref_publisher_id');
			$table->string('album_name');
			$table->string('album_note');
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
		Schema::drop('publisher_albums');
	}

}
