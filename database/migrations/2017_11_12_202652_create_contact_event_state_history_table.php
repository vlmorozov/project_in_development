<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactEventStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_event_state_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contact_event_id')->index('FK_contact_event_state_history_contact_event_id')->comment('ID исходящего события');
			$table->string('state', 50)->index('FK_contact_event_state_history_contact_event_state_name')->comment('Статус');
			$table->dateTime('create_date')->comment('Дата изменения');
			$table->integer('user_id')->nullable()->index('FK_contact_event_state_history_user_id')->comment('ID пользователя');
			$table->string('note')->nullable()->comment('комментарий к изменению статуса');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_event_state_history');
	}

}
