<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogImportExportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_import_export', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('operation_date')->nullable()->index('IDX_log_import_export_operation_date')->comment('Дата операции');
			$table->string('type')->nullable()->comment('Система с которой идет обмен и вид операции');
			$table->text('message')->nullable()->comment('Текст сообщения');
			$table->text('operation_data')->nullable()->comment('Структурированные данные');
			$table->string('note')->nullable()->comment('Комментарий');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_import_export');
	}

}
