<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorRequisiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_requisite', function(Blueprint $table)
		{
			$table->foreign('contractor_id', 'FK_contractor_requisite_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('currency_id', 'FK_contractor_requisite_currency_id')->references('id')->on('currency')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_requisite', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_requisite_contractor_id');
			$table->dropForeign('FK_contractor_requisite_currency_id');
		});
	}

}
