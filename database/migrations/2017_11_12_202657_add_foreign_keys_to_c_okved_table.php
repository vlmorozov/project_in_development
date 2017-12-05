<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCOkvedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('c_okved', function(Blueprint $table)
		{
			$table->foreign('parent_id', 'c_okved_ibfk_1')->references('id')->on('c_okved')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('c_okved', function(Blueprint $table)
		{
			$table->dropForeign('c_okved_ibfk_1');
		});
	}

}
