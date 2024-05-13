<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Music extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $table = 'music';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'wedding_id',
        'name',
        'file'
    ];
    protected $casts = [
        'id' => 'string'
    ];
    public function Wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
