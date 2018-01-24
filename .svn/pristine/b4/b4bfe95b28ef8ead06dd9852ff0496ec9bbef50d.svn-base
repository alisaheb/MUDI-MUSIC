<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publisher_album_scores', function(Blueprint $table)
		{
			$table->increments('score_id');
			$table->integer('ref_publisher_id');
			$table->integer('ref_album_id');
			$table->string('score_title');
			$table->string('score_note');
			$table->string('file_path');
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
		Schema::drop('publisher_album_scores');
	}

}
