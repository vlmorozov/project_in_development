<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripPointStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_point_state_history', function(Blueprint $table)
		{
			$table->foreign('trip_point_id', 'FK_trip_point_state_history_trip_point_id')->references('id')->on('trip_point')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_trip_point_state_history_trip_point_state_name')->references('name')->on('trip_point_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_trip_point_state_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_point_state_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_trip_point_state_history_trip_point_id');
			$table->dropForeign('FK_trip_point_state_history_trip_point_state_name');
			$table->dropForeign('FK_trip_point_state_history_user_id');
		});
	}

}
