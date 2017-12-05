<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientOrderNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('client_order_nomenclature', function(Blueprint $table)
		{
			$table->foreign('client_order_id', 'FK_client_order_nomenclature_client_order_id')->references('id')->on('client_order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_delivery_id', 'FK_client_order_nomenclature_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('nomenclature_id', 'FK_client_order_nomenclature_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('point_from_contractor_delivery_id', 'FK_client_order_nomenclature_point_from_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('point_to_contractor_delivery_id', 'FK_client_order_nomenclature_point_to_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('takeaway_shift_id', 'FK_client_order_nomenclature_shift_id')->references('id')->on('shift')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('unit_id', 'FK_client_order_nomenclature_unit_id')->references('id')->on('unit')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('client_order_nomenclature', function(Blueprint $table)
		{
			$table->dropForeign('FK_client_order_nomenclature_client_order_id');
			$table->dropForeign('FK_client_order_nomenclature_contractor_delivery_id');
			$table->dropForeign('FK_client_order_nomenclature_nomenclature_id');
			$table->dropForeign('FK_client_order_nomenclature_point_from_contractor_delivery_id');
			$table->dropForeign('FK_client_order_nomenclature_point_to_contractor_delivery_id');
			$table->dropForeign('FK_client_order_nomenclature_shift_id');
			$table->dropForeign('FK_client_order_nomenclature_unit_id');
		});
	}

}
