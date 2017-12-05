<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('object_type')->comment('Тип объекта, над которым совершается действие (название таблицы)');
			$table->integer('object_id')->comment('ID объекта, над которым совершается действие');
			$table->enum('operation_type', array('create','read','update','delete','recovery'))->comment('Тип операции');
			$table->dateTime('operation_date')->index('IDX_log_operation_date')->comment('Дата и время операции');
			$table->integer('user_id')->nullable()->index('IDX_log_user_id')->comment('ID пользователя, совершившего действие');
			$table->text('operation_data', 65535)->nullable()->comment('Данные операции');
			$table->text('current_data', 65535)->nullable()->comment('Текущие данные');
			$table->index(['object_type','object_id'], 'IDX_log_object');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log');
	}

}
