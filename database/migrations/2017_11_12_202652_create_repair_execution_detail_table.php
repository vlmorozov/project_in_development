<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairExecutionDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_execution_detail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_execution_id')->index('FK_repair_execution_detail_repair_execution_id')->comment('ID акта ремонта');
			$table->integer('nomenclature_id')->nullable()->index('FK_repair_execution_detail_nomenclature_id')->comment('ID номенклатуры');
			$table->string('nomenclature_title')->nullable()->comment('Название номенклатуры');
			$table->smallInteger('quantity')->comment('Количество');
			$table->enum('status', array('1','2'))->default('1')->comment('1-активен, 2-неактивен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_execution_detail');
	}

}
