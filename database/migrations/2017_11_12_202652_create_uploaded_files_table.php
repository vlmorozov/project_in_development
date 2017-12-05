<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUploadedFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uploaded_files', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable()->comment('пользовательское название');
			$table->string('name')->nullable()->comment('имя файла');
			$table->string('type')->nullable()->comment('mime-тип');
			$table->integer('size')->nullable()->comment('размер файла');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('uploaded_files');
	}

}
