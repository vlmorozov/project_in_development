<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairPlaceSectorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_place_sector', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_place_id')->index('FK_repair_place_sector_repair_place_id')->comment('ID ремзоны');
			$table->string('name', 50)->comment('Название');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_place_sector');
	}

}
