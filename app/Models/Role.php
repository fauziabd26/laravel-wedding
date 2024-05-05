<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'roles';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
    ];
    protected $casts = [
        'id' => 'string'
    ];
}
