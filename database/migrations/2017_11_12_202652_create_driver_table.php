<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_id')->nullable()->index('FK_driver_company_id')->comment('ID компании');
			$table->integer('user_id')->unique('UK_driver_user_id')->comment('ID сотрудника');
			$table->string('num')->nullable()->comment('Табельный номер');
			$table->integer('foto_file_id')->nullable()->index('FK_driver_uploaded_files_id')->comment('ID файла фотографии');
			$table->integer('form_file_id')->nullable()->index('FK_driver_form_file_id')->comment('ID файла анкеты');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver');
	}

}
