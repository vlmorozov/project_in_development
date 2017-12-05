<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFuelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fuel', function(Blueprint $table)
		{
			$table->foreign('nomenclature_id', 'FK_fuel_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fuel', function(Blueprint $table)
		{
			$table->dropForeign('FK_fuel_nomenclature_id');
		});
	}

}
