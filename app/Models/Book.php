<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $id)
 * @method static paginate(int $int)
 * @method static create(array $array)
 * @method static find($id)
 * @property mixed $author
 */
class Book extends Model
{

    use HasFactory;

    /**
     * If is_borrowed auto null .
     * UNCOMMENT ( select all comment line and ctrl + / )
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->is_borrowed = false;
            return $model;
        });
    }

    protected $appends = [
        'authorFullName'
    ];


    protected array $fillable = [
        'title','is_borrowed','author_id'
    ];


    /** BelongsTo */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /** Attributes */
    public function getAuthorFullNameAttribute(): string
    {
        return  $this->author->name .' '. $this->author->surname;
    }

}
