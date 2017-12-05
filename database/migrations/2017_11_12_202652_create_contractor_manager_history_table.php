<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorManagerHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_manager_history', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->integer('manager_id')->nullable()->index('FK_contractor_manager_history_manager_id')->comment('ID ответственного менеджера');
			$table->dateTime('create_datetime')->comment('Дата изменения');
			$table->integer('create_user_id')->nullable()->index('FK_contractor_manager_history_user_id')->comment('автор изменения');
			$table->integer('status')->default(1)->comment('статус');
			$table->integer('old_manager_id')->nullable()->index('FK_contractor_manager_history_old_manager_id');
			$table->integer('contractor_id')->index('FK_contractor_manager_history_old_contractor_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_manager_history');
	}

}
