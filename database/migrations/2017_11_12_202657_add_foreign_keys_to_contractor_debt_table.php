<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorDebtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_debt', function(Blueprint $table)
		{
			$table->foreign('contractor_id', 'FK_contractor_debt_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_point_id', 'FK_contractor_debt_trip_point_id')->references('id')->on('trip_point')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_debt', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_debt_contractor_id');
			$table->dropForeign('FK_contractor_debt_trip_point_id');
		});
	}

}
