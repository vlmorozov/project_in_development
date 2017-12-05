<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogMessageGcmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_message_gcm', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('operation_date')->index('IDX_log_message_gcm_operation_date');
			$table->text('gcm_keys', 65535)->nullable()->comment('GCM-ключи');
			$table->text('request', 65535)->nullable()->comment('Запрос');
			$table->text('response', 65535)->nullable()->comment('Ответ');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_message_gcm');
	}

}
