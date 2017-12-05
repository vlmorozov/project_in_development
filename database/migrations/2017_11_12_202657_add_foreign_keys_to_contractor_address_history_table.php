<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorAddressHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_address_history', function(Blueprint $table)
		{
			$table->foreign('contractor_id', 'FK_contractor_address_history_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_contractor_address_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_address_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_address_history_contractor_id');
			$table->dropForeign('FK_contractor_address_history_user_id');
		});
	}

}
