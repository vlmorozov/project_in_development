<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportUseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_use', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->integer('create_user_id')->comment('ID пользователя, который создал');
			$table->string('report_title')->comment('Название отчета');
			$table->text('report_params', 65535)->nullable()->comment('Параметры отчета');
			$table->string('report_type')->nullable()->comment('Тип отчета (html, excel)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('report_use');
	}

}
