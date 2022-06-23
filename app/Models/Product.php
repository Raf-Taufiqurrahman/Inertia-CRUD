<?php

namespace App\Models;

use App\Traits\Slug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Slug;

    protected $fillable = ['name', 'slug', 'image', 'description', 'stock'];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function scopeSearch($query, $type)
    {
        return $query->when(request()->q, function($search) use($type){
            $search = $search->where($type, 'like', '%'. request()->q .'%');
        });
    }

    public function getImageAttribute($image)
    {
        if ($image != null) :
            return asset('storage/products/'.$image);
        else :
            return 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->name) . '&background=4e73df&color=ffffff&size=100';
        endif;
    }
}
