<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHelpModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('help_module', function(Blueprint $table)
		{
			$table->foreign('help_module_id', 'FK_help_module_help_module_group_id')->references('id')->on('help_module')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('help_module', function(Blueprint $table)
		{
			$table->dropForeign('FK_help_module_help_module_group_id');
		});
	}

}
