<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclePermitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_permit', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->index('FK_vehicle_permit_vehicle_id')->comment('ID тс');
			$table->integer('permit_type_id')->index('FK_vehicle_permit_permit_type_id')->comment('ID типа пропуска');
			$table->date('validity_from')->nullable()->comment('Период действия от');
			$table->date('validity_to')->nullable()->comment('Период действия до');
			$table->string('number')->nullable()->comment('Номер пропуска');
			$table->date('create_date')->nullable()->comment('Дата пропуска');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_permit');
	}

}
