<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentRegisterDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_register_data', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('document_register_id')->index('FK_document_registry_data_document_register_id');
			$table->string('type', 20)->default('default');
			$table->text('report_data');
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
		Schema::drop('document_register_data');
	}

}
