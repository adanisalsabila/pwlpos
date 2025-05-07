<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class UserModel extends Authenticatable implements JWTSubject
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

    protected $hidden = ['password']; 

    protected $casts = ['password' => 'hashed'];

    /**
     * Mendapatkan level dari user ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function getJWTIdentifier()
     {
         return $this->getKey();
     }
     
     public function getJWTCustomClaims()
     {
         return [];
     }
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    /**
 * Mendapatkan nama role
 */
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    /**
     * Cek apakah user memiliki role tertentu
     */
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
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