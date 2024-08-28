<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $keyType = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'category_id',
        'brand_id',
        'weight',
        'dimensions',
    ];

    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        if (empty($model->id)) {
            $model->id = (string) Str::uuid();
        }
    });
}


    // Relasi One-to-Many dengan ProductImage
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Method untuk mendapatkan gambar utama
    public function primaryImage()
    {
        return $this->images()->where('is_primary', true)->first();
    }
}
