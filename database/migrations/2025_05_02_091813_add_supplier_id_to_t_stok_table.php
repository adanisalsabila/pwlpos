<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupplierIdToTStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_stok', function (Blueprint $table) {
            $table->unsignedBigInteger('supplier_id')->after('barang_id'); // Menambahkan kolom supplier_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_stok', function (Blueprint $table) {
            $table->dropColumn('supplier_id'); // Menghapus kolom supplier_id jika rollback
        });
    }
}
