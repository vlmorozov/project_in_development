<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehiclePolicyResponsibleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_policy_responsible', function(Blueprint $table)
		{
			$table->foreign('responsible_user_id', 'FK_responsible_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_policy_responsible', function(Blueprint $table)
		{
			$table->dropForeign('FK_responsible_user_id');
		});
	}

}
