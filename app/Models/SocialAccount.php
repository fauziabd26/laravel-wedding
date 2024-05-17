<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAccount extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $table = 'social_accounts';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'provider_id',
        'provider_name',
    ];

    protected $casts = [
        'id' => 'string'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
