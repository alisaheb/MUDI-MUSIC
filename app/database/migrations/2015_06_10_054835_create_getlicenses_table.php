<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGetlicensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publishers', function(Blueprint $table)
		{
			$table->increments('publisher_id');
			$table->string('publisher_user_id');
			$table->string('publisher_full_name');
			$table->string('publisher_pass');
			$table->string('publisher_email');
			$table->string('publisher_key');
			$table->string('current_status');
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
		Schema::drop('publishers');
	}

}
