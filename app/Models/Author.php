<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;
    /**
     * Columns that may be filled with create() and update().
     */
    protected $fillable = ['name'];
    /**
     * One author has many books.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
