<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairExecutionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_execution', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_id')->index('FK_repair_execution_repair_id')->comment('ID заявки на ремонт');
			$table->integer('create_user_id')->nullable()->index('FK_repair_execution_create_user_id')->comment('ID пользователя, который создал');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->integer('vehicle_id')->index('FK_repair_execution_vehicle_id')->comment('ID ТС');
			$table->string('defect')->nullable()->comment('Неисправность');
			$table->string('operation')->nullable()->comment('Произведенные работы');
			$table->integer('executor_user_id')->nullable()->index('FK_repair_execution_executor_user_id')->comment('ID сотрудника, который осуществлял ремонт');
			$table->dateTime('datetime_start')->nullable()->comment('Дата и время начала ремонта');
			$table->dateTime('datetime_end')->nullable()->comment('Дата и время окончания ремонта');
			$table->integer('duration')->nullable()->comment('Продолжительность ремонта');
			$table->enum('status', array('1','2'))->default('1')->comment('1-активен, 2-неактивен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_execution');
	}

}
