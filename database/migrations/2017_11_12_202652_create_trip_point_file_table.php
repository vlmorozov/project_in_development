<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripPointFileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_point_file', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('create_date')->comment('Дата добавления');
			$table->integer('trip_point_id')->index('FK_trip_point_file_trip_point_id')->comment('ID точки маршрута');
			$table->integer('file_id')->index('FK_trip_point_file_uploaded_files_id')->comment('ID файла');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_point_file');
	}

}
