<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'photo', 'is_default'
    ];

    protected $hidden = [];

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }

    // relation
    public function Product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
