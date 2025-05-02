<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenjualanDetailModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';
    public $timestamps = true;
    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah',
    ];

    /**
     * Mendapatkan data penjualan yang memiliki detail ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjualan(): BelongsTo
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }

    /**
     * Mendapatkan data barang yang ada dalam detail penjualan ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}