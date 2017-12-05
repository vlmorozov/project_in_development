<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReferenceScopeOkvedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reference_scope_okved', function(Blueprint $table)
		{
			$table->integer('reference_scope_id');
			$table->integer('okved_id');
			$table->primary(['okved_id','reference_scope_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reference_scope_okved');
	}

}
