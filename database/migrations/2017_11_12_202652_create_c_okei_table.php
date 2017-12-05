<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCOkeiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('c_okei', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('code')->nullable();
			$table->string('title')->nullable();
			$table->string('title_short_ru')->nullable();
			$table->string('title_short_en')->nullable();
			$table->string('symbol_ru')->nullable();
			$table->string('symbol_en')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('c_okei');
	}

}
