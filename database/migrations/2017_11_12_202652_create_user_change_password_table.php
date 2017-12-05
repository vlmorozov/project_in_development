<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserChangePasswordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_change_password', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('FK_user_change_password_user_id')->comment('ID пользователя');
			$table->dateTime('create_datetime')->comment('Дата и время изменения');
			$table->string('password')->comment('Хэш пароля');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_change_password');
	}

}
