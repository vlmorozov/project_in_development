<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSheetSendLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sheet_send_log', function(Blueprint $table)
		{
			$table->foreign('contractor_contact_id', 'FK_sheet_send_log_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sheet_id', 'FK_sheet_send_log_sheet_id')->references('id')->on('sheet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_sheet_send_log_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sheet_send_log', function(Blueprint $table)
		{
			$table->dropForeign('FK_sheet_send_log_contractor_contact_id');
			$table->dropForeign('FK_sheet_send_log_sheet_id');
			$table->dropForeign('FK_sheet_send_log_user_id');
		});
	}

}
