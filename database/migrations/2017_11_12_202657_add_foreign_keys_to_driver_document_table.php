<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_document', function(Blueprint $table)
		{
			$table->foreign('document_type_id', 'FK_driver_document_document_type_id')->references('id')->on('document_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver_id', 'FK_driver_document_driver_id')->references('id')->on('driver')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'FK_driver_document_uploaded_files_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_document', function(Blueprint $table)
		{
			$table->dropForeign('FK_driver_document_document_type_id');
			$table->dropForeign('FK_driver_document_driver_id');
			$table->dropForeign('FK_driver_document_uploaded_files_id');
		});
	}

}
