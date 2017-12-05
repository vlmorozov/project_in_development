<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStorageIncomeInventoryNumberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage_income_inventory_number', function(Blueprint $table)
		{
			$table->foreign('storage_document_nomenclature_id', 'FK_storage_income_inventory_number_document_nomenclature_id')->references('id')->on('storage_document_nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage_income_inventory_number', function(Blueprint $table)
		{
			$table->dropForeign('FK_storage_income_inventory_number_document_nomenclature_id');
		});
	}

}
