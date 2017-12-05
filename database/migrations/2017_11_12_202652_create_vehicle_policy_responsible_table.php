<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclePolicyResponsibleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_policy_responsible', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('responsible_user_id')->index('FK_responsible_user_id')->comment('ID ответственного пользователя');
			$table->integer('status')->comment('Статус активности');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_policy_responsible');
	}

}
