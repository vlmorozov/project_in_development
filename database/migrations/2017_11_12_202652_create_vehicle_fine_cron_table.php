<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleFineCronTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_fine_cron', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->index('idx_vehicle_fine_cron_vehicle_id')->comment('ID ТС');
			$table->string('stsnum', 45)->comment('Серия и номер свидетельства о регистрации ТС');
			$table->dateTime('date')->index('idx_vehicle_fine_cron_date')->comment('Дата выполнения крона');
			$table->boolean('complated')->default(0)->comment('Завершено');
			$table->boolean('attempt')->default(0)->comment('Количество попыток загрузки');
			$table->string('note', 512)->nullable()->comment('Комментарий загрузки');
			$table->text('skipped', 16777215)->nullable()->comment('Список УИН штрафов, которые выдал провайдер, но в КИС не добавлены, по причине того, что загрузились не все данные о штрафе');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_fine_cron');
	}

}
