<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationReadLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification_read_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('notification_id')->index('FK_notification_read_log_notification_id')->comment('ID уведомления');
			$table->dateTime('read_date')->comment('Дата просмотра');
			$table->integer('read_user_id')->comment('ID пользователя, который просматривал');
			$table->index(['read_user_id','notification_id'], 'IDX_notification_read_log');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notification_read_log');
	}

}
