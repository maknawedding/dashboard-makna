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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengantin');
            $table->string('pengantin_lk');
            $table->string('namaortu_lk')->nullable();
            $table->string('namaortu_pr');
            $table->string('pengantin_pr')->nullable();
            $table->integer('whatsapp');
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->longText('attachments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
