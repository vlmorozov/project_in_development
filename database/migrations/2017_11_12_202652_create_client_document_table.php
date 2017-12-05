<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_document', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->index('FK_client_document_contractor_id')->comment('ID контрагента');
			$table->string('type')->comment('Тип документа');
			$table->integer('month')->nullable()->comment('Месяц');
			$table->integer('year')->nullable()->comment('Год');
			$table->integer('file_id')->index('FK_client_document_uploaded_files_id')->comment('ID файла');
			$table->string('note')->comment('Комментарий');
			$table->integer('create_user_id')->index('FK_client_document_user_id')->comment('ID пользователя, который создал заказ');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->enum('status', array('1','2'))->nullable()->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client_document');
	}

}
