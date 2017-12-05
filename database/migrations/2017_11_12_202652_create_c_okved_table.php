<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCOkvedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('c_okved', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('pk');
			$table->string('code', 16)->unique('code')->comment('Код');
			$table->string('name', 512)->comment('Наименование');
			$table->text('additional_info', 65535)->nullable();
			$table->integer('parent_id')->nullable()->index('parent_id')->comment('Вычестоящий раздел');
			$table->string('parent_code', 16)->nullable()->comment('Код вышестоящего раздела');
			$table->smallInteger('node_count')->default(0)->comment('Количество элементов в ветке');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('c_okved');
	}

}
