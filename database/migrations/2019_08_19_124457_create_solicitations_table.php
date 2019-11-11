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
        Schema::create('status_solicitation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('short_description');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('solicitations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->uuid('patient_id')->index()->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->uuid('address_id')->index()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->uuid('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->uuid('status_solicitation_id')->index()->nullable();
            $table->foreign('status_solicitation_id')->references('id')->on('status_solicitation');
            $table->string('protocol');
            $table->string('manifestation');
            $table->string('description_other_type')->nullable();
            $table->dateTime('date_scheduling')->nullable();
            $table->string('schedule_time')->nullable();
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
