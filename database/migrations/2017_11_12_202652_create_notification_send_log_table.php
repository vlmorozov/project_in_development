<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationSendLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification_send_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('notification_id')->index('FK_notification_send_log_notification_id')->comment('ID уведомления');
			$table->dateTime('send_date')->comment('Дата отправки');
			$table->string('send_type')->comment('Тип отправки');
			$table->string('send_address')->comment('Адрес отправки уведомления');
			$table->boolean('success')->comment('Флаг успешной отправки уведомления');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notification_send_log');
	}

}
