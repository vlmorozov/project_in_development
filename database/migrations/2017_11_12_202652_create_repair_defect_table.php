<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairDefectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_defect', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('title', 65535)->comment('Описание дефекта');
			$table->integer('fixed')->default(0)->comment('Исправлено');
			$table->integer('parent_id')->nullable()->comment('Первое описание дефекта');
			$table->integer('repair_id')->nullable()->index('FK_repair_defect_repair_id')->comment('ID завяки на ремонт');
			$table->integer('vehicle_id')->nullable()->index('FK_repair_defect_vehicle_id')->comment('ID ТС');
			$table->integer('create_user_id')->nullable()->index('FK_repair_defect_create_user_id')->comment('Пользователь создавший запись');
			$table->dateTime('create_datetime')->nullable()->comment('Дата создания');
			$table->integer('update_user_id')->nullable()->index('FK_repair_defect_update_user_id')->comment('Пользователь поставивший Исправлено');
			$table->dateTime('update_datetime')->nullable()->comment('Дата обновления');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_defect');
	}

}
