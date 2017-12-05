<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorRequisiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_requisite', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->nullable()->index('FK_contractor_requisite_contractor_id')->comment('ID контрагента');
			$table->string('title')->nullable()->comment('название счета');
			$table->string('number')->nullable()->comment('номер счета');
			$table->string('bank_title')->nullable()->comment('название банка');
			$table->string('bank_bik')->nullable()->comment('бик банка');
			$table->string('bank_ks')->nullable()->comment('корр. счет банка');
			$table->integer('currency_id')->nullable()->index('FK_contractor_requisite_currency_id')->comment('id валюты');
			$table->string('bank2_title')->nullable()->comment('название банка (для непрямых расчетов)');
			$table->string('bank2_bik')->nullable()->comment('бик банка (для непрямых расчетов)');
			$table->string('bank2_ks')->nullable()->comment('корр. счет банка (для непрямых расчетов)');
			$table->string('payer')->nullable()->comment('плательщик');
			$table->string('type')->nullable()->comment('Вид счета (1 - р/с, 2 - иной)');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_requisite');
	}

}
