<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShiftTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shift', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Наименование');
			$table->string('title_short')->comment('Наименование краткое');
			$table->string('time_start', 5)->comment('Время начала (hh:mm)');
			$table->string('time_end', 5)->comment('Время окончания (hh:mm)');
			$table->string('color', 6)->comment('Цвет в графике (#rgb)');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
			$table->boolean('step')->default(0)->comment('Шаг смены (0 - каждый день, 1 - через день)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shift');
	}

}
