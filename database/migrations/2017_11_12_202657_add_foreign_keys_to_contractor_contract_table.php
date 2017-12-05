<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorContractTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_contract', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_contractor_contract_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contract_id', 'FK_contractor_contract_contractor_contract_id')->references('id')->on('contractor_contract')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_contractor_contract_contractor_contract_state_name')->references('name')->on('contractor_contract_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('template_id', 'FK_contractor_contract_contractor_contract_template_id')->references('id')->on('contractor_contract_template')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_delivery_id', 'FK_contractor_contract_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_contractor_contract_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('document_file_id', 'FK_contractor_contract_document_file_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('nomenclature_id', 'FK_contractor_contract_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('type_payment_id', 'FK_contractor_contract_payment_type_id')->references('id')->on('payment_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_contractor_contract_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_contract', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_contract_company_id');
			$table->dropForeign('FK_contractor_contract_contractor_contract_id');
			$table->dropForeign('FK_contractor_contract_contractor_contract_state_name');
			$table->dropForeign('FK_contractor_contract_contractor_contract_template_id');
			$table->dropForeign('FK_contractor_contract_contractor_delivery_id');
			$table->dropForeign('FK_contractor_contract_contractor_id');
			$table->dropForeign('FK_contractor_contract_document_file_id');
			$table->dropForeign('FK_contractor_contract_nomenclature_id');
			$table->dropForeign('FK_contractor_contract_payment_type_id');
			$table->dropForeign('FK_contractor_contract_user_id');
		});
	}

}
