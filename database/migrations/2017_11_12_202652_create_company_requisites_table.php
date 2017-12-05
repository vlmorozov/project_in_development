<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyRequisitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_requisites', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_id')->nullable()->index('FK_company_requisites_company_id')->comment('ID организации');
			$table->string('title')->nullable()->comment('название счета');
			$table->string('number')->nullable()->comment('номер счета');
			$table->string('bank_title')->nullable()->comment('название банка');
			$table->string('bank_bik')->nullable()->comment('бик банка');
			$table->string('bank_ks')->nullable()->comment('корр. счет банка');
			$table->integer('currency_id')->nullable()->index('FK_company_requisites_currency_id')->comment('ID валюты');
			$table->string('payer')->nullable()->comment('Плательщик');
			$table->enum('type', array('1','2'))->nullable()->comment('Вид счета (1 - р/с, 2 - иной)');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->date('date_from')->comment('Дата с');
			$table->date('date_to')->nullable()->comment('Дата по');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_requisites');
	}

}
