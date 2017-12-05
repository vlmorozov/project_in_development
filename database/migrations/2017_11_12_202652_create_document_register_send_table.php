<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentRegisterSendTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_register_send', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('document_register_id')->comment('ID документа Реестр по контрагенту');
			$table->integer('user_id')->nullable()->comment('ID пользователя, которому отправили документ');
			$table->integer('contractor_contact_id')->nullable()->comment('ID контактного лица, которому отправили документ');
			$table->dateTime('send_datetime')->comment('Дата и время отправки');
			$table->integer('file_id')->nullable()->comment('ID файла-вложения');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активный, 2 - неактивный');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document_register_send');
	}

}
