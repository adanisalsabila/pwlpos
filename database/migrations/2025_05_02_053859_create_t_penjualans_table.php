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
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id('penjualan_id'); // PK, auto-increment, unsigned big integer
            $table->foreignId('user_id')->constrained('m_user', 'user_id'); // FK ke m_user
            $table->string('penjualan_kode', 50)->unique();
            $table->string('pembeli', 20);
            $table->timestamp('penjualan_tanggal')->useCurrent();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan');
    }
};
