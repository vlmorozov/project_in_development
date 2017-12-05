<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSheetSendLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sheet_send_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->index('FK_sheet_send_log_user_id')->comment('ID полькозателя системой');
			$table->integer('sheet_id')->index('FK_sheet_send_log_sheet_id')->comment('ID счета');
			$table->integer('contractor_contact_id')->nullable()->index('FK_sheet_send_log_contractor_contact_id')->comment('ID контактного лица');
			$table->dateTime('send_datetime')->comment('Дата и время отправки');
			$table->string('send_address')->comment('Адрес отправления');
			$table->boolean('success')->default(0)->comment('Флаг успешной отправки уведомления');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sheet_send_log');
	}

}
