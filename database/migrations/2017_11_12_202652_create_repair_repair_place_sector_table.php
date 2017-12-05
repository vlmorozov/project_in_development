<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairRepairPlaceSectorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_repair_place_sector', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_id')->index('FK_repair_repair_place_sector_repair_id')->comment('ID заявки на ремонт');
			$table->integer('repair_place_sector_id')->index('FK_repair_repair_place_sector_repair_place_sector_id')->comment('ID места ремонта');
			$table->integer('repair_work_id')->nullable()->index('FK_repair_repair_place_sector_repair_work_id')->comment('ID вида работ');
			$table->dateTime('start_datetime')->nullable()->comment('Дата и время начала работ');
			$table->dateTime('end_datetime')->nullable()->comment('Дата и время окончания работ');
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
		Schema::drop('repair_repair_place_sector');
	}

}
