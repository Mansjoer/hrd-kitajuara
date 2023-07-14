<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Laki-Laki', 'Perempuan', 'Lainnya'])->nullable();
            $table->enum('marital_status', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])->nullable();
            $table->enum('religion', ['Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hindu', 'Budha', 'Konghucu', 'Lainnya'])->nullable();
            $table->string('position')->nullable();
            $table->integer('departement_id')->nullable();
            $table->integer('sub_departement_id')->nullable();
            $table->string('company')->nullable();
            $table->date('joined_at')->nullable();
            $table->enum('status', ['Kontrak', 'Permanen / Tetap', 'Lainnya'])->nullable();
            $table->date('start_contract_at')->nullable();
            $table->date('end_contract_at')->nullable();
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->longText('address2')->nullable();
            $table->string('education')->nullable();
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('bpjamsostek')->nullable();
            $table->string('bank')->nullable();
            $table->bigInteger('bank_number')->nullable();
            $table->integer('pin')->nullable()->default(1234);
            $table->string('profile_path')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
