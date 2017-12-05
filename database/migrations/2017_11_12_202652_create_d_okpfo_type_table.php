<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDOkpfoTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('d_okpfo_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->string('title')->nullable()->comment('Краткое название');
			$table->string('full_title')->nullable()->comment('Полное название');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('d_okpfo_type');
	}

}
