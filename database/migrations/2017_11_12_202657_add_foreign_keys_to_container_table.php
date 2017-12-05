<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContainerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('container', function(Blueprint $table)
		{
			$table->foreign('container_type_id', 'FK_container_container_type_id')->references('id')->on('container_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('parking_id', 'FK_container_parking_id')->references('id')->on('parking')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('container', function(Blueprint $table)
		{
			$table->dropForeign('FK_container_container_type_id');
			$table->dropForeign('FK_container_parking_id');
		});
	}

}
