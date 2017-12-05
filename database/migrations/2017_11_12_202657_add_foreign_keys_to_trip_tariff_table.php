<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripTariffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_tariff', function(Blueprint $table)
		{
			$table->foreign('client_order_nomenclature_id', 'FK_trip_tariff_client_order_nomenclature_id')->references('id')->on('client_order_nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_id', 'FK_trip_tariff_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_tariff', function(Blueprint $table)
		{
			$table->dropForeign('FK_trip_tariff_client_order_nomenclature_id');
			$table->dropForeign('FK_trip_tariff_trip_id');
		});
	}

}
