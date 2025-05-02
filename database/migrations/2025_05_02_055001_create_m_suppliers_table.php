<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_supplier', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('supplier_kode', 20)->unique();
            $table->string('supplier_nama', 100);
            $table->text('alamat')->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('email', 100)->unique()->nullable();

            // Menambahkan foreign key ke tabel m_barang
            // Pastikan tabel m_barang sudah ada dan memiliki kolom barang_id sebagai primary key
            $table->foreignId('barang_id')->nullable()->constrained('m_barang', 'barang_id');
            $table->index('barang_id'); // Opsional: untuk meningkatkan performa query berdasarkan supplier

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_supplier');
    }
}