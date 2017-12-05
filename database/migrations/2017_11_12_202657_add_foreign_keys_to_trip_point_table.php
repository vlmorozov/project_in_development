<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripPointTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_point', function(Blueprint $table)
		{
			$table->foreign('client_order_nomenclature_id', 'FK_trip_point_client_order_nomenclature_id')->references('id')->on('client_order_nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('container_id', 'FK_trip_point_container_id')->references('id')->on('container')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('container_type_id', 'FK_trip_point_container_type_id')->references('id')->on('container_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_delivery_id', 'FK_trip_point_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('loading_trip_point_id', 'FK_trip_point_loading_trip_point_id')->references('id')->on('trip_point')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('parking_id', 'FK_trip_point_parking_id')->references('id')->on('parking')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('primary_trip_point_id', 'FK_trip_point_primary_trip_point_id')->references('id')->on('trip_point')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repair_id', 'FK_trip_point_repair_id')->references('id')->on('repair')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_id', 'FK_trip_point_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_trip_point_trip_point_state_name')->references('name')->on('trip_point_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('type', 'FK_trip_point_trip_point_type_name')->references('name')->on('trip_point_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_point', function(Blueprint $table)
		{
			$table->dropForeign('FK_trip_point_client_order_nomenclature_id');
			$table->dropForeign('FK_trip_point_container_id');
			$table->dropForeign('FK_trip_point_container_type_id');
			$table->dropForeign('FK_trip_point_contractor_delivery_id');
			$table->dropForeign('FK_trip_point_loading_trip_point_id');
			$table->dropForeign('FK_trip_point_parking_id');
			$table->dropForeign('FK_trip_point_primary_trip_point_id');
			$table->dropForeign('FK_trip_point_repair_id');
			$table->dropForeign('FK_trip_point_trip_id');
			$table->dropForeign('FK_trip_point_trip_point_state_name');
			$table->dropForeign('FK_trip_point_trip_point_type_name');
		});
	}

}
