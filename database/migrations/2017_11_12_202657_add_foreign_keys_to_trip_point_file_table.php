<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripPointFileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_point_file', function(Blueprint $table)
		{
			$table->foreign('trip_point_id', 'FK_trip_point_file_trip_point_id')->references('id')->on('trip_point')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'FK_trip_point_file_uploaded_files_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_point_file', function(Blueprint $table)
		{
			$table->dropForeign('FK_trip_point_file_trip_point_id');
			$table->dropForeign('FK_trip_point_file_uploaded_files_id');
		});
	}

}
