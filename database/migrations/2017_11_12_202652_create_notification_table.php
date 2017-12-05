<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Заголовок');
			$table->text('content', 65535)->nullable()->comment('Содержание');
			$table->integer('user_id')->index('FK_notification_user_id')->comment('ID пользователя, которому адресовано');
			$table->dateTime('create_date')->comment('Дата и время создания сообщения');
			$table->integer('create_user_id')->nullable()->index('FK_notification_create_user_id')->comment('ID пользователя, создавшего сообщение');
			$table->enum('status', array('1','2'))->nullable()->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notification');
	}

}
