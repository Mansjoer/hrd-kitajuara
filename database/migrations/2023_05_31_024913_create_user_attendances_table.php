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
        Schema::create('user_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->double('in_longitude')->nullable();
            $table->double('in_latitude')->nullable();
            $table->double('out_longitude')->nullable();
            $table->double('out_latitude')->nullable();
            $table->string('gmapsLink');
            $table->string('in_picturePath')->nullable();
            $table->string('out_picturePath')->nullable();
            $table->time('inTime');
            $table->time('outTime');
            $table->integer('branch_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_attendances');
    }
};
