<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bride extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'brides';
    protected $keyType = 'string';
    protected $fillable = [
        'wedding_id',
        'name',
        'child',
        'name_father',
        'name_mother',
        'instagram',
        'bank_id',
        'acc_name',
        'acc_number',
        'gender',
        'photo',
    ];
    protected $casts = [
        'id' => 'string'
    ];

    public function Wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    public function Bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
