<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('client_order', function(Blueprint $table)
		{
			$table->foreign('state', 'FK_client_order_client_order_state_name')->references('name')->on('client_order_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contact_personal_id', 'FK_client_order_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_delivery_id', 'FK_client_order_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_client_order_create_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('incoming_call_id', 'FK_client_order_incoming_call_id')->references('id')->on('incoming_call')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('responsible_user_id', 'FK_client_order_responsible_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('shift_id', 'FK_client_order_shift_id')->references('id')->on('shift')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('client_order', function(Blueprint $table)
		{
			$table->dropForeign('FK_client_order_client_order_state_name');
			$table->dropForeign('FK_client_order_contractor_contact_id');
			$table->dropForeign('FK_client_order_contractor_delivery_id');
			$table->dropForeign('FK_client_order_create_user_id');
			$table->dropForeign('FK_client_order_incoming_call_id');
			$table->dropForeign('FK_client_order_responsible_user_id');
			$table->dropForeign('FK_client_order_shift_id');
		});
	}

}
