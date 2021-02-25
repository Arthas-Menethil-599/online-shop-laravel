<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'category_id',
        'img',
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function deleteImage() {
        if (!$this->img)
            return;

        $path = storage_path('app/' . $this->img);

        if (file_exists($path))
            unlink($path);
    }

    function category() {
        return $this->belongsTo(Category::class);
    }
}
