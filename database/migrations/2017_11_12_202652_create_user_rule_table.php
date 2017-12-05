<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rule', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('FK_user_rule_user_id')->comment('ID пользователя');
			$table->integer('object_id')->comment('ID объекта');
			$table->boolean('allow_all')->default(0)->comment('Разрешить все');
			$table->boolean('allow_their')->default(0)->comment('Разрешить свои');
			$table->unique(['object_id','user_id'], 'UK_user_rules');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_rule');
	}

}
