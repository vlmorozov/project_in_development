<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageDocumentOutcomeNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_document_outcome_nomenclature', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->integer('storage_document_outcome_id')->nullable()->default(0)->index('FK_storage_document_outcome_nomenclature_document_outcome_id')->comment('ID документа расхода');
			$table->integer('nomenclature_id')->nullable()->default(0)->index('FK_storage_document_outcome_nomenclature_nomenclature_id')->comment('ID номенклатуры');
			$table->decimal('quantity')->nullable()->comment('Количетсво');
			$table->integer('nomenclature_income_id')->nullable()->index('Ind_storage_document_outcome_nomenclature_income_id')->comment('ID прихода номенклатуры');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус');
			$table->decimal('quantity_inv')->nullable()->default(0.00);
			$table->integer('storage_document_nomenclature_id')->nullable()->index('storage_document_nomenclature_id')->comment('ID из строки storage_document_nomenclature к которой принадлежит данное движение товара');
			$table->integer('storage_document_nomenclature_outcome_id')->nullable()->index('sdon_outcome_sdn_FK')->comment('ID c которой происходит движение товара');
			$table->integer('storage_document_nomenclature_income_id')->nullable()->index('sd_outcome_nomenclature_sd_nomenclature_FK')->comment('ID прихода номенклатуры');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_document_outcome_nomenclature');
	}

}
