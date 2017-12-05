<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageDocumentOutcomeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_document_outcome', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('Код');
			$table->enum('operation', array('shift','cancellation'))->nullable()->comment('Операция документа');
			$table->integer('storage_id')->nullable()->comment('ID склада');
			$table->date('date')->nullable()->comment('Дата документа');
			$table->string('title', 50)->nullable()->comment('Название');
			$table->dateTime('create_datetime')->nullable()->comment('Дата создания');
			$table->integer('create_user_id')->nullable()->comment('ID пользователя');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('Статус');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_document_outcome');
	}

}
