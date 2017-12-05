<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWorkingTimeMehanicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('working_time_mehanic', function(Blueprint $table)
		{
			$table->foreign('shift_id', 'FK_working_time_mehanic_shift_mechanic_id')->references('id')->on('shift_mechanic')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_working_time_mehanic_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('working_time_mehanic', function(Blueprint $table)
		{
			$table->dropForeign('FK_working_time_mehanic_shift_mechanic_id');
			$table->dropForeign('FK_working_time_mehanic_user_id');
		});
	}

}
