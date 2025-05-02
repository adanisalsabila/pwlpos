<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierModel extends Model
{
    use HasFactory;

    protected $table = 'm_supplier';
    protected $primaryKey = 'supplier_id';
    public $timestamps = true;
    protected $fillable = [
        'supplier_kode',
        'supplier_nama',
        'alamat',
        'telepon',
        'email',
        'barang_id', // Pastikan ini ada jika kamu menambahkan FK ke barang (perhatikan relasi)
    ];

    /**
     * Mendapatkan semua barang yang dimiliki oleh supplier ini (jika relasinya one-to-many).
     * Jika relasinya many-to-many, kamu perlu mendefinisikan relasi belongsToMany.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangs(): HasMany
    {
        return $this->hasMany(BarangModel::class, 'supplier_id', 'supplier_id');
    }

    /**
     * Mendapatkan semua stok dari supplier ini (jika relasinya one-to-many).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stoks(): HasMany
    {
        return $this->hasMany(StokModel::class, 'supplier_id', 'supplier_id');
    }
}