<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @property mixed $surname
 * @property mixed $name
 * @method static get()
 * @property mixed $id
 */
class Author extends Model
{

    use HasFactory;

    protected array $fillable = [
        'name','surname'
    ];

    protected $appends = [
        'authorFullName'
    ];

    /** hasMany */
    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /** Attributes */
    public function getAuthorFullNameAttribute(): string
    {
        return  $this->name . ' ' . $this->surname;
    }

}
