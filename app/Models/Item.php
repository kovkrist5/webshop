<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    } 
    use HasFactory;
    protected $fillable = [
        'name',
        'stock',
        'price',
    ];
    protected $hidden=[
        'id',
        'categoryId'
    ];
}
