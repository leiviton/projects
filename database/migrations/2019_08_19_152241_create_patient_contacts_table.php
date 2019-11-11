<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePatientContactsTable.
 */
class CreatePatientContactsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('patient_contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('patient_id')->index()->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->string('email')->nullable();
            $table->string('cellphone');
            $table->string('phone')->nullable();
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
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
		Schema::drop('patient_contacts');
	}
}
