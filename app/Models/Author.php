<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static get()
 * @method static create(array $array)
 * @property mixed $id
 */
class Author extends Model
{

    use HasFactory;

    protected array $fillable = ['name','surname'];
    protected $appends = ['authorFullName'];
    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function getAuthorFullNameAttribute(): string
    {
        return  $this->name .' '. $this->surname;
    }

}
