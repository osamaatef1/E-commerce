<?php

namespace App\Models;

use App\Models\Scopes\NewestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function productPhoto()
    {
        return $this->hasMany(ProductPhoto::class,'product_id');
    }

    public function scopeNewest($query){
        return $query->where('created_at','>',now()->subDays(10));
    }

    public static function booted(): void
    {
static::addGlobalScope(new NewestScope());
    }
}
