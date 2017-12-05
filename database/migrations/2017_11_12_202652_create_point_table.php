<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePointTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('point', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('address')->nullable()->comment('Адрес');
			$table->float('lat', 9, 6)->comment('Широта');
			$table->float('lng', 9, 6)->comment('Долгота');
			$table->unique(['lat','lng'], 'UK_point');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('point');
	}

}
