<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripPointDriverFineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_point_driver_fine', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_point_id')->comment('ID точки рейса');
			$table->integer('driver_fine_id')->index('FK_trip_point_driver_fine_driver_fine_id')->comment('ID удержания');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
			$table->integer('driver_payment_id')->nullable()->index('FK_trip_point_driver_fine_driver_payment_id')->comment('ID начисления на водителя');
			$table->unique(['trip_point_id','driver_fine_id'], 'UK_trip_point_driver_fine');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_point_driver_fine');
	}

}
