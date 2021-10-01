<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, mixed $id)
 * @method static paginate(int $int)
 * @property mixed $author
 */
class Book extends Model
{

    use HasFactory;


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->is_borrowed = false;
            return $model;
        });

    }


    protected $appends = ['authorFullName'];


    protected array $fillable = ['title','is_borrowed','author_id'];


    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }


    public function getAuthorFullNameAttribute(): string
    {
        return  $this->author->name .' '. $this->author->surname;
    }

}
