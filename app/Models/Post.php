<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $with = [
        'category', 
        'tags'
    ];
    
    public function getRouteKeyName(): string
    {
        return 'slug';
    }


   public function scopeFilters(Builder $query, array $filters): void
{
    if (isset($filters['search'])) {
        $query->where(fn (Builder $query) => $query
            ->where('title', 'LIKE', '%' . $filters['search'] . '%')
            ->orWhere('content', 'LIKE', '%' . $filters['search'] . '%')
        );
    }

    if (isset($filters['category'])) {
        $query->where(
            'category_id', $filters['category']->id ?? $filters['category']
        );
    }

    if (isset($filters['tag'])) {
        $query->whereHas('tags', function ($query) use ($filters) {
            $query->where('tags.id', $filters['tag']->id ?? $filters['tag']);
        });
    }
}


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
