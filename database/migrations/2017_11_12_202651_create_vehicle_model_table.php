<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_model', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable()->comment('Наименование');
			$table->string('mark_model')->nullable()->comment('Марка-модель (официальное название)');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
			$table->integer('vehicle_type_id')->nullable()->index('FK_vehicle_model_vehicle_type_id')->comment('ID типа тс');
			$table->decimal('width', 5)->nullable()->comment('Ширина (м)');
			$table->decimal('height', 5)->nullable()->comment('Высота (м)');
			$table->decimal('depth', 5)->nullable()->comment('Длина (м)');
			$table->decimal('net_volume', 5)->nullable()->comment('Полезный объем (куб.м.)');
			$table->decimal('carrying_capacity', 5)->nullable()->comment('Грузоподъемность (т)');
			$table->integer('fuel_id')->nullable()->index('FK_vehicle_model_fuel_id')->comment('ID топлива');
			$table->decimal('fuel_consumption_empty', 5)->nullable()->comment('Расход топлива (пустой)');
			$table->decimal('fuel_consumption_laden', 5)->nullable()->comment('Расход топлива (груженый)');
			$table->enum('planning_type', array('tipper','container'))->nullable()->comment('Тип планирования (самосвал, контейнер)');
			$table->integer('axle_single_cnt')->nullable()->comment('Кол-во одинарных осей');
			$table->integer('axle_double_cnt')->nullable()->comment('Кол-во двойных осей');
			$table->string('mark')->comment('Марка ТС');
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
		Schema::drop('vehicle_model');
	}

}
