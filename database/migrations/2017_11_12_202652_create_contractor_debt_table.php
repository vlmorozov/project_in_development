<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorDebtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_debt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->index('FK_contractor_debt_contractor_id')->comment('ID контрагента');
			$table->integer('trip_point_id')->index('FK_contractor_debt_trip_point_id')->comment('ID точки рейса');
			$table->enum('type', array('trip_point_done','trip_point_downtime'))->comment('Тип списания');
			$table->decimal('volume')->comment('Объем за, который произошло списание');
			$table->decimal('amount')->comment('Сумма списания');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
			$table->date('debt_date')->nullable()->comment('Дата списания');
			$table->enum('contractor_type', array('client','supplier'))->default('client')->comment('Тип платежа (от клиента, поставщику)');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->unique(['trip_point_id','type'], 'UK_contractor_debt');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_debt');
	}

}
