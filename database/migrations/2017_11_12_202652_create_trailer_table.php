<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrailerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trailer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Наименование');
			$table->string('reg_number')->comment('Гос. рег. номер');
			$table->enum('status', array('1','2'))->nullable()->default('1');
			$table->enum('type', array('tipper','container'))->nullable()->default('container')->comment('Тип прицепа (для самосвала, для мультилифта)');
			$table->decimal('net_volume', 5)->nullable()->comment('Полезный объем (куб.м.)');
			$table->decimal('carrying_capacity', 5)->nullable()->comment('Грузоподъемность (т)');
			$table->string('axle_single_cnt')->nullable()->comment('Кол-во одинарных осей');
			$table->string('axle_double_cnt')->nullable()->comment('Кол-во двойных осей');
			$table->string('url_tire_sensor_data')->nullable()->comment('URL для получение данных с датчиков');
			$table->boolean('with_stepney')->nullable()->default(0)->comment('Имеет запасное колесо');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trailer');
	}

}
