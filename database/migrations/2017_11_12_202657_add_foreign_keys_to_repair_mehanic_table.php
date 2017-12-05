<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairMehanicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_mehanic', function(Blueprint $table)
		{
			$table->foreign('repair_id', 'FK_repair_mehanic_repair_id')->references('id')->on('repair')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_work_id', 'FK_repair_mehanic_repair_work_id')->references('id')->on('repair_work')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_mehanic', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_mehanic_repair_id');
			$table->dropForeign('FK_repair_mehanic_repair_work_id');
		});
	}

}
