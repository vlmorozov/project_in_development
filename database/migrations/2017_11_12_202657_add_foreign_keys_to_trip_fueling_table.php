<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripFuelingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_fueling', function(Blueprint $table)
		{
			$table->foreign('trip_id', 'FK_trip_fueling_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_fueling', function(Blueprint $table)
		{
			$table->dropForeign('FK_trip_fueling_trip_id');
		});
	}

}
