<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverContractTemplateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_contract_template', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_driver_contract_template_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'FK_driver_contract_template_uploaded_files_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_driver_contract_template_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_contract_template', function(Blueprint $table)
		{
			$table->dropForeign('FK_driver_contract_template_company_id');
			$table->dropForeign('FK_driver_contract_template_uploaded_files_id');
			$table->dropForeign('FK_driver_contract_template_user_id');
		});
	}

}
