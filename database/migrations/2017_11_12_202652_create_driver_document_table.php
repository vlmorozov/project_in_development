<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_document', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id')->comment('ID водителя');
			$table->integer('document_type_id')->index('FK_driver_document_document_type_id')->comment('ID типа документа');
			$table->string('document_series')->nullable()->comment('Документ - серия');
			$table->string('document_number')->comment('Документ - номер');
			$table->string('document_issued_who')->nullable()->comment('Документ - кем выдан');
			$table->date('document_issued_when')->nullable()->comment('Документ - когда выдан');
			$table->string('document_registered')->nullable()->comment('Зарегистрирован');
			$table->string('document_code_department')->nullable()->comment('Код подразделения');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
			$table->date('expiry_date')->nullable()->comment('Дата окончания срока действия');
			$table->string('category')->nullable()->comment('Категория документа');
			$table->integer('file_id')->nullable()->index('FK_driver_document_uploaded_files_id')->comment('ID файла скана документа');
			$table->unique(['driver_id','document_type_id'], 'UK_driver_document');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_document');
	}

}
