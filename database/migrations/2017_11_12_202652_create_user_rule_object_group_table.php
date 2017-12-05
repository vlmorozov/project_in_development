<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRuleObjectGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rule_object_group', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('object_group_id')->nullable()->index('FK_user_rule_object_group_user_rule_object_group_id')->comment('ID родительской категории');
			$table->string('title')->nullable()->comment('Наименование');
			$table->string('alias')->nullable()->comment('Алиас группы');
			$table->string('status')->nullable()->default('1')->comment('1 - активен, 2 - не активен');
			$table->integer('sort')->nullable()->comment('Сортировка');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_rule_object_group');
	}

}
