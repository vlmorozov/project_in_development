<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sos', function(Blueprint $table)
		{
			$table->foreign('sos_type_id', 'FK_sos_sos_type_id')->references('id')->on('sos_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_sos_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_sos_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sos', function(Blueprint $table)
		{
			$table->dropForeign('FK_sos_sos_type_id');
			$table->dropForeign('FK_sos_user_id');
			$table->dropForeign('FK_sos_vehicle_id');
		});
	}

}
