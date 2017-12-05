<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNomenclatureSupplierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nomenclature_supplier', function(Blueprint $table)
		{
			$table->foreign('contractor_delivery_id', 'FK_nomenclature_supplier_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('currency_id', 'FK_nomenclature_supplier_currency_id')->references('id')->on('currency')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('nomenclature_id', 'FK_nomenclature_supplier_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('unit_id', 'FK_nomenclature_supplier_unit_id')->references('id')->on('unit')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_nomenclature_supplier_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nomenclature_supplier', function(Blueprint $table)
		{
			$table->dropForeign('FK_nomenclature_supplier_contractor_delivery_id');
			$table->dropForeign('FK_nomenclature_supplier_currency_id');
			$table->dropForeign('FK_nomenclature_supplier_nomenclature_id');
			$table->dropForeign('FK_nomenclature_supplier_unit_id');
			$table->dropForeign('FK_nomenclature_supplier_user_id');
		});
	}

}
