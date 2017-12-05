<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStorageResponsibleCancellationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage_responsible_cancellation', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_storage_responsible_cancellation_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('responsible_user_id', 'FK_storage_responsible_cancellation_responsible_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage_responsible_cancellation', function(Blueprint $table)
		{
			$table->dropForeign('FK_storage_responsible_cancellation_company_id');
			$table->dropForeign('FK_storage_responsible_cancellation_responsible_user_id');
		});
	}

}
