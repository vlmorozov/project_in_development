<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogMobileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_mobile', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->index('IDX_log_mobile_user_id')->comment('ID пользователя');
			$table->string('device_id')->nullable()->comment('Идентификатор устройства');
			$table->string('operation_type')->index('IDX_log_mobile_operation_type')->comment('Тип операции');
			$table->dateTime('operation_date')->index('IDX_log_mobile_operation_datetime')->comment('Дата операции');
			$table->text('request')->nullable()->comment('Запрос');
			$table->text('response')->nullable()->comment('Ответ');
			$table->index(['user_id','operation_type'], 'IDX_log_mobile_user_operation');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_mobile');
	}

}
