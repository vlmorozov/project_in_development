<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairWorkWorkTimeHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_work_work_time_history', function(Blueprint $table)
		{
			$table->foreign('repair_work_id', 'FK_repair_work_time_repair_work_id')->references('id')->on('repair_work')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_work_work_time_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_work_time_repair_work_id');
		});
	}

}
