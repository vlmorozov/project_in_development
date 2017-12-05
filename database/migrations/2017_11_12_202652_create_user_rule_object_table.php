<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRuleObjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rule_object', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('object_group_id')->index('FK_user_rule_object_user_rule_object_group_id')->comment('ID группы объектов');
			$table->string('title')->nullable()->comment('Наименование');
			$table->string('alias')->nullable()->comment('Алиас объекта');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1 - активен, 2 - не активен');
			$table->boolean('for_all')->default(1)->comment('правило доступно для "все"');
			$table->boolean('for_their')->default(1)->comment('правило доступно для "свои"');
			$table->integer('sort')->nullable()->comment('Сортировка');
			$table->string('note')->nullable()->comment('Комментарий');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_rule_object');
	}

}
