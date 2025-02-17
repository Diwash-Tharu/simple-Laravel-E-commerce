<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'catg_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'quantity',
        'taxes',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description'

    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'catg_id', 'id');
    }
}


