<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairWorkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_work', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_work_group_id')->index('FK_repair_work_repair_work_group_id')->comment('ID группы');
			$table->string('title')->comment('Название');
			$table->float('work_time', 10, 0)->nullable()->comment('Кол-во нормачасов');
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
		Schema::drop('repair_work');
	}

}
