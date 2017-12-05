<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairWorkGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_work_group', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Название');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - неактивен');
			$table->decimal('coefficient', 4);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_work_group');
	}

}
