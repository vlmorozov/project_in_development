<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFuelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fuel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('nomenclature_id')->nullable()->index('FK_fuel_nomenclature_id')->comment('ID номенклатуры');
			$table->string('title')->nullable()->comment('Наименование');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fuel');
	}

}
