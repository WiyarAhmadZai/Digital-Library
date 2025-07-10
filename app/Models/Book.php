<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Review;


class Book extends Model
{
    //
    use HasFactory;

    use SoftDeletes;

    protected $casts = [
        'image_path' => 'array',
        'publish_year' => 'date',
        'tags' => 'array', // optional, if you store tags as json or comma-separated string
    ];
    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'final_price',
        'currency_type',
        'language',
        'publish_year',
        'status',
        'total_pages',
        'sku',
        'format',
        'country',
        'discount',
        'tags',
        'author_id',
        'image_paths',   // << Add this
        'pdf_path',      // << Add this
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
