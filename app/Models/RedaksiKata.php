<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedaksiKata extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $table = 'redaksi_kata';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'wedding_id',
        'kata'
    ];

    protected $casts = [
        'id' => 'string'
    ];
    
    public function Wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
