<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_state_history', function(Blueprint $table)
		{
			$table->foreign('state', 'FK_trip_state_history_trip_state_name')->references('name')->on('trip_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_id', 'FK_trip_state_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_trip_state_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_state_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_trip_state_history_trip_state_name');
			$table->dropForeign('FK_trip_state_trip_id');
			$table->dropForeign('FK_trip_state_user_id');
		});
	}

}
