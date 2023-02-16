<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['deleted_at'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function scopeSearch($query)
    {
        return $query->when(request()->has('search') ?? false, function ($query, $search) {
            $query->where('title', 'LIKE', '%' . request()->input('search') . '%')
            ->orWhere('body','LIKE', '%' . request()->input('search') . '%');
           /*  ->orWhere('name','LIKE', '%' . request()->input('search') . '%');  */
        });
    }
}
