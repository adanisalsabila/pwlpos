<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    public $timestamps = true;
    protected $fillable = [
        'kategori_id',
        'barang_kode',
        'barang_nama',
        'harga_beli',
        'harga_jual',
        'supplier_id', // Pastikan ini ada jika kamu menambahkan FK ke supplier
    ];

    /**
     * Mendapatkan kategori dari barang ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    /**
     * Mendapatkan semua detail penjualan untuk barang ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanDetails(): HasMany
    {
        return $this->hasMany(PenjualanDetailModel::class, 'barang_id', 'barang_id');
    }

    /**
     * Mendapatkan semua stok untuk barang ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stoks(): HasMany
    {
        return $this->hasMany(StokModel::class, 'barang_id', 'barang_id');
    }

    /**
     * Mendapatkan supplier dari barang ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(SupplierModel::class, 'supplier_id', 'supplier_id');
    }
}