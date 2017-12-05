<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContactEventStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contact_event_state_history', function(Blueprint $table)
		{
			$table->foreign('contact_event_id', 'FK_contact_event_state_history_contact_event_id')->references('id')->on('contact_event')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_contact_event_state_history_contact_event_state_name')->references('name')->on('contact_event_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_contact_event_state_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contact_event_state_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_contact_event_state_history_contact_event_id');
			$table->dropForeign('FK_contact_event_state_history_contact_event_state_name');
			$table->dropForeign('FK_contact_event_state_history_user_id');
		});
	}

}
