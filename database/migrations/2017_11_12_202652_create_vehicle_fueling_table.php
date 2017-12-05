<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleFuelingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_fueling', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->dateTime('fueling_datetime')->nullable()->comment('Дата и время заправки');
			$table->decimal('detector_volume', 5)->nullable()->comment('Обьем (литров)по показаниям датчика');
			$table->decimal('autoscan_volume', 5)->nullable()->comment('Объем (литров) по автоскану');
			$table->string('card_number', 25)->nullable()->index('FK_vehicle_fueling_card_number')->comment('Номер топливной карты');
			$table->decimal('amount', 7)->nullable()->comment('Оплаченная сумма');
			$table->decimal('lk_volume', 5)->nullable()->comment('Объем из ЛК Газпромнефти');
			$table->integer('lk_transaction_id')->nullable()->comment('ID транзакции из ЛК Газпромнефти');
			$table->integer('status')->nullable();
			$table->integer('trip_id')->nullable()->index('FK_vehicle_fueling_trip_id')->comment('ID Рейса');
			$table->integer('vehicle_id')->nullable()->index('FK_vehicle_fueling_vehicle_id')->comment('ID ТС');
			$table->integer('reason_deviation_id')->nullable()->index('FK_vehicle_fueling_reason_deviation_id');
			$table->dateTime('create_datetime')->nullable();
			$table->string('mark_fuel')->nullable()->comment('Марка топлива');
			$table->decimal('autoscan_volume_corrected', 5)->nullable();
			$table->decimal('lk_volume_corrected', 5)->nullable();
			$table->string('operation_type')->default('buy');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_fueling');
	}

}
