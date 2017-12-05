<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->nullable()->index('FK_repair_vehicle_id')->comment('ID тс');
			$table->enum('vehicle_type', array('vehicle','trailer'))->default('vehicle')->comment('Тип ТС/прицеп');
			$table->integer('trailer_id')->nullable()->comment('ID прицепа');
			$table->enum('type', array('текущий','плановый'))->comment('Вид ремонта');
			$table->date('date')->nullable()->comment('Плановая дата (не используется)');
			$table->string('time_from')->nullable()->comment('Время от (не используется)');
			$table->string('time_to')->nullable()->comment('Время до (не используется)');
			$table->integer('shift_id')->nullable()->index('FK_repair_shift_id')->comment('ID смены (не используется)');
			$table->string('state')->nullable()->index('FK_repair_repair_state_name')->comment('Статус');
			$table->text('defect', 65535)->nullable()->comment('Неисправность');
			$table->integer('vehicle_defect_type_id')->nullable()->index('FK_repair_vehicle_defect_type_id')->comment('ID неисправности тс');
			$table->string('vehicle_defect_type_title')->nullable()->comment('Неисправности тс');
			$table->text('operation', 65535)->nullable()->comment('Произведенные работы');
			$table->integer('repair_place_id')->nullable()->index('FK_repair_repair_place_id')->comment('ID места ремонта');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->integer('create_user_id')->nullable()->index('FK_repair_user_id')->comment('ID пользователя, который создал');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
			$table->dateTime('start_datetime')->nullable()->comment('Дата и время начала ремонта');
			$table->dateTime('finish_datetime')->nullable()->comment('Дата и время окончания ремонта');
			$table->string('note')->nullable()->comment('Комментарий');
			$table->boolean('is_long_time')->default(0)->comment('Долгосрочная завяка (не используется)');
			$table->date('start_date')->nullable()->comment('Дата начала ремонта (не используется)');
			$table->date('end_date')->nullable()->comment('Дата окончания ремонта (не используется)');
			$table->boolean('on_line')->default(0)->comment('На линии');
			$table->integer('user_id_checking_work')->nullable()->comment('ID перепроверившего работы');
			$table->integer('inspection_user_id')->nullable()->comment('ID пользователя, который провел осмотр');
			$table->string('conclusion')->nullable();
			$table->dateTime('end_datetime')->nullable();
			$table->integer('vehicle_mileage')->nullable()->comment('Пробег ТС');
			$table->dateTime('printed_claim_datetime')->nullable()->comment('Дата печати заказа-наряда');
			$table->integer('printed_claim_user_id')->nullable()->index('FK_repair_print_user_id')->comment('ID пользователя распечатавшего заказ-наряд');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair');
	}

}
