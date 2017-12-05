<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestingPhinxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testing_phinx', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('test_text1', 100);
			$table->integer('test_int')->nullable()->default(1);
			$table->boolean('test_bool')->default(1)->comment('Колонка bool');
			$table->date('test_date')->comment('date');
			$table->dateTime('test_datetime')->comment('datetime');
			$table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->decimal('test_decimal', 4)->default(1.53);
			$table->enum('test_enum', array('var1','var2'))->nullable();
			$table->string('test_text2', 100);
			$table->dateTime('datetime1');
			$table->index(['test_text1','test_int'], 'test_text');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('testing_phinx');
	}

}
