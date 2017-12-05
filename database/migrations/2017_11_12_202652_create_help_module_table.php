<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHelpModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('help_module', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('help_module_id')->nullable()->index('FK_help_module_help_module_group_id_idx')->comment('ID родительского раздела справки');
			$table->string('title')->nullable()->comment('Название');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактивен');
			$table->integer('instruction_file_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('help_module');
	}

}
