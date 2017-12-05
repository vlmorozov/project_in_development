<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleEquipmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_equipment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->nullable()->index('FK_vehicle_equipment_vehicle_id')->comment('ID ТС');
			$table->integer('equipment_type_id')->index('FK_vehicle_equipment_equipment_type_id')->comment('ID типа оборудования');
			$table->string('equipment_id')->unique('UK_vehicle_equipment_equipment_id')->comment('Идентификационный код оборудования');
			$table->string('sim_number')->nullable()->comment('Номер sim-карты');
			$table->date('installation_date')->nullable()->comment('Дата установки');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->string('current_version')->nullable()->comment('Текущая версия ПО на устройстве');
			$table->dateTime('last_update')->nullable();
			$table->integer('trailer_id')->nullable()->index('FK_trailer_trailer_id')->comment('ID Прицепа');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_equipment');
	}

}
