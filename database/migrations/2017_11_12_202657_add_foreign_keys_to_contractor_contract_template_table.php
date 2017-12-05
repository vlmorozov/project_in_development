<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorContractTemplateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_contract_template', function(Blueprint $table)
		{
			$table->foreign('nomenclature_group_id', 'FK_contractor_contract_template_nomenclature_group_id')->references('id')->on('nomenclature_group')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'FK_contractor_contract_template_uploaded_files_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_contractor_contract_template_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_contract_template', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_contract_template_nomenclature_group_id');
			$table->dropForeign('FK_contractor_contract_template_uploaded_files_id');
			$table->dropForeign('FK_contractor_contract_template_user_id');
		});
	}

}
