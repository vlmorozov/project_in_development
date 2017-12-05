<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIncomingCallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('incoming_call', function(Blueprint $table)
		{
			$table->foreign('contractor_contact_id', 'FK_incoming_call_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_delivery_id', 'FK_incoming_call_contractor_delivery_id')->references('id')->on('contractor_delivery')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_incoming_call_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('event_tracker_id', 'FK_incoming_call_event_tracker_id')->references('id')->on('event_tracker')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('first_incoming_call_id', 'FK_incoming_call_incoming_call_id')->references('id')->on('incoming_call')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('incoming_call_source_id', 'FK_incoming_call_incoming_call_source_id')->references('id')->on('incoming_call_source')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manager_id', 'FK_incoming_call_manager_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('next_incoming_call_id', 'FK_incoming_call_next_incoming_call_id')->references('id')->on('incoming_call')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('reclama_contractor_id', 'FK_incoming_call_reclama_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('reclama_id', 'FK_incoming_call_reclama_id')->references('id')->on('reclama')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('reclama_user_id', 'FK_incoming_call_reclama_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_incoming_call_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('incoming_call', function(Blueprint $table)
		{
			$table->dropForeign('FK_incoming_call_contractor_contact_id');
			$table->dropForeign('FK_incoming_call_contractor_delivery_id');
			$table->dropForeign('FK_incoming_call_contractor_id');
			$table->dropForeign('FK_incoming_call_event_tracker_id');
			$table->dropForeign('FK_incoming_call_incoming_call_id');
			$table->dropForeign('FK_incoming_call_incoming_call_source_id');
			$table->dropForeign('FK_incoming_call_manager_id');
			$table->dropForeign('FK_incoming_call_next_incoming_call_id');
			$table->dropForeign('FK_incoming_call_reclama_contractor_id');
			$table->dropForeign('FK_incoming_call_reclama_id');
			$table->dropForeign('FK_incoming_call_reclama_user_id');
			$table->dropForeign('FK_incoming_call_user_id');
		});
	}

}
