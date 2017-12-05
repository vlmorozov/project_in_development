<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairWorkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_work', function(Blueprint $table)
		{
			$table->foreign('repair_work_group_id', 'FK_repair_work_repair_work_group_id')->references('id')->on('repair_work_group')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_work', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_work_repair_work_group_id');
		});
	}

}
