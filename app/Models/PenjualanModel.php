<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PenjualanModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'penjualan_kode',
        'pembeli',
        'penjualan_tanggal',
    ];

    /**
     * Mendapatkan user yang melakukan penjualan ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    /**
     * Mendapatkan semua detail penjualan untuk penjualan ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualanDetails(): HasMany
    {
        return $this->hasMany(PenjualanDetailModel::class, 'penjualan_id', 'penjualan_id');
    }
}