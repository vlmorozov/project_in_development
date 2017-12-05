<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserChangePasswordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_change_password', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FK_user_change_password_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_change_password', function(Blueprint $table)
		{
			$table->dropForeign('FK_user_change_password_user_id');
		});
	}

}
