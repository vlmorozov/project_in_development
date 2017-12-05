<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleEquipmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_equipment', function(Blueprint $table)
		{
			$table->foreign('trailer_id', 'FK_trailer_trailer_id')->references('id')->on('trailer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('equipment_type_id', 'FK_vehicle_equipment_equipment_type_id')->references('id')->on('equipment_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_equipment_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_equipment', function(Blueprint $table)
		{
			$table->dropForeign('FK_trailer_trailer_id');
			$table->dropForeign('FK_vehicle_equipment_equipment_type_id');
			$table->dropForeign('FK_vehicle_equipment_vehicle_id');
		});
	}

}
