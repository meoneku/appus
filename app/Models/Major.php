<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = [
        'major',
        'designation',
    ];

    public function member()
    {
        return $this->hasMany(Member::class);
    }

    public function borrow()
    {
        return $this->hasManyThrough(Borrow::class, Member::class);
    }
}
