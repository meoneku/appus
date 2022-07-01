<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Carbon;

class Reversion extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->whereHas('member', fn ($query) =>
                $query->where('member_name', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['month'] ?? false, fn ($query, $month) =>
            $query->whereMonth('return_date', $month)
        );

        $query->when($filters['year'] ?? false, fn ($query, $year) =>
            $query->whereYear('return_date', $year)
        );

        $query->when($filters['major'] ?? false, fn ($query, $major) =>
            $query->whereHas('member', fn ($query) =>
                $query->whereHas('major', fn ($query) =>
                    $query->where('major_id', $major)
                )
            )
        );
    }

    public function member()
    {
        return $this->BelongsToThrough(Member::class, Borrow::class);
    }

    public function borrow()
    {
        return $this->belongsTo(Borrow::class);
    }

    public function book()
    {
        return $this->hasManyThrough(Book::class, Borrow::class);
    }

    public function getFineAttribute($value)
    {
        return "Rp. " . number_format($value,0,',','.');
    }
}
