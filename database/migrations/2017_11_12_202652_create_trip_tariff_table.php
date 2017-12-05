<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripTariffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_tariff', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->comment('ID рейса');
			$table->integer('client_order_nomenclature_id')->index('FK_trip_tariff_client_order_nomenclature_id')->comment('ID позиции заказа');
			$table->decimal('amount')->default(0.00)->comment('Ставка (руб)');
			$table->unique(['trip_id','client_order_nomenclature_id'], 'UK_trip_tariff_trip_client_order_nomenclature');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_tariff');
	}

}
