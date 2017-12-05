<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleRepairTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_repair', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('repair_date')->comment('Дата ремонта');
			$table->integer('vehicle_id')->index('FK_vehicle_repair_vehicle_id')->comment('ID ТС');
			$table->integer('driver_id')->index('FK_vehicle_repair_driver_id')->comment('ID водителя');
			$table->integer('trip_id')->nullable()->index('FK_vehicle_repair_trip_id')->comment('ID рейса, в котором был ремонт');
			$table->integer('spent_time')->default(0)->comment('Затраченное время (мин)');
			$table->integer('create_user_id')->comment('Пользователя, который создал');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_repair');
	}

}
