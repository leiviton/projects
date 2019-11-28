<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('patient_id')->index()->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->bigInteger('address_id')->index()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->bigInteger('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status',['created','sent','pending','success','frustrated','cancelled'])->default('created');
            $table->string('voucher');
            $table->string('description_other_type')->nullable();
            $table->string('document')->nullable();
            $table->enum('type',['delivery','collect','other','exchange'])->default('delivery');
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
        Schema::dropIfExists('solicitations');
        Schema::dropIfExists('status_solicitation');
    }
}
