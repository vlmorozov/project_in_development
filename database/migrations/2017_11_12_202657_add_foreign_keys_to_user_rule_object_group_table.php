<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserRuleObjectGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_rule_object_group', function(Blueprint $table)
		{
			$table->foreign('object_group_id', 'FK_user_rule_object_group_user_rule_object_group_id')->references('id')->on('user_rule_object_group')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_rule_object_group', function(Blueprint $table)
		{
			$table->dropForeign('FK_user_rule_object_group_user_rule_object_group_id');
		});
	}

}
