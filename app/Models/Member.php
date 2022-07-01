<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('member_name', 'like', '%' . $search . '%')
                    ->orWhere('member_number', 'like', '%' . $search . '%')
                    ->orWhere('year', 'like', '%' . $search . '%')
                    ->orWhere('phonenumber', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['year'] ?? false, function ($query, $year) {
            return $query->where('year', $year);
        });

        $query->when($filters['major'] ?? false, fn ($query, $major) =>
            $query->whereHas('major', fn ($query) =>
                $query->where('major_id', $major)
            )
        );
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
