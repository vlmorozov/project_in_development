<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairRepairPlaceSectorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_repair_place_sector', function(Blueprint $table)
		{
			$table->foreign('repair_id', 'FK_repair_repair_place_sector_repair_id')->references('id')->on('repair')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_place_sector_id', 'FK_repair_repair_place_sector_repair_place_sector_id')->references('id')->on('repair_place_sector')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_work_id', 'FK_repair_repair_place_sector_repair_work_id')->references('id')->on('repair_work')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_repair_place_sector', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_repair_place_sector_repair_id');
			$table->dropForeign('FK_repair_repair_place_sector_repair_place_sector_id');
			$table->dropForeign('FK_repair_repair_place_sector_repair_work_id');
		});
	}

}
