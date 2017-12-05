<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientOrderNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_order_nomenclature', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('client_order_id')->comment('ID заказа клиента');
			$table->integer('nomenclature_id')->index('FK_client_order_nomenclature_nomenclature_id')->comment('ID номенклатуры');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_client_order_nomenclature_contractor_delivery_id')->comment('ID точки загрузки');
			$table->integer('unit_id')->nullable()->index('FK_client_order_nomenclature_unit_id')->comment('ID ед. изм.');
			$table->decimal('volume', 19)->nullable()->comment('кол-во');
			$table->decimal('price', 19)->nullable()->comment('цена');
			$table->enum('status', array('1','2'))->default('1');
			$table->dateTime('create_date')->nullable();
			$table->float('point_from_lat', 9, 6)->nullable()->comment('Точка откуда. Широта (по яндексу)');
			$table->float('point_from_lng', 9, 6)->nullable()->comment('Точка откуда. Долгота (по яндексу)');
			$table->string('point_from_address')->nullable()->comment('Точка откуда. Адрес');
			$table->integer('point_from_contractor_delivery_id')->nullable()->index('FK_client_order_nomenclature_point_from_contractor_delivery_id')->comment('Точка откуда. ID точки контрагента');
			$table->float('point_to_lat', 9, 6)->nullable()->comment('Точка куда. Широта (по яндексу)');
			$table->float('point_to_lng', 9, 6)->nullable()->comment('Точка куда. Долгота (по яндексу)');
			$table->string('point_to_address')->nullable()->comment('Точка куда. Адрес');
			$table->integer('point_to_contractor_delivery_id')->nullable()->index('FK_client_order_nomenclature_point_to_contractor_delivery_id')->comment('Точка куда. ID точки контрагента');
			$table->decimal('contractor_price', 19)->nullable()->comment('Цена поставщика');
			$table->integer('contractor_currency_id')->nullable()->comment('ID валюты поставщика');
			$table->integer('distance')->nullable()->comment('Расстояние между точкой загрузки и точкой выгрузки (км)');
			$table->integer('duration')->nullable()->comment('Время маршрута (мин)');
			$table->integer('count_vehicles')->nullable()->comment('Кол-во ТС');
			$table->text('note', 65535)->nullable()->comment('Комментарий водителю');
			$table->decimal('tariff_driver')->default(0.00)->comment('Тариф для водителя');
			$table->string('work_type')->nullable()->comment('Виды работ (только для контейнеров)');
			$table->boolean('replacing')->nullable()->comment('Установка контейнера с заменой');
			$table->date('takeaway_date')->nullable()->comment('Дата вывоза (для конейнеров)');
			$table->string('takeaway_time')->nullable()->comment('Время вывоза (для конейнеров)');
			$table->integer('takeaway_shift_id')->nullable()->index('FK_client_order_nomenclature_shift_id')->comment('Смена вывоза (для контейнеров)');
			$table->integer('takeaway_days')->nullable()->comment('Кол-во дней простоя');
			$table->text('takeaway_note', 65535)->nullable()->comment('Комментарий к вывозу (для контейнеров)');
			$table->decimal('cost_price', 19)->nullable()->comment('Себестоимость');
			$table->decimal('old_cost_price', 19)->nullable()->comment('Дублирование  значкения себестоимости перед перерасчетом');
			$table->text('points_of_route', 65535)->nullable()->comment('Промежуточные точки маршрута');
			$table->index(['client_order_id','nomenclature_id'], 'IDX_client_order_nomenclature');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client_order_nomenclature');
	}

}
