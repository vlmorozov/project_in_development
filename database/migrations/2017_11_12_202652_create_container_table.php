<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContainerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('container', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('container_type_id')->nullable()->index('FK_container_container_type_id')->comment('ID типа контейнера');
			$table->string('inventory_number')->nullable()->comment('Инвентарный номер');
			$table->integer('parking_id')->nullable()->index('FK_container_parking_id')->comment('ID парковки (начальная точка)');
			$table->string('equipment_id')->nullable()->comment('ID оборудования');
			$table->enum('status', array('1','2'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('container');
	}

}
