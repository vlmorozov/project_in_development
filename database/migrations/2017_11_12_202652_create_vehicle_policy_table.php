<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclePolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_policy', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->index('FK_vehicle_policy_vehicle_id')->comment('ID тс');
			$table->integer('insurance_type_id')->index('FK_vehicle_policy_insurance_type_id')->comment('ID типа страхования');
			$table->string('policy_series')->nullable()->comment('Серия полиса');
			$table->string('policy_number')->nullable()->comment('Номер полиса');
			$table->date('policy_date')->nullable()->comment('Дата полиса');
			$table->date('insurance_date_start')->nullable()->comment('Дата начала страхования');
			$table->date('insurance_date_expiry')->nullable()->comment('Дата окончания страхования');
			$table->decimal('insurance_amount', 10)->nullable()->comment('Сумма страхования');
			$table->integer('insurance_currency_id')->nullable()->index('FK_vehicle_policy_currency_id')->comment('Валюта страхования');
			$table->integer('insurer_id')->nullable()->index('FK_vehicle_policy_contractor_id')->comment('ID страховщика (контрагента)');
			$table->integer('scan_file_id')->nullable()->index('FK_vehicle_policy_file_id')->comment('ID файла скана');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
			$table->date('inspection_date_expiry')->nullable()->comment('Строк действия техосмотра');
			$table->string('extension')->nullable()->comment('Расширение полиса');
			$table->dateTime('create_datetime')->nullable()->comment('Дата создания полиса страхования');
			$table->integer('create_user_id')->nullable()->comment('Создатель полиса страхования');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_policy');
	}

}
