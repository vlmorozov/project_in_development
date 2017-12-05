<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNotificationReadLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notification_read_log', function(Blueprint $table)
		{
			$table->foreign('notification_id', 'FK_notification_read_log_notification_id')->references('id')->on('notification')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('read_user_id', 'FK_notification_read_log_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notification_read_log', function(Blueprint $table)
		{
			$table->dropForeign('FK_notification_read_log_notification_id');
			$table->dropForeign('FK_notification_read_log_user_id');
		});
	}

}
