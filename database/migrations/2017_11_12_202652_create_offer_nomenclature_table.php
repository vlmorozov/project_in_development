<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfferNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_nomenclature', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('offer_id')->comment('ID ком. пред.');
			$table->integer('nomenclature_id')->comment('ID номенклатуры');
			$table->string('volume')->nullable()->comment('Кол-во');
			$table->decimal('price', 19)->nullable()->comment('Цена');
			$table->integer('distance')->nullable()->comment('Расстояние (км)');
			$table->integer('duration')->nullable()->comment('Время маршрута (мин)');
			$table->decimal('contractor_price', 19)->nullable()->comment('Цена поставщика');
			$table->decimal('cost_price', 19)->nullable()->comment('Себестоимость');
			$table->integer('point_from_contractor_delivery_id')->nullable()->comment('Точка откуда. ID точки контрагента');
			$table->string('point_from_address')->nullable()->comment('Точка откуда. Адрес');
			$table->string('point_from_lat')->nullable()->comment('Точка откуда. Широта (по яндексу)');
			$table->string('point_from_lng')->nullable()->comment('Точка откуда. Долгота (по яндексу)');
			$table->integer('point_to_contractor_delivery_id')->nullable()->comment('Точка куда. ID точки контрагента');
			$table->string('point_to_address')->nullable()->comment('Точка куда. Адрес');
			$table->string('point_to_lat')->nullable()->comment('Точка куда. Широта (по яндексу)');
			$table->string('point_to_lng')->nullable()->comment('Точка куда. Долгота (по яндексу)');
			$table->enum('status', array('1','2'))->default('1');
			$table->text('points_of_route', 65535)->nullable()->comment('Промежуточные точки маршрута');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offer_nomenclature');
	}

}
