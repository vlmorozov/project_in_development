<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTokenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_token', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('create_date')->comment('Время создания ключа');
			$table->integer('user_id')->index('FK_user_token_user_id')->comment('ID пользователя');
			$table->string('code')->unique('UK_user_token_code')->comment('Ключ авторизации');
			$table->dateTime('expiration_date')->comment('Время окончания ключа');
			$table->boolean('is_action')->default(1)->comment('Активный ключ');
			$table->string('device_id')->nullable()->comment('ID устройства (для планшетов)');
			$table->string('gcm_key')->nullable()->comment('Ключ для отправки сообщений (для планшетов)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_token');
	}

}
