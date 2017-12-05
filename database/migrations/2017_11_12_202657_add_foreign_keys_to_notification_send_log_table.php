<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNotificationSendLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notification_send_log', function(Blueprint $table)
		{
			$table->foreign('notification_id', 'FK_notification_send_log_notification_id')->references('id')->on('notification')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notification_send_log', function(Blueprint $table)
		{
			$table->dropForeign('FK_notification_send_log_notification_id');
		});
	}

}
