<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogErrorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_error', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('create_datetime')->index('IDX_log_error_create_datetime')->comment('Дата и время ошибки');
			$table->string('level')->nullable()->comment('Уровень ошибки');
			$table->text('message', 65535)->nullable()->comment('Сообщение exception');
			$table->string('request_uri')->nullable()->comment('URL запроса');
			$table->string('request_method')->nullable()->comment('Метод запроса');
			$table->integer('user_id')->nullable()->comment('ID пользователя, у которого произошла ошибка');
			$table->dateTime('accept_datetime')->nullable()->comment('Дата и время принятия в работу');
			$table->dateTime('mend_datetime')->nullable()->comment('Дата и время исправления');
			$table->boolean('is_send')->default(0)->comment('Было отправлено');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_error');
	}

}
