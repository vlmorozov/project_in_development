<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehiclePolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_policy', function(Blueprint $table)
		{
			$table->foreign('insurer_id', 'FK_vehicle_policy_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('insurance_currency_id', 'FK_vehicle_policy_currency_id')->references('id')->on('currency')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('scan_file_id', 'FK_vehicle_policy_file_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('insurance_type_id', 'FK_vehicle_policy_insurance_type_id')->references('id')->on('insurance_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_policy_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_policy', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_policy_contractor_id');
			$table->dropForeign('FK_vehicle_policy_currency_id');
			$table->dropForeign('FK_vehicle_policy_file_id');
			$table->dropForeign('FK_vehicle_policy_insurance_type_id');
			$table->dropForeign('FK_vehicle_policy_vehicle_id');
		});
	}

}
