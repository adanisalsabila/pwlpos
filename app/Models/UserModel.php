<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $timestamps = true;
    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password',
    ];

    /**
     * Mendapatkan level dari user ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    /**
     * Mendapatkan semua penjualan yang dilakukan oleh user ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualans(): HasMany
    {
        return $this->hasMany(PenjualanModel::class, 'user_id', 'user_id');
    }

    /**
     * Mendapatkan semua stok yang dicatat oleh user ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stoks(): HasMany
    {
        return $this->hasMany(StokModel::class, 'user_id', 'user_id');
    }
}