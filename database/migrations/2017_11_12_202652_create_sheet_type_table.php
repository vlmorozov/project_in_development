<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSheetTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sheet_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable()->comment('Наименование');
			$table->string('assignment')->nullable()->comment('Назначение');
			$table->boolean('export_1c')->default(0)->comment('Выгружать в 1С');
			$table->boolean('import_1c')->nullable()->comment('Загружать из 1С с таким типом');
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
		Schema::drop('sheet_type');
	}

}
