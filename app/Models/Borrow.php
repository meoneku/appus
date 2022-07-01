<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Carbon;

class Borrow extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;

    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->whereHas('member', fn ($query) =>
                $query->where('member_name', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['month'] ?? false, fn ($query, $month) =>
            $query->whereMonth('borrow_date', $month)
        );

        $query->when($filters['year'] ?? false, fn ($query, $year) =>
            $query->whereYear('borrow_date', $year)
        );

        $query->when($filters['major'] ?? false, fn ($query, $major) =>
            $query->whereHas('major', fn ($query) =>
                $query->where('major_id', $major)
            )
        );
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function major()
    {
        return $this->BelongsToThrough(Major::class, Member::class);
    }

    public function book()
    {
        return $this->belongsToMany(Book::class);
    }

    public function getFavoritesAttribute()
    {
        return count($this->books);
    }
}
