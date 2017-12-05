<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairDefectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_defect', function(Blueprint $table)
		{
			$table->foreign('create_user_id', 'FK_repair_defect_create_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_id', 'FK_repair_defect_repair_id')->references('id')->on('repair')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('update_user_id', 'FK_repair_defect_update_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_repair_defect_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_defect', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_defect_create_user_id');
			$table->dropForeign('FK_repair_defect_repair_id');
			$table->dropForeign('FK_repair_defect_update_user_id');
			$table->dropForeign('FK_repair_defect_vehicle_id');
		});
	}

}
