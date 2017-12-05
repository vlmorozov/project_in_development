<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageResponsibleCancellationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_responsible_cancellation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_id')->index('FK_storage_responsible_cancellation_company_id')->comment('Id организации');
			$table->enum('printed_form', array('cancellation_certificate','defects_list','repair'))->nullable()->comment('Виды печатных форм');
			$table->integer('responsible_user_id')->index('FK_storage_responsible_cancellation_responsible_user_id')->comment('Ответственный пользователь');
			$table->string('role', 150)->nullable()->comment('Роль');
			$table->enum('status', array('1','2'))->default('1');
			$table->date('date_from');
			$table->date('date_to')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_responsible_cancellation');
	}

}
