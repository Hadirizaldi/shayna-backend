<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'type', 'description', 'slug', 'price', 'quantity'
    ];

    protected $hidden = [];

    // slug
    public function save(array $options = [])
    {
        // ubah namae produtk ke slug menggunakan function bawaan
        $slug = Str::slug($this->name);

        // simpan hasil pengubah ke slug model
        $this->slug = $slug;

        parent::save();
    }

    // relation
    public function galleries()
    {
        // return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }
}
