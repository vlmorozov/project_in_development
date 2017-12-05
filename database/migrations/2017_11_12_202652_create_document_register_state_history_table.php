<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentRegisterStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_register_state_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('document_register_id')->comment('ID документа "Реестр по контрагенту"');
			$table->string('state', 50)->comment('Статус');
			$table->dateTime('create_datetime')->comment('Дата изменения');
			$table->integer('user_id')->comment('ID пользователя');
			$table->string('note')->nullable()->comment('Комментарий к изменению статуса');
			$table->enum('status', array('1','2'))->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document_register_state_history');
	}

}
