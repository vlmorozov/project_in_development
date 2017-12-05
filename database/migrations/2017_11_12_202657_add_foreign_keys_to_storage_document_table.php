<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStorageDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage_document', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'FK_storage_document_driver_id')->references('id')->on('driver')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('in_storage_id', 'FK_storage_document_in_storage_id')->references('id')->on('storage')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('in_vehicle_id', 'FK_storage_document_in_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('company_id', 'FK_storage_document_income_company')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_storage_document_income_contractor')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_contract_id', 'FK_storage_document_income_contractor_contract')->references('id')->on('contractor_contract')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('storage_id', 'FK_storage_document_income_storage')->references('id')->on('storage')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_storage_document_income_user')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('out_storage_id', 'FK_storage_document_out_storage_id')->references('id')->on('storage')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('out_vehicle_id', 'FK_storage_document_out_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('printed_user_id', 'FK_storage_document_printed_user')->references('id')->on('user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('repair_id', 'FK_storage_document_repair_id')->references('id')->on('repair')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_place_id', 'FK_storage_document_repair_place_id')->references('id')->on('repair_place')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('vehicle_id', 'FK_storage_document_vehicle_id')->references('id')->on('vehicle')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage_document', function(Blueprint $table)
		{
			$table->dropForeign('FK_storage_document_driver_id');
			$table->dropForeign('FK_storage_document_in_storage_id');
			$table->dropForeign('FK_storage_document_in_vehicle_id');
			$table->dropForeign('FK_storage_document_income_company');
			$table->dropForeign('FK_storage_document_income_contractor');
			$table->dropForeign('FK_storage_document_income_contractor_contract');
			$table->dropForeign('FK_storage_document_income_storage');
			$table->dropForeign('FK_storage_document_income_user');
			$table->dropForeign('FK_storage_document_out_storage_id');
			$table->dropForeign('FK_storage_document_out_vehicle_id');
			$table->dropForeign('FK_storage_document_printed_user');
			$table->dropForeign('FK_storage_document_repair_id');
			$table->dropForeign('FK_storage_document_repair_place_id');
			$table->dropForeign('FK_storage_document_vehicle_id');
		});
	}

}
