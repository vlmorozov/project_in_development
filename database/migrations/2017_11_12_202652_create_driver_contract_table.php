<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverContractTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_contract', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->index('FK_driver_contract_vehicle_id')->comment('ID ТС');
			$table->integer('driver_id')->nullable()->index('FK_driver_contract_driver_id')->comment('ID водителя');
			$table->integer('company_id')->index('FK_driver_contract_company_id')->comment('ID компании');
			$table->integer('template_id')->index('FK_driver_contract_driver_contract_template_id')->comment('ID шаблона');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
			$table->date('action_date_from')->comment('Период действия - с');
			$table->date('action_date_to')->comment('Период действия - по');
			$table->integer('create_user_id')->index('FK_driver_contract_user_id')->comment('ID пользователя, который создал');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->integer('file_id')->nullable()->index('FK_driver_contract_uploaded_files_id')->comment('ID файла договора');
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
		Schema::drop('driver_contract');
	}

}
