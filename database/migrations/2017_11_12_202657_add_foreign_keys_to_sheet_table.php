<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sheet', function(Blueprint $table)
		{
			$table->foreign('client_order_id', 'FK_sheet_client_order_id')->references('id')->on('client_order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('company_id', 'FK_sheet_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('company_requisite_id', 'FK_sheet_company_requisites_id')->references('id')->on('company_requisites')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_contract_id', 'FK_sheet_contractor_contract_id')->references('id')->on('contractor_contract')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_delivery_id', 'FK_sheet_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_sheet_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('currency_id', 'FK_sheet_currency_id')->references('id')->on('currency')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('document_id', 'FK_sheet_document_id')->references('id')->on('document')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_sheet_sheet_state_name')->references('name')->on('sheet_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sheet_type_id', 'FK_sheet_sheet_type_id')->references('id')->on('sheet_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_sheet_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sheet', function(Blueprint $table)
		{
			$table->dropForeign('FK_sheet_client_order_id');
			$table->dropForeign('FK_sheet_company_id');
			$table->dropForeign('FK_sheet_company_requisites_id');
			$table->dropForeign('FK_sheet_contractor_contract_id');
			$table->dropForeign('FK_sheet_contractor_delivery_id');
			$table->dropForeign('FK_sheet_contractor_id');
			$table->dropForeign('FK_sheet_currency_id');
			$table->dropForeign('FK_sheet_document_id');
			$table->dropForeign('FK_sheet_sheet_state_name');
			$table->dropForeign('FK_sheet_sheet_type_id');
			$table->dropForeign('FK_sheet_user_id');
		});
	}

}
