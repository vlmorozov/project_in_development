<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoleRuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('role_rule', function(Blueprint $table)
		{
			$table->foreign('role_id', 'FK_role_rule_role_id')->references('id')->on('role')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('object_id', 'FK_role_rule_user_rule_object_id')->references('id')->on('user_rule_object')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('role_rule', function(Blueprint $table)
		{
			$table->dropForeign('FK_role_rule_role_id');
			$table->dropForeign('FK_role_rule_user_rule_object_id');
		});
	}

}
