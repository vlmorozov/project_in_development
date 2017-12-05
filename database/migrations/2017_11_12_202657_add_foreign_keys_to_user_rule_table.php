<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserRuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_rule', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FK_user_rule_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('object_id', 'FK_user_rule_user_rule_object_id')->references('id')->on('user_rule_object')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_rule', function(Blueprint $table)
		{
			$table->dropForeign('FK_user_rule_user_id');
			$table->dropForeign('FK_user_rule_user_rule_object_id');
		});
	}

}
