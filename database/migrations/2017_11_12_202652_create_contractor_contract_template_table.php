<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorContractTemplateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_contract_template', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable()->comment('Название');
			$table->text('body', 65535)->nullable()->comment('Текст шаблона');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - неактивен');
			$table->integer('create_user_id')->index('FK_contractor_contract_template_user_id');
			$table->integer('nomenclature_group_id')->index('FK_contractor_contract_template_nomenclature_group_id');
			$table->dateTime('create_datetime')->nullable();
			$table->integer('file_id')->nullable()->index('FK_contractor_contract_template_uploaded_files_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_contract_template');
	}

}
