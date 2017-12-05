<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('schedule_id')->nullable()->comment('ID ячейки графика водителей (не используется)');
			$table->dateTime('create_date')->comment('Дата создания поездки (не используется)');
			$table->integer('create_user_id')->comment('ID пользователя, который создал поездку (не используется)');
			$table->integer('vehicle_id')->index('IDX_trip_vehicle_id')->comment('ID транспортного средства');
			$table->integer('driver_id')->nullable()->index('IDX_trip_driver_id')->comment('ID водителя');
			$table->integer('trailer_id')->nullable()->comment('ID прицепа');
			$table->date('planning_date')->index('IDX_trip_planning_date')->comment('Дата, на которую запланирован рейс');
			$table->integer('shift_id')->index('FK_trip_shift_id')->comment('ID смены');
			$table->integer('start_parking_id')->nullable()->comment('ID парковки старта (не используется)');
			$table->integer('finish_parking_id')->nullable()->comment('ID парковки финиша (не используется)');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1 - активен, 2 - не активен');
			$table->string('state')->default('created')->index('FK_trip_trip_state_name')->comment('Состояние рейса');
			$table->boolean('driver_accept')->default(0)->comment('Водитель увидел рейс (не используется)');
			$table->string('note')->nullable()->comment('Комментарий');
			$table->dateTime('start_datetime_fact')->nullable()->comment('Дата и время старта (факт)');
			$table->dateTime('finish_datetime_fact')->nullable()->comment('Дата и время финиша (факт)');
			$table->integer('start_km')->nullable()->comment('Пробег начальный');
			$table->integer('finish_km')->nullable()->comment('Пробег конечный');
			$table->integer('km_fact')->nullable()->comment('Пробег фактический (по глонассу)');
			$table->integer('km_fact_without_rent')->nullable()->comment('Пробег фактический без учета точек аренды (по глонассу)');
			$table->string('waybill_num')->nullable()->comment('Номер путевого листа');
			$table->string('md5_calc_km_points')->comment('Хэш точек для расчета пробега');
			$table->integer('distance_plan')->nullable()->comment('Расстояние рейса (план)');
			$table->unique(['planning_date','shift_id','vehicle_id'], 'UK_trip');
			$table->index(['trailer_id','start_datetime_fact','finish_datetime_fact'], 'IDX_trip_trailer_datetime_fact');
			$table->index(['vehicle_id','start_datetime_fact','finish_datetime_fact'], 'IDX_trip_vehicle_datetime_fact');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip');
	}

}
