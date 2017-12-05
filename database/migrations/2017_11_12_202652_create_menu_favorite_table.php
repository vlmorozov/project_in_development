<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuFavoriteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_favorite', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->comment('ID пользователя');
			$table->string('itemid', 45)->comment('itemId элемента меню');
			$table->integer('position')->default(0)->comment('Позиция в списке');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус');
			$table->unique(['user_id','itemid'], 'UK_menu_favorite');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_favorite');
	}

}
