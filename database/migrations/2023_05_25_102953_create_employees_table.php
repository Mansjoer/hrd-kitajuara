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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->longText('address2')->nullable();
            $table->string('education')->nullable();
            $table->enum('gender', ['Laki-Laki', 'Perempuan', 'Lainnya'])->nullable();
            $table->enum('religion', ['Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hindu', 'Budha', 'Konghucu', 'Lainnya'])->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('joined_at')->nullable();
            $table->enum('status', ['Kontrak', 'Permanen / Tetap', 'Lainnya'])->nullable();
            $table->integer('period')->nullable();
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bank')->nullable();
            $table->bigInteger('bank_number')->nullable();
            $table->string('tax')->nullable();
            $table->string('tax_allowance')->default(0);
            $table->integer('isTaxCut')->default(0);
            $table->integer('pin')->nullable()->default(1234);
            $table->string('profile_path')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('position_id')->nullable();
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
