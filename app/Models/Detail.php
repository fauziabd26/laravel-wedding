<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $table = 'details';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'wedding_id',
        'type',
        'date',
        'address',
        'maps',
        'calendar',
    ];

    protected $casts = [
        'id' => 'string'
    ];
    
    public function Wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
