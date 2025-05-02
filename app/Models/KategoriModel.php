<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';
    public $timestamps = true;
    protected $fillable = [
        'kategori_kode',
        'kategori_nama',
    ];

    /**
     * Mendapatkan semua barang yang termasuk dalam kategori ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangs(): HasMany
    {
        return $this->hasMany(BarangModel::class, 'kategori_id', 'kategori_id');
    }
}