<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDictionaryValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dictionary_values', function(Blueprint $table)
		{
			$table->foreign('dictionary_id')->references('id')->on('dictionary')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dictionary_values', function(Blueprint $table)
		{
			$table->dropForeign('FK_dictionary_values_dictionary_id');
		});
	}

}
