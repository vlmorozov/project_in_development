<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairPlaceSectorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_place_sector', function(Blueprint $table)
		{
			$table->foreign('repair_place_id', 'FK_repair_place_sector_repair_place_id')->references('id')->on('repair_place')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_place_sector', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_place_sector_repair_place_id');
		});
	}

}
