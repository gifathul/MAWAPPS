
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
        Schema::create('academic_events', function (Blueprint $table) {
            $table->id();

            // Relasi dengan pengguna yang membuat agenda
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Informasi agenda
            $table->string('title');
            $table->string('course')->nullable();
            $table->text('description')->nullable();

            // Waktu kegiatan
            $table->dateTime('start_at');
            $table->dateTime('end_at')->nullable();

            // Lokasi dan kategori kegiatan
            $table->string('location')->nullable();
            $table->string('type')->default('lainnya');

            $table->timestamps();

            // Indeks untuk pencarian agenda pengguna
            $table->index(['user_id', 'start_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_events');
    }
};
