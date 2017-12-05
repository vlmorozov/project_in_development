<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_state', function(Blueprint $table)
		{
			$table->string('name')->primary();
			$table->string('title');
			$table->integer('sort');
			$table->string('color', 6)->nullable()->comment('Цвет в графике (#rgb)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_state');
	}

}
