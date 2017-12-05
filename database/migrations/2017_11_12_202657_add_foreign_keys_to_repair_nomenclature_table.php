<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_nomenclature', function(Blueprint $table)
		{
			$table->foreign('nomenclature_id', 'FK_repair_nomenclature_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_id', 'FK_repair_nomenclature_repair_id')->references('id')->on('repair')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('storage_document_id', 'FK_repair_nomenclature_storage_document_id')->references('id')->on('storage_document')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_nomenclature', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_nomenclature_nomenclature_id');
			$table->dropForeign('FK_repair_nomenclature_repair_id');
			$table->dropForeign('FK_repair_nomenclature_storage_document_id');
		});
	}

}
