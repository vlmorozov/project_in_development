<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParkingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parking', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Наименование');
			$table->enum('type', array('garage','parking'))->comment('Тип (гараж/парковка)');
			$table->string('address')->comment('Адрес');
			$table->float('lat', 9, 6)->comment('Широта (по яндексу)');
			$table->float('lng', 9, 6)->comment('Долгота (по яндексу)');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->boolean('is_main')->default(0)->comment('Главная точка (для расчета расстояния)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parking');
	}

}
