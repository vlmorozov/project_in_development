<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDDirectionSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('d_direction_sales', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pid')->nullable();
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->string('title')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('d_direction_sales');
	}

}
