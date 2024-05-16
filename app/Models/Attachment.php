<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'attachments';
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'filename', 'wedding_id', 'file', 'mime'
    ];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class)->withTrashed();
    }
}
