<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBreachPddTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('breach_pdd', function(Blueprint $table)
		{
			$table->foreign('measure_id', 'FK_breach_pdd_breach_pdd_measure_id')->references('id')->on('breach_pdd_measure')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_contact_id', 'FK_breach_pdd_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_breach_pdd_create_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver_id', 'FK_breach_pdd_driver_id')->references('id')->on('driver')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manager_id', 'FK_breach_pdd_manager_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'FK_breach_pdd_uploaded_files_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_breach_pdd_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('breach_pdd', function(Blueprint $table)
		{
			$table->dropForeign('FK_breach_pdd_breach_pdd_measure_id');
			$table->dropForeign('FK_breach_pdd_contractor_contact_id');
			$table->dropForeign('FK_breach_pdd_create_user_id');
			$table->dropForeign('FK_breach_pdd_driver_id');
			$table->dropForeign('FK_breach_pdd_manager_id');
			$table->dropForeign('FK_breach_pdd_uploaded_files_id');
			$table->dropForeign('FK_breach_pdd_vehicle_id');
		});
	}

}
