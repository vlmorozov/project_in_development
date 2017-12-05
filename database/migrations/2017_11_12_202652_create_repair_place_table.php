<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairPlaceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_place', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->index('FK_repair_place_contractor_id')->comment('ID контрагента');
			$table->integer('contractor_delivery_id')->index('FK_repair_place_contractor_delivery_id')->comment('ID точки контрагента');
			$table->string('title')->comment('Название');
			$table->enum('type', array('собственная','сторонняя'))->comment('Вид');
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
		Schema::drop('repair_place');
	}

}
