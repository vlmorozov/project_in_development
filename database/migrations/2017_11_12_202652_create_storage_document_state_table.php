<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageDocumentStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_document_state', function(Blueprint $table)
		{
			$table->string('name', 50)->primary()->comment('Состояние');
			$table->string('title', 50)->comment('Название');
			$table->boolean('sort')->comment('Порядковый номер при отображении');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_document_state');
	}

}
