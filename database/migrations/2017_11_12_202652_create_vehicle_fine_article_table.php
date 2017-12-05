<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleFineArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_fine_article', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('article')->default('Название статьи');
			$table->string('color', 6)->nullable()->default('Цвет');
			$table->integer('status')->nullable()->default(1);
			$table->string('article_number', 30)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_fine_article');
	}

}
