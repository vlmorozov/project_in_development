<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNomenclaturePriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomenclature_price', function(Blueprint $table)
		{
			$table->integer('nomenclature_id')->default(0)->comment('ID номенклатуры');
			$table->integer('type_price_id')->default(0)->comment('ID типа цены');
			$table->decimal('price', 19)->comment('Цена');
			$table->integer('currency_id')->default(1)->comment('ID валюты цены');
			$table->primary(['nomenclature_id','type_price_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nomenclature_price');
	}

}
