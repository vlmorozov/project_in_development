<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_group', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Название');
			$table->enum('status', array('1','2'))->default('1')->comment('1-активен, 2-неактиване');
			$table->date('date_start_export_fb')->nullable()->comment('Дата начала выгрузки в ФБ');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_group');
	}

}
