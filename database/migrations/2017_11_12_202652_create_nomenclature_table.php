<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomenclature', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_1c', 12)->nullable()->index('IDX_nomenclature_id_1c')->comment('ID в 1С');
			$table->integer('nomenclature_group_id')->nullable()->comment('ID номенклатурной группы');
			$table->string('article')->nullable()->comment('Артикул');
			$table->string('title')->nullable()->comment('Наименование');
			$table->string('title_full')->nullable()->comment('Полное наименование');
			$table->integer('unit_id')->nullable()->comment('Ед. изм.');
			$table->integer('shipping_unit_id')->nullable()->comment('Ед. отгр.');
			$table->string('shipping_min')->nullable()->comment('Мин. отгр.');
			$table->string('manager_id')->nullable()->comment('Менеджер');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->integer('create_date')->nullable()->comment('(не используется)');
			$table->enum('type', array('goods','service'))->nullable()->comment('тип: товар / услуга');
			$table->string('note')->nullable()->comment('примечание');
			$table->string('delivery_type')->index('FK_nomenclature_nomenclature_delivery_type_name')->comment('Тип доставки');
			$table->decimal('unit_weight', 5)->nullable()->comment('Вес одной единицы (т)');
			$table->decimal('unit_volume', 5)->nullable()->comment('Объем одной единицы (куб.м.)');
			$table->decimal('unit_time', 5)->nullable()->comment('Время одной единицы (ч)');
			$table->integer('container_type_id')->nullable()->index('FK_nomenclature_container_type_id')->comment('ID типа контейнера');
			$table->integer('vehicle_type_id')->nullable()->index('FK_nomenclature_vehicle_type_id')->comment('ID типа ТС');
			$table->boolean('show_lk')->default(0)->comment('Показывать в ЛК');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и время создания');
			$table->integer('create_user_id')->nullable()->index('FK_nomenclature_user_id')->comment('ID пользователя, который создал');
			$table->decimal('price_min', 19)->nullable()->comment('Мин. отпускная цена');
			$table->integer('nds')->nullable()->comment('% НДС');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nomenclature');
	}

}
