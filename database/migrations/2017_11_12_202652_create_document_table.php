<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('create_date')->comment('Дата формирования документа');
			$table->integer('create_user_id')->comment('ID пользователя, который сформировал документ');
			$table->string('title')->nullable()->comment('Наименование документа');
			$table->text('content')->comment('Текст документа');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document');
	}

}
