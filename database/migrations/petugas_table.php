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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id(); 
            $table->string('fullname');   
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('npwp')->nullable();
            $table->string('satuan')->nullable();
            $table->enum('role', ['verifikator', 'kasi-urji', 'pembayar']);
            $table->string('no_phone')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('address')->nullable();
            $table->enum('status', ['aktif', 'non-aktif']);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};