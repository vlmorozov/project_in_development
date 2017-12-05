<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportUserEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_user_event', function(Blueprint $table)
		{
			$table->integer('object_id')->default(0)->comment('ID объекта');
			$table->string('object_type')->default('')->comment('Тип объекта');
			$table->string('type')->nullable()->comment('Событие');
			$table->date('create_date')->nullable()->comment('Дата события');
			$table->integer('user_id')->nullable()->comment('ID пользователя');
			$table->string('user_name')->nullable()->comment('Имя пользователя');
			$table->primary(['object_id','object_type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('report_user_event');
	}

}
