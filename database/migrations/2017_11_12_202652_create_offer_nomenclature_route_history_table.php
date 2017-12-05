<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfferNomenclatureRouteHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_nomenclature_route_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('object_id')->comment('ID номенклатуры КП');
			$table->dateTime('create_datetime')->comment('Время изменения');
			$table->integer('create_user_id')->comment('ID пользователя, внесшего изменения');
			$table->integer('distance')->nullable()->comment('Расстояние (км)');
			$table->integer('duration')->nullable()->comment('Время маршрута (мин)');
			$table->string('point_from_address')->nullable()->comment('Точка откуда. Адрес');
			$table->string('point_from_lat', 10)->nullable()->comment('Точка откуда. Широта (по яндексу)');
			$table->string('point_from_lng', 10)->nullable()->comment('Точка откуда. Долгота (по яндексу)');
			$table->string('point_to_address')->nullable()->comment('Точка куда. Адрес');
			$table->string('point_to_lat', 10)->nullable()->comment('Точка куда. Широта (по яндексу)');
			$table->string('point_to_lng', 10)->nullable()->comment('Точка куда. Долгота (по яндексу)');
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
		Schema::drop('offer_nomenclature_route_history');
	}

}
