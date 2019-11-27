<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSolicitationItemsTable.
 */
class CreateSolicitationItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('solicitation_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id')->index()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->uuid('solicitation_id')->index()->nullable();
            $table->foreign('solicitation_id')->references('id')->on('solicitations');
            $table->decimal('total',12,2)->nullable();
            $table->decimal('price_unitary',12,2)->nullable();
            $table->integer('qtd');
            $table->string('lot')->nullable();
            $table->enum('pen',['sim','nao'])->default('nao');
            $table->enum('unity_measure',['unidade','caixa','peça','conjunto','metro'])->default('unidade');
            $table->enum('item_type',['delivery','collect','exchange'])->default('delivery');
            $table->softDeletes();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solicitation_items');
	}
}
