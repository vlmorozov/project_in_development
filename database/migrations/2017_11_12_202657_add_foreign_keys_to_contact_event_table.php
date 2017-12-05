<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContactEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contact_event', function(Blueprint $table)
		{
			$table->foreign('state', 'FK_contact_event_contact_event_state_name')->references('name')->on('contact_event_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('type', 'FK_contact_event_contact_event_type_name')->references('name')->on('contact_event_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_contact_id', 'FK_contact_event_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('event_tracker_id', 'FK_contact_event_event_tracker_id')->references('id')->on('event_tracker')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('incoming_call_id', 'FK_contact_event_incoming_call_id')->references('id')->on('incoming_call')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contact_event', function(Blueprint $table)
		{
			$table->dropForeign('FK_contact_event_contact_event_state_name');
			$table->dropForeign('FK_contact_event_contact_event_type_name');
			$table->dropForeign('FK_contact_event_contractor_contact_id');
			$table->dropForeign('FK_contact_event_event_tracker_id');
			$table->dropForeign('FK_contact_event_incoming_call_id');
		});
	}

}
