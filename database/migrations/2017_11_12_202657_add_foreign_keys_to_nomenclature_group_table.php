<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNomenclatureGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nomenclature_group', function(Blueprint $table)
		{
			$table->foreign('nomenclature_group_id', 'FK_nomenclature_group_nomenclature_group_id')->references('id')->on('nomenclature_group')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'FK_nomenclature_group_uploaded_files_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nomenclature_group', function(Blueprint $table)
		{
			$table->dropForeign('FK_nomenclature_group_nomenclature_group_id');
			$table->dropForeign('FK_nomenclature_group_uploaded_files_id');
		});
	}

}
