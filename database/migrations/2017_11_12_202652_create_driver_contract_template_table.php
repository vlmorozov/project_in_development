<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverContractTemplateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_contract_template', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Название');
			$table->date('action_date_from')->nullable()->comment('Период действия - с');
			$table->date('action_date_to')->nullable()->comment('Период действия - по');
			$table->integer('company_id')->nullable()->index('FK_driver_contract_template_company_id')->comment('ID организации');
			$table->text('body')->nullable()->comment('Текст шаблона');
			$table->integer('file_id')->nullable()->index('FK_driver_contract_template_uploaded_files_id')->comment('ID файла шаблона');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
			$table->dateTime('create_datetime')->nullable();
			$table->integer('create_user_id')->index('FK_driver_contract_template_user_id')->comment('ID пользователя, который создал');
			$table->enum('type', array('with_driver','without_driver'))->nullable()->default('with_driver')->comment('Тип договора');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_contract_template');
	}

}
