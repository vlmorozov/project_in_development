<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageDocumentNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_document_nomenclature', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID товара на складе');
			$table->integer('storage_document_id')->index('FK_storage_document_nomenclature_storage_document_income')->comment('ID документа прихода');
			$table->integer('nomenclature_id')->index('FK_repair_storage_income_nomenclature_id')->comment('ID номенклатуры');
			$table->integer('storage_document_nomenclature_id')->nullable()->index('storage_document_nomenclature_id')->comment('ID строки прихода номенклатуры');
			$table->decimal('quantity_inv')->nullable()->comment('Количество (инвойсное)');
			$table->decimal('quantity')->nullable()->comment('Количество');
			$table->decimal('quantity_in_stock')->nullable()->comment('Количество на складе');
			$table->float('price', 10, 0)->nullable()->comment('Цена');
			$table->boolean('used')->default(0)->comment('б/у');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус');
			$table->string('reason_cancellation')->nullable();
			$table->boolean('not_match')->nullable()->default(0);
			$table->decimal('sum_fact')->nullable();
			$table->string('temporary_title')->nullable()->comment('Временное название');
			$table->string('inventory_number')->nullable()->comment('Инвентарный номер');
			$table->decimal('old_price')->nullable()->comment('Цена первичного прихода');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_document_nomenclature');
	}

}
