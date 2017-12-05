<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNomenclaturePriceHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomenclature_price_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('nomenclature_id')->comment('ID номенклатуры');
			$table->integer('type_price_id')->comment('ID типа цены');
			$table->decimal('price', 19)->comment('Цена');
			$table->integer('currency_id')->default(1)->comment('ID валюты цены');
			$table->dateTime('change_date')->comment('Дата и время изменения записи');
			$table->integer('change_user_id')->comment('ID пользователя, изменившего запись');
			$table->index(['nomenclature_id','type_price_id'], 'IDX_h_nomenclature_price');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nomenclature_price_history');
	}

}
