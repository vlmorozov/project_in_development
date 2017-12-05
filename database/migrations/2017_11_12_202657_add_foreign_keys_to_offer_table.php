<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOfferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('offer', function(Blueprint $table)
		{
			$table->foreign('contractor_contact_id', 'FK_offer_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_delivery_id', 'FK_offer_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_offer_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_offer_create_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('incoming_call_id', 'FK_offer_incoming_call_id')->references('id')->on('incoming_call')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manager_id', 'FK_offer_manager_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('offer', function(Blueprint $table)
		{
			$table->dropForeign('FK_offer_contractor_contact_id');
			$table->dropForeign('FK_offer_contractor_delivery_id');
			$table->dropForeign('FK_offer_contractor_id');
			$table->dropForeign('FK_offer_create_user_id');
			$table->dropForeign('FK_offer_incoming_call_id');
			$table->dropForeign('FK_offer_manager_id');
		});
	}

}
