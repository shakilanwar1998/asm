<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achiever extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'position',
        'type'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
