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
        Schema::create('penerimaan_danas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sumber_dana_id')->constrained('sumber_danas')->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('uraian')->nullable();
            $table->decimal('nominal', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_danas');
    }
};
