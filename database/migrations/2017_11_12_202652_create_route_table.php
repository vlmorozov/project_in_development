<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRouteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('route', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('from_point_id')->comment('Начальная точка');
			$table->integer('to_point_id')->comment('Конечная точка');
			$table->text('via_points', 65535)->nullable()->comment('Промежуточные точки');
			$table->text('all_points', 65535)->nullable()->comment('Все точки пути');
			$table->integer('distance')->nullable()->comment('Длинна маршрута (м)');
			$table->unique(['from_point_id','to_point_id'], 'UK_route');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('route');
	}

}
