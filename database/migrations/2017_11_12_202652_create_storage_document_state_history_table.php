<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageDocumentStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_document_state_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('storage_document_id')->nullable()->index('storage_document_income_id')->comment('ID документа прихода');
			$table->string('state')->comment('Статус');
			$table->integer('user_id')->nullable()->index('user_id')->comment('ID пользователя изменившего статус');
			$table->dateTime('create_date')->comment('Дата и время изменения статуса');
			$table->string('note')->nullable()->comment('Комментарий к изменению статуса');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_document_state_history');
	}

}
