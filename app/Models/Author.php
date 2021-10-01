<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static get()
 */
class Author extends Model
{

    use HasFactory;

    protected array $fillable = ['name','surname'];

    public function book(): HasMany
    {
        return $this->hasMany(Book::class,'author_id','id');
    }
}
