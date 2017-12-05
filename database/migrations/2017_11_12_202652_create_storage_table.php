<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('Код склада');
			$table->string('title', 50)->comment('Название');
			$table->integer('company_id')->index('FK_repair_storage_company')->comment('ID компании');
			$table->string('address')->comment('Адрес склада');
			$table->string('user_id', 50)->nullable()->comment('Ответственные за склад');
			$table->text('note', 65535)->nullable()->comment('Комментарий');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус');
			$table->boolean('show_in_repair')->nullable()->default(0)->comment('Отображать в заявке на ремонт');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage');
	}

}
