<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentRegisterStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_register_state', function(Blueprint $table)
		{
			$table->string('name', 50)->primary();
			$table->string('title', 50);
			$table->boolean('sort');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - неактивен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document_register_state');
	}

}
