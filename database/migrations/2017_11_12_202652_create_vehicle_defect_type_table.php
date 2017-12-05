<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleDefectTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_defect_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Название');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
			$table->integer('sub_defect_type')->nullable()->comment('Подкатегория неисправности (например, шиномонтаж)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_defect_type');
	}

}
