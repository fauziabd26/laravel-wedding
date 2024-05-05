<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galery extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'galeries';
    protected $keyType = 'string';
    protected $fillable = [
        'wedding_id',
        'gallery1',
        'gallery2',
        'gallery3',
        'gallery4',
        'gallery5',
        'gallery6',
        'video',
    ];
    protected $casts = [
        'id' => 'string'
    ];

    public function Wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
