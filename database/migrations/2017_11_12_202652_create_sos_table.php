<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->index('FK_sos_user_id')->comment('ID пользователя');
			$table->integer('vehicle_id')->nullable()->index('FK_sos_vehicle_id')->comment('ID тс');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и время отправки');
			$table->dateTime('receipt_datetime')->nullable()->comment('Дата и время получения');
			$table->integer('sos_type_id')->nullable()->index('FK_sos_sos_type_id')->comment('ID типа сообщения');
			$table->string('message')->nullable()->comment('Текст сообщения');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sos');
	}

}
