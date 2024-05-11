<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitations extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $table = 'invitations';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'wedding_id',
        'kata_id',
        'name',
        'link',
    ];

    protected $casts = [
        'id' => 'string'
    ];
    
    public function Wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
    
    public function Redaksi()
    {
        return $this->belongsTo(RedaksiKata::class, 'kata_id', 'id');
    }
}
