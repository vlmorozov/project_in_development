<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->nullable()->index('FK_vehicle_contractor_id')->comment('ID контрагента, который предоставляет ТС');
			$table->string('title')->nullable()->comment('Наименование');
			$table->string('reg_number')->nullable()->comment('Гос. рег. номер');
			$table->integer('vehicle_model_id')->nullable()->index('FK_vehicle_vehicle_model_id')->comment('ID модели тс');
			$table->integer('vehicle_status_id')->nullable()->index('FK_vehicle_vehicle_status_id')->comment('ID состояния тс');
			$table->integer('company_id')->nullable()->index('FK_vehicle_company_id')->comment('ID организации, которой принадлежит тс');
			$table->string('vin')->nullable()->comment('VIN');
			$table->string('number_engine')->nullable()->comment('Номер двигателя');
			$table->string('number_stand')->nullable()->comment('Номер кузова (не используется)');
			$table->string('number_chassis')->nullable()->comment('Номер шасси');
			$table->integer('year')->nullable()->comment('Год выпуска');
			$table->date('buy_date')->nullable()->comment('Дата покупки');
			$table->string('buy_km')->nullable()->comment('Пробег покупки (не используется)');
			$table->decimal('buy_price', 19)->nullable()->comment('Цена покупки');
			$table->integer('buy_currency_id')->nullable()->index('FK_vehicle_buy_currency_id')->comment('ID валюты покупки');
			$table->date('sell_date')->nullable()->comment('Дата продажи');
			$table->string('sell_km')->nullable()->comment('Пробег продажи (не используется)');
			$table->decimal('sell_price', 19)->nullable()->comment('Цена продажи');
			$table->integer('sell_currency_id')->nullable()->index('FK_vehicle_sell_currency_id')->comment('ID валюты продажи');
			$table->string('pts_series')->nullable()->comment('ПТС серия');
			$table->string('pts_number')->nullable()->comment('ПТС номер');
			$table->date('pts_date')->nullable()->comment('ПТС дата выдачи');
			$table->string('pts_issue')->nullable()->comment('ПТС кем выдан');
			$table->integer('pts_file_id')->nullable()->index('FK_vehicle_pts_file_id')->comment('ID файла скана ПТС');
			$table->text('note', 65535)->nullable()->comment('Примечание');
			$table->enum('status', array('1','2'))->nullable()->index('IDX_vehicle_status')->comment('1-активен, 2-неактиване');
			$table->string('sts_series')->nullable()->comment('СТС серия');
			$table->string('sts_number')->nullable()->comment('СТС номер');
			$table->date('sts_date')->nullable()->comment('СТС дата выдачи');
			$table->integer('sts_file_id')->nullable()->index('FK_vehicle_sts_file_id')->comment('ID файла скана СТС');
			$table->string('color')->nullable()->comment('Цвет кабины');
			$table->boolean('in_repair')->default(0)->comment('В ремонте');
			$table->string('map_color', 6)->nullable()->comment('Цвет на карте (#rgb)');
			$table->integer('vehicle_group_id')->nullable()->index('FK_vehicle_vehicle_group_id')->comment('ID группы тс');
			$table->string('url_tire_sensor_data')->nullable()->comment('URL для получение данных с датчиков');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle');
	}

}
