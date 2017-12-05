<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorStartDebtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_start_debt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->index('FK_contractor_start_debt_contractor_id')->comment('ID контрагента');
			$table->decimal('amount', 19)->comment('Сумма');
			$table->date('action_date')->nullable()->comment('Дата начала действия остатка');
			$table->integer('currency_id')->default(1)->index('FK_contractor_start_debt_currency_id')->comment('Валюта');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->integer('create_user_id')->index('FK_contractor_start_debt_user_id')->comment('ID пользователя, который создал');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
			$table->decimal('supplier_amount', 19)->nullable()->comment('Долг/Аванс поставщику');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_start_debt');
	}

}
