<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment', function(Blueprint $table)
		{
			$table->foreign('client_order_id', 'FK_payment_client_order_id')->references('id')->on('client_order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('company_id', 'FK_payment_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_contract_id', 'FK_payment_contractor_contract_id')->references('id')->on('contractor_contract')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_payment_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('nomenclature_id', 'FK_payment_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sheet_id', 'FK_payment_sheet_id')->references('id')->on('sheet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sheet_type_id', 'FK_payment_sheet_type_id')->references('id')->on('sheet_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_id', 'FK_payment_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment', function(Blueprint $table)
		{
			$table->dropForeign('FK_payment_client_order_id');
			$table->dropForeign('FK_payment_company_id');
			$table->dropForeign('FK_payment_contractor_contract_id');
			$table->dropForeign('FK_payment_contractor_id');
			$table->dropForeign('FK_payment_nomenclature_id');
			$table->dropForeign('FK_payment_sheet_id');
			$table->dropForeign('FK_payment_sheet_type_id');
			$table->dropForeign('FK_payment_trip_id');
		});
	}

}
