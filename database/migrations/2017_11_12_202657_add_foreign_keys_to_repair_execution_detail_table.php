<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairExecutionDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_execution_detail', function(Blueprint $table)
		{
			$table->foreign('nomenclature_id', 'FK_repair_execution_detail_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_execution_id', 'FK_repair_execution_detail_repair_execution_id')->references('id')->on('repair_execution')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_execution_detail', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_execution_detail_nomenclature_id');
			$table->dropForeign('FK_repair_execution_detail_repair_execution_id');
		});
	}

}
