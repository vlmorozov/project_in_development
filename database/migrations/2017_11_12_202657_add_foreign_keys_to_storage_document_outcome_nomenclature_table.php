<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStorageDocumentOutcomeNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage_document_outcome_nomenclature', function(Blueprint $table)
		{
			$table->foreign('storage_document_nomenclature_income_id', 'sd_outcome_nomenclature_sd_nomenclature_FK')->references('id')->on('storage_document_nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('storage_document_nomenclature_outcome_id', 'sdon_outcome_sdn_FK')->references('id')->on('storage_document_nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage_document_outcome_nomenclature', function(Blueprint $table)
		{
			$table->dropForeign('sd_outcome_nomenclature_sd_nomenclature_FK');
			$table->dropForeign('sdon_outcome_sdn_FK');
		});
	}

}
