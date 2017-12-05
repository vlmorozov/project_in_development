<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleRuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_rule', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('role_id')->index('FK_role_rule_role_id')->comment('ID роли');
			$table->integer('object_id')->index('FK_role_rule_user_rule_object_id')->comment('ID объекта');
			$table->boolean('allow_all')->default(0)->comment('Разрешить все');
			$table->boolean('allow_their')->default(0)->comment('Разрешить свои');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_rule');
	}

}
