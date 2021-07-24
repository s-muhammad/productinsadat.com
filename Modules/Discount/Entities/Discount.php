<?php

namespace Modules\Discount\Entities;

use App\Models\Category;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['code','percent','expired_at'];

    protected static function newFactory()
    {
        return \Modules\Discount\Database\factories\DiscountFactory::new();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}
