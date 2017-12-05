<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStorageDocumentNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage_document_nomenclature', function(Blueprint $table)
		{
			$table->foreign('nomenclature_id', 'FK_repair_storage_income_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('storage_document_id', 'FK_storage_document_nomenclature_storage_document_income')->references('id')->on('storage_document')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage_document_nomenclature', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_storage_income_nomenclature_id');
			$table->dropForeign('FK_storage_document_nomenclature_storage_document_income');
		});
	}

}
