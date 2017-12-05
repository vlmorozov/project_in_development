<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSheetNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sheet_nomenclature', function(Blueprint $table)
		{
			$table->foreign('nomenclature_id', 'FK_sheet_nomenclature_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sheet_id', 'FK_sheet_nomenclature_sheet_id')->references('id')->on('sheet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sheet_nomenclature', function(Blueprint $table)
		{
			$table->dropForeign('FK_sheet_nomenclature_nomenclature_id');
			$table->dropForeign('FK_sheet_nomenclature_sheet_id');
		});
	}

}
