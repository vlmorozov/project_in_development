<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupplierPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('supplier_payment', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_supplier_payment_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_supplier_payment_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('supplier_payment', function(Blueprint $table)
		{
			$table->dropForeign('FK_supplier_payment_company_id');
			$table->dropForeign('FK_supplier_payment_contractor_id');
		});
	}

}
