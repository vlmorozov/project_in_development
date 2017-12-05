<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair', function(Blueprint $table)
		{
			$table->foreign('printed_claim_user_id', 'FK_repair_print_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_place_id', 'FK_repair_repair_place_id')->references('id')->on('repair_place')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_repair_repair_state_name')->references('name')->on('repair_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('shift_id', 'FK_repair_shift_id')->references('id')->on('shift')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_repair_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_defect_type_id', 'FK_repair_vehicle_defect_type_id')->references('id')->on('vehicle_defect_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_repair_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_print_user_id');
			$table->dropForeign('FK_repair_repair_place_id');
			$table->dropForeign('FK_repair_repair_state_name');
			$table->dropForeign('FK_repair_shift_id');
			$table->dropForeign('FK_repair_user_id');
			$table->dropForeign('FK_repair_vehicle_defect_type_id');
			$table->dropForeign('FK_repair_vehicle_id');
		});
	}

}
