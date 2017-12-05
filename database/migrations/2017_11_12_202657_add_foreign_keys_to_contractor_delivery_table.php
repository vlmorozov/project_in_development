<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorDeliveryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_delivery', function(Blueprint $table)
		{
			$table->foreign('contractor_contact_id', 'FK_contractor_delivery_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_contractor_delivery_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_delivery', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_delivery_contractor_contact_id');
			$table->dropForeign('FK_contractor_delivery_contractor_id');
		});
	}

}
