<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiler', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('hash', 50)->nullable()->index('ind_rofiler_hash');
			$table->string('uri')->nullable();
			$table->string('file');
			$table->integer('line');
			$table->dateTime('datetime')->index('ind_profiler_datetime');
			$table->float('micro', 10, 0)->nullable()->index('ind_profile_micro');
			$table->float('step', 10, 0)->nullable();
			$table->integer('user_id')->nullable();
			$table->text('note', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiler');
	}

}
