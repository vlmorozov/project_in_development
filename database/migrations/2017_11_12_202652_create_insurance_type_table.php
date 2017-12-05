<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInsuranceTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insurance_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Название');
			$table->enum('status', array('1','2'))->default('1')->comment('1-активен, 2-неактиване');
			$table->integer('send_notification_period')->nullable()->comment('Увед. об окончании действия за (дн)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('insurance_type');
	}

}
