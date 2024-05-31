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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->string('lokasi_akad');
            $table->string('lokasi_resepsi');
            $table->string('harga_jual');
            $table->string('harga_modal');
            $table->string('start_date');
            $table->string('end_date');
            $table->foreignId('event_manager')->constrained('users')->cascadeOnDelete();
            $table->foreignId('account_manager')->constrained('users')->cascadeOnDelete();
            $table->text('keterangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
