<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairMehanicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_mehanic', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_id')->index('FK_repair_mehanic_repair_id')->comment('ID заявки на ремонт');
			$table->integer('repair_work_id')->index('FK_repair_mehanic_repair_work_id')->comment('ID вида работ');
			$table->integer('user_id')->comment('ID сотрудника');
			$table->boolean('share')->nullable()->comment('Доля работы (%)');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - неактивен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_mehanic');
	}

}
