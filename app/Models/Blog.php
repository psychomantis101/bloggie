<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'featured_at'   => 'datetime',
        'expired_at'    => 'datetime',
        'is_live'       => 'boolean',
        'published_at'  => 'datetime',
    ];

    public function testimonials(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public static function getLatestLiveBlogs($limit = null, $paginate = false)
    {
        $now = Carbon::now();

        $blogs = Blog::where(function ($subquery) use ($now) {
            return $subquery->where('expired_at', '>', $now)
                ->orWhereNull('expired_at');
        })
            ->where('published_at', '<=', $now)
            ->orderBy('published_at', 'desc');

        if ($limit) {
            $blogs->limit($limit);
        };

        return $paginate ? $blogs->paginate($paginate) : $blogs->get();
    }
}
