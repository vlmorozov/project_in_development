<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_payment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->nullable()->index('FK_driver_payment_trip_id')->comment('ID рейса');
			$table->integer('trip_point_id')->nullable()->index('FK_driver_payment_trip_point_id')->comment('ID точки маршрута');
			$table->integer('vehicle_repair_id')->nullable()->index('FK_driver_payment_vehicle_repair_id')->comment('ID ремонта тс');
			$table->integer('user_id')->index('FK_driver_payment_user_id')->comment('ID пользователя, которому начисляется');
			$table->decimal('amount')->comment('Сумма');
			$table->dateTime('create_datetime')->comment('Дата и время начисления');
			$table->integer('create_user_id')->nullable()->index('FK_driver_payment_create_user_id')->comment('Пользователь, который начислил');
			$table->boolean('is_confirm')->default(0)->comment('Подтвержден');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1 - активен, 2 - не активен');
			$table->string('type')->default('trip_point_done')->comment('Тип (за что начислено)');
			$table->integer('object_id')->nullable()->comment('ID объекта, по которому была добавлена запись');
			$table->string('object_type')->nullable()->comment('Тип объекта, по которому была добавлена запись');
			$table->decimal('volume')->nullable()->comment('Объем, по которому было начисление');
			$table->decimal('tariff')->nullable()->comment('Тариф, по которому было начисление');
			$table->boolean('export_fb')->default(0)->comment('Пометка для выгрузки в ФБ');
			$table->integer('id_fb')->nullable()->comment('ID начисления в ФБ');
			$table->string('note')->nullable()->comment('Комментарий к начислению (или же причина списания)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_payment');
	}

}
