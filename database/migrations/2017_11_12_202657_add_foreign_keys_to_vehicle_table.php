<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle', function(Blueprint $table)
		{
			$table->foreign('buy_currency_id', 'FK_vehicle_buy_currency_id')->references('id')->on('currency')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('company_id', 'FK_vehicle_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_vehicle_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('pts_file_id', 'FK_vehicle_pts_file_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sell_currency_id', 'FK_vehicle_sell_currency_id')->references('id')->on('currency')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sts_file_id', 'FK_vehicle_sts_file_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_group_id', 'FK_vehicle_vehicle_group_id')->references('id')->on('vehicle_group')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_model_id', 'FK_vehicle_vehicle_model_id')->references('id')->on('vehicle_model')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_status_id', 'FK_vehicle_vehicle_status_id')->references('id')->on('vehicle_status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_buy_currency_id');
			$table->dropForeign('FK_vehicle_company_id');
			$table->dropForeign('FK_vehicle_contractor_id');
			$table->dropForeign('FK_vehicle_pts_file_id');
			$table->dropForeign('FK_vehicle_sell_currency_id');
			$table->dropForeign('FK_vehicle_sts_file_id');
			$table->dropForeign('FK_vehicle_vehicle_group_id');
			$table->dropForeign('FK_vehicle_vehicle_model_id');
			$table->dropForeign('FK_vehicle_vehicle_status_id');
		});
	}

}
