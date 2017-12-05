<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrencyRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currency_rate', function(Blueprint $table)
		{
			$table->integer('num')->comment('числовой код валюты');
			$table->date('cdate')->comment('дата');
			$table->string('code')->comment('символьный код валюты');
			$table->float('rate', 10, 4)->comment('значение курса');
			$table->integer('nom')->comment('номинал');
			$table->primary(['num','cdate']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('currency_rate');
	}

}
