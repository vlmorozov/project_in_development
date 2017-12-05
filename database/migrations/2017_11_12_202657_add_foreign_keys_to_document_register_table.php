<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDocumentRegisterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('document_register', function(Blueprint $table)
		{
			$table->foreign('client_order_id', 'FK_document_register_client_order_id')->references('id')->on('client_order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_contract_id', 'FK_document_register_contractor_contract_id')->references('id')->on('contractor_contract')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_delivery_id', 'FK_document_register_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_document_register_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_document_register_document_register_state_name')->references('name')->on('document_register_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('nomenclature_id', 'FK_document_register_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('shift_id', 'FK_document_register_shift_id')->references('id')->on('shift')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('unloading_contractor_delivery_id', 'FK_document_register_unloading_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'FK_document_register_uploaded_files_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_document_register_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('document_register', function(Blueprint $table)
		{
			$table->dropForeign('FK_document_register_client_order_id');
			$table->dropForeign('FK_document_register_contractor_contract_id');
			$table->dropForeign('FK_document_register_contractor_delivery_id');
			$table->dropForeign('FK_document_register_contractor_id');
			$table->dropForeign('FK_document_register_document_register_state_name');
			$table->dropForeign('FK_document_register_nomenclature_id');
			$table->dropForeign('FK_document_register_shift_id');
			$table->dropForeign('FK_document_register_unloading_contractor_delivery_id');
			$table->dropForeign('FK_document_register_uploaded_files_id');
			$table->dropForeign('FK_document_register_user_id');
		});
	}

}
