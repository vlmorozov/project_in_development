<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReasonDeviationVehicleFuelingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reason_deviation_vehicle_fueling', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->string('title')->comment('Название причины отклонения');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус активности');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reason_deviation_vehicle_fueling');
	}

}
