<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShiftMechanicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shift_mechanic', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Наименование');
			$table->string('title_short')->comment('Наименование краткое');
			$table->string('time_start', 5)->comment('Время начала (hh:mm)');
			$table->string('time_end', 5)->comment('Время окончания (hh:mm)');
			$table->string('color', 6)->nullable()->comment('Цвет в графике (#rgb)');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
			$table->boolean('is_interval')->default(0)->comment('Может быть с интервалами');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shift_mechanic');
	}

}
