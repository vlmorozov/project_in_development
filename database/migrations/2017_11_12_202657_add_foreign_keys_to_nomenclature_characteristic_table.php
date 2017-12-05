<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNomenclatureCharacteristicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nomenclature_characteristic', function(Blueprint $table)
		{
			$table->foreign('characteristic_id', 'FK_nomenclature_characteristic_characteristic_id')->references('id')->on('characteristic')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('nomenclature_id', 'FK_nomenclature_characteristic_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nomenclature_characteristic', function(Blueprint $table)
		{
			$table->dropForeign('FK_nomenclature_characteristic_characteristic_id');
			$table->dropForeign('FK_nomenclature_characteristic_nomenclature_id');
		});
	}

}
