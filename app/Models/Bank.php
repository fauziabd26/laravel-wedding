<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'banks';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'logo',
    ];
    protected $casts = [
        'id' => 'string'
    ];

    public function Bride()
    {
        return $this->hasMany(Bride::class);
    }
}
