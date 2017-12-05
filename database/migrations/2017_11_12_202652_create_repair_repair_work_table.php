<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairRepairWorkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_repair_work', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_id')->index('FK_repair_repair_work_repair_id')->comment('ID заявки на ремонт');
			$table->integer('repair_work_id')->index('FK_repair_repair_work_repair_work_id')->comment('ID вида работ');
			$table->string('percent')->nullable()->comment('% готовности');
			$table->text('note', 65535)->nullable()->comment('Комментарий');
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
		Schema::drop('repair_repair_work');
	}

}
