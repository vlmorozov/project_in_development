<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorContractStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_contract_state', function(Blueprint $table)
		{
			$table->string('name', 50)->unique('UK_contractor_contract_state_n');
			$table->string('title');
			$table->string('icon')->nullable();
			$table->integer('sort')->nullable();
			$table->enum('status', array('1','2'))->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_contract_state');
	}

}
