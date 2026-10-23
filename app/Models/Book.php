<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'published_at',
        'author_id',
        'category_id',
    ];
    /**
     * Convert published_at to a date object (Carbon) automatically.
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }
    /**
     * Each book belongs to one author.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
