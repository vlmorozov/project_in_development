<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharacteristicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('characteristic', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('nomenclature_group_id')->nullable()->comment('ID номенклатурной группы');
			$table->string('title')->nullable()->comment('название');
			$table->string('title_short')->nullable()->comment('краткое название');
			$table->string('unit')->nullable()->comment('единица измерения');
			$table->integer('sort')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('characteristic');
	}

}
