<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageReasonCancellationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_reason_cancellation', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->string('title', 100)->comment('Название причины удаления');
			$table->enum('status', array('1','2'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_reason_cancellation');
	}

}
