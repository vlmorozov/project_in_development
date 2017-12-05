<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNomenclatureGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomenclature_group', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('nomenclature_group_id')->nullable()->index('FK_nomenclature_group_nomenclature_group_id')->comment('ID родительской группы');
			$table->string('title')->nullable()->comment('Название');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->integer('file_id')->nullable()->index('FK_nomenclature_group_uploaded_files_id')->comment('ID файла фотографии');
			$table->string('title_short')->nullable()->comment('Краткое обозначение');
			$table->string('id_1c', 12)->nullable()->comment('ID папки в 1C');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nomenclature_group');
	}

}
