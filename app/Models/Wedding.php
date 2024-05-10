<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wedding extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $table = 'weddings';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'note',
        'status',
        'user_id',
    ];
    protected $casts = [
        'id' => 'string'
    ];

    public function Bride()
    {
        return $this->hasMany(Bride::class);
    }

    public function Detail()
    {
        return $this->hasMany(Detail::class);
    }

    public function Gift()
    {
        return $this->hasMany(Gift::class);
    }

    public function Thank()
    {
        return $this->hasMany(Thank::class);
    }

    public function Wishes()
    {
        return $this->hasMany(Wishes::class);
    }

    public function Galery()
    {
        return $this->hasMany(Galery::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
