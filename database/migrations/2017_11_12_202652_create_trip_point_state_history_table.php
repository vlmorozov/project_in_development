<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripPointStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_point_state_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_point_id')->index('FK_trip_point_state_history_trip_point_id')->comment('ID точки маршрута');
			$table->string('state')->nullable()->index('FK_trip_point_state_history_trip_point_state_name')->comment('Статус');
			$table->dateTime('create_date')->comment('Дата изменения');
			$table->dateTime('server_datetime')->nullable()->comment('Дата и время сервера');
			$table->integer('user_id')->nullable()->index('FK_trip_point_state_history_user_id')->comment('ID пользователя');
			$table->string('note')->nullable()->comment('Комментарий к изменению статуса');
			$table->decimal('volume_fact')->nullable()->comment('Кол-во единиц номенклатуры (факт)');
			$table->decimal('volume_fict')->nullable()->comment('Кол-во единиц номенклатуры (ручное добавление)');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-точка была изменена, 2-признак того, точка была удалена');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_point_state_history');
	}

}
