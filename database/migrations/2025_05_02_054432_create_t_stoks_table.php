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
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id'); // PK, auto-increment, unsigned big integer
            $table->foreignId('barang_id')->constrained('m_barang', 'barang_id'); // FK ke m_barang
            $table->foreignId('user_id')->constrained('m_user', 'user_id'); // FK ke m_user
            $table->timestamp('stok_tanggal')->useCurrent();
            $table->integer('stok_jumlah');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok');
    }
};
