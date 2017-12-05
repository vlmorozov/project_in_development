<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripPointTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_point', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->index('FK_trip_point_trip_id')->comment('ID маршрута');
			$table->float('n', 4, 1)->nullable()->comment('Порядок сортировки внутри маршрута');
			$table->integer('primary_trip_point_id')->nullable()->index('FK_trip_point_primary_trip_point_id')->comment('ID основной точки (для прицепов)');
			$table->integer('loading_trip_point_id')->nullable()->index('IDX_trip_point_loading_trip_point_id')->comment('ID точки загрузки (только для точек выгрузки)');
			$table->integer('client_order_nomenclature_id')->nullable()->index('FK_trip_point_client_order_nomenclature_id')->comment('ID позиции заказа');
			$table->decimal('volume')->nullable()->comment('Кол-во единиц номенклатуры');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_trip_point_contractor_delivery_id')->comment('ID точки контрагента');
			$table->integer('parking_id')->nullable()->index('FK_trip_point_parking_id')->comment('ID парковки');
			$table->string('address')->nullable()->comment('Адрес точки');
			$table->dateTime('arrival')->nullable()->comment('Время прибытия');
			$table->string('lat')->nullable()->comment('Широта (по яндексу)');
			$table->string('lng')->nullable()->comment('Долгота (по яндексу)');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
			$table->string('type')->nullable()->index('FK_trip_point_trip_point_type_name')->comment('Тип точки');
			$table->dateTime('datetime_arrival')->nullable()->comment('Время прибытия');
			$table->dateTime('datetime_departure')->nullable()->comment('Время отправления');
			$table->string('state')->nullable()->index('FK_trip_point_trip_point_state_name')->comment('Состояние');
			$table->dateTime('datetime_arrival_fact')->nullable()->comment('Время прибытия (факт)');
			$table->dateTime('datetime_departure_fact')->nullable()->comment('Время отправления (факт)');
			$table->decimal('volume_fact')->nullable()->default(0.00)->comment('Кол-во единиц номенклатуры (факт)');
			$table->decimal('volume_fict')->nullable()->default(0.00)->comment('Кол-во единиц номенклатуры (ручное добавление)');
			$table->integer('downtime')->default(0)->comment('Время простоя (мин)');
			$table->boolean('is_fict')->default(0)->comment('Фиктивная точка');
			$table->boolean('is_confirm')->default(0)->comment('Подтвержден');
			$table->enum('container_status', array('empty','full'))->nullable()->comment('Состояние загружаемого контейнера (пустой, полный)');
			$table->integer('container_type_id')->nullable()->index('FK_trip_point_container_type_id')->comment('ID типа контейнера');
			$table->integer('container_id')->nullable()->index('FK_trip_point_container_id')->comment('ID контейнера');
			$table->enum('container_status_fact', array('empty','full'))->nullable()->comment('Состояние контейнера, которое меняет оператор');
			$table->boolean('tariff_bp')->default(0)->comment('Тариф без прогрессии');
			$table->string('ttn')->nullable()->comment('Номер ТТН');
			$table->string('comment')->nullable()->comment('Комментарий');
			$table->integer('repair_id')->nullable()->index('FK_trip_point_repair_id')->comment('ID заявки на ремонт');
			$table->integer('distance_to')->nullable()->comment('Расстояние от предыдущей точки до данной');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_point');
	}

}
