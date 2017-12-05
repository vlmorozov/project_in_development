<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_driver_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('form_file_id', 'FK_driver_form_file_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('foto_file_id', 'FK_driver_uploaded_files_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_driver_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver', function(Blueprint $table)
		{
			$table->dropForeign('FK_driver_company_id');
			$table->dropForeign('FK_driver_form_file_id');
			$table->dropForeign('FK_driver_uploaded_files_id');
			$table->dropForeign('FK_driver_user_id');
		});
	}

}
