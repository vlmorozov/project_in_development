<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('month', function(Blueprint $table)
		{
			$table->boolean('n')->primary()->comment('Номер');
			$table->string('title_nominative')->comment('Название. именительный');
			$table->string('title_genitive')->comment('Название. родительный');
			$table->string('title_short')->comment('Название сокращенное');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('month');
	}

}
