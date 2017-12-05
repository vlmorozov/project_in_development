<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogSmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_sms', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('phones')->comment('Телефоны');
			$table->string('message')->comment('Сообщение');
			$table->dateTime('send_datetime')->comment('Дата отправки');
			$table->string('response')->nullable()->comment('Ответ сервера отправки смс');
			$table->string('result')->nullable()->comment('Результат отправки');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_sms');
	}

}
