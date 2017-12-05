<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStorageDocumentStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage_document_state_history', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FK_storage_document_income_state_history_user')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage_document_state_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_storage_document_income_state_history_user');
		});
	}

}
